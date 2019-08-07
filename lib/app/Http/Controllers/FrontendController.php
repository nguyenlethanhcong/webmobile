<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Comment;
class FrontendController extends Controller
{
    //Lấy dữ liệu và đỗ ra home
    public function getHome(){
        $data['featured'] = Product::where('prod_featured',1)->orderBy('prod_id', 'desc')->take(8)->get();
        $data['news'] = Product::orderBy('prod_id', 'desc')->take(8)->get();
        return view('frontend.home', $data);
    }

    //Lấy chi tiết sản phẩm
    public function getDetail($id){
        $data['item'] = Product::find($id);
        $data['comments'] = Comment::where('com_product', $id)->get();
        return view('frontend.details', $data);
    }

    //Lấy sản phẩm theo danh mục
    public function getCategory($id){
        $data['cateName'] = Category::find($id);
        $data['items'] = Product::where('prod_cate',$id)->orderBy('prod_id', 'desc')->paginate(2);//paginate(phân trang)
        return view('frontend.category', $data);
    }

    //Comment theo sản phẩm
    public function postComment(Request $request, $id){
        $comment = new Comment;
        $comment->com_name      = $request->name;
        $comment->com_email     = $request->email;
        $comment->com_content   = $request->content;
        $comment->com_product  = $id;
        $comment->save();
        return back();
    }

    //Search
    public function getSearch(Request $request){
       $result = $request->result;
       $data['keyword'] = $result;
       $result = str_replace(' ', '%', $result);
       $data['itemss'] = Product::where('prod_name','like','%'.$result.'%')->paginate(2);
       return view('frontend.search', $data);
    }
}
