<?php
use Illuminate\Http\Response;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

//$router->get('/', function () use ($router) {
//    return $router->app->version();
//});

/*
 *
 * UNAUTHENTICATED ROUTES
 *
 */
//$router->post('/login', 'AuthController@login');
//$router->post('/register', 'AuthController@register');
///*
// *
// * AUTHENTICATED ROUTES
// *
// */
//$router->group(
//    [
//        'middleware' => 'auth', 'cors',
//    ], function ($router) {
//
//    $router->get('/', function () {
//        return response()->json([
//            "data" => "test",
//            "status" => Response::HTTP_ACCEPTED
//        ]);
//    });
//    $router->post('/logout', 'AuthController@logout');
//    // $router->get('/refresh', 'AuthController@refresh');
//    // $router->post('/refresh', 'AuthController@refresh');
//    $router->get('profile', 'AuthController@profile');
//
//    $router->get('book', 'BookController@index');
//    $router->post('book/create', 'BookController@store');
//    $router->get('book/{id}', 'BookController@show');
//    $router->put('book/{id}/update', 'BookController@update');
//    $router->delete('book/{id}/delete', 'BookController@delete');
//
//    $router->get('/index','AuthController@index');
//
//
//});

$router->group(['middleware' => 'cors'], function () use ($router) {

    $router->get('/', 'UserController@getPhoto');
    $router->post('/set', 'UserController@setPhoto');

});
