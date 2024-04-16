<?php

namespace App\Http\Controllers;

use App\Http\Traits\DBTrait;
use App\Models\Manufacture;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ManufactureController extends Controller
{
    use DBTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(Manufacture $model)
    {
        $this->model=$model;
        return $this->show_all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Manufacture $model,Request $request)
    {
        $this->model=$model;
//        return $request->input('name');
        $manufacture = $this->store_m(strtolower($request->input('name')));
        return $manufacture;
    }

    /**
     * Display the specified resource.
     */
    public function show(Manufacture $model,string $id)
    {
        $this->model=$model;
        $manufacture = $this->show_product($id);
        return $manufacture;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id,Manufacture $model)
    {
        $this->model=$model;
        $this->edit_m($request->input('name'),$id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Manufacture $model,string $id)
    {
        $this->model=$model;
        $this->delete_m($id);
    }
}
