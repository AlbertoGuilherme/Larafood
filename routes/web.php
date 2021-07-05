<?php

/*So vamos usar essa forma de redirecionamento quando a ser retornada nao vai necessitar de carregar mais outras coisas
    Se vai ser estatica, embora seja possivel passar variaveis
    Se a view precisar de logica esse padrao esta incorreto
*/
// Route::any('products/search', 'ProductController@search' )->name('products.search')->middleware('auth');
// Route::resource('/products', 'ProductController')->middleware('auth');

/**
 * Larafood
 */

 Route::prefix('admin')
            ->namespace('Admin')
            ->group(function(){

                    Route::get('acl-test', function(){
                    //   dd(auth()->user()->hasPermission('View_dinheiro'))  ;
                   dd( auth()->user()->permission());
                    });

                     /**
                 * Routes Table
                 */
                Route::resource('tables', 'TableController');
                Route::any('tables/search', 'TableController@search')->name('tables.search');

             /**
                 * Routes Product X Category
             */
            Route::get('products/{id}/categories/{idCategories}/detach', 'ProductCategoryController@detachProductCategory')->name('products.categories.detach');
            Route::post('products/{id}/category/attach', 'ProductCategoryController@attachProductCategory')->name('products.categories.attach');
            Route::any('products/{id}/category/create', 'ProductCategoryController@categoriesAvailable')->name('products.categories.available');
            Route::get('products/{id}/category', 'ProductCategoryController@categories')->name('products.categories');
            Route::get('categories/{id}/product', 'ProductCategoryController@products')->name('categories.products');

                      /**
                 * Routes Product
                 */
                Route::resource('products', 'ProductController');
                Route::any('products/search', 'ProductController@search')->name('products.search');


                     /**
                 * Routes Category
                 */
                Route::resource('categories', 'CategoryController');
                Route::any('categories/search', 'CategoryController@search')->name('categories.search');

                   /**
                 * Routes Users
                 */
                Route::resource('users', 'UserController');
                Route::any('users/search', 'UserController@search')->name('users.search');



              /**
                 * Routes Plans X Profile
             */
                Route::get('plans/{id}/profiles/{idProfiles}/detach', 'ACL\PlansProfilesController@detachPlanProfile')->name('plans.profiles.detach');
                Route::post('plans/{id}/profile/attach', 'ACL\PlansProfilesController@attachPlanProfile')->name('plans.profiles.attach');
                Route::any('plans/{id}/profile/create', 'ACL\PlansProfilesController@profilesAvailable')->name('plans.profiles.available');
                Route::get('plans/{id}/profile', 'ACL\PlansProfilesController@profiles')->name('plans.profiles');
                Route::get('profiles/{id}/plan', 'ACL\PlansProfilesController@plans')->name('profiles.plans');

                /**
                 * Routes Profile X Permission
                 */
                Route::get('pro/{id}/permission/{idPermission}/detach', 'ACL\PermissionProfileController@detachPermissionProfile')->name('profiles.permission.detach');
                Route::post('pro/{id}/permission/attach', 'ACL\PermissionProfileController@attachPermissionProfile')->name('profiles.permission.attach');
                Route::any('pro/{id}/permission/available', 'ACL\PermissionProfileController@permissionsAvailable')->name('profiles.permission.available');
                Route::get('pro/{id}/permission', 'ACL\PermissionProfileController@permissions')->name('profiles.permission');
                Route::get('permissions/{id}/profile', 'ACL\PermissionProfileController@profiles')->name('permissions.profiles');

                /**
                 * Routes Permission
                 */

                Route::resource('permissions', 'ACL\PermissionController');
                Route::any('permissions/search', 'ACL\PermissionController@search')->name('permissions.search');
                /**
                 * Routes Profile
                 */

                 Route::resource('profiles', 'ACL\ProfileController');
                 Route::any('profiles/search', 'ACL\ProfileController@search')->name('profiles.search');

                /**
                 * Routes Detail
                 */
                Route::get('plans/{url}/details/create', 'DetailController@create')->name('details.plan.create');
                Route::delete('plans/{url}/details/{idPlan}', 'DetailController@destroy')->name('details.plan.destroy');
                Route::get('plans/{url}/details/{idPlan}', 'DetailController@show')->name('details.plan.show');
                Route::put('plans/{url}/details/{idPlan}/edit', 'DetailController@update')->name('details.plan.update');
                Route::get('plans/{url}/details/{idPlan}/edit', 'DetailController@edit')->name('details.plan.edit');
                Route::post('plans/{url}/details', 'DetailController@store')->name('details.plan.store');

                Route::get('plans/{url}/detail', 'DetailController@index')->name('details.plan.index');


                /**
                 * Routes Plan
                 */
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

            Auth::routes();

            /**
             * Site
             */
  Route::get('/subscription/{url}', 'SiteController@plan')->name('site.subscription');
Route::get('/', 'SiteController@index')->name('site.index');




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

// Route::get('/login', function (){
//     return "Login..." ;
// })->name('login');

// Route::get('/redirect4', function (){
//     return redirect()->route('view.site') ;
// });

// Route::view('/view', 'welcome', ['id'=>20]);
//   Route::redirect('/redirect1', '/redirect2')->name('view.site');

// Route::get('/redirect1', function (){
//   return redirect('/redirect2');
// });
// Route::get('/redirect2', function (){
//     return 'Redirect2';
// });


/* Ao passar o ? indicamos que o parametro e opcional mas no parame
tro da funcao anonima precisamos passar um valor ex $item = ' ' */
// Route::get('/prodgeral/{IdItem?}', function ($item =' '){
//     return "Produto(s) {$item}" ;
// });

// Route::get('/prodgeral/{IdItem}/info', function ($item){
//     return "Produto(s) {$item}" ;
// });

// Route::get('/categoria/{IdItem}', function ($item){
//     return "Produto(s) {$item}" ;
// });



// Route::any('/any', function () {
//   return 'ANY';
// });

// Route::match(['post', 'put'], '/match', function (){
//     return 'match';
// });

// // Route::get('/', function () {
// //     return view('welcome');
// // });


// // Route::get('/admin', function (){
// //     return view('admin.home-admin');
// // });

// // Route::get('/user', function(){
// //     return view('site.home');
// // });

// // Route::get('/admin/report', 'Admin\Testcontroller@teste');

// // Route::get('/user/contact', function (){
// //     return view('site.contact');
// // });



