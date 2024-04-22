<?php

namespace App\Http\Controllers;

use App\Http\Traits\DBTrait;
use App\Models\Attr;
use App\Models\Categories;
use App\Models\Color;
use App\Models\Manufacture;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;


class ProductController extends Controller
{
    use DBTrait;

    public function index(Product $model)
    {
        $this->model=$model;
        return $this->show_all();
    }
    public function show(Product $model,string $id)
    {
        $this->model=$model;
        $categories = $this->show_product($id);
        return $categories;
    }

    public function store(Product $model,Request $request)
    {
        $this->model=$model;
//        return $request->input('name');
        $product = $this->store_m(strtolower($request->input('name')));
        return $product;

    }
    public function delete(Product $model,$id)
    {
        $this->model=$model;
        $this->delete_m($id);
    }



}

