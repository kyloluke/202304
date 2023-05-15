/**
 * ログバケット
 */
resource "aws_s3_bucket" "log" {

  bucket = "aws-waf-logs-and-other-logs-${var.stack_name}.smart-port.jp"  # バケット名 NOTE: aws-waf-logs-から始める制約がある

  force_destroy = var.force_destroy                                       # 強制削除するか
}

/**
 * ログバケット-暗号化設定
 */
resource "aws_s3_bucket_server_side_encryption_configuration" "log" {

  bucket = aws_s3_bucket.log.id                 # バケット
  rule {                                        # ルール
    bucket_key_enabled = true                   #   暗号化するか
    apply_server_side_encryption_by_default {   #   デフォルト暗号化
      sse_algorithm = "AES256"                  #     アルゴリズム NOTE: VPC、ALB、WAFのログ出力用バケットにはカスタマーマスターキーは使用できない制約がある
    }
  }
}

/**
 * ログバケット-パブリックアクセスブロック設定
 */
resource "aws_s3_bucket_public_access_block" "log" {

  bucket = aws_s3_bucket.log.id   # バケット
  block_public_acls = true        # パブリックACLをブロックするか
  block_public_policy = true      # パブリックアクセスポリシーをブロックするか
  ignore_public_acls = true       # パブリックACLを無視するか
  restrict_public_buckets = true  # バケット公開を制限するか
}

/**
 * ログバケット-ポリシー
 */
resource "aws_s3_bucket_policy" "log" {

  bucket = aws_s3_bucket.log.id                                 # バケット
  policy = data.aws_iam_policy_document.log_bucket_policy.json  # ポリシー
}

/**
 * ログバケット-ポリシードキュメント
 * S3ロギングサービスによるオブジェクト書き込み操作を許可する
 * ELBサービスアカウントによるオブジェクト書き込み操作を許可する
 */
data "aws_iam_policy_document" "log_bucket_policy" {

  version = "2012-10-17"
  statement {
    effect = "Allow"
    principals {
      type = "Service"
      identifiers = ["logging.s3.amazonaws.com"]
    }
    actions = [
      "s3:PutObject"
    ]
    resources = [
      "${aws_s3_bucket.log.arn}/*"
    ]
    condition {
      test = "ArnLike"
      variable = "aws:SourceARN"
      values = [aws_s3_bucket.fs.arn]
    }
    condition {
      test     = "StringEquals"
      variable = "aws:SourceAccount"
      values   = [data.aws_caller_identity.current.account_id]
    }
  }
  statement {
    effect = "Allow"
    principals {
      type = "AWS"
      identifiers = [
        data.aws_elb_service_account.current.arn
      ]
    }
    actions = [
      "s3:PutObject"
    ]
    resources = [
      "${aws_s3_bucket.log.arn}/AWSLogs/${data.aws_caller_identity.current.account_id}/*"
    ]
  }
}
