<?php

/*So vamos usar essa forma de redirecionamento quando a ser retornada nao vai necessitar de carregar mais outras coisas
    Se vai ser estatica, embora seja possivel passar variaveis
    Se a view precisar de logica esse padrao esta incorreto
*/
Route::any('products/search', 'ProductController@search' )->name('products.search')->middleware('auth');
Route::resource('/products', 'ProductController')->middleware('auth');

/**
 * Larafood
 */

 Route::prefix('admin')
            ->namespace('Admin')
            ->group(function(){
                Route::any('plans/search', 'PlansController@search')->name('plans.search');
                Route::delete('plans/{url}', 'PlansController@destroy')->name('plans.destroy');
                Route::put('plans/{url}', 'PlansController@update')->name('plans.update');
                Route::get('plans/{url}/edit', 'PlansController@edit')->name('plans.edit');
                Route::get('plans/{url}', 'PlansController@show')->name('plans.show');
                Route::post('plans', 'PlansController@store')->name('plans.store');
                Route::get('plans', 'PlansController@index')->name('plans.index');
                Route::get('create', 'PlansController@create')->name('plans.create');
                Route::get('admin', 'PlansController@index')->name('admin.index');

            });

// Route::get('/product/{id}/edit', 'ProductController@edit')->name('product.update');
// Route::get('/product/create', 'ProductController@create')->name('product.create');
// Route::get('/product/update/{id}', 'ProductController@update')->name('product.update');
// // Route::get('/delete', 'ProductController@delete')->name('product.delete');
// Route::get('/product', 'ProductController@store')->name('product.store');



// Route::group([
//     'middleware' => 'auth',
//     'prefix' => 'admin'
// ], function (){
//     Route::get('/dashboard', function (){
//         return view('admin.dashboard');
//      });

//      Route::get('/financeiro', function (){
//          return view('admin.financeiro');
//       });

// });


// Route::middleware([])->group(function(){

//     Route::prefix('admin')->group(function (){
//         Route::get('/dashboard', function (){
//             return view('admin.dashboard');
//          });

//          Route::get('/financeiro', function (){
//              return view('admin.financeiro');
//           });
//           Route::get('/', 'Admin\Testcontroller@teste');

//      });

//     });

Route::get('/login', function (){
    return "Login..." ;
})->name('login');

Route::get('/redirect4', function (){
    return redirect()->route('view.site') ;
});

Route::view('/view', 'welcome', ['id'=>20]);
  Route::redirect('/redirect1', '/redirect2')->name('view.site');

Route::get('/redirect1', function (){
  return redirect('/redirect2');
});
Route::get('/redirect2', function (){
    return 'Redirect2';
});


/* Ao passar o ? indicamos que o parametro e opcional mas no parame
tro da funcao anonima precisamos passar um valor ex $item = ' ' */
Route::get('/prodgeral/{IdItem?}', function ($item =' '){
    return "Produto(s) {$item}" ;
});

Route::get('/prodgeral/{IdItem}/info', function ($item){
    return "Produto(s) {$item}" ;
});

Route::get('/categoria/{IdItem}', function ($item){
    return "Produto(s) {$item}" ;
});



Route::any('/any', function () {
  return 'ANY';
});

Route::match(['post', 'put'], '/match', function (){
    return 'match';
});

// Route::get('/', function () {
//     return view('welcome');
// });


// Route::get('/admin', function (){
//     return view('admin.home-admin');
// });

// Route::get('/user', function(){
//     return view('site.home');
// });

// Route::get('/admin/report', 'Admin\Testcontroller@teste');

// Route::get('/user/contact', function (){
//     return view('site.contact');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
