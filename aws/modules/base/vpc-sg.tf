/**
 * VPCエンドポイントセキュリティグループ
 */
resource "aws_security_group" "vpc_endpoint" {

  name_prefix = "${var.stack_name}-vpc-endpoint-sg-"  # 名前プレフィックス
  vpc_id = aws_vpc.this.id                      # VPC
  egress {                                      # アウトバウンドルール
    protocol = "-1"                             #   プロトコル
    from_port = 0                               #   ポート範囲
    to_port = 0                                 #   ポート範囲
    cidr_blocks = ["0.0.0.0/0"]                 #   CIDRブロック
  }

  tags = {                                      # タグ
    Name = "${var.stack_name}-vpc-endpoint-sg"  #   名前
  }

  lifecycle {                                   # ライフサイクル設定
    create_before_destroy = true                #   既存リソース削除前に新規リソースを作成するか（置換時）
  }
}

/**
 * VPCエンドポイントセキュリティグループ-HTTPSインバウンドルール
 * APセキュリティグループからのHTTPS通信を許可する
 */
resource "aws_security_group_rule" "vpc_endpoint_https_ingress" {

  security_group_id = aws_security_group.vpc_endpoint.id  # セキュリティグループ
  type = "ingress"                                        # タイプ
  description = "Allow HTTPS from AP security group"      # 説明
  source_security_group_id = aws_security_group.ap.id     # 受信元セキュリティグループ
  protocol = "tcp"                                        # プロトコル
  from_port = 443                                         # ポート範囲
  to_port = 443                                           # ポート範囲
}
