### Cargo / 貨物 インターフェース

LP3で取り扱う貨物を表す。  
ここでの貨物とは顧客から依頼を受けて輸送する荷物を指す。コンテナといった、貨物を輸送するための付随物は貨物とはしない。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

interface Cargo extends DomainModel {
    + {abstract} CargoType type  # 種別
}
```

#### 抽象プロパティ

type / 種別
: 貨物の種別。
