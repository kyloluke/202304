### LocalizableString / ローカライズ可能文字列 オブジェクト

複数のロケールにローカライズ可能な文字列を表す。  

一般的なアプリケーションでは、識別子=>ローカライズ文字列のマッピングを記述したリソーステーブルをロケールごとに保持し、実行時に参照することで多言語対応を行う。    
しかしLP3では当面は日本語と英語のみをサポートするため、日本語と英語のローカライズ文字列を直接保持する設計とする。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

class LocalizableString {
    + String jp                    # 日本語文字列
    + String en                    # 英語文字列
    + String localeString(Locale)  # ローカライズ文字列 TODO：「ローカライズ文字列」の項目を削除する。理由：不要なため 
}
```

#### フィールド

jp / 日本語文字列
: 日本語の文字列。

en / 英語文字列
: 英語の文字列。

localeString / ローカライズ文字列
: 指定されたロケール向けにローカライズされた文字列。  
