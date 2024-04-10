<?php

namespace App\Http\Controllers;

use App\Http\Requests\SizeRequest;
use App\Http\Traits\DBTrait;
use App\Models\Attr;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use App\Services\FooService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SizeController extends Controller
{
    use DBTrait;
    public function index(Size $model)//Показ всех категорий
    {
        $this->model=$model;
        return $this->show_all();
    }

    public function create()//Показ созданной категории
    {
        return view('size.create');
    }
    public function show(Size $model,$id)//Показ определенной категории
    {
        $this->model=$model;
        $size = $this->show_product($id);
        return $size;
    }

    public function edit($id,Size $model)
    {
        $this->model=$model;
        $size = $this->show_one($id);
        return $size;
    }
    public function editStore(Request $request,Size $model)//Изменение категории
    {
        $this->model=$model;
        $size = $this->edit_m($request->input('name'),$request->input('rename'));
        return redirect("size/$size->id/edit");

    }
    public function store(Request $request,Size $model)//Создание категории
    {
        $this->model=$model;
        $size = $this->store_m(strtolower($request->input('name')));
        return redirect('size');

    }
    public function delete($name,Size $model)
    {
        $this->model=$model;
        $this->delete_m($name);
        return redirect('size');

    }
}
