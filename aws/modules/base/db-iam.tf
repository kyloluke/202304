/**
 * DBモニタリングロール
 */
resource "aws_iam_role" "db_monitoring" {

  name = "${var.stack_name}-DBEnhancedMonitoringRole"                                   # 名前
  assume_role_policy = data.aws_iam_policy_document.db_monitoring_role_assume_role.json # ロール引き受けポリシー
  managed_policy_arns = [                                                               # マネージドポリシー
    "arn:aws:iam::aws:policy/service-role/AmazonRDSEnhancedMonitoringRole"              #   RDS拡張モニタリングロール
  ]
}

/**
 * DBモニタリングロール-ロール引き受けポリシードキュメント
 * RDSモニタリングサービスによるロールの引き受け（DBモニタリングロールの権限を一時的に獲得するアクション）を許可する
 */
data "aws_iam_policy_document" "db_monitoring_role_assume_role" {

  version = "2012-10-17"
  statement {
    effect = "Allow"
    principals {
      type = "Service"
      identifiers = [
        "monitoring.rds.amazonaws.com"
      ]
    }
    actions = [
      "sts:AssumeRole"
    ]
  }
}
