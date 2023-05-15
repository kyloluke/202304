/**
 * ALB健全ホスト数アラーム
 */
resource "aws_cloudwatch_metric_alarm" "alb_healthy_host_count" {

  alarm_name = "${var.stack_name}-alb-healthy-host-count" # 名前
  namespace = "AWS/ApplicationELB"                        # 名前空間
  metric_name = "HealthyHostCount"                        # メトリック名
  dimensions = {                                          # ディメンション
    LoadBalancer = aws_alb.this.arn,                      #   ロードバランサー
    TargetGroup = aws_alb_target_group.this.arn           #   ターゲットグループ
  }
  statistic = "Minimum"                                   # 統計
  period = 60                                             # 期間(s)
  comparison_operator = "LessThanThreshold"               # 比較操作
  threshold = 1                                           # 閾値
  evaluation_periods = 2                                  # 評価データポイント数
  datapoints_to_alarm = 2                                 # アラームデータポイント数
  treat_missing_data = "breaching"                        # 欠落データの扱い
  insufficient_data_actions = [aws_sns_topic.warning.arn] # データ不足時のアクション
  alarm_actions = [aws_sns_topic.warning.arn]             # アラーム時のアクション
  ok_actions = [aws_sns_topic.warning.arn]                # 復旧時のアクション
}

/**
 * ALB不健全ホスト数アラーム
 */
resource "aws_cloudwatch_metric_alarm" "alb_unhealthy_host_count" {

  alarm_name = "${var.stack_name}-alb-unhealthy-host-count" # 名前
  namespace = "AWS/ApplicationELB"                        # 名前空間
  metric_name = "UnHealthyHostCount"                      # メトリック名
  dimensions = {                                          # ディメンション
    LoadBalancer = aws_alb.this.arn,                      #   ロードバランサー
    TargetGroup = aws_alb_target_group.this.arn           #   ターゲットグループ
  }
  statistic = "Maximum"                                   # 統計
  period = 60                                             # 期間(s)
  comparison_operator = "GreaterThanThreshold"            # 比較操作
  threshold = 0                                           # 閾値
  evaluation_periods = 2                                  # 評価データポイント数
  datapoints_to_alarm = 2                                 # アラームデータポイント数
  treat_missing_data = "breaching"                        # 欠落データの扱い
  insufficient_data_actions = [aws_sns_topic.warning.arn] # データ不足時のアクション
  alarm_actions = [aws_sns_topic.warning.arn]             # アラーム時のアクション
  ok_actions = [aws_sns_topic.warning.arn]                # 復旧時のアクション
}

/**
 * ALBリクエスト数アラーム
 */
resource "aws_cloudwatch_metric_alarm" "alb_request_count" {

  alarm_name = "${var.stack_name}-alb-request-count"      # 名前
  namespace = "AWS/ApplicationELB"                        # 名前空間
  metric_name = "RequestCount"                            # メトリック名
  dimensions = {                                          # ディメンション
    LoadBalancer = aws_alb.this.arn,                      #   ロードバランサー
    TargetGroup = aws_alb_target_group.this.arn           #   ターゲットグループ
  }
  statistic = "Maximum"                                   # 統計
  period = 60                                             # 期間(s)
  comparison_operator = "GreaterThanThreshold"            # 比較操作
  threshold = 1000                                        # 閾値
  evaluation_periods = 1                                  # 評価データポイント数
  datapoints_to_alarm = 1                                 # アラームデータポイント数
  treat_missing_data = "breaching"                        # 欠落データの扱い
  insufficient_data_actions = [aws_sns_topic.warning.arn] # データ不足時のアクション
  alarm_actions = [aws_sns_topic.warning.arn]             # アラーム時のアクション
  ok_actions = [aws_sns_topic.warning.arn]                # 復旧時のアクション
}

/**
 * ALBターゲット応答時間アラーム
 */
resource "aws_cloudwatch_metric_alarm" "alb_target_response_time" {

  alarm_name = "${var.stack_name}-alb-target-response-time" # 名前
  namespace = "AWS/ApplicationELB"                        # 名前空間
  metric_name = "TargetResponseTime"                      # メトリック名
  dimensions = {                                          # ディメンション
    LoadBalancer = aws_alb.this.arn,                      #   ロードバランサー
    TargetGroup = aws_alb_target_group.this.arn           #   ターゲットグループ
  }
  extended_statistic = "p50.00"                           # 統計
  period = 60                                             # 期間(s)
  comparison_operator = "GreaterThanThreshold"            # 比較操作
  threshold = 10                                          # 閾値
  evaluation_periods = 1                                  # 評価データポイント数
  datapoints_to_alarm = 1                                 # アラームデータポイント数
  treat_missing_data = "ignore"                           # 欠落データの扱い
  insufficient_data_actions = [aws_sns_topic.warning.arn] # データ不足時のアクション
  alarm_actions = [aws_sns_topic.warning.arn]             # アラーム時のアクション
  ok_actions = [aws_sns_topic.warning.arn]                # 復旧時のアクション
}
