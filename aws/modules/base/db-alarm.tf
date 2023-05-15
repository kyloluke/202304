/**
 * DBクラスター使用容量アラーム
 */
resource "aws_cloudwatch_metric_alarm" "db_cluster_volume_bytes_used" {

  alarm_name = "${var.stack_name}-db-cluster-volume-bytes-used" # 名前
  namespace = "AWS/RDS"                                   # 名前空間
  metric_name = "VolumeBytesUsed"                         # メトリック名
  dimensions = {                                          # ディメンション
    DBClusterIdentifier = aws_rds_cluster.this.id         #   DBクラスターID
  }
  statistic = "Average"                                   # 統計
  period = 3600                                           # 期間(s)
  comparison_operator = "GreaterThanThreshold"            # 比較操作
  threshold = 34359738368                                 # 閾値
  evaluation_periods = 1                                  # 評価データポイント数
  datapoints_to_alarm = 1                                 # アラームデータポイント数
  treat_missing_data = "breaching"                        # 欠落データの扱い
  insufficient_data_actions = [aws_sns_topic.warning.arn] # データ不足時のアクション
  alarm_actions = [aws_sns_topic.warning.arn]             # アラーム時のアクション
  ok_actions = [aws_sns_topic.warning.arn]                # 復旧時のアクション
}

/**
 * DBインスタンスCPU使用率アラーム
 */
resource "aws_cloudwatch_metric_alarm" "db_instance_cpu_utilization" {
  count = length(aws_rds_cluster_instance.db)

  alarm_name = format("%s-db-instance%02d-cpu-utilization", var.stack_name, count.index)  # 名前
  namespace = "AWS/RDS"                                   # 名前空間
  metric_name = "CPUUtilization"                          # メトリック名
  dimensions = {                                          # ディメンション
    DBInstanceIdentifier = aws_rds_cluster_instance.db[count.index].id  #   DBインスタンスID
  }
  statistic = "Average"                                   # 統計
  period = 60                                             # 期間(s)
  comparison_operator = "GreaterThanThreshold"            # 比較操作
  threshold = 80                                          # 閾値
  evaluation_periods = 1                                  # 評価データポイント数
  datapoints_to_alarm = 1                                 # アラームデータポイント数
  treat_missing_data = "breaching"                        # 欠落データの扱い
  insufficient_data_actions = [aws_sns_topic.warning.arn] # データ不足時のアクション
  alarm_actions = [aws_sns_topic.warning.arn]             # アラーム時のアクション
  ok_actions = [aws_sns_topic.warning.arn]                # 復旧時のアクション
}

/**
 * DBインスタンス空きメモリアラーム
 */
resource "aws_cloudwatch_metric_alarm" "db_instance_freeable_memory" {
  count = length(aws_rds_cluster_instance.db)

  alarm_name = format("%s-db-instance%02d-freeable-memory", var.stack_name, count.index)  # 名前
  namespace = "AWS/RDS"                                   # 名前空間
  metric_name = "FreeableMemory"                          # メトリック名
  dimensions = {                                          # ディメンション
    DBInstanceIdentifier = aws_rds_cluster_instance.db[count.index].id  #   DBインスタンスID
  }
  statistic = "Average"                                   # 統計
  period = 60                                             # 期間(s)
  comparison_operator = "LessThanThreshold"               # 比較操作
  threshold = 128                                         # 閾値
  evaluation_periods = 1                                  # 評価データポイント数
  datapoints_to_alarm = 1                                 # アラームデータポイント数
  treat_missing_data = "breaching"                        # 欠落データの扱い
  insufficient_data_actions = [aws_sns_topic.warning.arn] # データ不足時のアクション
  alarm_actions = [aws_sns_topic.warning.arn]             # アラーム時のアクション
  ok_actions = [aws_sns_topic.warning.arn]                # 復旧時のアクション
}

/**
 * DBインスタンスコネクション数アラーム
 */
resource "aws_cloudwatch_metric_alarm" "db_instance_connections" {
  count = length(aws_rds_cluster_instance.db)

  alarm_name = format("%s-db-instance%02d-connections", var.stack_name, count.index)  # 名前
  namespace = "AWS/RDS"                                   # 名前空間
  metric_name = "DatabaseConnections"                     # メトリック名
  dimensions = {                                          # ディメンション
    DBInstanceIdentifier = aws_rds_cluster_instance.db[count.index].id  #   DBインスタンスID
  }
  statistic = "Maximum"                                   # 統計
  period = 60                                             # 期間(s)
  comparison_operator = "GreaterThanThreshold"            # 比較操作
  threshold = 100                                         # 閾値
  evaluation_periods = 1                                  # 評価データポイント数
  datapoints_to_alarm = 1                                 # アラームデータポイント数
  treat_missing_data = "breaching"                        # 欠落データの扱い
  insufficient_data_actions = [aws_sns_topic.warning.arn] # データ不足時のアクション
  alarm_actions = [aws_sns_topic.warning.arn]             # アラーム時のアクション
  ok_actions = [aws_sns_topic.warning.arn]                # 復旧時のアクション
}
