<?php

namespace App\Http\Controllers;

use App\Http\Traits\DBTrait;
use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class ColorController extends Controller
{
    use DBTrait;
    public function index(Color $model)
    {
        $this->model=$model;
        return $this->show_all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Color $model,Request $request)
    {
        $this->model=$model;
//        return $request->input('name');
        $color = $this->store_m(strtolower($request->input('name')));
        return $color;
    }

    /**
     * Display the specified resource.
     */
    public function show(Color $model,string $id)
    {
        $this->model=$model;
        $color = $this->show_product($id);
        return $color;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id,Color $model)
    {
        $this->model=$model;
        $this->edit_m($request->input('name'),$id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Color $model,string $id)
    {
        $this->model=$model;
        $this->delete_m($id);
    }
}
