/**
 * NATゲートウェイ
 */
resource "aws_nat_gateway" "this" {
  count = length(aws_subnet.public)

  allocation_id = aws_eip.ngw[count.index].allocation_id        # アロケーションID
  connectivity_type = "public"                                  # 接続タイプ
  subnet_id = aws_subnet.public[count.index].id                 # サブネット

  tags = {                                                      # タグ
    Name = format("%s-az%02d-ngw", var.stack_name, count.index) #   名前
  }
}

/**
 * NATゲートウェイEIP
 */
resource "aws_eip" "ngw" {
  count = length(aws_subnet.public)

  tags = {                                                          # タグ
    Name = format("%s-az%02d-ngw-eip", var.stack_name, count.index) #   名前
  }
}

/**
 * プライベートサブネット to NATゲートウェイルート
 */
resource "aws_route" "private_subnet_to_ngw" {
  count = length(aws_subnet.private)

  route_table_id = aws_route_table.private[count.index].id  # ルートテーブル
  destination_cidr_block = "0.0.0.0/0"                      # ルーティング先CIDRブロック
  nat_gateway_id = aws_nat_gateway.this[count.index].id     # NATゲートウェイ
}
