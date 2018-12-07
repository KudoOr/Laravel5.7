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

Route::get('/', function () {
    return view('welcome');
});
Route::get('khoa-hoc',function(){
    return "Lập trình laravel";
});
Route::get('khoa-hoc/{ten}/{thoigian}',function($ten,$thoigian){
    return "Lap trình $ten lúc $thoigian";
});
Route::get('mon-an/{tenmonan?}',function($tenmonan='default'){
    return $tenmonan;
});
Route::get('thong-tin/{tuoi}/{ten}',function($tuoi,$ten){
    return "thong tin của ban là : $ten tuoi : $tuoi";
})->where(['ten'=>'[a-zA-Z]+','tuoi'=>'[0-9]+']);
Route::get('call-view',function(){
    $hoten ="CẦN";
   return view('view',compact('hoten'));
});
Route::get('test-controller','WelcomeController@test');
Route::get('dinh-danh-route',['as'=>'ddr',function (){
    return 'Đay là trang định danh';
}]);
Route::group(['prefix'=>'thuc-don'],function (){
    Route::get('bun-bo',function (){
        return 'đây là trang bán bún bò';
    });
    Route::get('bun-moc',function (){
        return 'đây là trang bán bún mọc';
    });
});
// end bài 5
Route::get('admin',function(){
    return view('layout.sub.admin');
});
Route::get('/login',function(){
    return view('layout.sub.view');
})->name('login');
View::composer(['layout.sub.view','layout.sub.admin'],function ($view){
    return $view->with('thongtin','Day là trang ca nhanss');
});
Route::get('check-view',function (){
   if (view()->exists('view')){
       return 'view có tồn tại';
   }else{
       return 'view không tồn tại';
   }
});
Route::get('call-master',function (){
    return view('views.sub');
});
Route::get('url/full',function (){
    return URL::full();
});
Route::get('url/asset',function (){
   return  asset('css/style');
});