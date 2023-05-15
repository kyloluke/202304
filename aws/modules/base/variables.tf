/**
 * スタック名
 */
variable "stack_name" {
  type = string
  description = "Stack name to create. e.g. 'lp3-stack'"
}

/**
 * リソースを強制的に削除するか(削除時)
 */
variable "force_destroy" {
  type = bool
  description = "Force destroy resources."
}

/**
 * APで使用するAMI
 */
variable "ap_ami" {
  type = string
  description = "AMI to create AP instance."
  default = "ami-079a2a9ac6ed876fc" # Amazon Linux 2023 AMI  (64-bit (x86), uefi-preferred)
}

/**
 * APインスタンス数
 */
variable "ap_instance_count" {
  type = number
  description = "AP instance count."
}

/**
 * DBインスタンス数
 */
variable "db_instance_count" {
  type = number
  description = "DB instance count."
}

/**
 * サーバー証明書
 */
variable "server_cert_id" {
  type = string
  description = "SSL certificate ID."
}

/**
 * WAF通信許可IPアドレス
 */
variable waf_allow_ip_addresses {
  type = set(string)
  description = "IP addresses to allow access."
  default = [
    "133.114.248.113/32", # SYNC 福岡オフィス
    "39.110.214.79/32",   # SYNC 東京本社
    "61.194.69.153/32",   # 東京サテライトオフィス
    "203.114.51.174/32",  # AVANTE 本社
    "203.114.51.178/32",  # AVANTE 本社(アルテリア回線)
    "221.241.111.114/32"  # AVANTE SIDE 1
  ]
}

/**
 * SES送信元アイデンティティ
 */
variable "ses_sender_identity" {
  type = string
  description = "SES identity to send system mails."
}

/**
 * SNSトピック購読メールアドレス
 */
variable "sns_subsc_email" {
  type = string
  description = "Email address to subscribe SNS topic."
}

#--------------------------------
# アプリケーション
#--------------------------------
# アプリケーション-バックオフィスサイトURIパターン
/* AppBackOfficeSiteUriPattern:
  Type: String
  Description: "URI path pattern for backoffice site."
  Default: "^/(api/v1/)?backoffice/.*"
*/
# アプリケーション-バックオフィスサイトアクセス許可IPアドレスリスト
/* AppBackOfficeIPAddresses:
  Type: CommaDelimitedList
  Description: "IP addresses to allow access to back office site."
  Default: "221.242.113.210/32"
*/
# アプリケーションバックオフィスサイト管理用アクセス許可IPアドレスリスト
/* AppMngBackOfficeIPAddresses:
  Type: CommaDelimitedList
  Description: "IP addresses to allow access to manage back office site."
  Default: "203.114.51.174/32,203.114.51.178/32"
*/
# アプリケーション-提携先サイトURIパターン
/* AppPartnerSiteUriPattern:
  Type: String
  Description: "URI path pattern for partner site."
  Default: "^/(api/v1/)?partner/.*"
*/
# アプリケーション-提携先サイトログインURIパス
/* AppPartnerSiteLoginUriPath:
  Type: String
  Description: "URI path for login to partner site."
  Default: "https://bank.ma-cp.com/partner/#/auth/login"
*/
# アプリケーション-LINE WORKSコールバックURIパターン
/* AppLineWorksCallbackUriPattern:
  Type: String
  Description: "URI path pattern for callback from LINE WORKS."
  Default: "^/api/v1/external/lineworks/.*"
*/
# アプリケーション-ファイルアップロードURIパターン
# AppFileUploadUriPattern:
#  Type: String
#  Description: "URI path pattern for file upload request."
#  Default: "^/api/v1/backoffice/seller-deal/.*/non-name-sheet"

/**
 * アプリケーションヘルスチェックURIパス
 */
variable app_health_check_uri_path {
  type = string
  description = "URI path for health check."
  default = "/api/v1/external/health-check"
}

# AdminerサイトURIパターン
/* AdminerSiteUriPattern:
  Type: String
  Description: "URI path pattern for Adminer site."
  Default: "^/adminer\\.php"
*/

/**
 * AdminerヘルスチェックURIパス
 */
variable adminer_health_check_uri_path {
  type = string
  description = "URI path for Adminer health check."
  default = "/adminer.php"
}
