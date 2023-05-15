### Tracking / トラッキング情報 モデル

INTTRAから取得したコンテナのトラッキング情報を表す。

```plantuml
hide empty members

class Tracking implements DomainModel {
    + String コンテナ番号
    + String タイプ
    + String イベントコード
    + DateTime 日時
    + String ロケーション（UNLOCODE）
    + String ブッキング番号
    + String BL番号
    + String 注文番号
    + String 船会社SCACコード
    + String 本船名
    + String 航海番号
    + String シール番号
    + String ステータス（Full/Empty）
    + String ファイル名
}
```

#### プロパティ

#### <u>振る舞い</u>
