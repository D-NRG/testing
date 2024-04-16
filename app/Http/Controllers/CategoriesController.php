<?php

namespace App\Http\Controllers;

use App\Http\Traits\DBTrait;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CategoriesController extends Controller
{

    use DBTrait;
    public function index(Categories $model)
    {
        $this->model=$model;
        return $this->show_all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Categories $model,Request $request)
    {
        $this->model=$model;
//        return $request->input('name');
        $categories = $this->store_m(strtolower($request->input('name')));
        return $categories;
    }

    /**
     * Display the specified resource.
     */
    public function show(Categories $model,string $id)
    {
        $this->model=$model;
        $categories = $this->show_product($id);
        return $categories;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id,Categories $model)
    {
        $this->model=$model;
        $this->edit_m($request->input('name'),$id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categories $model,string $id)
    {
        $this->model=$model;
        $this->delete_m($id);
    }
}
