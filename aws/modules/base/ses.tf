/**
 * SES識別子
 * ATTENTION メールアドレス検証がありリソース削除時のリスクが大きいためスタック管理外とする
 */
/* resource "aws_ses_email_identity" "sender" {
  email = var.ses_identity_email
}*/

/*
# SESIdentity:
#   Type: AWS::SES::EmailIdentity
#   Properties:
#     EmailIdentity: !Ref SESIdentityAddress            # 識別子
#     ConfigurationSetAttributes:
#     ConfigurationSetName: !Ref SESConfigurationSet  # 設定セット
#     FeedbackAttributes:
#       EmailForwardingEnabled: false                   # フィードバックを転送するか
  # DkimAttributes:
  #   SigningEnabled: true
  # DkimSigningAttributes:
  #   DomainSigningPrivateKey: String
  #   DomainSigningSelector: String
  #   NextSigningKeyLength: "RSA_1024_BIT"
*/

/**
 * SES設定セット
 */
resource "aws_ses_configuration_set" "this" {

  name = "${var.stack_name}-ses-configuration-set"  # 名前
  sending_enabled = true                            # 送信有効化
  delivery_options {                                # 配信オプション
    tls_policy = "Optional"                         #   TLSポリシー
  }
  reputation_metrics_enabled = true                 # レピュテーションメトリクスを有効化するか
}

/**
 * SESイベント配信先
 */
resource "aws_ses_event_destination" "this" {

  name = "${var.stack_name}-ses-event-destination"              # 名前
  configuration_set_name = aws_ses_configuration_set.this.name  # 設定セット
  enabled = true                                                # 有効か
  matching_types = [                                            # マッチするイベントタイプ
    "reject",                                                   #   リジェクト
    "bounce",                                                   #   バウンス
    "complaint",                                                #   苦情
    "renderingFailure"                                          #   レンダリング失敗
  ]
  sns_destination {                                             # SNS配信先
    topic_arn = aws_sns_topic.warning.arn                       #   トピック
  }
}
