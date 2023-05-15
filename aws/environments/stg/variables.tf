/**
 * APインスタンス数
 */
variable "ap_instance_count" {
  type = number
}

/**
 * DBインスタンス数
 */
variable "db_instance_count" {
  type = number
}

/**
 * サーバー証明書
 */
variable "server_cert_id" {
  type = string
}

/**
 * SES送信元アイデンティティ
 */
variable "ses_sender_identity" {
  type = string
}

/**
 * SNSトピック購読メールアドレス
 */
variable "sns_subsc_email" {
  type = string
}
