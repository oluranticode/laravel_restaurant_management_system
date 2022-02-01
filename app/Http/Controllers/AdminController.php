<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Food;
use App\Models\Reservation;
use App\Models\Foodchef;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    public function User(){
        // return User::all();
        $n = 1;
        $data = User::all();
        return view('admin.users', ['data' => $data, 'n' => $n]);
    }

    // delete users
    public function DeleteUser($id){
        $data = User::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function EditUser($id){
        //return User::find($id);
        $data = User::find($id);
        return view('admin.edit-users', ['data'=>$data]);
    }

    public function UpdateUser(Request $req){
        //return User::find($req->id);
        $update = User::find($req->id);
        $update->name = $req->name;
        $update->email = $req->email;
        $update->role = $req->role;
        $update->update();
        return redirect('users');
    }


    public function uploadFood(Request $req){
        $data = new Food;
        $image = $req->image;

        if($image){
            $image_name = time(). '.'.$image->getClientOriginalExtension();
            // save the image in the folder
            $req->image->move('foodimage', $image_name);
            // save the image in the database
            $data->image= $image_name;
        }
       
        // save the remaining data in the database
        $data->title = $req->title;
        $data->description = $req->description;
        $data->price = $req->price;
        $data->save();
        // return redirect()->back();
        return redirect('food-menu-list');
        }

        public function DeleteMenu($id){
            $data = Food::find($id);
            $data->delete();
            return redirect()->back();
        }

        public function MenuList(){
            $data = Food::all();
            $n = 1;
            return view('admin.admin-menu-list', compact('data','n'));
        }

        public function Food(){
            $data = Food::all();
             return view('admin.admin-food', compact('data'));
        }

        public function EditMenu($id){
            $menu = Food::find($id);
            return view('admin.edit-menu', compact('menu'));
        }

        Public function UpdateMenu(Request $req){
            $menu = Food::find($req->id);

            $image = $req->image;
            if($image){

                $image_name = time(). '.'.$image->getClientOriginalExtension();
                // save the image in the folder
                $req->image->move('foodimage', $image_name);
                // save the image in the database
                $menu->image = $image_name;
            }

            // save the remaining menu in the database
            $menu->title = $req->title;
            $menu->description = $req->description;
            $menu->update();
            // return redirect()->back();
             return redirect('food-menu-list');

        }

        public function Reservation(Request $req){
            $data = new Reservation;
            
            $data->name = $req->name;
            $data->email = $req->email;
            $data->phone = $req->phone;
            $data->guest = $req->guest;
            $data->time = $req->time;
            $data->date = $req->date;
            $data->message = $req->message;
            $data->save();
             return redirect()->back();
            //return redirect('food-menu-list');
            }

            public function ViewReservation(){
                if(Auth::id()){
                    $data = Reservation::all();
                    $n = 1;
                    return view('admin.admin-reservation', compact('data', 'n'));
                }
                else {
                    return redirect('/login');
                }
               
            }

            public function ViewChef(){
                $data = Foodchef::all();
                $n = 1;
                return view('admin.admin-food-chef', compact('data', 'n'));
            }

            public function UploadChef(Request $req){
                $data = new Foodchef;
                $image = $req->image;

                if($image){
                    $image_name = time(). '.'.$image->getClientOriginalExtension();
                // save the image in the folder
                $req->image->move('chefimage', $image_name);
                // save the image in the database
                $data->image= $image_name;
                }
                // save the remaining data in the database
                $data->name = $req->name;
                $data->speciality = $req->speciality;
                $data->save();
                // return redirect()->back();
                return redirect('list-chef');
                }

                public function ListChef(){
                    $data = Foodchef::all();
                    $n = 1;
                    return view('admin.admin-chef-list', compact('data', 'n'));
                }

                public function DeleteChef($id){
                    $data = Foodchef::find($id);
                    $data->delete();
                    return redirect('list-chef');
                }

                public function EditChef($id){
                    $chef = Foodchef::find($id);
                    return view('admin.edit-chef', compact('chef'));
                }

                Public function UpdateChef(Request $req){
                    $chef = Foodchef::find($req->id);
        
                    $image = $req->image;

                    if($image){
                        $image_name = time(). '.'.$image->getClientOriginalExtension();
                        // save the image in the folder
                        $req->image->move('chefimage', $image_name);
                        // save the image in the database
                        $chef->image = $image_name;
                    }        
                    
                    // save the remaining menu in the database
                    $chef->name = $req->name;
                    $chef->speciality = $req->speciality;
                    $chef->update();
                    // return redirect()->back();
                     return redirect('list-chef');
        
                }

                public function OrdersList(){
                    $data = Order::all();
                    $n = 1;
                    return view('admin.orders', compact('data', 'n'));
                }

                public function SearchOrder(Request $req){
                    $n = 1;
                    $search = $req->search;
                    // $data = Order::where('food_name', 'Like', '%'.$search.'%')->get(); // search for food name alone
                    $data = Order::where('food_name', 'Like', '%'.$search.'%')->orWhere('name', 'Like', '%'.$search.'%')->get();
                    return view('admin.orders', compact('data', 'n'));
                }        

}
