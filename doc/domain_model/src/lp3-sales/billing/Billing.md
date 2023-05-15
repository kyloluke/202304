### Billing / 請求 モデル

LP3から発行する請求情報を表す。

```plantuml
hide empty members

class Billing implements DomainModel {
    + String number          # 請求番号
    + DateTime datetime      # 日時
    + Office|String shipper  # 荷主
    + enum serviceType       # サービスタイプ コンテナ請求、RORO請求、スポット請求（JOB外の請求）
    + enum status            # ステータス 未請求、未入金、未入金、入金済み そもそも導出可能なはず
    + String freightRemarks  # フレート備考
    + String serviceRemarks  # サービス備考
    + String adminRemarks    # 管理用備考
    + DateTime payAt         # 支払期限
    + DateTime paidAt        # 入金日 
    + DateTime sentAt        # 送付日

    + BillingItem[] items    # 請求明細リスト

    + File file              # 請求書ファイル
}
```

#### プロパティ

TODO

#### LP2から廃止したプロパティ

* 「金額」に対して手動で調整を行うケースがあったため「最終金額」が存在したが、LP3では収支計算を行う都合で廃止した。
* 上記と同様の理由で、LP2ではユーザーがアップロードした請求書ファイルのリストを保持していたがLP3では廃止した。
* 月締め請求を表す「クレジットフラグ」が存在したが、支払期限を月末にする運用で実現しており、クレジットフラグを利用してはいなかったため廃止した。
* 「ステータス」に「承認済み」という値が存在したが、運用に乗らなかったため廃止した。
