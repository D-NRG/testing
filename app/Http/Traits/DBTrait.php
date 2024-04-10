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
        $s = $this->model->all();
        return $s;
    }
    protected function show_one($id)
    {
        $s = $this->model->find($id);
        return $s;
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
        $par = $this->model->find($id);
        $l = Request()->route()->getPrefix();
        $l = str_replace('/', '', $l);
        $attr = Attr::where($l."_id",$par->id)->get();
        $arr = [];
        foreach ($attr as $d)
        {
            $arr[] = Product::where('id',$d->product_id)->first();
        }
        return $arr;
    }

    protected function edit_m($name,$rename)
    {
        $par = $this->model->where('name',$name)->first();
        $par->name = $rename;
        $par->save();
        return $par;
    }

    protected function store_m($name)
    {
        $par = $this->model->firstOrCreate(['name'=>$name]);;
        $par->save();
        return $par;
    }


    protected function delete_m($name)
    {
        $par = $this->model->where('name',$name)->first();
        $par->delete();
    }

}
