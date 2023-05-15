<?php

namespace App\Management\Models;

/**
 * 車輌書類の種類
 */
enum ChassisDocumentType
{
    // > ・PDF1枚の中に複数の車輛の情報が入っている場合があるので、ひとつの書類が複数の車輛に紐づくということはありえる
    // > ・車輛でアップロードする可能性のある書類は輸出前検査の合格時の検査証、EC、還付の申請書など
    // > ・輸出前検査でアップロードされる書類は合格証１枚のみ。部分的に合格・不合格といったものはない。
    // > 引用元: https://sync-logi.backlog.com/alias/wiki/2418585
    //
    // > ・輸出前検査合否結果
    // > ・EC(OSL)
    // > ・リサイクル還付関連書類(OSL)
    // > 引用元: https://sync-logi.backlog.com/view/LP3-107#comment-227669883

    case PreExportInspection; //輸出前検査合否結果
    case Ec; //Export Certificate(=輸出抹消書類)、OSLで取り扱う
    case RefundOfRecyclingFee; //リサイクル還付関連書類、OSLで取り扱う
}
