/**
 * VPC
 */
resource "aws_vpc" "this" {

  cidr_block = "172.16.0.0/16"      # CIDRブロック
  enable_dns_support = true         # DNSをサポートするか
  enable_dns_hostnames = true       # 起動したインスタンスにDNSホストネームを割り当てるか

  tags = {                          # タグ
    Name = "${var.stack_name}-vpc"  #   名前
  }
}

/**
 * VPCフローログ
 */
resource "aws_flow_log" "this" {

  vpc_id = aws_vpc.this.id                  # VPC
  traffic_type = "ALL"                      # トラフィックタイプ
  log_destination_type = "s3"               # ログ格納先タイプ
  log_destination = aws_s3_bucket.log.arn   # ログ格納先

  tags = {                                  # タグ
    Name: "${var.stack_name}-vpc-flow-log"  #   名前
  }
}
