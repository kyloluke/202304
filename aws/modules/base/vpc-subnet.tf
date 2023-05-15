/**
 * パブリックサブネット
 */
resource "aws_subnet" "public" {
  count = 2

  vpc_id = aws_vpc.this.id                                                    # VPC
  availability_zone = data.aws_availability_zones.current.names[count.index]  # アベイラビリティゾーン
  cidr_block = format("172.16.%d0.0/24", 1 + count.index)                     # CIDRブロック
  map_public_ip_on_launch =  true                                             # 起動したインスタンスにパブリックIPアドレスを割り当てるか

  tags = {                                                                    # タグ
    Name = format("%s-az%02d-public-subnet", var.stack_name, 1 + count.index) #   名前
  }
}

/**
 * パブリックサブネットルートテーブル
 */
resource "aws_route_table" "public" {
  count = length(aws_subnet.public)

  vpc_id = aws_vpc.this.id                                                          # VPC

  tags = {                                                                          # タグ
    Name = format("%s-az%02d-public-route-table", var.stack_name, 1 + count.index)  #   名前
  }
}

/**
 * パブリックサブネットルートテーブル関連付け
 */
resource "aws_route_table_association" "public" {
  count = length(aws_subnet.public)

  subnet_id = aws_subnet.public[count.index].id           # サブネットID
  route_table_id = aws_route_table.public[count.index].id # ルートテーブルID
}

/**
 * プライベートサブネット
 */
resource "aws_subnet" "private" {
  count = length(aws_subnet.public)

  vpc_id = aws_vpc.this.id                                                      # VPC
  availability_zone = data.aws_availability_zones.current.names[count.index]    # アベイラビリティゾーン
  cidr_block = format("172.16.%d1.0/24", 1 + count.index)                       # CIDRブロック
  map_public_ip_on_launch = false                                               # 起動したインスタンスにパブリックIPアドレスを割り当てるか

  tags = {                                                                      # タグ
    Name = format("%s-az%02d-private-subnet", var.stack_name, 1 + count.index)  #   名前
  }
}

/**
 * プライベートサブネットルートテーブル
 */
resource "aws_route_table" "private" {
  count = length(aws_subnet.private)

  vpc_id = aws_vpc.this.id                                                            # VPC

  tags = {                                                                            # タグ
    Name = format("%s-az%02d-private-route-table", var.stack_name, 1 + count.index)   #   名前
  }
}

/**
 * プライベートサブネットルートテーブル関連付け
 */
resource "aws_route_table_association" "private" {
  count = length(aws_subnet.private)

  subnet_id = aws_subnet.private[count.index].id            # サブネットID
  route_table_id = aws_route_table.private[count.index].id  # ルートテーブルID
}
