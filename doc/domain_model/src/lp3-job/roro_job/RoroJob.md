### RoroJob / ROROジョブ モデル

RORO船積み作業を表す。

```plantuml
hide empty members

class RoroJob extends Job {
    + String 作業番号
    + Office 荷主
    + String 荷主管理番号
    + String 管理備考
    + String オーダー備考 TBC 要確認
    + int 車輌数
    + Location 最終目的地
    + DateTime 最終目的地到着日時
    + Office カスタムブローカー
    + Office シッピングエージェント TBC Organization単位か確認
    + 作業タイプ=>Office 作業タイプごとの事業所

    + enum IV書類ステータス TBC 内容確認
    + DateTime IV書類送付日時 TBC 送付日時？
    + enum SI書類ステータス
    + DateTime SI書類送付日時
    + enum EC書類ステータス
    + DateTime EC書類送付日時
    + enum FSI書類ステータス
    + DateTime FSI書類送付日時
    + enum SO書類ステータス
    + DateTime SO書類送付日時
    + enum CERT書類ステータス
    + DateTime CERT書類送付日時
    + enum ED書類ステータス
    + DateTime ED書類送付日時
    + enum RI書類ステータス
    + DateTime RI書類送付日時
    + enum BL書類ステータス
    + DateTime BL書類送付日時
    + DateTime 書類締切日時

    TODO
    Billing 請求 TODO 請求側から参照する
    JobStatus ステータス
    bool フレート入力フラグ
}
```

#### プロパティ

TODO
