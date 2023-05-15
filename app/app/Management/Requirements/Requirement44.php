<?php

namespace App\Management\Requirements;

use App\Management\BusinessFlows\IssueNewInvoiceFromChassis;

/**
 * La-Plus３：開発主要要件一覧　No.44
 */
class Requirement44
{
    //機能カテゴリ(サービス)
    //請求管理

    //サブカテゴリ
    //スポット請求登録・編集

    //要件・要望
    //車輛から請求書を新規発行できるようにする。

    //補足
    //EXCELの請求書を編集しなければいけないケース（システムだけで作れない場合）
    //→JOBから請求書を自動発行できない場合
    //→車輌から請求書を発行できれば、EXCEL直編集しなくても作れることは多い

    /**
     * main
     *
     * @return bool
     */
    public function main()
    {
        // @TBC 業務フローを確認する必要あり、車輌から請求する場合、JOBから請求する場合ってどうやって決まるの？
        // @TBC 車輌で請求した後にJOBから請求を上げる場合、ストレージ費用など一部の請求がJOBから上げた請求書には含まれないことがある。その場合の注意表示などは必要？
        // @TBC 車輌で請求する前にJOBから請求した場合、車輌で請求するものを含める or 含めない？
        (new IssueNewInvoiceFromChassis())->main();

        return false;
    }
}
