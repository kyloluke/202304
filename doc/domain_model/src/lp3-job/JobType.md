### JobType / ジョブ種別 列挙型

ジョブの種別を表す。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

enum JobType {
    + CONTAINER_JOB # コンテナジョブ
    + RORO_JOB      # ROROジョブ
}
```

#### 値

CONTAINER_JOB / コンテナジョブ
: コンテナ船積み作業を指す。

RORO_JOB / ROROジョブ
: RORO船積み作業を指す。
