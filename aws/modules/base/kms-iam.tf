/**
 * 暗号化キーアクセスポリシー
 */
resource "aws_iam_policy" "key_access" {

  name = "${var.stack_name}-key-access-policy"          # 名前
  policy = data.aws_iam_policy_document.key_access.json # ポリシー
}

/**
 * 暗号化キーアクセスポリシードキュメント
 * 暗号化キーの使用とデータキーの生成を許可する
 */
data "aws_iam_policy_document" "key_access" {

  version = "2012-10-17"
  statement {
    effect = "Allow"
    actions = [
      "kms:DescribeKey",
      "kms:Encrypt",
      "kms:Decrypt",
      "kms:ReEncrypt*",
      "kms:GenerateDataKey",
      "kms:GenerateDataKeyWithoutPlaintext"
    ]
    resources = [
      aws_kms_key.this.arn
    ]
  }
}
