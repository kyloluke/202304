/**
 * FSバケットサイズアラーム
 */
resource "aws_cloudwatch_metric_alarm" "fs_bucket_size" {

  alarm_name = "${var.stack_name}-fs-bucket-size"         # 名前
  namespace = "AWS/S3"                                    # 名前空間
  metric_name = "BucketSizeBytes"                         # メトリック名
  dimensions = {                                          # ディメンション
    BucketName = aws_s3_bucket.fs.arn,                    #   バケット名
    StorageType = "StandardStorage"                       #   ストレージタイプ NOTE: S3のアラームでは指定する必要がある
  }
  statistic = "Maximum"                                   # 統計
  period = 86400                                          # 期間(s)
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
 * FSバケットオブジェクト数アラーム
 */
resource "aws_cloudwatch_metric_alarm" "fs_bucket_object_count" {

  alarm_name = "${var.stack_name}-fs-bucket-object-count" # 名前
  namespace = "AWS/S3"                                    # 名前空間
  metric_name = "NumberOfObjects"                         # メトリック名
  dimensions = {                                          # ディメンション
    BucketName = aws_s3_bucket.fs.arn,                    #   バケット名
    StorageType = "AllStorageTypes"                       #   ストレージタイプ NOTE: S3のアラームでは指定する必要がある
  }
  statistic = "Maximum"                                   # 統計
  period = 86400                                          # 期間(s)
  comparison_operator = "GreaterThanThreshold"            # 比較操作
  threshold = 1000000                                     # 閾値
  evaluation_periods = 1                                  # 評価データポイント数
  datapoints_to_alarm = 1                                 # アラームデータポイント数
  treat_missing_data = "breaching"                        # 欠落データの扱い
  insufficient_data_actions = [aws_sns_topic.warning.arn] # データ不足時のアクション
  alarm_actions = [aws_sns_topic.warning.arn]             # アラーム時のアクション
  ok_actions = [aws_sns_topic.warning.arn]                # 復旧時のアクション
}
