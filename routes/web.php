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
Route::get('schema/create',function (){
   Schema::create('log_user',function ($table){
        $table->increments('id');
        $table->string('username');
        $table->string('age');
        $table->text('note')->nullable();
        $table->timestamps();
   });
});
Route::get('schema/rename',function (){
   Schema::rename('log_user','log_user_doiten');
});
Route::get('schema/drop',function (){
   Schema::dropIfExists('log_user_doiten');
});
Route::get('schema/change_col_attr',function (){
   Schema::table('log_user',function ($table){
       $table->string('username',50)->change();
   });
});
Route::get('schema/drop_col',function (){
   Schema::table('log_user',function ($table){
       $table->dropColumn(['age','note']);
   });
});
Route::get('schema/create/cate',function (){
    Schema::create('category_news',function ($table){
        $table->increments('id');
        $table->string('name');
        $table->timestamps();
    });
});
Route::get('schema/create/product',function (){
    Schema::create('product',function ($table){
        $table->increments('id');
        $table->string('name');
        $table->integer('price');
        $table->integer('cate_id')->unsigned();
        $table->foreign('cate_id')->references('id')->on('category');
        $table->timestamps();
    });
});
Route::get('query/select-all',function (){
        $data = DB::table('product')->get();
        echo "<pre>";
        print_r($data);
        echo '</pre>';
});
Route::get('query/select-col',function (){
        $data = DB::table('product')->select('name')->where('id',4)->get();
        echo "<pre>";
        print_r($data);
        echo '</pre>';
});
Route::get('query/where-or',function (){// lấy giá trị tồn tại 1 trong 2 điều kiện
        $data = DB::table('product')->where('cate_id',2)->orWhere('price',12345)->get();
        echo "<pre>";
        print_r($data);
        echo '</pre>';
});
Route::get('query/where',function (){// Lấy giá trị thỏa mãn đồng thời
        $data = DB::table('product')->where('cate_id',2)->where('price',12345)->get();
        echo "<pre>";
        print_r($data);
        echo '</pre>';
});
Route::get('query/order',function (){// Lấy giá trị thỏa mãn đồng thời
        $data = DB::table('product')->orderBy('id','DESC')->get();
        echo "<pre>";
        print_r($data);
        echo '</pre>';
});
Route::get('query/limit',function (){// Lấy giá trị thỏa mãn đồng thời
        $data = DB::table('product')->skip(2)->take(2)->get();
        echo "<pre>";
        print_r($data);
        echo '</pre>';
});
Route::get('model/select-all',function (){
    $data = App\Product::all()->toJson();
    print_r($data);
    echo "</pre>";
});
Route::get('model/find',function (){
    $data = App\Product::find(111);
    print_r($data);
    echo "</pre>";
});
Route::get('model/findwhere',function (){
    $data = App\Product::where('price','>',12222)->take(2)->select('name')->get()->toArray();
    echo "<pre>";
    print_r($data);
    echo "</pre>";
});
Route::get('model/insert',function (){
    $product = new App\Product;
    $product->name = 'quần béo phì';
    $product->price = 10000;
    $product->cate_id = 2;
    $product->save();
    echo 'Finish';
});