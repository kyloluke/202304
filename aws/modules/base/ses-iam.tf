/**
 * SESメール送信ポリシー
 */
resource "aws_iam_policy" "ses_send_email" {

  name = "${var.stack_name}-ses-send-email-policy"          # 名前
  policy = data.aws_iam_policy_document.ses_send_email.json # ポリシー
}

/**
 * SESメール送信ポリシードキュメント
 * メールの送信操作を許可する
 */
data "aws_iam_policy_document" "ses_send_email" {

  version = "2012-10-17"
  statement {
    effect = "Allow"
    actions = [
      "ses:SendEmail",
      "ses:SendRawEmail"
    ]
    resources = [
      "arn:aws:ses:ap-northeast-1:016431353867:identity/${var.ses_sender_identity}",
      aws_ses_configuration_set.this.arn
    ]
  }
}
