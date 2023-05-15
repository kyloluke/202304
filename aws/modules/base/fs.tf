/**
 * FSバケット
 */
resource "aws_s3_bucket" "fs" {

  bucket = "${var.stack_name}-fs-smart-port.jp" # バケット名
  object_lock_enabled = true                    # オブジェクトをロックするか

  force_destroy = var.force_destroy             # 強制的に削除するか
}

/**
 * FSバケット-暗号化設定
 */
resource "aws_s3_bucket_server_side_encryption_configuration" "fs" {

  bucket = aws_s3_bucket.fs.id                              # バケット
  rule {                                                    # ルール
    bucket_key_enabled = true                               #   暗号化するか
    apply_server_side_encryption_by_default {               #   デフォルト暗号化
      sse_algorithm = "aws:kms"                             #     アルゴリズム
      kms_master_key_id = aws_kms_alias.this.target_key_id  #     暗号化キー
    }
  }
}

/**
 * FSバケット-パブリックアクセスブロック設定
 */
resource "aws_s3_bucket_public_access_block" "fs" {

  bucket = aws_s3_bucket.fs.id    # バケット
  block_public_acls = true        # パブリックACLをブロックするか
  block_public_policy = true      # パブリックアクセスポリシーをブロックするか
  ignore_public_acls = true       # パブリックACLを無視するか
  restrict_public_buckets = true  # バケット公開を制限するか
}

/**
 * FSバケット-ロギング設定
 */
resource "aws_s3_bucket_logging" "fs" {

  bucket = aws_s3_bucket.fs.id          # バケット
  target_bucket = aws_s3_bucket.log.id  # 格納先バケット名
  target_prefix = "fs/"                 # ログファイルのプレフィックス
}
