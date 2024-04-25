<?php

use App\GraphQL\Queries\AttrResolver;
use App\GraphQL\Queries\CategoriesResolver;
use App\GraphQL\Queries\ManufactureResolver;
use App\GraphQL\Queries\ProductResolver;
use App\GraphQL\Queries\SizeResolver;
use App\Http\Controllers\AttrController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\ManufactureController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SizeController;
use App\GraphQL\Queries\ColorResolver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::apiResources([
//    '/manufacture'=>ManufactureController::class,
//    '/size'=>SizeController::class,
//    '/color'=>ColorController::class,
//    '/product'=>ProductController::class,
//    '/categories'=>CategoriesController::class,
//    '/attr'=>AttrController::class,
//]);
Route::controller(\App\Http\Controllers\RegisterController::class)->group(function () {
    Route::post('/register', 'register');
    Route::post('/login', 'login');
});
//Route::controller(ColorController::class)->group(function () {
//    Route::get('/color', 'index');
//    Route::get('/color/{id}', 'show');
//});
//Route::controller(SizeController::class)->group(function () {
//    Route::get('/size', 'index');
//    Route::get('/size/{id}', 'show');
//});
//Route::controller(ManufactureController::class)->group(function () {
//    Route::get('/manufacture', 'index');
//    Route::get('/manufacture/{id}', 'show');
//});
//Route::controller(CategoriesController::class)->group(function () {
//    Route::get('/categories', 'index');
//    Route::get('/categories/{id}', 'show');
//});
//Route::controller(ProductController::class)->group(function () {
//    Route::get('/product', 'index');
//    Route::get('/product/{id}', 'show');
//});
Route::controller(AttrResolver::class)->group(function () {
    Route::get('/attr',function (){
        $response = Http::post('http://test/graphql',[
            'query'=>'
      query{
        attrs{
            id
            product{name}
            color{name}
            size{name}
            manufacture{name}
            categories{name}
            }
       }'
        ]);
        return $response->json()['data']['attrs'];
    });
    Route::get('/attr/{id}',function ($id){
        $response = Http::post('http://test/graphql',[
            'query'=>'
      query{
        attr(id:'.$id.'){
                product{name}
                color{name}
                size{name}
                manufacture{name}
                categories{name}
            }
       }'
        ]);
        return $response->json()['data']['attr'];
    });
});
Route::controller(ProductResolver::class)->group(function () {
    Route::get('/product',function (){
        $response = Http::post('http://test/graphql',[
            'query'=>'
      query{
        products{
            id
            name
            attrs{
                size{name}
                color{name}
                manufacture{name}
                categories{name}
            }
        }
       }'
        ]);
        return $response->json()['data']['products'];
    });
    Route::get('/product/{id}',function ($id){
        $response = Http::post('http://test/graphql',[
            'query'=>'
      query{
        product(id:'.$id.'){
            id
            name
            attrs{
                size{name}
                color{name}
                manufacture{name}
                categories{name}
            }
        }
       }'
        ]);
        return $response->json()['data']['product'];
    });
});
Route::controller(SizeResolver::class)->group(function () {
    Route::get('/size',function (){
        $response = Http::post('http://test/graphql',[
            'query'=>'
      query{
        sizes{
            id
            name
            attrs{
                color{name}
                manufacture{name}
                categories{name}
                product{name}
            }
        }
    }'
        ]);
        return $response->json()['data']['sizes'];
    });
    Route::get('/size/{id}',function ($id){
        $response = Http::post('http://test/graphql',[
            'query'=>'
      query{
        size(id:'.$id.'){
            id
            name
            attrs{
                color{name}
                manufacture{name}
                categories{name}
                product{name}
            }
        }
    }'
        ]);
        return $response->json()['data']['size'];
    });
});
Route::controller(ColorResolver::class)->group(function () {
    Route::get('/color',function (){
        $response = Http::post('http://test/graphql',[
            'query'=>'
      query{
        colors{
            id
            name
            attrs{
                categories{name}
                size{name}
                manufacture{name}
                product{name}
            }
        }
    }'
        ]);
        return $response->json()['data']['colors'];
    });
    Route::get('/color/{id}',function ($id){
        $response = Http::post('http://test/graphql',[
            'query'=>'
      query{
        color(id:'.$id.'){
            id
            name
            attrs{
                categories{name}
                size{name}
                manufacture{name}
                product{name}
            }
        }
    }'
        ]);
        return $response->json()['data']['color'];
    });
});
Route::controller(CategoriesResolver::class)->group(function () {
    Route::get('/categories',function (){
        $response = Http::post('http://test/graphql',[
            'query'=>'
      query{
        categoriess{
            id
            name
            attrs{
                color{name}
                size{name}
                manufacture{name}
                product{name}
            }
        }
    }'
        ]);
        return $response->json()['data']['categoriess'];
    });
    Route::get('/categories/{id}',function ($id){
        $response = Http::post('http://test/graphql',[
            'query'=>'
      query{
        categories(id:'.$id.'){
            id
            name
            attrs{
                color{name}
                size{name}
                manufacture{name}
                product{name}
            }
        }
    }'
        ]);
        return $response->json()['data']['categories'];
    });
});
Route::controller(ManufactureResolver::class)->group(function () {
    Route::get('/manufacture',function (){
        $response = Http::post('http://test/graphql',[
            'query'=>'
      query{
        manufactures{
            id
            name
            attrs{
                color{name}
                size{name}
                categories{name}
                product{name}
            }
        }
    }'
        ]);
        return $response->json()['data']['manufactures'];
    });
    Route::get('/manufacture/{id}',function ($id){
        $response = Http::post('http://test/graphql',[
            'query'=>'
      query{
        manufacture(id:'.$id.'){
            id
            name
            attrs{
                color{name}
                size{name}
                categories{name}
                product{name}
            }
        }
    }'
        ]);
        return $response->json()['data']['manufacture'];
    });
});




Route::middleware('auth:api')->group(function (){
    Route::post('/logout',[\App\Http\Controllers\RegisterController::class,'logout']);

//    Route::controller(ColorController::class)->group(function () {
//        Route::post('/color', 'store');
//        Route::delete('/color/{id}', 'destroy');
//        Route::put('/color/{id}', 'update');
//    });
    Route::controller(ColorResolver::class)->group(function (){
       Route::post('/color',function(Request $request){
           $response = Http::post('http://test/graphql',[
               'query'=>'
               mutation{
                    createColor(name:'.$request->input('name').'){
                    id
                    name
                    }
               }'
           ]);
           return $response->json()['data']['createColor'];
       });
       Route::delete('/color/{id}',function($id){
           $response = Http::post('http://test/graphql',[
               'query'=>'
               mutation{
                    deleteColor(id:'.$id.'){
                        id
                        name
                    }
               }'
           ]);
           return $response->json()['data']['deleteColor'];
       });
       Route::put('/color/{id}',function($id,Request $request){
            $response = Http::post('http://test/graphql',[
                'query'=>'
               mutation{
                    updateColor(id:'.$id.',name:'.$request->input('name').'){
                        id
                        name
                    }
               }'
            ]);
            return $response->json()['data']['updateColor'];
       });
    });
    Route::controller(SizeResolver::class)->group(function () {
        Route::post('/size',function(Request $request){
            $response = Http::post('http://test/graphql',[
                'query'=>'
               mutation{
                    createSize(name:'.$request->input('name').'){
                    id
                    name
                    }
               }'
            ]);
            return $response->json()['data']['createSize'];
        });
        Route::delete('/size/{id}',function($id){
            $response = Http::post('http://test/graphql',[
                'query'=>'
               mutation{
                    deleteSize(id:'.$id.'){
                        id
                        name
                    }
               }'
            ]);
            return $response->json()['data']['deleteSize'];
        });
        Route::put('/size/{id}',function($id,Request $request){
            $response = Http::post('http://test/graphql',[
                'query'=>'
               mutation{
                    updateSize(id:'.$id.',name:'.$request->input('name').'){
                        id
                        name
                    }
               }'
            ]);
            return $response->json()['data']['updateSize'];
        });
    });
    Route::controller(ManufactureResolver::class)->group(function () {
        Route::post('/manufacture',function(Request $request){
            $response = Http::post('http://test/graphql',[
                'query'=>'
               mutation{
                    createManufacture(name:'.$request->input('name').'){
                    id
                    name
                    }
               }'
            ]);
            return $response->json()['data']['createManufacture'];
        });
        Route::delete('/manufacture/{id}',function($id){
            $response = Http::post('http://test/graphql',[
                'query'=>'
               mutation{
                    deleteManufacture(id:'.$id.'){
                        id
                        name
                    }
               }'
            ]);
            return $response->json()['data']['deleteManufacture'];
        });
        Route::put('/manufacture/{id}',function($id,Request $request){
            $response = Http::post('http://test/graphql',[
                'query'=>'
               mutation{
                    updateManufacture(id:'.$id.',name:'.$request->input('name').'){
                        id
                        name
                    }
               }'
            ]);
            return $response->json()['data']['updateManufacture'];
        });
    });
    Route::controller(CategoriesResolver::class)->group(function () {
        Route::post('/categories',function(Request $request){
            $response = Http::post('http://test/graphql',[
                'query'=>'
               mutation{
                    createCategories(name:'.$request->input('name').'){
                    id
                    name
                    }
               }'
            ]);
            return $response->json()['data']['createCategories'];
        });
        Route::delete('/categories/{id}',function($id){
            $response = Http::post('http://test/graphql',[
                'query'=>'
               mutation{
                    deleteCategories(id:'.$id.'){
                        id
                        name
                    }
               }'
            ]);
            return $response->json()['data']['deleteCategories'];
        });
        Route::put('/categories/{id}',function($id,Request $request){
            $response = Http::post('http://test/graphql',[
                'query'=>'
               mutation{
                    updateCategories(id:'.$id.',name:'.$request->input('name').'){
                        id
                        name
                    }
               }'
            ]);
            return $response->json()['data']['updateCategories'];
        });
    });
    Route::controller(ProductResolver::class)->group(function () {
        Route::post('/product',function(Request $request){
            $response = Http::post('http://test/graphql',[
                'query'=>'
               mutation{
                    createProduct(name:'.$request->input('name').'){
                    id
                    name
                    }
               }'
            ]);
            return $response->json()['data']['createProduct'];
        });
        Route::delete('/product/{id}',function($id){
            $response = Http::post('http://test/graphql',[
                'query'=>'
               mutation{
                    deleteProduct(id:'.$id.'){
                        id
                        name
                    }
               }'
            ]);
            return $response->json()['data']['deleteProduct'];
        });
        Route::put('/product/{id}',function($id,Request $request){
            $response = Http::post('http://test/graphql',[
                'query'=>'
               mutation{
                    updateProduct(id:'.$id.',name:'.$request->input('name').'){
                        id
                        name
                    }
               }'
            ]);
            return $response->json()['data']['updateProduct'];
        });
    });
    Route::controller(AttrResolver::class)->group(function () {
        Route::post('/attr',function(Request $request){
            $response = Http::post('http://test/graphql',[
                'query'=>'
               mutation{
                    createAttr(product_id:'.$request->input('product_id').',
                    color_id:'.$request->input('color_id').',
                    size_id:'.$request->input('size_id').',
                    manufacture_id:'.$request->input('manufacture_id').',
                    categories_id:'.$request->input('categories_id').'){
                        product{name}
                        color{name}
                        size{name}
                        manufacture{name}
                        categories{name}
                    }
               }'
            ]);
            return $response->json()['data']['createAttr'];
        });
        Route::delete('/attr/{id}',function($id){
            $response = Http::post('http://test/graphql',[
                'query'=>'
               mutation{
                    deleteAttr(id:'.$id.'){
                        id
                        product{name}
                        color{name}
                        size{name}
                        manufacture{name}
                        categories{name}
                    }
               }'
            ]);
            return $response->json()['data']['deleteAttr'];
        });
        Route::put('/attr/{id}',function($id,Request $request){
            $response = Http::post('http://test/graphql',[
                'query'=>'
               mutation{
                    updateAttr(id:'.$id.',
                    attr_id:'.$request->input('attr_id').',
                    column:'.$request->input('column').'){
                        id
                        product{name}
                        color{name}
                        size{name}
                        manufacture{name}
                        categories{name}
                    }
               }'
            ]);
            return $response->json()['data']['updateAttr'];
        });
    });
});
