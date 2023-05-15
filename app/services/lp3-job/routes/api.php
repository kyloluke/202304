<?php

use Illuminate\Support\Facades\Route;
use Services\Lp3Job\App\Http\Controllers\JobController;
use Services\Lp3Job\App\Http\Controllers\ContJobController;
use Services\Lp3Job\App\Http\Controllers\RoroJobController;

Route::get('/', function () {
    abort(404);
});

// Job
Route::post('job/bulk/document/bulk/download', [JobController::class, 'download']);// 複数JOBの書類の一括ダウンロード
// コンテナJOB
Route::apiResource('job/cont', ContJobController::class);
Route::get('job/cont/{id}/update-history', [ContJobController::class, 'updateHistory']);// コンテナJOBの変更履歴の一覧
Route::post('job/cont/bulk/csv/download', [ContJobController::class, 'csvDownload']);// 複数コンテナJOBのCSVダウンロード
Route::post('job/cont/bulk/instruction/download', [ContJobController::class, 'instructionDownload']);// 複数コンテナJOBの作業指示書ダウンロード
Route::match(['put', 'patch'], 'job/cont/bulk/scheduled-datetime', [ContJobController::class, 'scheduledDatetime']);// 複数コンテナJOBの作業スケジュールの更新
Route::post('job/cont/{id}/fix', [ContJobController::class, 'fix']);// コンテナJOBの実施確定
Route::post('job/cont/bulk/fix', [ContJobController::class, 'bulkFix']);// 複数コンテナJOBの実施確定
Route::get('job/cont/{id}/photo', [ContJobController::class, 'photoIndex']);// コンテナJOBの写真の一覧の取得
Route::get('job/cont/{id}/photo/{photoId}', [ContJobController::class, 'photoShow']);// コンテナJOBの写真の詳細の取得
Route::post('job/cont/{id}/photo/{photoId}', [ContJobController::class, 'photoStore']);// コンテナJOBの写真の作成
Route::post('job/cont/{id}/photo/bulk', [ContJobController::class, 'photoBulkStore']);// コンテナJOBの写真の一括作成
Route::match(['put', 'patch'], 'job/cont/{id}/photo/{photoId}', [ContJobController::class, 'photoUpdate']);// コンテナJOBの写真の更新
Route::match(['put', 'patch'], 'job/cont/{id}/photo/bulk', [ContJobController::class, 'photoBulkUpdate']);// コンテナJOBの写真の一括更新
Route::delete('job/cont/{id}/photo/{photoId}', [ContJobController::class, 'photoDestroy']);// コンテナJOBの写真の削除
Route::delete('job/cont/{id}/photo/bulk', [ContJobController::class, 'photoBulkDestroy']);// コンテナJOBの写真の一括削除
Route::post('job/cont/bulk/photo/bulk', [ContJobController::class, 'photoBulk']);// 複数コンテナJOBの写真の一括ダウンロード
Route::get('job/cont/{id}/document', [ContJobController::class, 'document']);// コンテナJOBの書類の一覧
Route::post('job/cont/{id}/document/bulk', [ContJobController::class, 'documentBulk']);// コンテナJOBの書類の一括作成
Route::delete('job/cont/{id}/document/bulk', [ContJobController::class, 'documentBulkDestroy']);// コンテナJOBの書類の一括削除
Route::post('job/cont/{id}/document/bulk/download', [ContJobController::class, 'documentBulkDownload']);// コンテナJOBの書類の一括ダウンロード
Route::post('job/cont/bulk/document/bulk/download', [ContJobController::class, 'bulkDocumentBulkDownload']);// 複数コンテナJOBの書類の一括ダウンロード
Route::post('job/cont/bulk/notify', [ContJobController::class, 'notify']);// コンテナJOBの通知
Route::post('job/cont/{id}/shared-link', [ContJobController::class, 'sharedLink']);// コンテナJOBの共有リンクの作成
Route::get('job/cont/share/{id}', [ContJobController::class, 'share']);// コンテナJOBの詳細の取得(共有リンク用)
// ROROJOB
Route::apiResource('job/roro', RoroJobController::class);
Route::get('job/roro/{id}/update-history', [RoroJobController::class, 'updateHistory']);// ROROJOBの変更履歴の一覧の取得
Route::post('job/roro/bulk/csv/download', [RoroJobController::class, 'csvDownload']);// 複数ROROJOBのCSVダウンロード
Route::post('job/roro/bulk/shipping-mark/download', [RoroJobController::class, 'shippingMarkDownload']);// 複数ROROJOBのSHIPPING MARKのダウンロード
Route::post('job/roro/{id}/fix', [RoroJobController::class, 'fix']);// ROROJOBの実施確定
Route::post('job/roro/bulk/fix', [RoroJobController::class, 'bulkFix']);// 複数ROROJOBの実施確定
Route::get('job/roro/{id}/document', [RoroJobController::class, 'document']);// ROROJOBの書類の一覧
Route::post('job/roro/{id}/document/bulk', [RoroJobController::class, 'documentBulk']);// ROROJOBの書類の一括作成
Route::delete('job/roro/{id}/document/bulk', [RoroJobController::class, 'documentBulkDestroy']);// ROROJOBの書類の一括削除
Route::post('job/roro/{id}/document/bulk/download', [RoroJobController::class, 'documentBulkDownload']);// ROROJOBの書類の一括ダウンロード
Route::post('job/roro/bulk/document/bulk/download', [RoroJobController::class, 'bulkDocumentBulkDownload']);// 複数ROROJOBの書類の一括ダウンロード
Route::post('job/roro/bulk/notify', [RoroJobController::class, 'notify']);// ROROJOBの通知
Route::post('job/roro/{id}/shared-link', [RoroJobController::class, 'sharedLink']);// ROROJOBの共有リンクの作成
Route::get('job/roro/share/{id}', [RoroJobController::class, 'share']);// ROROJOBの詳細の取得(共有リンク用)
