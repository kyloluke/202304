/**
 * 障害通知SNSトピック
 */
resource "aws_sns_topic" "severe" {

  name = "${var.stack_name}-severe-topic"  # 名前
}

/**
 * 障害通知SNSトピック購読設定
 */
resource "aws_sns_topic_subscription" "severe" {

  topic_arn = aws_sns_topic.severe.arn  # トピック
  protocol = "email"                    # プロトコル
  endpoint = var.sns_subsc_email        # エンドポイント
}

/**
 * 警告通知SNSトピック
 */
resource "aws_sns_topic" "warning" {

  name = "${var.stack_name}-warning-topic"  # 名前
}

/**
 * 警告通知SNSトピック購読設定
 */
resource "aws_sns_topic_subscription" "warning" {

  topic_arn = aws_sns_topic.warning.arn # トピック
  protocol = "email"                    # プロトコル
  endpoint = var.sns_subsc_email        # エンドポイント
}

/**
 * 情報通知SNSトピック
 */
resource "aws_sns_topic" "info" {

  name = "${var.stack_name}-info-topic"  # 名前
}

/**
 * 情報通知SNSトピック購読設定
 */
resource "aws_sns_topic_subscription" "info" {

  topic_arn = aws_sns_topic.info.arn  # トピック
  protocol = "email"                  # プロトコル
  endpoint = var.sns_subsc_email      # エンドポイント
}
