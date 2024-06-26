<?php
namespace App\Http\Traits;


use App\Models\Attr;
use App\Models\Categories;
use App\Models\Color;
use App\Models\Manufacture;
use App\Models\Product;
use App\Models\Size;


trait DBTrait
{
    protected $model;

    protected function show_all()
    {
        return $this->model->all();
    }
    protected function show_all_product()
    {
        $par = $this->model->all();
            foreach ($par as $d) {
            $product = Product::where('id',$d->product_id)->first();
            $size = Size::where('id',$d->size_id)->first();
            $color = Color::where('id',$d->color_id)->first();
            $cat = Categories::where('id',$d->categories_id)->first();
            $manuf = Manufacture::where('id',$d->manufacture_id)->first();
            $myarr[] = 'ID: '.$product->id;
            $myarr[] = 'NAME: '.$product->name;
            $myarr[] = 'SIZE: '.$size->name;
            $myarr[] = 'COLOR: '.$color->name;
            $myarr[] = 'MANUFACTURE: '.$manuf->name;
            $myarr[] = 'CATEGORIES: '.$cat->name;
        }
        return $myarr;
    }
    protected function show_product($id)
    {
        $par = $this->model->findOrFail($id);
        $l = Request()->route();
        $l = str_replace(['api/','/{id}'], '', $l->uri);
        $attr = Attr::where($l."_id",$par->id)->get();
        $arr = [];
        foreach ($attr as $d)
            $arr[] = Product::where('id',$d->product_id)->first();
        return $arr;
    }

    protected function edit_m($name,$id)
    {
        $par = $this->model->findOrFail($id);
        $par->name = $name;
        if($par->save())return response($par,200);
        return response('Error update',500);
    }


    protected function store_m($name)
    {
        $par = $this->model->firstOrCreate(['name'=>$name]);
        $data = $par;

        $response = [
            'status' => 'success',
            'message' => 'Store successfully.',
            'data' => $data,];
        if($par->save()) return response($response,201);
        return response('Error store',500);
    }


    protected function delete_m($id)
    {
        $par = $this->model->where('id',$id)->first();
        if($par->delete())return response(null, 204);
        return response('Error delete',404);
    }

}
