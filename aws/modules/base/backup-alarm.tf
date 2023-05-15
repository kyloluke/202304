/**
 * APバックアップジョブ失敗数アラーム
 * NOTE: CloudWatchで指定可能な期間が最大1日（86400s）のため完了数の代わりに失敗数を監視する。
 *       バックアッププランが削除されたりした場合に検知できないことに注意。
 */
resource "aws_cloudwatch_metric_alarm" "backup_ap_jobs_failed_count" {

  alarm_name = "${var.stack_name}-backup-ap-jobs-failed-count"  # 名前
  namespace = "AWS/Backup"                                # 名前空間
  metric_name = "NumberOfBackupJobsFailed"                # メトリック名
  dimensions = {                                          # ディメンション
    BackupVaultName = aws_backup_vault.this.id            #   バックアップボールト
    ResourceType = "EC2"                                  #   リソースタイプ
  }
  statistic = "Minimum"                                   # 統計
  period = 86400                                          # 期間(s)
  comparison_operator = "GreaterThanThreshold"            # 比較操作
  threshold = 0                                           # 閾値
  evaluation_periods = 1                                  # 評価データポイント数
  datapoints_to_alarm = 1                                 # アラームデータポイント数
  treat_missing_data = "notBreaching"                     # 欠落データの扱い
  insufficient_data_actions = [aws_sns_topic.warning.arn] # データ不足時のアクション
  alarm_actions = [aws_sns_topic.warning.arn]             # アラーム時のアクション
  ok_actions = [aws_sns_topic.warning.arn]                # 復旧時のアクション
}

/**
 * DBバックアップジョブ完了数アラーム
 */
resource "aws_cloudwatch_metric_alarm" "backup_db_jobs_completed_count" {

  alarm_name = "${var.stack_name}-backup-db-jobs-failed-count"  # 名前
  namespace = "AWS/Backup"                                # 名前空間
  metric_name = "NumberOfBackupJobsCompleted"             # メトリック名
  dimensions = {                                          # ディメンション
    BackupVaultName = aws_backup_vault.this.id            #   バックアップボールト
    ResourceType = "Aurora"                               #   リソースタイプ
  }
  statistic = "Sum"                                       # 統計
  period = 86400                                          # 期間(s)
  comparison_operator = "LessThanThreshold"               # 比較操作
  threshold = 1                                           # 閾値
  evaluation_periods = 1                                  # 評価データポイント数
  datapoints_to_alarm = 1                                 # アラームデータポイント数
  treat_missing_data = "breaching"                        # 欠落データの扱い
  insufficient_data_actions = [aws_sns_topic.warning.arn] # データ不足時のアクション
  alarm_actions = [aws_sns_topic.warning.arn]             # アラーム時のアクション
  ok_actions = [aws_sns_topic.warning.arn]                # 復旧時のアクション
}

/**
 * FSバックアップジョブ完了数アラーム
 */
resource "aws_cloudwatch_metric_alarm" "backup_fs_jobs_completed_count" {

  alarm_name = "${var.stack_name}-backup-fs-jobs-failed-count"  # 名前
  namespace = "AWS/Backup"                                # 名前空間
  metric_name = "NumberOfBackupJobsCompleted"             # メトリック名
  dimensions = {                                          # ディメンション
    BackupVaultName = aws_backup_vault.this.id            #   バックアップボールト
    ResourceType = "S3"                                   #   リソースタイプ
  }
  statistic = "Sum"                                       # 統計
  period = 86400                                          # 期間(s)
  comparison_operator = "LessThanThreshold"               # 比較操作
  threshold = 1                                           # 閾値
  evaluation_periods = 1                                  # 評価データポイント数
  datapoints_to_alarm = 1                                 # アラームデータポイント数
  treat_missing_data = "breaching"                        # 欠落データの扱い
  insufficient_data_actions = [aws_sns_topic.warning.arn] # データ不足時のアクション
  alarm_actions = [aws_sns_topic.warning.arn]             # アラーム時のアクション
  ok_actions = [aws_sns_topic.warning.arn]                # 復旧時のアクション
}
