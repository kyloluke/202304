### ChassisDocument / 車輌書類 モデル

車輌に添付する書類を表す。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

class ChassisDocument extends AttachedDocument, FileDocument {
    + Chassis[] chassis                   # 車輌リスト
    + EnumSet<ChassisDocumentType> types  # 書類種別セット
    + File file                           # ファイル
    + String remarks                      # 備考
}
```

#### プロパティ

chassis / 車輌リスト
: 書類の添付対象の車輌のリスト。1つの書類を複数の車輌に添付するケースがあるためリストとする。

types / 書類種別セット
: 書類の種別のセット。1つの書類で複数の種別を満たすケースがあるためセットとする。

file / ファイル
: 書類のファイル。

remarks / 備考
: 任意の備考。


### ChassisDocumentType / 車輌書類種別 列挙型

車輌に添付する書類の種別を表す。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

enum ChassisDocumentType {
    + EC                  # 輸出抹消書類→カンパケした1ファイルがアップロードされる
    + 輸出前検査証     # TBCS 検査種別ごとに必要？アクティビティ側に添付する？→カンパケした1ファイルがアップロードされる
    + リサイクル還付申請書  # OSLのみ。TBCS 具体化する→カンパケした1ファイルがアップロードされる
}
```

#### フィールド

EC / 輸出抹消書類
: Export Certificate。輸出抹消仮登録証明書または輸出予定届出証明書を指す。  
中古車の輸出通関に必要となる書類で、各地区の陸運局で登録申請を行う。  
中古車の輸出先国の輸入通関で必要となる場合と必要でない場合とがあり、必要な場合は輸出抹消の原本を荷受人となる中古車輸入業者に送る必要がある。
LP3ではOSL業務でのみ使用する。
