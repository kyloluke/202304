/**
 * 基盤モジュール
 */
module "base" {
  source = "../../modules/base"                 # ソース
  stack_name = "lp3-dev"                        # スタック名
  force_destroy = true                          # リソースを強制的に削除するか
  ap_instance_count = var.ap_instance_count     # @see variables.tf
  db_instance_count = var.db_instance_count     # @see variables.tf
  server_cert_id = var.server_cert_id           # @see variables.tf
  ses_sender_identity = var.ses_sender_identity # @see variables.tf
  sns_subsc_email = var.sns_subsc_email         # @see variables.tf
}
