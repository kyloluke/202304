### DomainModel / ドメインモデル インターフェース

LP3ドメインに存在する抽象概念を表す。  

```plantuml
hide empty members
skinparam defaultFontName Monospaced

interface DomainModel {
    + {abstract} UUID id  # ID
    + {abstract} name     # 名称
}
```

ドメインモデルはデータモデルでもビューモデルでもなく、特定の言語における実装方法を指してもいないことに注意。  

ドメインモデルをどのように物理媒体に保存するかをモデル化したものがデータモデルとなり、
ドメインモデルおよびそれ以上のレイヤーから得られる情報をどのようにユーザーに提示するかをモデル化したものがビューモデルとなる。

そのため、ドメインモデルとデータモデル・ビューモデルは1対1には対応しない。  
データモデルは1つのドメインモデルに対して複数存在することがあるし、ビューモデルは複数のドメインモデルを横断的に参照する形になることが自然である。

#### 抽象プロパティ

id / ID
: ドメインモデルのインスタンスを識別するID。  
UUIDとしているが、実装上はシステム内で固有なIDであればよい。  
例えばDBテーブル名+インクリメンタル値など。

name / 名前
: ドメインモデルの名称。固有の名称が無い場合はnull。


#### ドメインモデルの凡例

```plantuml
hide empty members
skinparam defaultFontName Monospaced

class ドメインモデルの凡例 implements DomainModel {
    + 公開プロパティ
    - 内部プロパティ、重要なもののみ
    + 導出可能な公開プロパティやモデルに属する重要な操作()
}
```
