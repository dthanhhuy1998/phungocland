<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;

// ===== Route Homepage ===== //
Route::get(
    '/',
    [HomeController::class, 'index']
)->name('pages.index');

Route::get(
    'bai-viet',
    [HomeController::class, 'getAllPost']
)->name('pages.getAllPost');

Route::get(
    'bai-viet/{category}',
    [HomeController::class, 'getPostsByCategory']
)->name('pages.getPostsByCategory');

Route::get(
    'bai-viet/{category}/{post}',
    [HomeController::class, 'getPostDetail']
)->name('pages.getPostDetail');

Route::get(
    'tim-bai-viet',
    [HomeController::class, 'searchPost']
)->name('pages.searchPost');

Route::get(
    'tim-kiem',
    [HomeController::class, 'filters']
)->name('pages.filters');

Route::get(
    'du-an',
    [HomeController::class, 'getAllProject']
)->name('pages.getAllProject');

Route::get(
    'du-an/{category}',
    [HomeController::class, 'getProjectsByCategory']
)->name('pages.getProjectsByCategory');

Route::get(
    'du-an/{category}/{project}',
    [HomeController::class, 'getProjectDetail']
)->name('pages.getProjectDetail');

Route::get(
    'nha-dat-ban',
    [HomeController::class, 'getAllReaLEstateSales']
)->name('pages.getAllReaLEstateSale');

Route::get(
    'nha-dat-ban/{category}',
    [HomeController::class, 'getReaLEstateSalesByCategory']
)->name('pages.getReaLEstateSaleByCategory');

Route::get(
    'nha-dat-ban/{category}/{sale}',
    [HomeController::class, 'getReaLEstatesSaleDetail']
)->name('pages.getReaLEstateSaleDetail');

Route::get(
    'nha-dat-cho-thue',
    [HomeController::class, 'getAllReaLEstateRents']
)->name('pages.getAllReaLEstateRents');

Route::get(
    'nha-dat-cho-thue/{category}',
    [HomeController::class, 'getReaLEstateRentsByCategory']
)->name('pages.getReaLEstateRentsByCategory');

Route::get(
    'nha-dat-cho-thue/{category}/{rent}',
    [HomeController::class, 'getReaLEstateRentDetail']
)->name('pages.getReaLEstateRentDetail');

Route::get(
    'san-pham/{category}',
    [HomeController::class, 'productCategory']
)->name('pages.productCategory');

Route::get(
    'tim-kiem',
    [HomeController::class, 'filters']
)->name('pages.filters');

Route::prefix('admin')->middleware('redirectAdmin')->group(function () {
    Route::get(
        'login',
        [AuthController::class, 'loginForm']
    )->name('login');

    Route::post(
        'login',
        [AuthController::class, 'login']
    )->name('auth');
});

// ===== Route Admin ===== //

// ===== Route Ajax ===== //
Route::prefix('ajax')->group(function () {
    Route::get(
        'get-district',
        [HomeController::class, 'getDistrict']
    )->name('ajax.getDistrict');

    Route::get(
        'get-commune',
        [HomeController::class, 'getCommune']
    )->name('ajax.getCommune');

    Route::get(
        'get-danh-muc-bds',
        [HomeController::class, 'get_danh_muc_bds']
    )->name('ajax.get_danh_muc_bds');
});