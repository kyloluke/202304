### ContainerJobPhoto / コンテナジョブ写真 モデル

コンテナジョブについて撮影した写真を表す。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

class ContainerJobPhoto extends AttachedDocument, FileDocument {
    + ContainerJob containerJob      # コンテナジョブ
    + ContainerJobPhotoType types[]  # 種別リスト
    + File file                      # ファイル
    + String remarks                 # 備考
}
```

#### プロパティ

containerJob / コンテナジョブ
: 写真の撮影対象のコンテナジョブ。

types / 種別リスト
: 種別。1枚の写真が複数の種別を満たすケースがあるためリストとする。

file / ファイル
: 写真のファイル。

remarks / 備考
: 任意の備考文章。


### ContainerJobPhotoType / コンテナジョブ写真種別 列挙型

コンテナジョブ写真の種別を表す。


```plantuml
hide empty members
skinparam defaultFontName Monospaced

enum ContainerJobPhotoType {
    + TODO
}
```