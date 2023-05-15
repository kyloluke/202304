### BusinessType / 業態 列挙型

LP3を利用する企業の業態を表す。

```plantuml
hide empty members
skinparam defaultFontName Monospaced

enum BusinessType {    
    + CUSTOM_BROKER    # 通関業者
    + CARGO_LOADER     # 船積作業会社
    + STOCK_MANAGER    # 在庫管理会社
    + WAREHOUSE_OWNER  # 蔵主
    + FORWARDER        # フォワーダー
    + SHIPPER          # 荷主
    + DRAYAGER         # ドレー業者
    + LOCAL_AGENT      # 現地代理店
    + BOOKING_AGENT    # ブッキングエージェント
    + PRIME_FORWARDER  # 元請フォワーダー
}
```

#### フィールド

CUSTOM_BROKER / 通関業者
: 通関手続きを代行する。

CARGO_LOADER / 船積作業会社
: 船積作業を行う。

STOCK_MANAGER / 在庫管理会社
: 貨物の在庫を管理する。

WAREHOUSE_OWNER / 蔵主
: 倉庫のオーナー。

FORWARDER / フォワーダー
: 貨物の運送取扱、利用運送及びこれらに付帯する業務を行う。後述の元請フォワーダーは含まない。  
LP3 では SYNC を指す。

SHIPPER / 荷主
: 貨物の送り主。

DRAYAGER / ドレー業者
: コンテナを専用トレーラーで輸送する。

LOCAL_AGENT / 現地代理店
: 貨物の輸出先の現地で輸入手続きを行う。デバンニングなども行う場合がある。
コンテナ情報の参照・BLのダウンロードなどにLP3を利用する。

BOOKING_AGENT / ブッキングエージェント
: 船舶予約の仲介を行う。

PRIME_FORWARDER / 元請フォワーダー
: 荷主と直接契約しているフォワーダー。LP3 では前述のフォワーダー(FORWARDER)にとっての親請け会社を指す。
