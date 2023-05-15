<?php

use Illuminate\Support\Facades\Route;
use Services\Lp3Ship\App\Http\Controllers\ShipCompanyController;
use Services\Lp3Ship\App\Http\Controllers\ShipController;
use Services\Lp3Ship\App\Http\Controllers\ContainerShipScheduleController;
use Services\Lp3Ship\App\Http\Controllers\RoroShipScheduleController;

Route::get('/', function () {
    abort(404);
});

// 本船マスタ
Route::apiResource('/ship', ShipController::class);
Route::post('ship/bulk/csv/download', [ShipController::class, 'csvDownload']);// 本船のCSVダウンロード

// 船会社
Route::apiResource('/ship-company', ShipCompanyController::class);
Route::post('ship-company/bulk/csv/download', [ShipCompanyController::class, 'csvDownload']);

// コンテナ船スケジュール
Route::get('/ship-schedule/cont/unique', [ContainerShipScheduleController::class, 'checkUnique']);
Route::apiResource('/ship-schedule/cont', ContainerShipScheduleController::class);
Route::get('ship-schedule/cont/{id}/update-history', [ContainerShipScheduleController::class, 'updateHistory']);// コンテナ船スケジュールの変更履歴の一覧の取得

// RORO船スケジュール
Route::get('/ship-schedule/roro/unique', [RoroShipScheduleController::class, 'checkUnique']);
Route::apiResource('/ship-schedule/roro', RoroShipScheduleController::class);
Route::get('ship-schedule/roro/{id}/update-history', [RoroShipScheduleController::class, 'updateHistory']);// RORO船スケジュールの変更履歴の一覧の取得
