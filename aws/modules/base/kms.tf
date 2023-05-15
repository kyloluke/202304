/**
 * 暗号化キー
 */
resource "aws_kms_key" "this" {

  customer_master_key_spec = "SYMMETRIC_DEFAULT"  # 仕様
  key_usage = "ENCRYPT_DECRYPT"                   # 用途
  enable_key_rotation = true                      # ローテーション
  deletion_window_in_days = 7                     # 削除保留日数
  policy = data.aws_iam_policy_document.this.json # ポリシー

  tags = {                                        # タグ
    Name = "${var.stack_name}-key"                #   名前
  }
}

/**
 * 暗号化キーポリシードキュメント
 * アカウントルートユーザーによる全ての操作と、構築ユーザーによる管理操作と使用操作、ログサービスによる使用操作を許可する
 */
data "aws_iam_policy_document" "this" {

  version = "2012-10-17"
  statement {
    effect = "Allow"
    principals {
      type = "AWS"
      identifiers = ["arn:aws:iam::${data.aws_caller_identity.current.account_id}:root"]
    }
    actions = [
      "kms:*"
    ]
    resources = [
      "*"
    ]
  }
  statement {
    effect = "Allow"
    principals {
      type = "AWS"
      identifiers = [data.aws_caller_identity.current.arn]
    }
    actions = [
      "kms:Create*",
      "kms:Describe*",
      "kms:Enable*",
      "kms:List*",
      "kms:Put*",
      "kms:Update*",
      "kms:Revoke*",
      "kms:Disable*",
      "kms:Get*",
      "kms:Delete*",
      "kms:TagResourse*",
      "kms:UntagResourse*",
      "kms:ScheduleKeyDeletion",
      "kms:CancelKeyDeletion",

      "kms:Describe*",
      "kms:Encrypt*",
      "kms:Decrypt*",
      "kms:ReEncrypt*",
      "kms:GenerateDataKey*",
    ]
    resources = [
      "*"
    ]
  }
  statement {
    effect = "Allow"
    principals {
      type = "Service"
      identifiers = ["logs.${data.aws_region.current.name}.amazonaws.com"]
    }
    actions = [
      "kms:Describe*",
      "kms:Encrypt*",
      "kms:Decrypt*",
      "kms:ReEncrypt*",
      "kms:GenerateDataKey*"
    ]
    resources = [
      "*"
    ]
  }
}

/**
 * 暗号化キーエイリアス
 */
resource "aws_kms_alias" "this" {

  name = "alias/${var.stack_name}-key"  # 名前 NOTE: alias/から始める制約がある
  target_key_id = aws_kms_key.this.id   # ターゲットキー
}
