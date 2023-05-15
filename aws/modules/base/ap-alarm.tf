/**
 * APインスタンスシステムステータスチェック失敗アラーム
 */
resource "aws_cloudwatch_metric_alarm" "ap_instance_status_check_failed_system" {
  count = length(aws_instance.ap)

  alarm_name = format("%s-ap-instance%02d-status-check-failed-system", var.stack_name, count.index)  # 名前
  namespace = "AWS/EC2"                                   # 名前空間
  metric_name = "StatusCheckFailed_System"                # メトリック名
  dimensions = {                                          # ディメンション
    InstanceId = aws_instance.ap[count.index].id          #   インスタンスID
  }
  statistic = "Minimum"                                   # 統計
  period = 60                                             # 期間(s)
  comparison_operator = "GreaterThanThreshold"            # 比較操作
  threshold = 0                                           # 閾値
  evaluation_periods = 2                                  # 評価データポイント数
  datapoints_to_alarm = 2                                 # アラームデータポイント数
  treat_missing_data = "breaching"                        # 欠落データの扱い
  insufficient_data_actions = [aws_sns_topic.warning.arn] # データ不足時のアクション
  alarm_actions = [                                       # アラーム時のアクション
    aws_sns_topic.warning.arn,                            #   SNSトピック
    "arn:aws:automate:${data.aws_region.current.name}:ec2:recover"  #   リカバリー
  ]
  ok_actions = [aws_sns_topic.warning.arn]                # 復旧時のアクション
}

/**
 * APインスタンスステータスチェック失敗アラーム
 */
resource "aws_cloudwatch_metric_alarm" "ap_instance_status_check_failed" {
  count = length(aws_instance.ap)

  alarm_name = format("%s-ap-instance%02d-status-check-failed", var.stack_name, count.index)  # 名前
  namespace = "AWS/EC2"                                   # 名前空間
  metric_name = "StatusCheckFailed_Instance"              # メトリック名
  dimensions = {                                          # ディメンション
    InstanceId = aws_instance.ap[count.index].id          #   インスタンスID
  }
  statistic = "Minimum"                                   # 統計
  period = 60                                             # 期間(s)
  comparison_operator = "GreaterThanThreshold"            # 比較操作
  threshold = 0                                           # 閾値
  evaluation_periods = 2                                  # 評価データポイント数
  datapoints_to_alarm = 2                                 # アラームデータポイント数
  treat_missing_data = "breaching"                        # 欠落データの扱い
  insufficient_data_actions = [aws_sns_topic.warning.arn] # データ不足時のアクション
  alarm_actions = [                                       # アラーム時のアクション
    aws_sns_topic.warning.arn,                            #   SNSトピック
    "arn:aws:swf:${data.aws_region.current.name}:${data.aws_caller_identity.current.account_id}:action/actions/AWS_EC2.InstanceId.Reboot/1.0"  #   再起動
  ]
  ok_actions = [aws_sns_topic.warning.arn]                # 復旧時のアクション
}

/**
 * APインスタンスCPU使用率アラーム
 */
resource "aws_cloudwatch_metric_alarm" "ap_instance_cpu_utilization" {
  count = length(aws_instance.ap)

  alarm_name = format("%s-ap-instance%02d-cpu_utilization", var.stack_name, count.index)  # 名前
  namespace = "AWS/EC2"                                   # 名前空間
  metric_name = "CPUUtilization"                          # メトリック名
  dimensions = {                                          # ディメンション
    InstanceId = aws_instance.ap[count.index].id          #   インスタンスID
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
 * APインスタンスメモリ使用率アラーム
 */
resource "aws_cloudwatch_metric_alarm" "ap_instance_memory_utilization" {
  count = length(aws_instance.ap)

  alarm_name = format("%s-ap-instance%02d-memory_utilization", var.stack_name, count.index) # 名前
  namespace = "CWAgent"                                   # 名前空間
  metric_name = "mem_used_percent"                        # メトリック名
  dimensions = {                                          # ディメンション
    InstanceId = aws_instance.ap[count.index].id          #   インスタンスID
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
 * APインスタンスディスク使用率アラーム
 */
resource "aws_cloudwatch_metric_alarm" "ap_instance_disk_used_percent" {
  count = length(aws_instance.ap)

  alarm_name = format("%s-ap-instance%02d-disk-used-percent", var.stack_name, count.index)  # 名前
  namespace = "CWAgent"                                   # 名前空間
  metric_name = "disk_used_percent"                       # メトリック名
  dimensions = {                                          # ディメンション
    InstanceId = aws_instance.ap[count.index].id          #   インスタンスID
  }
  statistic = "Average"                                   # 統計
  period = 60                                             # 期間(s)
  comparison_operator = "GreaterThanThreshold"            # 比較操作
  threshold = 70                                          # 閾値
  evaluation_periods = 1                                  # 評価データポイント数
  datapoints_to_alarm = 1                                 # アラームデータポイント数
  treat_missing_data = "breaching"                        # 欠落データの扱い
  insufficient_data_actions = [aws_sns_topic.warning.arn] # データ不足時のアクション
  alarm_actions = [aws_sns_topic.warning.arn]             # アラーム時のアクション
  ok_actions = [aws_sns_topic.warning.arn]                # 復旧時のアクション
}

/**
 * APインスタンススワップ使用率アラーム
 */
resource "aws_cloudwatch_metric_alarm" "ap_instance_swap_used_percent" {
  count = length(aws_instance.ap)

  alarm_name = format("%s-ap-instance%02d-swap-used-percent", var.stack_name, count.index)  # 名前
  namespace = "CWAgent"                                   # 名前空間
  metric_name = "swap_used_percent"                       # メトリック名
  dimensions = {                                          # ディメンション
    InstanceId = aws_instance.ap[count.index].id          #   インスタンスID
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
 * APインスタンスLaravelログアラーム
 */
resource "aws_cloudwatch_metric_alarm" "ap_instance_laravel_log" {
  count = length(aws_instance.ap)

  alarm_name = format("%s-ap-instance%02d-laravel-log", var.stack_name, count.index)  # 名前
  namespace = "CWAgent"                                   # 名前空間
  metric_name = "${data.aws_region.current.name}-ap-instance${count.index}-laravel-log"  # メトリック名 TODO 正しいか確認する
  statistic = "Maximum"                                   # 統計
  period = 60                                             # 期間(s)
  comparison_operator = "GreaterThanThreshold"            # 比較操作
  threshold = 0                                           # 閾値
  evaluation_periods = 1                                  # 評価データポイント数
  datapoints_to_alarm = 1                                 # アラームデータポイント数
  treat_missing_data = "notBreaching"                     # 欠落データの扱い
  insufficient_data_actions = [aws_sns_topic.warning.arn] # データ不足時のアクション
  alarm_actions = [aws_sns_topic.warning.arn]             # アラーム時のアクション
  ok_actions = [aws_sns_topic.warning.arn]                # 復旧時のアクション
}
