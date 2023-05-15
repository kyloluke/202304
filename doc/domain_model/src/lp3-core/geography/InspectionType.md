### InspectionType / 検査種別 列挙型

輸出に必要な各種検査の種別を表す。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

enum InspectionType {
    + JEVIC      # JEVIC検査
    + QISJ       # QISJ検査
    + EAA        # EAA検査
    + ATJ        # ATJ検査
    + JAAI       # JAAI検査
    + INTERTEK   # INTERTEK検査
    + BUREAU     # BUREAU VERITAS検査
    + OMIC       # OMIC検査
    + VCA        # VCA検査
    + RADIATION  # 放射線量検査
}
```

#### フィールド

JEVIC / JEVIC検査
: 株式会社日本輸出自動車検査センター（Japan Export Vehicle Inspection Center）による検査。  
参考: http://www.spx-1982.co.jp/inspection/index.html  
以下VCAまでは輸出前標準適合検査を指す。

QISJ / QISJ検査
: 株式会社クオリティーインスペクションサービス（Quality Inspection Services Japan）による検査。

EAA / EAA検査
: EAA株式会社による検査。

ATJ / ATJ検査
: Autoterminal Japan株式会社による検査。

JAAI / JAAI検査
: 一般財団法人日本自動車査定協会（Japan Auto Appraisal Institute）による検査。

INTERTEK / INTERTEK検査
: インターテック ジャパン株式会社による検査。

BUREAU / BUREAU検査
: ビューローベリタスジャパン株式会社による検査。

OMIC / OMIC検査
: 海外貨物検査株式会社（Overseas Merchandise Inspection Company）による検査。

VCA / VCA検査
: 英国運輸省のVCA（Vehicle Certification Agency）の日本事務所による検査。

RADIATION / 放射線量検査
: 経済産業省の輸出品放射線検査事業に基づいた放射線量検査。  
参考: https://www.chubu.meti.go.jp/information/data/shinsai/yusyutukensa.pdf
