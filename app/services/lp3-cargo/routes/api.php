<?php

use Illuminate\Support\Facades\Route;
use Services\Lp3Cargo\App\Http\Controllers\CarBrandController;
use Services\Lp3Cargo\App\Http\Controllers\CarModelController;
use Services\Lp3Cargo\App\Http\Controllers\CargoTypeController;
use Services\Lp3Cargo\App\Http\Controllers\ChassisController;

Route::get('/', function () {
    abort(404);
});

// 自動車ブランド
Route::apiResource('car-brand', CarBrandController::class);
Route::post('car-brand/bulk/csv/download', [CarBrandController::class, 'csvDownload']);// 自動車ブランドのCSVダウンロード
// 車種
Route::apiResource('car-model', CarModelController::class);
Route::post('car-model/bulk/csv/download', [CarModelController::class, 'csvDownload']);// 複数車種のCSVのエクスポート
// 貨物種類
Route::apiResource('cargo-type', CargoTypeController::class);
Route::post('cargo-type/bulk/csv/download', [CargoTypeController::class, 'csvDownload']);// 貨物種類のCSVダウンロード
// 車輌
Route::apiResource('chassis', ChassisController::class);
Route::post('chassis/{id}/restore', [ChassisController::class, 'restore']);// 車輌の復元
Route::get('chassis/{id}/update-history', [ChassisController::class, 'updateHistory']);// 車輌の変更履歴の一覧の取得
Route::delete('chassis/bulk', [ChassisController::class, 'bulkDestroy']);// 複数車輌の削除
Route::post('chassis/bulk/csv/download', [ChassisController::class, 'bulkCsvDownload']);// 複数車輌のCSVダウンロード
Route::post('chassis/bulk/csv-for-create/import', [ChassisController::class, 'csvCreateImport']);// 複数車輌の作成用CSVのインポート
Route::post('chassis/bulk/csv-for-dimension/export', [ChassisController::class, 'csvDimensionExport']);// 複数車輌の寸法用CSVのエクスポート
Route::post('chassis/bulk/csv-for-dimension/import', [ChassisController::class, 'csvDimensionImport']);// 複数車輌の寸法用CSVのインポート
Route::get('chassis/{id}/carry-activity', [ChassisController::class, 'carryActivityIndex']);// 車輌のヤード搬入履歴の一覧の取得
Route::get('chassis/{id}/carry-activity/{carryActivityId}', [ChassisController::class, 'carryActivityShow']);// 車輌のヤード搬入履歴の詳細の取得
Route::post('chassis/{id}/carry-activity', [ChassisController::class, 'carryActivityStore']);// 車輌のヤード搬入履歴の作成
Route::match(['put', 'patch'], 'chassis/{id}/carry-activity/{carryActivityId}', [ChassisController::class, 'carryActivityUpdate']);// 車輌のヤード搬入履歴の更新
Route::delete('chassis/{id}/carry-activity/{carryActivityId}', [ChassisController::class, 'carryActivityDestroy']);// 車輌のヤード搬入履歴の削除
Route::get('chassis/{id}/carry-out-request', [ChassisController::class, 'carryOutRequestIndex']);// 車輌の搬出依頼の一覧の取得
Route::post('chassis/{id}/carry-out-request', [ChassisController::class, 'carryOutRequestStore']);// 車輌の搬出依頼
Route::post('chassis/bulk/carry-out-request', [ChassisController::class, 'bulkCarryOutRequestStore']);// 複数車輌の搬出依頼
Route::match(['put', 'patch'], 'chassis/{id}/carry-out-request/{carryOutRequestId}', [ChassisController::class, 'carryOutRequestUpdate']);// 車輌の搬出依頼の更新
Route::post('chassis/{id}/carry-out-request/{carryOutRequestId}/cancel', [ChassisController::class, 'carryOutRequestCancel']);// 車輌の搬出依頼のキャンセル
Route::post('chassis/bulk/carry-out-request/bulk/cancel', [ChassisController::class, 'bulkCarryOutRequestCancel']);// 複数車輌の搬出依頼のキャンセル
Route::post('chassis/{id}/carry-in', [ChassisController::class, 'carryIn']);// 車輌の搬入登録
Route::post('chassis/bulk/carry-in', [ChassisController::class, 'bulkCarryIn']);// 複数車輌の搬入登録
Route::post('chassis/{id}/carry-out', [ChassisController::class, 'carryOut']);// 車輌の搬出登録
Route::post('chassis/bulk/carry-out', [ChassisController::class, 'bulkCarryOut']);// 複数車輌の搬出登録
Route::get('chassis/{id}/photo', [ChassisController::class, 'photoIndex']);// 車輌の写真の一覧の取得
Route::post('chassis/{id}/photo/bulk', [ChassisController::class, 'photoBulkStore']);// 車輌の写真の一括作成
Route::match(['put', 'patch'], 'chassis/{id}/photo/{photoId}', [ChassisController::class, 'photoUpdate']);// 車輌の写真の更新
Route::match(['put', 'patch'], 'chassis/{id}/photo/bulk', [ChassisController::class, 'photoBulkUpdate']);// 車輌の写真の一括更新
Route::delete('chassis/{id}/photo/bulk', [ChassisController::class, 'photoBulkDestroy']);// 車輌の写真の一括削除
Route::post('chassis/{id}/photo/bulk/download', [ChassisController::class, 'photoBulkDownload']);// 車輌の写真の一括ダウンロード
Route::post('chassis/bulk/photo/bulk/download', [ChassisController::class, 'bulkPhotoBulkDownload']);// 複数車輌の写真の一括ダウンロード
Route::get('chassis/{id}/inspection-history', [ChassisController::class, 'inspectionHistoryIndex']);// 車輌の検査履歴の一覧の取得
Route::get('chassis/{id}/inspection-history/{inspectionHistoryId}', [ChassisController::class, 'inspectionHistoryShow']);// 車輌の検査履歴の詳細の取得
Route::post('chassis/{id}/inspection-history', [ChassisController::class, 'inspectionHistoryStore']);// 車輌の検査履歴の作成
Route::match(['put', 'patch'], 'chassis/{id}/inspection-history/{inspectionHistoryId}', [ChassisController::class, 'inspectionHistoryUpdate']);// 車輌の検査履歴の更新
Route::delete('chassis/{id}/inspection-history/{inspectionHistoryId}', [ChassisController::class, 'inspectionHistoryDestroy']);// 車輌の検査履歴の削除
Route::get('chassis/{id}/document', [ChassisController::class, 'documentIndex']);// 車輌の書類の一覧の取得
Route::get('chassis/{id}/document/{documentId}', [ChassisController::class, 'documentShow']);// 車輌の書類の詳細の取得
Route::post('chassis/{id}/document', [ChassisController::class, 'documentStore']);// 車輌の書類の作成
Route::post('chassis/{id}/document/bulk', [ChassisController::class, 'documentBulkStore']);// 車輌の書類の一括作成
Route::match(['put', 'patch'], 'chassis/{id}/document/{documentId}', [ChassisController::class, 'documentUpdate']);// 車輌の書類の更新
Route::match(['put', 'patch'], 'chassis/{id}/document/bulk', [ChassisController::class, 'documentBulkUpdate']);// 車輌の書類の一括更新
Route::delete('chassis/{id}/document/{documentId}', [ChassisController::class, 'documentDestroy']);// 車輌の書類の削除
Route::delete('chassis/{id}/document/bulk', [ChassisController::class, 'documentBulkDestroy']);// 車輌の書類の一括削除
Route::post('chassis/{id}/document/bulk/download', [ChassisController::class, 'documentBulkDownload']);// 車輌の書類の一括ダウンロード
Route::post('chassis/bulk/document/bulk/download', [ChassisController::class, 'bulkDocumentBulkDownload']);// 複数車輌の書類の一括ダウンロード
Route::post('chassis/bulk/notify', [ChassisController::class, 'notify']);// 車輌の通知
Route::post('chassis/{id}/shared-link', [ChassisController::class, 'sharedLink']);// 車輌の共有リンクの作成
Route::get('chassis/share/{id}', [ChassisController::class, 'shareShow']);// 車輌の詳細の取得(共有リンク用)



