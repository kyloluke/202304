### OceanSchedule / オーシャンスケジュール モデル

INTTRAから取得した船舶スケジュール情報を表す。

```plantuml
hide empty members

class OceanSchedule implements DomainModel {
    + String 船会社SCACコード
    + String 船会社名
    + String サービス名
    + String 本船名
    + String 航海番号
    + String IMO番号
    + String オリジン港UN/LOCコード
    + String オリジン港市名
    + String オリジン港州名
    + String オリジン港国名
    + String オリジン港ターミナル名
    + DateTime 貨物積み込み予定日時
    + DateTime 貨物積み込みカットオフ日時
    + DateTime オリジン港出港日時
    + String デスティネーション港UN/LOCコード
    + String デスティネーション港市名
    + String デスティネーション発港州名
    + String デスティネーション港市名
    + String デスティネーション港ターミナル名
    + DateTime デスティネーション港到着日時

    DateTime アラート日時 TBC システム用のフィールド？要確認
}
```

#### プロパティ

#### <u>振る舞い</u>
