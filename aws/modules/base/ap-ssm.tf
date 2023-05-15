/**
 * AP-CloudWatchエージェント設定
 */
resource "aws_ssm_parameter" "cw_agent_config" {

  name = "/${var.stack_name}/cloudwatch-agent/config"             # 名前
  description = "Cloudwatch agent config to configure custom log" # 説明
  type = "String"                                                 # タイプ
  value = file("${path.module}/ap-cw_agent_config.json")          # 値
}
