<?php
use App\Http\Controllers\usercontroller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;
use App\Services\userServ;

Route::get('/', function () {
    return view('welcome');

});

Route::get('/testing', function(Request $request){
    $input = $request-> input('key');
    return $input;
});

Route::get('/usering', function(userServ $userServ){
    return $userServ->listusers();
});

Route::get('/controllers', [usercontroller::class, 'index']);

Route::get('facading', function (userServ $userServ){
    return Response::json($userServ->listusers());
});