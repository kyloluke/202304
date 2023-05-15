### AccountTitle / 勘定科目 モデル

会計上の勘定科目を表す。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

class AccountTitle implements DomainModel {
    + LocalizableString name  # 名称
    + String code             # コード
    + bool available          # 利用可能フラグ
    + int ordinary            # 順序
}
```

#### プロパティ

name / 名称
: 名称。「資材仕入高」など。

code / コード
: 一般的な勘定科目コード。「1421」=前払費用など。  
独自の勘定科目コードを入力する可能性があるため文字列とする。

available / 利用可能フラグ
: この勘定科目を利用可能か。例えば仕入れ情報に勘定科目を設定する場合に、利用可能フラグがfalseになっているものは参照できない。
既に参照済みのものについては、利用可能フラグがfalseになってもそのまま参照を維持する。

ordinary / 順序
: この勘定科目の順序を表す値。値が小さいほど先頭側の順序になる。

#### 振る舞い

削除時の挙動
: 既に他オブジェクトから参照されている勘定科目については削除できない。
