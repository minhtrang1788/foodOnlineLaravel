<?php

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
use App\Product;
use App\Post;


Route::get('/test', function () {
    return view('test');
});
Route::get('/', function () {
    return view('index');
});

Route::get('/blog', function () {
    return view('blog');
});

Route::get('/contact', function () {
    return view('contact');
});
Route::get('/loginClient', function () {
    return view('login');
});
Route::get('/logoutClient', 'SessionController@logout');
Route::post('/loginClient', 'SessionController@login');
Route::post('/signupClient', 'SessionController@createUserGuess');
Route::get('/product', 'ProductController@index');
Route::get('/viewProduct/{pro}', 'ProductController@viewProduct');
Route::get('/viewTagProduct/{tag}', 'TagController@viewTagProduct');

Route::get('/singleblog/{id}','PostController@viewPost');
Route::get('/viewPosts/{cat}','PostController@viewPostsCat');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/addToCart', 'CartController@addToCart');
Route::get('/cart', 'CartController@viewCart');
Route::get('/addProduct','CartController@addProduct');
Route::get('/subProduct','CartController@subProduct');
Route::get('/delProductCart','CartController@delProductCart');

Route::post('/comment', 'CommentController@comment');
Route::post('/contact', 'SessionController@contact');

Route::get('/admin/getProducts', 'ProductController@getProducts');
Route::get('/admin/showProduct', 'ProductController@showProduct');
Route::get('/admin/createProduct',  function () {
    return view('/admin/createProduct');
});
Route::get('/admin/editProduct/{product}',  function (Product $product) {
    return view('/admin/editProduct',compact('product'));
});
Route::post('/admin/createProduct', 'ProductController@createProduct');
Route::get('/admin/delProduct/{product}', 'ProductController@delProduct');
Route::post('/admin/editProduct/{product}', 'ProductController@editProduct');

Route::get('/admin/getPosts', 'PostController@getPosts');
Route::get('/admin/showPosts', 'PostController@showPosts');
Route::get('/admin/createPost',  function () {
    return view('/admin/createPost');
});

Route::post('/admin/createPost', 'PostController@createPost');
Route::get('/admin/delPost/{post}', 'PostController@delPost');
Route::get('/admin/editPost/{post}',  function (Post $post) {
    return view('/admin/editPost',compact('post'));
});
Route::post('/admin/editPost/{post}', 'PostController@editPost');

Route::get('/admin/getUsers', 'SessionController@getUsers');
Route::get('/admin/showUsers', 'SessionController@showUsers');
Route::get('/admin/blockUser/{user}', 'SessionController@blockUser');
Route::get('/admin/editProfile', 'SessionController@viewProfile');
Route::post('/admin/editProfile', 'SessionController@editProfile');
Route::get('/admin/createUser',function () {
    return view('/admin/createUser');
});
Route::post('/admin/createUser', 'SessionController@createUser');
Route::get('/admin/showBanner', 'SliderController@showBanner');
Route::get('/admin/createBanner', 'SliderController@createBanner');
Route::get('/admin/showPartners', 'ListParnerController@showPartners');
Route::get('/admin/createPartners', 'ListParnerController@createPartners');
Route::get('/admin/showOrders/{status}', 'CartController@showOrders');
Route::get('/admin/getOrders/{status}', 'CartController@getOrders');
Route::get('/admin/showProduct', 'ProductController@showProduct');
Route::get('/checkout', 'CartController@checkout');
Route::get('/admin/actionOrder/{order}', 'CartController@actionOrder');
