/**
 * APセキュリティグループ
 */
resource "aws_security_group" "ap" {

  name_prefix = "${var.stack_name}-ap-sg-"  # 名前プレフィックス
  vpc_id = aws_vpc.this.id                  # VPC
  egress {                                  # アウトバウンドルール
    protocol = "-1"                         #   プロトコル
    from_port = 0                           #   ポート範囲
    to_port = 0                             #   ポート範囲
    cidr_blocks = ["0.0.0.0/0"]             #   CIDRブロック
  }

  tags = {                                  # タグ
    Name = "${var.stack_name}-ap-sg"        #   名前
  }

  lifecycle {                               # ライフサイクルルール
    create_before_destroy = true            #   既存リソース削除前に新規リソースを作成するか（置換時）
  }
}

/**
 * APセキュリティグループ-HTTPインバウンドルール
 * ALBセキュリティグループからのHTTP通信を許可する
 */
resource "aws_security_group_rule" "ap_http_ingress" {

  security_group_id = aws_security_group.ap.id          # セキュリティグループ
  type = "ingress"                                      # タイプ
  description = "Allow HTTP from ALB security group"    # 説明
  source_security_group_id = aws_security_group.alb.id  # 受信元セキュリティグループ
  protocol = "tcp"                                      # プロトコル
  from_port = 80                                        # ポート範囲
  to_port = 80                                          # ポート範囲
}

/**
 * AP管理用セキュリティグループ
 */
resource "aws_security_group" "ap_mng" {

  name_prefix = "${var.stack_name}-ap-mng-sg-"  # 名前プレフィックス
  vpc_id = aws_vpc.this.id                      # VPC
  egress {                                      # アウトバウンドルール
    protocol = "-1"                             # プロトコル
    from_port = 0                               # ポート範囲
    to_port = 0                                 # ポート範囲
    cidr_blocks = ["0.0.0.0/0"]                 # CIDRブロック
  }

  tags = {                                      # タグ
    Name = "${var.stack_name}-ap-mng-sg"        #   名前
  }

  lifecycle {                                   # ライフサイクルルール
    create_before_destroy = true                #   既存リソース削除前に新規リソースを作成するか（置換時）
  }
}

/**
 * AP管理用セキュリティグループ-HTTPインバウンドルール
 * ALBセキュリティグループからのHTTP(8080)通信を許可する
 */
resource "aws_security_group_rule" "ap_mng_http_ingress" {

  security_group_id = aws_security_group.ap_mng.id          # セキュリティグループ
  type = "ingress"                                          # タイプ
  description = "Allow HTTP(8080) from ALB security group"  # 説明
  source_security_group_id = aws_security_group.alb_mng.id  # 受信元セキュリティグループ
  protocol = "tcp"                                          # プロトコル
  from_port = 8080                                          # ポート範囲
  to_port = 8080                                            # ポート範囲
}
