/**
 * インターネットゲートウェイ
 */
resource "aws_internet_gateway" "this" {

  vpc_id = aws_vpc.this.id          # VPC

  tags = {                          # タグ
    Name = "${var.stack_name}-igw"  #   名前
  }
}

/**
 * パブリックサブネット to インターネットゲートウェイルート
 */
resource "aws_route" "public_subnet_to_igw" {
  count = length(aws_route_table.public)

  route_table_id = aws_route_table.public[count.index].id # ルートテーブル
  destination_cidr_block = "0.0.0.0/0"                    # ルーティング先CIDRブロック
  gateway_id = aws_internet_gateway.this.id               # ゲートウェイ
}
