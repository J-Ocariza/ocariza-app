<?php
use App\Http\Controllers\ProductController;
use App\Http\Controllers\usercontroller;
use App\Services\ProductService;
use GuzzleHttp\Middleware;
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

Route::get('/post/{post}/comment/{comment}', function (string $postid, string $comment) {
    return "post ID: ". $postid. "- Comment: ". $comment;
});

Route::get('/id/{id}', function (string $id) {
    return $id;

})->where('id', '[0-9]+');


Route::get('/search/{search}', function (string $search) {
    return $search;

})->where('search', '.*');


Route::get('/test/route', function () {
    return route("test-route");

})->name('test-route');


Route::middleware(['user-middleware'])->group(function(){
    Route::get('route-middleware-group/first', function(Request $request){
        echo 'first';
    });
    Route::get('route-middleware-group/second', function(Request $request){
        echo 'second';
    });
});


Route::controller(usercontroller::class)->group(function(){
    Route::get('/users', 'index');
    Route::get('/users/first', 'first');
    Route::get('/users/{id}', 'show');
});

Route::get('/token', function(Request $request){
    return view('token');
});
Route::post('/token', function(Request $request){
    return $request->all();
});

Route::get('/userss', [usercontroller::class, 'index'])->Middleware('user-middleware');

Route::resource('products', ProductController::class);

Route::get('/products-list', function(ProductService $productService){
    $data['products'] = $productService->listProducts();
    return view('products.list', $data);
});