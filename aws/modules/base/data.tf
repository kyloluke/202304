/**
 * カレント実行アイデンティティ
 */
data "aws_caller_identity" "current" {
}

/**
 * カレントリージョン
 */
data "aws_region" "current" {
}

/**
 * カレントアベイラビリティゾーン
 */
data "aws_availability_zones" "current" {
  state = "available"
}

/**
 * カレントELBサービスアカウント
 */
data "aws_elb_service_account" "current" {
}

/**
 * カレントS3プレフィックスリスト
 */
data "aws_prefix_list" "current_s3" {
  name = "com.amazonaws.${data.aws_region.current.name}.s3"
}
