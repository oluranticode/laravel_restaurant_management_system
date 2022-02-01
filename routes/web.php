<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'Index']);

Route::get('redirects', [HomeController::class, 'Redirect']);

Route::get('/users', [AdminController::class, 'User']);

//Edit users
Route::get('edit-users/{id}', [AdminController::class, 'EditUser']);
// Route::view('edit-users', 'edit-users');
 Route::view('edit', 'admin.edit');

//  Update Users
Route::post('update', [AdminController::class, 'UpdateUser']);

// delete users
Route::get('/delete-users/{id}', [AdminController::class, 'DeleteUser']);

// ...........Food Menu........

Route::get('/foodmenu', [AdminController::class, 'Food']);

Route::post('/upload-food', [AdminController::class, 'uploadFood']);
// food menulist
Route::get('/food-menu-list', [AdminController::class, 'MenuList']);

// delete menu
Route::get('/delete-menu/{id}', [AdminController::class, 'DeleteMenu']);
//Edit menu
Route::get('edit-menu/{id}', [AdminController::class, 'EditMenu']);
//  Update menu
Route::post('update-menu', [AdminController::class, 'UpdateMenu']);


// ......Table Reservation...........
Route::post('reservation', [AdminController::class, 'Reservation']);
// view reservation
Route::get('view-reservation', [AdminController::class, 'ViewReservation']);


// ......Food Chef...........
Route::post('upload-chef', [AdminController::class, 'UploadChef']);
// view chef
Route::get('view-chef', [AdminController::class, 'ViewChef']);

// view chef list
Route::get('list-chef', [AdminController::class, 'ListChef']);

// delete chef
Route::get('/delete-chef/{id}', [AdminController::class, 'DeleteChef']);

//Edit chef
Route::get('edit-chef/{id}', [AdminController::class, 'EditChef']);

//  Update chef
Route::post('update-chef', [AdminController::class, 'UpdateChef']);


// ...............ADD CART.............
Route::post('/addcart/{id}', [HomeController::class, 'AddCart']);


// ...............SHOW CART.............
Route::get('/showcart/{id}', [HomeController::class, 'ShowCart']);

// ...............REMOVE CART.............
Route::get('/remove-cart/{id}', [HomeController::class, 'RemoveCart']);


// ...............ORDER CONFIRM.............
Route::post('/order-confirm', [HomeController::class, 'OrderConfirm']);   

// ...............ORDERS LIST.............
Route::get('orders', [AdminController::class, 'OrdersList']);  

// ...............SEARCH ORDER.............
Route::post('/search', [AdminController::class, 'SearchOrder']);  


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
