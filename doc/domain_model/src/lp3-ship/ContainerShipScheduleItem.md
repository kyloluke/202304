## ContainerShipScheduleItem / コンテナ船スケジュール明細 モデル

コンテナ船のスケジュール明細を表す。
基本となる本船スケジュールに加えて、コンテナ船固有のスケジュール情報を保持する。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

class ContainerShipScheduleItem extends ShipScheduleItem {
    + DateTime documentCutAt  # ドキュメントカット日時
    + bool documentAmCut      # ドキュメントAMカットフラグ
    + DateTime cyOpenAt       # コンテナヤードオープン日時
    + DateTime cyCutAt        # コンテナヤードカット日時
    + bool cyAmCut            # コンテナヤードAMカットフラグ TODO DateTimeWithAmPm 等にまとめる
    + bool irregularCyCut     # 例外コンテナヤードカット日時フラグ
    + String remarks          # 備考 
}
```

### プロパティ

スーパークラスのプロパティを継承する。それに加えて以下のプロパティを保持する。

documentCutAt / ドキュメントカット日時
: 書類の提出締め切り日時。

documentAmCut / ドキュメントAMカットフラグ
: ドキュメントカット日時を、当該日時の午前中までと表現するかのフラグ。

cyOpenAt / コンテナヤードオープン日時
: コンテナヤードがコンテナの受け入れを開始する日時。

cyCutAt / コンテナヤードカット日時 
: コンテナヤードがコンテナの受け入れを締め切る日時。

cyAmCut / コンテナヤードAMカットフラグ
: コンテナヤードカット日時を、当該日時の午前中までと表現するかのフラグ。

irregularCyCut / 例外コンテナヤードカット日時フラグ
: コンテナヤードカット日時が通常の日時ではなく、特別な日時に設定されているかのフラグ。
AMカットについても同様。TODO 図解を載せる。

remarks / 備考
: 任意の備考文章。
