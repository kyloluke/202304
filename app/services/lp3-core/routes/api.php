<?php

use Illuminate\Support\Facades\Route;
use Services\Lp3Core\App\Http\Controllers\CountryController;
use Services\Lp3Core\App\Http\Controllers\FileController;
use Services\Lp3Core\App\Http\Controllers\HolidayController;
use Services\Lp3Core\App\Http\Controllers\InspectionTypeController;
use Services\Lp3Core\App\Http\Controllers\DestinationController;
use Services\Lp3Core\App\Http\Controllers\LoginController;
use Services\Lp3Core\App\Http\Controllers\OfficeController;
use Services\Lp3Core\App\Http\Controllers\OrganizationController;
use Services\Lp3Core\App\Http\Controllers\PasswordController;
use Services\Lp3Core\App\Http\Controllers\RegionController;
use Services\Lp3Core\App\Http\Controllers\TaxRateController;
use Services\Lp3Core\App\Http\Controllers\UserController;
use Services\Lp3Core\App\Http\Controllers\PortController;
use Services\Lp3Core\App\Http\Middleware\Authenticate;
use Services\Lp3Core\App\Http\Controllers\YardController;
use Services\Lp3Core\App\Http\Controllers\YardGroupController;

Route::post('login', [LoginController::class, 'login']);

Route::middleware([Authenticate::class])->group(function () {
    Route::post('logout', [LoginController::class, 'logout']);
    Route::get('me', [LoginController::class, 'show']);
});

// 組織
Route::apiResource('organization', OrganizationController::class);
Route::post('organization/bulk/csv/download', [OrganizationController::class, 'csvDownload']);

// 仕向地
Route::apiResource('destination', DestinationController::class);
Route::post('destination/bulk/csv/download', [DestinationController::class, 'csvDownload']);

// 港
Route::apiResource('port', PortController::class);
Route::post('port/bulk/csv/download', [PortController::class, 'csvDownload']);

// 国
Route::apiResource('country', CountryController::class);
Route::post('country/bulk/csv/download', [CountryController::class, 'csvDownload']);
// 事業所
Route::apiResource('office', OfficeController::class);
Route::post('office/bulk/csv/download', [OfficeController::class, 'csvDownload']);
// 検査種別
Route::apiResource('inspection-type', InspectionTypeController::class);
Route::post('inspection-type/bulk/csv/download', [InspectionTypeController::class, 'csvDownload']);
// 地域
Route::apiResource('region', RegionController::class);
Route::post('region/bulk/csv/download', [RegionController::class, 'csvDownload']);

// ユーザー
Route::apiResource('user', UserController::class);
Route::post('user/bulk/csv/download', [UserController::class, 'csvDownload']);
Route::get('user/unique-name', [UserController::class, 'uniqueLoginName']);
Route::get('user/unique-mail', [UserController::class, 'uniqueMail']);
Route::post('user/{id}/password/reset', [UserController::class, 'passwordReset']);
Route::post('user/{id}/unlock', [UserController::class, 'unlock']);
Route::post('user/{id}/login', [UserController::class, 'agentLogin']);
// 自身
Route::match(['put', 'patch'], 'me', [LoginController::class, 'update']);
Route::match(['put', 'patch'], 'me/password', [LoginController::class, 'password']);
Route::post('me/mfa/enable-request', [LoginController::class, 'requestMfaEnable']);
Route::post('me/mfa/enable', [LoginController::class, 'mfaEnable']);
Route::post('me/mfa/disable', [LoginController::class, 'mfaDisable']);
// ファイル
Route::apiResource('file', FileController::class)->only(['show', 'store']);
// パスワード
Route::post('password/reset-request', [PasswordController::class, 'requestPasswordReset']);
Route::post('password/reset', [PasswordController::class, 'passwordReset']);
// 消費税率の取得
Route::get('tax-rate/consumption', [TaxRateController::class, 'show']);
// 祝日の一覧の取得
Route::apiResource('holiday', HolidayController::class)->only(['index']);
// ヤード
Route::apiResource('/yard', YardController::class);
// ヤードグループ
Route::apiResource('/yard-group', YardGroupController::class);
