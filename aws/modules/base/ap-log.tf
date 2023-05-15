/**
 * APロググループ
 */
resource "aws_cloudwatch_log_group" "ap" {

  name = "${var.stack_name}-ap-log-group"         # 名前
  kms_key_id = aws_kms_alias.this.target_key_arn  # 暗号化キー
  retention_in_days = 30                          # 保持日数
}

/**
 * APログストリーム
 */
resource "aws_cloudwatch_log_stream" "ap" {
  count = length(aws_instance.ap)

  log_group_name = aws_cloudwatch_log_group.ap.id # ロググループ
  name = aws_instance.ap[count.index].id          # 名前
}

// TODO KinesisでS3のログバケットに転送する
