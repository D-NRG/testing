<?php

namespace App\Http\Controllers;

use App\Http\Requests\SizeRequest;
use App\Http\Traits\DBTrait;
use App\Models\Attr;
use App\Models\Size;
use App\Models\Product;
use App\Services\FooService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SizeController extends Controller
{
    use DBTrait;
    public function index(Size $model)
    {
        $this->model=$model;
        return $this->show_all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Size $model,Request $request)
    {
        $this->model=$model;
//        return $request->input('name');
        $size = $this->store_m(strtolower($request->input('name')));
        return $size;
    }

    /**
     * Display the specified resource.
     */
    public function show(Size $model,string $id)
    {
        $this->model=$model;
        $size = $this->show_product($id);
        return $size;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id,Size $model)
    {
        $this->model=$model;
        $this->edit_m($request->input('name'),$id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Size $model,string $id)
    {
        $this->model=$model;
        $this->delete_m($id);
    }
}
