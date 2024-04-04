<?php

namespace App\Http\Controllers;

use App\Http\Traits\ShowTrait;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CategoriesController extends Controller
{

    use ShowTrait;
    public function index(Categories $model)//Показ всех категорий
    {
        $this->model=$model;
        return $this->show_all();
    }

    public function create()//Показ созданной категории
    {
        return view('categories.create');
    }
    public function show(Categories $model,$id)//Показ определенной категории
    {
        $this->model=$model;
        $categories = $this->show_product($id);
        return $categories;
    }

    public function edit($id,Categories $model)
    {
        $this->model=$model;
        $categories = $this->show_one($id);
        return $categories;
    }
    public function editStore(Request $request,Categories $model)//Изменение категории
    {
        $this->model=$model;
        $categories = $this->edit_m($request->input('name'),$request->input('rename'));
        return redirect("categories/$categories->id/edit");

    }
    public function store(Request $request,Categories $model)//Создание категории
    {
        $this->model=$model;
        $categories = $this->store_m(strtolower($request->input('name')));
        return redirect('categories');

    }
    public function delete($id,Categories $model)
    {
        $this->model=$model;
        $this->delete_m($id);
        return redirect('categories');

    }
}
