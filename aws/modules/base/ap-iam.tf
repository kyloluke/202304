/**
 * APインスタンスプロファイル
 */
resource "aws_iam_instance_profile" "ap" {

  name = "${var.stack_name}-ap-instance-profile"  # 名前
  role = aws_iam_role.ap.id                       # ロール
}

/**
 * APロール
 */
resource "aws_iam_role" "ap" {

  name = "${var.stack_name}-ap-role"                                          # 名前
  assume_role_policy = data.aws_iam_policy_document.ap_role_assume_role.json  # ロール引き受けポリシー
  managed_policy_arns = [                                                     # マネージドポリシー
    "arn:aws:iam::aws:policy/AmazonSSMManagedInstanceCore",                   #   SSM管理アクセスポリシー
    "arn:aws:iam::aws:policy/CloudWatchAgentServerPolicy",                    #   CloudWatchエージェントサーバーアクセスポリシー
    aws_iam_policy.key_access.arn,                                            #   暗号化キーアクセスポリシー
    aws_iam_policy.cwlogs_access_policy.arn,                                  #   CloudWatchLogsアクセスポリシー
    aws_iam_policy.fs_bucket_access.arn,                                      #   FSバケットアクセスポリシー
    aws_iam_policy.ses_send_email.arn                                         #   SESメール送信ポリシー
  ]
}

/**
 * APロール-ロール引き受けポリシードキュメント
 * EC2サービスによるロールの引き受け（APロールの権限を一時的に獲得するアクション）を許可する
 */
data "aws_iam_policy_document" "ap_role_assume_role" {

  version = "2012-10-17"
  statement {
    effect = "Allow"
    principals {
      type = "Service"
      identifiers = [
        "ec2.amazonaws.com"
      ]
    }
    actions = [
      "sts:AssumeRole"
    ]
  }
}
