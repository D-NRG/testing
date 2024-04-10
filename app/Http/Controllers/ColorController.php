<?php

namespace App\Http\Controllers;

use App\Http\Traits\DBTrait;
use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class ColorController extends Controller
{
    use DBTrait;
    public function index(Color $model)//Показ всех категорий
    {
        $this->model=$model;
        return $this->show_all();
    }

    public function create()//Показ созданной категории
    {
        return view('Color.create');
    }
    public function show(Color $model,$id)//Показ определенной категории
    {
        $this->model=$model;
        $color = $this->show_product($id);
        return $color;
    }

    public function edit($id,Color $model)
    {
        $this->model=$model;
        $color = $this->show_one($id);
        return $color;
    }
    public function editStore(Request $request,Color $model)//Изменение категории
    {
        $this->model=$model;
        $color = $this->edit_m($request->input('name'),$request->input('rename'));
        return redirect("color/$color->id/edit");

    }
    public function store(Request $request,Color $model)//Создание категории
    {
        $this->model=$model;
        $color = $this->store_m(strtolower($request->input('name')));
        return redirect('color');

    }
    public function delete($id,Color $model)
    {
        $this->model=$model;
        $this->delete_m($id);
        return redirect('color');

    }
}
