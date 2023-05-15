/**
 * ALBセキュリティグループ
 */
resource "aws_security_group" "alb" {

  name_prefix = "${var.stack_name}-alb-sg-" # 名前プレフィックス
  vpc_id = aws_vpc.this.id                  # VPC
  egress {                                  # アウトバウンドルール
    protocol = "-1"                         #   プロトコル
    from_port = 0                           #   ポート範囲
    to_port = 0                             #   ポート範囲
    cidr_blocks = ["0.0.0.0/0"]             #   CIDRブロック
  }

  tags = {                                  # タグ
    Name = "${var.stack_name}-alb-sg"       #   名前
  }

  lifecycle {                               # ライフサイクルルール
    create_before_destroy = true            #   既存リソース削除前に新規リソースを作成するか（置換時）
  }
}

/**
 * ALBセキュリティグループ-HTTPインバウンドルール
 * 任意アドレスからのHTTP通信を許可する
 */
resource "aws_security_group_rule" "alb_ingress_http" {

  security_group_id = aws_security_group.alb.id # セキュリティグループ
  type = "ingress"                              # タイプ
  description = "Allow HTTP from any"           # 説明
  cidr_blocks = ["0.0.0.0/0"]                   # 受信元IPアドレス
  protocol = "tcp"                              # プロトコル
  from_port = 80                                # ポート範囲
  to_port = 80                                  # ポート範囲
}

/**
 * ALBセキュリティグループ-HTTPSインバウンドルール
 * 任意アドレスからのHTTPS通信を許可する
 */
resource "aws_security_group_rule" "alb_ingress_https" {

  security_group_id = aws_security_group.alb.id # セキュリティグループID
  type = "ingress"                              # タイプ
  description = "Allow HTTPS from any"          # 説明
  cidr_blocks = ["0.0.0.0/0"]                   # 受信元IPアドレス
  protocol = "tcp"                              # プロトコル
  from_port = 443                               # ポート範囲
  to_port = 443                                 # ポート範囲
}

/**
 * ALB管理用セキュリティグループ
 */
resource "aws_security_group" "alb_mng" {

  name_prefix = "${var.stack_name}-alb-mng-sg-" # 名前プレフィックス
  vpc_id = aws_vpc.this.id                      # VPC
  egress {                                      # アウトバウンドルール
    protocol = "-1"                             #   プロトコル
    from_port = 0                               #   ポート範囲
    to_port = 0                                 #   ポート範囲
    cidr_blocks = ["0.0.0.0/0"]                 #   CIDRブロック
  }

  tags = {                                      # タグ
    Name = "${var.stack_name}-alb-mng-sg"       #   名前
  }

  lifecycle {                                   # ライフサイクルルール
    create_before_destroy = true                #   既存リソース削除前に新規リソースを作成するか（置換時）
  }
}

/**
 * ALB管理用セキュリティグループ-HTTPSインバウンドルール
 * 任意アドレスからのAdminer用HTTPS(8443)通信を許可する
 */
resource "aws_security_group_rule" "alb_mng_ingress_https" {

  security_group_id = aws_security_group.alb_mng.id # セキュリティグループID
  type = "ingress"                                  # タイプ
  description = "Allow HTTPS(8443) from any"        # 説明
  cidr_blocks = ["0.0.0.0/0"]                       # 受信元IPアドレス
  protocol = "tcp"                                  # プロトコル
  from_port = 8443                                  # ポート範囲
  to_port = 8443                                    # ポート範囲
}
