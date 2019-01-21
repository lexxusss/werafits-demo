<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\GarmentName;
use Illuminate\Http\Request;

class GarmentNameController extends Controller
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
            $garmentname = GarmentName::query()->where('name', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $garmentname = GarmentName::query()->latest()->paginate($perPage);
        }

        return view('admin.garment-name.index', compact('garmentname'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.garment-name.create');
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
			'name' => 'required|max:255'
		]);
        $requestData = $request->all();
        
        GarmentName::query()->create($requestData);

        return redirect('admin/garment-name')->with('flash_message', 'GarmentName added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $garmentname = GarmentName::query()->findOrFail($id);

        return view('admin.garment-name.show', compact('garmentname'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $garmentname = GarmentName::query()->findOrFail($id);

        return view('admin.garment-name.edit', compact('garmentname'));
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
			'name' => 'required|max:255'
		]);
        $requestData = $request->all();
        
        $garmentname = GarmentName::query()->findOrFail($id);
        $garmentname->update($requestData);

        return redirect('admin/garment-name')->with('flash_message', 'GarmentName updated!');
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
        GarmentName::destroy($id);

        return redirect('admin/garment-name')->with('flash_message', 'GarmentName deleted!');
    }
}
