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

class AttrController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use DBTrait;

    public function index(Attr $model)
    {
        $this->model=$model;
        return $this->show_all_product();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = Product::where('name',$request->input('product'))->first();
        $categories = Categories::where('name',$request->input('categories'))->first();
        $manufacture = Manufacture::where('name',$request->input('manufacture'))->first();
        $color = Color::where('name',$request->input('color'))->first();
        $size = Size::where('name',$request->input('size'))->first();
        $attr = new Attr;
        $attr->products_id = $product->id;
        $attr->colors_id = $color->id;
        $attr->categories_id = $categories->id;
        $attr->manufactures_id = $manufacture->id;
        $attr->sizes_id = $size->id;
        $attr->save();
        return $attr;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $attr = Attr::findOrFail($id);
        $array=['Product '=>Product::where('id',$attr->products_id)->first()->name,'Size'=>Size::where('id',$attr->sizes_id)->first()->name,
            'Color'=>Color::where('id',$attr->colors_id)->first()->name,'Manufacture'=>Manufacture::where('id',$attr->manufactures_id)->first()->name,
            'Categories'=>Categories::where('id',$attr->categories_id)->first()->name];
        return $array;

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $par = Attr::findOrFail($id);
        $n = $request->input('name');
        $c = $request->input('column');
        $par->$c = $n;
        if($par->save())return response($par,200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id,Attr $model)
    {
        $this->model=$model;
        $this->delete_m($id);
    }
}
