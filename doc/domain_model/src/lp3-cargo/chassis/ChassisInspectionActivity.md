### ChassisInspectionActivity / 車輌検査アクティビティ モデル

車輌の検査活動を表す。  

```plantuml
hide empty members
skinparam defaultFontName Monospaced

class ChassisInspectionActivity extends AbstractChassisActivity {
    + InspectionType type             # 検査種別
    + ChassisInspectionStatus status  # ステータス
}
```

#### プロパティ

スーパークラスのプロパティを継承する。それに加えて以下のプロパティを保持する。

type / 検査種別
: 検査の種別。

status / 検査ステータス
: 検査の状態。

#### 検査予定の管理について

LP3では検査日程についても管理する。
(e.g. 検査申し込みを記録する際に検査予定日の入力を行わせる、検査予定日に到達していたら検査の実施結果を入力する必要がある、etc...）
内部的には車輌検査の余日それぞれのアクティビティを生成することで実現する。


### ChassisInspectionStatus / 車輌検査ステータス 列挙型

車輌検査の状態を表す。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

enum ChassisInspectionStatus {
    + APPLIED  # 申し込み済み
    + DONE     # 終了
    + FAILED   # 不合格
    + PASSED   # 合格
}
```

#### フィールド

APPLIED / 申し込み済み
: 検査の申し込みが済んだ状態。この時点で検査予定日が確定し、LP3にも予定日を記録する必要がある。 

DONE / 検査終了
: 検査が終了し、不合格・合格を確認する前の状態。

FAILED / 不合格
: 検査が終了し、不合格だったことを確認した状態。

PASSED / 合格
: 検査が終了し、合格したことを確認した状態。
