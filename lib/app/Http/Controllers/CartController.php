<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Models\Product;
use Mail;
class CartController extends Controller
{
    //add Cart
    public function getAddCart($id){
        $product = Product::find($id);
        Cart::add(['id' => $id, 'name' => $product->prod_name, 'qty' => 1, 'price' => $product->prod_price, 'options' => ['img' => $product->prod_img]]);
        return redirect('cart/show');
    }
    //show Cart
    public function getShowCart(){
        $data['items'] = Cart::content();
        $data['total'] = Cart::total();
        return view('frontend.cart', $data);
    }
    //delete Cart
    public function getDeleteCart($id){
        if($id=='all'){
            Cart::destroy();
        }else{
            Cart::remove($id);
        }
        return back();
    }
    //update Cart
    public function getUpdateCart(Request $request){
        Cart::update($request->rowId,$request->qty);
    }
    //Email
    public function postComplete(Request $request){
        $data['info'] = $request->all();
        $email = $request->email;
        $data['total'] = Cart::total();
        $data['cart'] = Cart::content();
        Mail::send('frontend.email', $data, function ($message) use ($email){
            $message->from('www.nguyenlethanhcong.10k13@gmail.com', 'Cong Nguyen');
            $message->to($email, $email);
            $message->cc('mongmo030899@gmail.com', 'Ngoc Anh');
            $message->subject('Xác nhận hóa đơn mua hàng');
        });
        return redirect('complete');
    }
    //Complete
    public function getComplete(){
        return view('frontend.complete');
    }
}