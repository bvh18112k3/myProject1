<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryResquest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    const OBJECT = "categories";
    const DOT = '.';
    public function index(){
        $data = Category::query()->with(['products','product'])->orderByDesc('id')->get();
        return view(self::OBJECT.self::DOT.__FUNCTION__, compact('data'));
//        return view('categories.index', compact('data'));
    }
    public function create(){
        return view(self::OBJECT.self::DOT.'create');
    }
    public function store(StoreCategoryRequest $request){
        $model = new Category();
        $model->fill($request->all());
        $model->save();
        return redirect()->route('categories.index');
    }
    public function edit($id){
        $model = Category::query()->findOrFail($id);
        return view(self::OBJECT.self::DOT.__FUNCTION__, compact('model'));
    }
    public function update(UpdateCategoryResquest $request, $id){
        $model = Category::query()->findOrFail($id);
        $model->fill($request->all());
        $model->save();
        return back();

    }
    public function destroy(Category $category){
        $category->delete();
        return back();
    }
}
