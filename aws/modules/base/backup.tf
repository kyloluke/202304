/**
 * バックアップボールト
 */
resource "aws_backup_vault" "this" {

  name = "${var.stack_name}-backup-vault"         # 名前
  kms_key_arn = aws_kms_alias.this.target_key_arn # 暗号化キー
}

/**
 * バックアップボールト-通知設定
 */
resource "aws_backup_vault_notifications" "this" {

  backup_vault_name = aws_backup_vault.this.id  # バックアップボールト
  backup_vault_events = [                       # イベント
    "BACKUP_JOB_STARTED",
    "BACKUP_JOB_COMPLETED",
    "COPY_JOB_FAILED",
    "COPY_JOB_SUCCESSFUL",
    "COPY_JOB_FAILED",
    "RESTORE_JOB_STARTED",
    "RESTORE_JOB_COMPLETED",
    "RECOVERY_POINT_MODIFIED",
    "S3_BACKUP_OBJECT_FAILED",
    "S3_RESTORE_OBJECT_FAILED"
  ]
  sns_topic_arn = aws_sns_topic.info.arn      # 通知先SNSトピック
}

/**
 * 日次バックアッププラン
 */
resource "aws_backup_plan" "daily" {

  name = "${var.stack_name}-daily-backup-plan"    # 名前
  rule {                                          # ルール
    rule_name = "daily-backup-rule"               #   ルール名
    target_vault_name = aws_backup_vault.this.id  #   ターゲットボールト
    schedule = "cron(0 15 * * ? *)"               #   スケジュール式
    start_window = 60                             #   開始ウィンドウ(min)
    completion_window = 120                       #   完了ウィンドウ(min)
    enable_continuous_backup = false              #   継続的なバックアップを行うか

    lifecycle {                                   #   ライフサイクル設定
      cold_storage_after = 100                    #     コールドストレージへの移動日数
    }
  }
}

/**
 * 月次バックアッププラン
 */
resource "aws_backup_plan" "monthly" {

  name = "${var.stack_name}-monthly-backup-plan"  # 名前
  rule {                                          # ルール
    rule_name = "monthly-backup-rule"             #   ルール名
    target_vault_name = aws_backup_vault.this.id  #   ターゲットボールト
    schedule = "cron(0 15 1 * ? *)"               #   スケジュール式
    start_window = 60                             #   開始ウィンドウ(min)
    completion_window = 120                       #   完了ウィンドウ(min)
    enable_continuous_backup = false              #   継続的なバックアップを行うか

    lifecycle {                                   #   ライフサイクル設定
      cold_storage_after = 100                    #     コールドストレージへの移動日数
    }
  }
}

/**
 * AP用バックアップセレクション
 */
resource "aws_backup_selection" "ap" {

  plan_id = aws_backup_plan.monthly.id            # プラン
  name = "${var.stack_name}-ap-backup-selection"  # 名前
  resources = aws_instance.ap.*.arn               # リソース
  iam_role_arn = "arn:aws:iam::${data.aws_caller_identity.current.account_id}:role/service-role/AWSBackupDefaultServiceRole"  # IAMロールARN NOTE:アカウントの初期状態では存在しないため、手動でオンデマンドバックアップを実行するなどで作成する必要がある
}

/**
 * DB用バックアップセレクション
 */
resource "aws_backup_selection" "db" {

  plan_id = aws_backup_plan.daily.id              # プラン
  name = "${var.stack_name}-db-backup-selection"  # 名前
  resources = [aws_rds_cluster.this.arn]          # リソース
  iam_role_arn = "arn:aws:iam::${data.aws_caller_identity.current.account_id}:role/service-role/AWSBackupDefaultServiceRole"  # IAMロールARN NOTE:アカウントの初期状態では存在しないため、手動でオンデマンドバックアップを実行するなどで作成する必要がある
}

/**
 * FS用バックアップセレクション
 */
resource "aws_backup_selection" "fs" {

  plan_id = aws_backup_plan.daily.id              # プラン
  name = "${var.stack_name}-fs-backup-selection"  # 名前
  resources = [aws_s3_bucket.fs.arn]              # リソース
  iam_role_arn = "arn:aws:iam::${data.aws_caller_identity.current.account_id}:role/service-role/AWSBackupDefaultServiceRole"  # IAMロールARN NOTE:アカウントの初期状態では存在しないため、手動でオンデマンドバックアップを実行するなどで作成する必要がある
}
