## RoroShipScheduleItem / RORO船スケジュール明細 モデル

RORO船のスケジュール明細を表す。
基本となる本船スケジュールに加えて、RORO船固有のスケジュール情報を保持する。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

class RoroShipScheduleItem extends ShipScheduleItem {
    + DateTime documentCutAt  # ドキュメントカット日時
    + bool documentAmCut      # ドキュメントAMカットフラグ
    + DateTime goDownAt       # ゴーダウン予定日時
    + Address goDownAddress   # ゴーダウン住所
    + String remarks          # 備考 
}
```

### プロパティ

スーパークラスのプロパティを継承する。それに加えて以下のプロパティを保持する。

documentCutAt / ドキュメントカット日時
: 書類提出の締切日時。

documentAmCut / ドキュメントAMカットフラグ
: ドキュメントカット日時を、当該日時の午前中までと表現するかのフラグ。

goDownAt / ゴーダウン予定日時
: ゴーダウンの予定日時。この日時には、RORO対象車輌はヤードからゴーダウン場所への移動を開始する。

goDownAddress / ゴーダウン住所
: ゴーダウン場所の住所。郵便番号と住所文字列1つのみを格納する。

remarks / 備考
: 任意の備考文章。
