<?php

use Illuminate\Support\Facades\Route;
use Services\Lp3Sales\App\Http\Controllers\AccountTitleController;
use Services\Lp3Sales\App\Http\Controllers\ProductSchemeController;
use Services\Lp3Sales\App\Http\Controllers\ProductController;
use Services\Lp3Sales\App\Http\Controllers\QuotationController;
use Services\Lp3Sales\App\Http\Controllers\ChassisController;
use Services\Lp3Sales\App\Http\Controllers\JobController;
use Services\Lp3Sales\App\Http\Controllers\BillingController;

Route::get('/', function () {
    abort(404);
});

// 勘定科目
Route::apiResource('account-title', AccountTitleController::class);
Route::post('account-title/bulk/csv/download', [AccountTitleController::class, 'csvDownload']);// 勘定科目のCSVダウンロード
Route::match(['put', 'patch'], 'account-title/bulk/ordinary', [AccountTitleController::class, 'ordinary']);// 複数勘定科目の順序の更新
// 商品スキーム
Route::apiResource('product-scheme', ProductSchemeController::class);
// 商品
Route::apiResource('product', ProductController::class);
Route::post('product/{id}/restore', [ProductController::class, 'restore']);// 商品の復元
Route::get('product/{id}/update-history', [ProductController::class, 'updateHistory']);// 商品の変更履歴の一覧の取得
// 見積
Route::apiResource('quotation', QuotationController::class);
Route::get('quotation/item', [QuotationController::class, 'itemIndex']);// 見積明細の一覧の取得
Route::get('quotation/item/{id}', [QuotationController::class, 'itemShow']);// 見積明細の詳細の取得
// 請求明細
Route::get('chassis/{id}/billing-item', [ChassisController::class, 'billingItemIndex']);// 車輌のその他請求明細の一覧の取得
Route::get('chassis/bulk/billing-item', [ChassisController::class, 'bulkBillingItemIndex']);// 複数車輌のその他請求明細の一覧の取得
Route::match(['put', 'patch'], 'chassis/{id}/billing-item/bulk', [ChassisController::class, 'billingItemUpdate']);// 車輌のその他請求明細の一括更新
Route::match(['put', 'patch'], 'chassis/bulk/billing-item/bulk', [ChassisController::class, 'bulkBillingItemUpdate']);// 複数車輌のその他請求明細の一括更新
Route::get('job/{id}/billing-item', [JobController::class, 'billingItemIndex']);// JOBのFREIGHT請求明細の一覧の取得
Route::get('job/bulk/billing-item', [JobController::class, 'bulkBillingItemIndex']);// 複数JOBのFREIGHT請求明細の一覧の取得
Route::match(['put', 'patch'], 'job/{id}/billing-item/bulk', [JobController::class, 'billingItemUpdate']);// JOBのFREIGHT請求明細の一括更新
Route::match(['put', 'patch'], 'job/bulk/billing-item/bulk', [JobController::class, 'bulkBillingItemUpdate']);// 複数JOBのFREIGHT請求明細の一括更新
// 請求
Route::apiResource('billing', BillingController::class);
Route::post('billing/on-chassis', [BillingController::class, 'chassis']);// 車輌からの請求の作成
Route::post('billing/on-cont-job', [BillingController::class, 'contJob']);// コンテナJOBからの請求の作成
Route::post('billing/on-roro-job', [BillingController::class, 'roroJob']);// ROROJOBからの請求の作成
Route::post('billing/bulk/csv/download', [BillingController::class, 'csvDownload']);// 複数請求のCSVのダウンロード
Route::post('billing/bulk/invoice/download', [BillingController::class, 'invoiceDownload']);// 複数請求の請求書のダウンロード
Route::post('billing/bulk/deposit', [BillingController::class, 'deposit']);// 複数請求の入金登録
Route::post('billing/bulk/deposit-cancel', [BillingController::class, 'depositCancel']);// 複数請求の入金登録のキャンセル
