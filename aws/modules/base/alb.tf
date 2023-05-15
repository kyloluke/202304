/**
 * ALB
 */
resource "aws_alb" "this" {

  name = "${var.stack_name}-alb"      # 名前
  load_balancer_type = "application"  # タイプ
  ip_address_type = "ipv4"            # IPアドレスタイプ
  subnets = aws_subnet.public.*.id    # サブネット
  security_groups = [                 # セキュリティグループ
    aws_security_group.alb.id,
    aws_security_group.alb_mng.id
  ]
  access_logs {                       # アクセスログ
    enabled = true                    #   有効か
    bucket = aws_s3_bucket.log.id     #   バケット
  }
}

/**
 * ALB-HTTPSリスナー
 */
resource "aws_alb_listener" "https" {

  load_balancer_arn = aws_alb.this.arn                # ロードバランサー
  protocol          = "HTTPS"                                  # プロトコル
  port              = 443                                          # ポート
  default_action {
    # デフォルトアクション
    type             = "forward"                                  #   タイプ
    target_group_arn = aws_alb_target_group.this.arn  #   ターゲットグループ
  }
  certificate_arn = "arn:aws:acm:${data.aws_region.current.name}:${data.aws_caller_identity.current.account_id}:certificate/${var.server_cert_id}"  # 証明書
}

/**
 * ALB-HTTPリスナー
 */
resource "aws_alb_listener" "http" {

  load_balancer_arn = aws_alb.this.arn  # ロードバランサー
  protocol = "HTTP"                     # プロトコル
  port = 80                             # ポート
  default_action {                      # デフォルトアクション
    type = "redirect"                   #   タイプ
    redirect {                          #   リダイレクト
      host = "#{host}"                  #     ホスト
      path = "/#{path}"                 #     パス
      port = 443                        #     ポート
      protocol = "HTTPS"                #      プロトコル
      query = "#{query}"                #     クエリ
      status_code = "HTTP_301"          #     ステータスコード
    }
  }
}

/**
 * ALBターゲットグループ
 */
resource "aws_alb_target_group" "this" {

  name = "${var.stack_name}-alb-target-group" # 名前
  vpc_id = aws_vpc.this.id                    # VPC
  target_type = "instance"                    # ターゲットタイプ
  port = 80                                   # ポート
  protocol = "HTTP"                           # プロトコル
  protocol_version = "HTTP1"                  # プロトコルバージョン
  stickiness {                                # スティックネス
    enabled = true                            #   有効か
    type = "app_cookie"                       #   タイプ
    cookie_name = "laravel_session"           #   スティックネスクッキー名
  }
  health_check {                              # ヘルスチェック
    enabled = true                            #   有効か
    interval = 30                             #   間隔
    path = var.app_health_check_uri_path          #   パス
    port = "80"                               #   ポート
    protocol = "HTTP"                         #   プロトコル
    matcher = 200                             #   マッチャー
    timeout = 10                              #   タイムアウト秒数
    healthy_threshold = 3                     #   Healthy判断閾値
    unhealthy_threshold = 5                   #   Unhealthy判断閾値
  }
}

/**
 * ALBターゲットグループアタッチメント
 */
resource "aws_alb_target_group_attachment" "ap" {
  count = length(aws_instance.ap)

  target_group_arn = aws_alb_target_group.this.arn  # ターゲットグループ
  target_id = aws_instance.ap[count.index].id       # ターゲット
  port = 80                                         #   ポート
}

/**
 * ALB管理用HTTPSリスナー
 */
resource "aws_alb_listener" "mng_https" {

  load_balancer_arn = aws_alb.this.arn              # ロードバランサー
  protocol = "HTTPS"                                # プロトコル
  port = 8443                                       # ポート
  default_action {                                  # デフォルトアクション
    type = "forward"                                #   タイプ
    target_group_arn = aws_alb_target_group.mng.arn # ターゲットグループ
  }
  certificate_arn = "arn:aws:acm:${data.aws_region.current.name}:${data.aws_caller_identity.current.account_id}:certificate/${var.server_cert_id}"  # 証明書
}

/**
 * ALB管理用ターゲットグループ
 */
resource "aws_alb_target_group" "mng" {

  name = "${var.stack_name}-alb-mng-target-group" # 名前
  vpc_id = aws_vpc.this.id                        # VPC
  port = 8080                                     # ポート
  protocol = "HTTP"                               # プロトコル
  protocol_version = "HTTP1"                      # プロトコルバージョン
  target_type = "instance"                        # ターゲットタイプ
  health_check {                                  # ヘルスチェック
    enabled = true                                #   有効か
    interval = 30                                 #   間隔
    path = var.adminer_health_check_uri_path          #   パス
    port = "8080"                                 #   ポート
    protocol = "HTTP"                             #   プロトコル
    matcher = 200                                 #   マッチャー
    timeout = 10                                  #   タイムアウト秒数
    healthy_threshold = 3                         #   Healthy判断閾値
    unhealthy_threshold =  5                      #   Unhealthy判断閾値
  }
}

/**
 * ALB管理用ターゲットグループアタッチメント
 */
resource "aws_alb_target_group_attachment" "mng_ap" {
  count = length(aws_instance.ap)

  target_group_arn = aws_alb_target_group.mng.arn # ターゲットグループ
  target_id = aws_instance.ap[count.index].id     # ターゲット
  port = 8080                                     # ポート
}
