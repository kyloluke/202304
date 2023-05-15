/**
 * WAFブロックリクエスト数アラーム
 */
resource "aws_cloudwatch_metric_alarm" "waf_blocked_requests" {

  alarm_name = "${var.stack_name}-waf-blocked-requests"   # 名前
  namespace = "AWS/WAFV2"                                 # 名前空間
  metric_name = "BlockedRequests"                         # メトリック名
  dimensions = {                                          # ディメンション
    WebACL = aws_wafv2_web_acl.this.name                  #   WebACL名
    Region = data.aws_region.current.name                 #   リージョン
    Rule = "ALL"                                          #   ルール
  }
  statistic = "Sum"                                       # 統計
  period = 3600                                           # 期間(s)
  comparison_operator = "GreaterThanThreshold"            # 比較操作
  threshold = 1000                                        # 閾値
  evaluation_periods = 1                                  # 評価データポイント数
  datapoints_to_alarm = 1                                 # アラームデータポイント数
  treat_missing_data = "breaching"                        # 欠落データの扱い
  insufficient_data_actions = [aws_sns_topic.warning.arn] # データ不足時のアクション
  alarm_actions = [aws_sns_topic.warning.arn]             # アラーム時のアクション
  ok_actions = [aws_sns_topic.warning.arn]                # 復旧時のアクション
}
