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

    public function index(Attr $model)
    {
        $this->model=$model;
        return $this->show_all_product();
    }
    public function show(Product $model,$id)
    {
        $this->model=$model;
        $par = $this->show_product($id);
        return $par;
    }

    public function store(Request $request)
    {
        $product = new Product;
        $product->name = strtolower($request->input('name'));
        $product->save();
        $categories = Categories::where('name',$request->input('categories'));
        $manufacture = Manufacture::where('name',$request->input('manufacture'));
        $color = Color::where('name',$request->input('color'));
        $size = Size::where('name',$request->input('size'));
        $attr = new Attr;
        $attr->product_id = $product->id;
        $attr->color_id = $color->id;
        $attr->categories_id = $categories->id;
        $attr->manufacture_id = $manufacture->id;
        $attr->size_id = $size->id;
        $attr->save();
        return redirect('product');
    }
    public function delete(Product $model,$id)
    {

        $this->model=$model;
        $this->delete_m($id);
        return redirect('product');

    }

    public function editStore(Request $request,Product $model)
    {

        $this->model=$model;
        $par = $this->edit_m($request->input('name'),$request->input('rename'));
        return redirect('product');


    }

}

