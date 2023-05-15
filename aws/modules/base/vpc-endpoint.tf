/**
 * SSMサービス向けVPCエンドポイント
 */
resource "aws_vpc_endpoint" "ssm" {

  vpc_id = aws_vpc.this.id                      # VPC
  vpc_endpoint_type = "Interface"               # タイプ
  service_name = "com.amazonaws.${data.aws_region.current.name}.ssm"  # サービス名
  subnet_ids = aws_subnet.private.*.id          # サブネット
  security_group_ids = [                        # セキュリティグループ
    aws_security_group.vpc_endpoint.id
  ]
  private_dns_enabled = true                    # プライベートDNSを有効にするか

  tags = {                                      # タグ
    Name = "${var.stack_name}-ssm-vpc-endpoint" #   名前
  }
}

/**
 * SSMメッセージサービス向けVPCエンドポイント
 */
resource "aws_vpc_endpoint" "ssmmessages" {

  vpc_id = aws_vpc.this.id                              # VPC
  vpc_endpoint_type = "Interface"                       # タイプ
  service_name = "com.amazonaws.${data.aws_region.current.name}.ssmmessages"  # サービス名
  subnet_ids = aws_subnet.private.*.id                  # サブネット
  security_group_ids = [                                # セキュリティグループ
    aws_security_group.vpc_endpoint.id
  ]
  private_dns_enabled = true                            # プライベートDNSを有効にするか

  tags = {                                              # タグ
    Name = "${var.stack_name}-ssmmessages-vpc-endpoint" #   名前
  }
}

/**
 * EC2メッセージサービス向けエンドポイント
 */
resource "aws_vpc_endpoint" "ec2messages" {

  vpc_id = aws_vpc.this.id                              # VPC
  vpc_endpoint_type = "Interface"                       # タイプ
  service_name = "com.amazonaws.${data.aws_region.current.name}.ec2messages"  # サービス名
  subnet_ids = aws_subnet.private.*.id                  # サブネット
  security_group_ids = [                                # セキュリティグループ
    aws_security_group.vpc_endpoint.id
  ]
  private_dns_enabled = true                            # プライベートDNSを使用するか

  tags = {                                              # タグ
    Name = "${var.stack_name}-ec2messages-vpc-endpoint" #   名前
  }
}

/**
 * RDSサービス向けVPCエンドポイント
 */
resource "aws_vpc_endpoint" "rds" {

  vpc_id = aws_vpc.this.id                      # VPC
  vpc_endpoint_type = "Interface"               # タイプ
  service_name = "com.amazonaws.${data.aws_region.current.name}.rds"  # サービス名
  security_group_ids = [                        # セキュリティグループ
    aws_security_group.vpc_endpoint.id
  ]
  private_dns_enabled = true                    # プライベートDNSを有効にするか

  tags = {                                      # タグ
    Name = "${var.stack_name}-rds-vpc-endpoint" #   名前
  }
}

/**
 * S3サービス向けVPCエンドポイント
 */
resource "aws_vpc_endpoint" "s3" {

  vpc_id = aws_vpc.this.id                        # VPC
  vpc_endpoint_type = "Gateway"                   # タイプ
  service_name = "com.amazonaws.${data.aws_region.current.name}.s3" # サービス名
  route_table_ids = aws_route_table.private.*.id  # ルートテーブル

  tags = {                                        # タグ
    Name = "${var.stack_name}-s3-vpc-endpoint"    #   名前
  }
}

/**
 * SESサービス向けVPCエンドポイント
 */
resource "aws_vpc_endpoint" "ses" {

  vpc_id = aws_vpc.this.id                      # VPC
  vpc_endpoint_type = "Interface"               # タイプ
  service_name = "com.amazonaws.${data.aws_region.current.name}.email-smtp" # サービス名
  subnet_ids = aws_subnet.private.*.id          # サブネットID
  security_group_ids = [                        # セキュリティグループ
    aws_security_group.vpc_endpoint.id
  ]
  private_dns_enabled = true                    # プライベートDNSを有効にするか

  tags = {                                      # タグ
    Name = "${var.stack_name}-ses-vpc-endpoint" #   名前
  }
}

/**
 * CloudWatchモニタリングサービス向けVPCエンドポイント
 */
resource "aws_vpc_endpoint" "monitoring" {

  vpc_id = aws_vpc.this.id                              # VPC
  vpc_endpoint_type = "Interface"                       # タイプ
  service_name = "com.amazonaws.${data.aws_region.current.name}.monitoring" # サービス名
  subnet_ids = aws_subnet.private.*.id                  # サブネット
  security_group_ids = [                                # セキュリティグループ
    aws_security_group.vpc_endpoint.id
  ]
  private_dns_enabled = true                            # プライベートDNSを有効にするか

  tags = {                                              # タグ
    Name = "${var.stack_name}-monitoring-vpc-endpoint"  #   名前
  }
}
