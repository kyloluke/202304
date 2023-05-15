### business_type / 業態 列挙型

列挙型 business_type を永続化するための列挙値。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

enum BusinessType {
    CUSTOM_BROKER = 1   # 通関業者
    CARGO_LOADER = 2    # 船積作業会社
    STOCK_MANAGER = 3   # 在庫管理会社
    WAREHOUSE_OWNER = 4 # 蔵主
    FORWARDER = 5       # フォワーダー
    SHIPPER = 6         # 荷主
    DRAYAGER = 7        # ドレー業者
    LOCAL_AGENT = 8     # 現地代理店
    BOOKING_AGENT = 9   # ブッキングエージェント
}
```

#### 値

列挙型 BusinessType の各フィールドに対応する値を定義する。
