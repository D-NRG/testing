<?php

namespace App\Http\Controllers;

use App\Http\Traits\DBTrait;
use App\Models\Manufacture;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ManufactureController extends Controller
{
    use DBTrait;
    public function index(Manufacture $model)//Показ всех категорий
    {
        $this->model=$model;
        return $this->show_all();
    }

    public function create()//Показ созданной категории
    {
        return view('manufacture.create');
    }
    public function show(Manufacture $model,$id)//Показ определенной категории
    {
        $this->model=$model;
        $manufacture = $this->show_product($id);
        return $manufacture;
    }

    public function edit($id,Manufacture $model)
    {
        $this->model=$model;
        $manufacture = $this->show_one($id);
        return $manufacture;
    }
    public function editStore(Request $request,Manufacture $model)//Изменение категории
    {
        $this->model=$model;
        $manufacture = $this->edit_m($request->input('name'),$request->input('rename'));
        return redirect("manufacture/$manufacture->id/edit");

    }
    public function store(Request $request,Manufacture $model)//Создание категории
    {
        $this->model=$model;
        $manufacture = $this->store_m(strtolower($request->input('name')));
        return redirect('manufacture');

    }
    public function delete($id,Manufacture $model)
    {
        $this->model=$model;
        $this->delete_m($id);
        return redirect('manufacture');

    }
}
