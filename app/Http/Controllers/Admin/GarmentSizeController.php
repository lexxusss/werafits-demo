<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\GarmentSize;
use Illuminate\Http\Request;

class GarmentSizeController extends Controller
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
            $garmentsize = GarmentSize::query()->where('name', 'LIKE', "%$keyword%")
                ->orWhere('s3_url_zpac', 'LIKE', "%$keyword%")
                ->orWhere('garment_name_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $garmentsize = GarmentSize::query()->latest()->paginate($perPage);
        }

        return view('admin.garment-size.index', compact('garmentsize'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.garment-size.create');
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
			'name' => 'required|max:255',
			's3_url_zpac' => 'required|max:255'
		]);
        $requestData = $request->all();
        
        GarmentSize::query()->create($requestData);

        return redirect('admin/garment-size')->with('flash_message', 'GarmentSize added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $garmentsize = GarmentSize::query()->findOrFail($id);

        return view('admin.garment-size.show', compact('garmentsize'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $garmentsize = GarmentSize::query()->findOrFail($id);

        return view('admin.garment-size.edit', compact('garmentsize'));
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
			'name' => 'required|max:255',
			's3_url_zpac' => 'required|max:255'
		]);
        $requestData = $request->all();
        
        $garmentsize = GarmentSize::query()->findOrFail($id);
        $garmentsize->update($requestData);

        return redirect('admin/garment-size')->with('flash_message', 'GarmentSize updated!');
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
        GarmentSize::destroy($id);

        return redirect('admin/garment-size')->with('flash_message', 'GarmentSize deleted!');
    }
}
