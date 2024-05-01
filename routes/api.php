<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
// use App\Http\Controllers\BlogPostController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::get('blog-posts', [BlogPostController::class, 'index']);
Route::post('blog-posts', [BlogPostController::class, 'store']);
Route::get('blog-posts/{id}', [BlogPostController::class, 'show']);
Route::put('blog-posts/{id}', [BlogPostController::class, 'update']);
Route::delete('blog-posts/{id}', [BlogPostController::class, 'destroy']);


Route::get('comments', [CommentController::class, 'index']);
Route::post('comments', [CommentController::class, 'store']);
Route::get('comments/{id}', [CommentController::class, 'show']);
Route::put('comments/{id}', [CommentController::class, 'update']);
Route::delete('comments/{id}', [CommentController::class, 'destroy']);

// Route::get('blog-posts', 'BlogPostController@index');
// Route::middleware('auth:api')->group(function () {
    // Route::get('blog-posts', 'BlogPostController@index');
    // Route::resource('blog-posts', BlogPostController::class);
// });

// Route::middleware('auth:api')->group(function () {
//     Route::get('blog-posts/{postId}/comments', [CommentController::class, 'index']);
//     Route::post('blog-posts/{postId}/comments', [CommentController::class, 'store']);
//     Route::get('comments/{id}', [CommentController::class, 'show']);
//     Route::put('comments/{id}', [CommentController::class, 'update']);
//     Route::delete('comments/{id}', [CommentController::class, 'destroy']);
// });
