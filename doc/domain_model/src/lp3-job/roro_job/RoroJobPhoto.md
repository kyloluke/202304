### RoroJobPhoto / ROROジョブ写真 モデル

ROROジョブについて撮影した写真を表す。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

class RoroJobPhoto implements AttachedDocument, FileDocument {
    + RoroJob roroJob                  # ROROジョブ
    + EnumSet<RoroJobPhotoType> types  # 種別セット
    + File file                        # ファイル
    + String remarks                   # 備考
}
```

#### プロパティ

roroJob / ROROジョブ
: 写真の撮影対象のROROジョブ。

types / 種別セット
: 種別。1枚の写真が複数の種別を満たすケースがあるためセットとする。

file / ファイル
: 写真のファイル。

remarks / 備考
: 任意の備考文章。


### RoroJobPhotoType / ROROジョブ写真種別 列挙型

ROROジョブ写真の種別を表す。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

enum RoroJobPhotoType {
    + TODO
}
```
