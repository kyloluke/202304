/**
 * DBクラスター
 */
resource "aws_rds_cluster" "this" {

  cluster_identifier = "${var.stack_name}-db-cluster"         # クラスターID
  db_cluster_parameter_group_name = aws_rds_cluster_parameter_group.this.id  # クラスターパラメーターグループ名
  engine = "aurora-postgresql"                                # エンジン
  engine_mode = "provisioned"                                 # エンジンモード
  engine_version = "14"                                       # エンジンバージョン
  storage_encrypted = true                                    # 暗号化
  kms_key_id = aws_kms_alias.this.target_key_arn              # 暗号化キー
  database_name = "lp3"                                       # DB名
  manage_master_user_password = true                          # マスターユーザーパスワードをSecretsManager上で管理するか
  master_username = "dbadmin"                                 # マスターユーザー名
  iam_database_authentication_enabled = true                  # IAM認証を有効にするか
  availability_zones = [                                      # アベイラビリティゾーン
    data.aws_availability_zones.current.names[0]
  ]
  db_subnet_group_name = aws_db_subnet_group.this.id          # サブネットグループ
  vpc_security_group_ids = [                                  # セキュリティグループID
    aws_security_group.db.id
  ]
  enabled_cloudwatch_logs_exports = ["postgresql"]            # ログエクスポート設定
  preferred_backup_window = "15:00-16:00"                     # 推奨バックアップウィンドウ
  preferred_maintenance_window = "Fri:19:00-Fri:20:00"        # 推奨メンテナンスウィンドウ

  skip_final_snapshot = var.force_destroy                     # 削除時のスナップショット取得をスキップするか
  apply_immediately = var.force_destroy                       # 変更を即時反映するか
  lifecycle {                                                 # ライフサイクルルール
    ignore_changes = [availability_zones, kms_key_id]         #   変更を無視するプロパティ
  }
}

/**
 * DBクラスターパラメーターグループ
 */
resource "aws_rds_cluster_parameter_group" "this" {

  name = "${var.stack_name}-db-cluster-parameter-group" # 名前
  family = "aurora-postgresql14"                        # ファミリー
  parameter {                                           # デッドロック状態のチェック開始までの時間(s)
    name = "deadlock_timeout"
    value = 10
  }
}

/**
 * DBサブネットグループ
 */
resource "aws_db_subnet_group" "this" {

  name = "${var.stack_name}-db-subnet-group"  # 名前
  subnet_ids = aws_subnet.private.*.id        # サブネット
}

/**
 * DBインスタンス
 */
resource "aws_rds_cluster_instance" "db" {
  count = var.db_instance_count

  availability_zone = data.aws_availability_zones.current.names[count.index]  # アベイラビリティゾーン
  cluster_identifier = aws_rds_cluster.this.id                            # DBクラスターID
  identifier = format("%s-db-instance%02d", var.stack_name, count.index)  # DBインスタンスID
  instance_class = "db.t3.medium"                                         # DBインスタンスクラス
  engine = "aurora-postgresql"                                            # エンジン
  db_parameter_group_name = aws_db_parameter_group.this.id                # パラメーターグループ名
  monitoring_interval = 60                                                # モニタリング間隔(s)
  monitoring_role_arn = aws_iam_role.db_monitoring.arn                    # モニタリング用ロールのARN
}

/**
 * DBパラメーターグループ
 */
resource "aws_db_parameter_group" "this" {

  name = "${var.stack_name}-db-parameter-group" # 名前
  family = "aurora-postgresql14"                # ファミリー
}
