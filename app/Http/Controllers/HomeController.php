<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Food;
use App\Models\Foodchef;
use App\Models\Cart;
use App\Models\Order;

class HomeController extends Controller
{
    //
    public function Index(){
        if(Auth::id()){
            return redirect('redirects');
        }
        else 
        {
       
        $data = Food::all();
        $data2 = Foodchef::all();
        return view('home', compact('data', 'data2'));

        }
    }

    public function Redirect(){
    //    $user_type = Auth::user()->usertype;

    //    if($user_type == '1'){
    //     return view('admin.admin-home');
    //    } else {
    //     return view('home');
    //    }
    // }
    $data = Food::all();
    $data2 = Foodchef::all();
    $role = Auth::user()->role;

    if($role == 'admin'){
     return view('admin.admin-home');
    } else {
        $user_id = Auth::id(); //get id user login 
        $count = Cart::where('user_id', $user_id)->count();
     return view('home', compact('data', 'data2', 'count'));
    }
 }



    public function AddCart(Request $req, $id){
        if(Auth::id()){
            $user_id = Auth::id();
            //dd($user_id); // show user id from the db

            $food_id = $id;
            $quantity = $req->quantity;
            $cart = new Cart;

            $cart->user_id = $user_id;
            $cart->food_id = $food_id;
            $cart->quantity = $quantity;

            $cart->save();

            return redirect()->back();
        } else {
            return redirect('/login');
        }
    }

    public function ShowCart(Request $req, $id){
        $count = Cart::where('user_id', $id)->count();

        if(Auth::id()==$id){
            $data2 = Cart::select('*')->where('user_id', '=', $id)->get();
            $data = Cart::where('user_id', $id)->join('food', 'carts.food_id', '=', 'food.id')->get();
            $n = 1;
            return view('showcart', compact('count', 'data', 'n', 'data2'));
        } else {
            return redirect()->back();
        }
       
    }

    public function RemoveCart($id){
        $data = Cart::find($id);

        $data->delete();
        return redirect()->back();
    }

    public function OrderConfirm(Request $req){
        foreach($req->food_name as $key =>$food_name){
            $data = new Order;
            $data->food_name = $food_name;
            $data->price = $req->price[$key];
            $data->quantity = $req->quantity[$key];

            $data->name = $req->name;
            $data->phone_number = $req->phone_number;
            $data->address = $req->address;
            $data->save();
        }
        return redirect()->back();
    }
}
