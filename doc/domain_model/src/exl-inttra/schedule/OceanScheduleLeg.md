### OceanScheduleLeg / オーシャンスケジュールレッグ モデル

INTTRAから取得した船舶スケジュールレッグ情報を表す。

```plantuml
hide empty members

class OceanScheduleLeg implements DomainModel {
    + int シーケンス番号
    + String 本船名
    + String 航海番号
    + String IMO番号

    + String 出発港UN/LOCコード
    + String 出発港市名
    + String 出発港州名
    + String 出発港国名
    + String 出発港ターミナル名
    + DateTime 出発港出発日時

    + String 到着港UN/LOCコード
    + String 到着港市名
    + String 到着港州名
    + String 到着港国名
    + String 到着港ターミナル名
    + DateTime 到着港出発日時

    + bool 積み替えが発生したか
}
```

#### プロパティ

#### <u>振る舞い</u>
