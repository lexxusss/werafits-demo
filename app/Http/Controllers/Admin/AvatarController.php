<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Avatar;
use Illuminate\Http\Request;

class AvatarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $avatar = Avatar::query()->where('hash', 'LIKE', "%$keyword%")
                ->orWhere('s3_url_abc', 'LIKE', "%$keyword%")
                ->orWhere('s3_url_glb', 'LIKE', "%$keyword%")
                ->orWhere('s3_url_obj', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $avatar = Avatar::query()->latest()->paginate($perPage);
        }

        return view('admin.avatar.index', compact('avatar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.avatar.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
			's3_url_abc' => 'required|max:255',
			's3_url_glb' => 'required|max:255',
			's3_url_obj' => 'required|max:255'
		]);
        $requestData = $request->all();
        
        Avatar::query()->create($requestData);

        return redirect('admin/avatar')->with('flash_message', 'Avatar added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $avatar = Avatar::query()->findOrFail($id);

        return view('admin.avatar.show', compact('avatar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $avatar = Avatar::query()->findOrFail($id);

        return view('admin.avatar.edit', compact('avatar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
			's3_url_abc' => 'required|max:255',
			's3_url_glb' => 'required|max:255',
			's3_url_obj' => 'required|max:255'
		]);
        $requestData = $request->all();
        
        $avatar = Avatar::query()->findOrFail($id);
        $avatar->update($requestData);

        return redirect('admin/avatar')->with('flash_message', 'Avatar updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Avatar::destroy($id);

        return redirect('admin/avatar')->with('flash_message', 'Avatar deleted!');
    }
}
