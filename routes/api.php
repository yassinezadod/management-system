<?php




use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\V1\ProductController;
use App\Http\Controllers\API\V1\CategoryController;  
use App\Http\Controllers\API\V1\CustomerController; 
use App\Http\Controllers\API\V1\UserController; 
use App\Http\Controllers\API\V1\SupplierController;
use App\Http\Controllers\API\V1\PurchaseController;
use App\Http\Controllers\API\V1\QuotationController;




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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('products', [ProductController::class, 'index'])->name('api.product.index');
Route::apiResource('categories', CategoryController::class);
Route::apiResource('customer', CustomerController::class);
Route::apiResource('users', UserController::class);
Route::apiResource('suppliers', SupplierController::class);
Route::apiResource('purchases', PurchaseController::class);
Route::apiResource('quotations', QuotationController::class);
