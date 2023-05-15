/**
 * CloudWatchLogsアクセスポリシー
 */
resource "aws_iam_policy" "cwlogs_access_policy" {
  name = "${var.stack_name}-cwlogs-access-policy"                 # 名前
  policy = data.aws_iam_policy_document.cwlogs_access_policy.json # ポリシー
}

/**
 * CloudWatchLogsアクセスポリシードキュメント
 * ログの作成操作とログ書き込み操作を許可する
 */
data "aws_iam_policy_document" "cwlogs_access_policy" {

  version = "2012-10-17"
  statement {
    effect = "Allow"
    actions = [
      "logs:PutLogEvents",
      "logs:DescribeLogStreams"
    ]
    resources = [
      "*"
    ]
  }
}