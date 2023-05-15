### OceanScheduleConfig / オーシャンスケジュール設定 モデル

INTTRAから船舶スケジュールを取得する際の設定情報を表す。

```plantuml
hide empty members

class OceanScheduleConfig implements DomainModel {
    + String 船会社キー文字列
    + String 積港キー文字列
    + String 揚港キー文字列
}
```

#### プロパティ

#### <u>振る舞い</u>



TODO

LP3の本船スケジュール明細を手動で編集・削除した場合に、当該明細については
INTTRAからの再取り込みや復元を禁止する必要がある。
LP2では本船スケジュール明細にそのためのフラグを保持していたが、本来はINTTRA取り込み側で付加すべき情報。

enum ステータス # INTTRAからの取り込みブロックフラグ。TODO INTTRA側に移す
bool 自動更新停止フラグ # INTTRAからの上書き禁止フラグ。TODO INTTRA側に移す
