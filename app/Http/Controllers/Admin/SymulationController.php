<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Symulation;
use Illuminate\Http\Request;

class SymulationController extends Controller
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
            $symulation = Symulation::query()->where('garment_size_id', 'LIKE', "%$keyword%")
                ->orWhere('avatar_id', 'LIKE', "%$keyword%")
                ->orWhere('s3_url_garment_json', 'LIKE', "%$keyword%")
                ->orWhere('s3_url_garment_preview_json', 'LIKE', "%$keyword%")
                ->orWhere('s3_url_garment_usdz', 'LIKE', "%$keyword%")
                ->orWhere('s3_url_garment_metadata_json', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $symulation = Symulation::query()->latest()->paginate($perPage);
        }

        return view('admin.symulation.index', compact('symulation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.symulation.create');
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
			's3_url_garment_json' => 'required|max:255',
			's3_url_garment_preview_json' => 'required|max:255',
			's3_url_garment_usdz' => 'required|max:255',
			's3_url_garment_metadata_json' => 'required|max:255'
		]);
        $requestData = $request->all();
        
        Symulation::query()->create($requestData);

        return redirect('admin/symulation')->with('flash_message', 'Symulation added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $symulation = Symulation::query()->findOrFail($id);

        return view('admin.symulation.show', compact('symulation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $symulation = Symulation::query()->findOrFail($id);

        return view('admin.symulation.edit', compact('symulation'));
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
			's3_url_garment_json' => 'required|max:255',
			's3_url_garment_preview_json' => 'required|max:255',
			's3_url_garment_usdz' => 'required|max:255',
			's3_url_garment_metadata_json' => 'required|max:255'
		]);
        $requestData = $request->all();
        
        $symulation = Symulation::query()->findOrFail($id);
        $symulation->update($requestData);

        return redirect('admin/symulation')->with('flash_message', 'Symulation updated!');
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
        Symulation::destroy($id);

        return redirect('admin/symulation')->with('flash_message', 'Symulation deleted!');
    }
}
