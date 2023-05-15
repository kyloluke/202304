### JsonMemento / JSON方式記録 オブジェクト

JSON方式で実装したMemento。  

```plantuml
hide empty members
skinparam defaultFontName Monospaced

interface "Memento<M>" as Memento

class JsonMemento<M extends DomainModel> implements Memento {
    + String json # JSON文字列
    + M model     # モデル
}
```

#### ジェネリクスパラメーター

スーパーインターフェースのパラメーターを継承する。

#### プロパティ

スーパーインターフェースのプロパティを実装する。  
JSON文字列を保持し、modelプロパティが要求されたときに必要に応じてデシリアライズする。
