<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\AddCateRequest;
use App\Http\Requests\EditCateRequest;
class CategoryController extends Controller
{
    //Hiển thị danh sách
    public function getCate(){
        $data['catelist'] = Category::all();
        return view('backend.category', $data);
    }
    //Thêm
    public function postCate(AddCateRequest $request){
        $category = new Category;
        $category->cate_name = $request->name;
        $category->cate_slug = str_slug($request->name);
        $category->save();
        return back();
    }
    //lấy id cần sửa
    public function getEditCate($id){
        $data['cate'] = Category::find($id);
        return view('backend.editcategory', $data);
    }
    //Sửa
    public function postEditCate(EditCateRequest $request, $id){
        $category = Category::find($id);
        $category->cate_name = $request->name;
        $category->cate_slug = str_slug($request->name);
        $category->save();
        return redirect()->intended('admin/category');
    }
    //Xóa theo id
    public function getDeleteCate($id){
        Category::destroy($id);
        return back();
    }
}
