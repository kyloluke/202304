#--------------------------------
# WAF-WebACL
#--------------------------------
/*
    Rules:                                                # ルール
      # パスリダイレクトルール
      # URIパスが / または /user/ で、IPアドレスがIPセットに登録されているアクセスなら提携先サイトログインパスにリダイレクトする
      - Name: "PathRedirectRule"
        Statement:
          AndStatement:
            Statements:
              - OrStatement:
                  Statements:
                    - RegexMatchStatement:
                        FieldToMatch:
                          UriPath: {}
                        RegexString: "^/$"
                        TextTransformations:
                          - Type: "URL_DECODE"
                            Priority: 0
                    - RegexMatchStatement:
                        FieldToMatch:
                          UriPath: {}
                        RegexString: "^/user/?$"
                        TextTransformations:
                          - Type: "URL_DECODE"
                            Priority: 0
              - OrStatement:
                  Statements:
                    - IPSetReferenceStatement:
                        Arn: !GetAtt WAFIPSetForPartner.Arn
                    - IPSetReferenceStatement:
                        Arn: !GetAtt WAFMngIPSetForPartner.Arn
                    - IPSetReferenceStatement:
                        Arn: !GetAtt WAFIPSetForBackOffice.Arn
                    - IPSetReferenceStatement:
                        Arn: !GetAtt WAFMngIPSetForBackOffice.Arn
        Action:                                           # アクション
          Block:                                          #   ブロック
            CustomResponse:                               #     カスタムレスポンス
              ResponseCode: 301                           #       レスポンスコード
              ResponseHeaders:                            #       レスポンスヘッダ
                - Name: "Location"                        #         名前
                  Value: !Ref AppPartnerSiteLoginUriPath  #         値
        Priority: 0                                       # 優先度
        VisibilityConfig:                                 # 可視化設定
          CloudWatchMetricsEnabled: true                  #   CloudWatchメトリクスを送信するか
          MetricName: "PathRedirectRule"                  #   メトリック名
          SampledRequestsEnabled: true                    #   サンプルリクエストを表示するか

      # 未登録IPアドレスブロックルール
      # [URIパスがバックオフィスサイト・提携先サイト・LINEWORKSサイト・Adminerサイトで、IPアドレスがIPセットに登録されているIPアドレス]以外のアクセスをブロックする
      - Name: "BlockUnregisteredIPAddressRule"            # 名前
        Statement:                                        # ステートメント
          NotStatement:
            Statement:
              OrStatement:
                Statements:
                  # URIパスがバックオフィスサイトで、バックオフィスサイト用またはバックオフィスサイト管理用のIPセット
                  - AndStatement:
                      Statements:
                        - RegexMatchStatement:
                            FieldToMatch:
                              UriPath: {}
                            RegexString: !Ref AppBackOfficeSiteUriPattern
                            TextTransformations:
                              - Type: "URL_DECODE"
                                Priority: 0
                        - OrStatement:
                            Statements:
                              - IPSetReferenceStatement:
                                  Arn: !GetAtt WAFIPSetForBackOffice.Arn
                              - IPSetReferenceStatement:
                                  Arn: !GetAtt WAFMngIPSetForBackOffice.Arn
                  # URIパスが提携先サイトで、提携先サイト用または提携先サイト管理用のIPセット
                  - AndStatement:
                      Statements:
                        - RegexMatchStatement:
                            FieldToMatch:
                              UriPath: {}
                            RegexString: !Ref AppPartnerSiteUriPattern
                            TextTransformations:
                              - Type: "URL_DECODE"
                                Priority: 0
                        - OrStatement:
                            Statements:
                              - IPSetReferenceStatement:
                                  Arn: !GetAtt WAFIPSetForPartner.Arn
                              - IPSetReferenceStatement:
                                  Arn: !GetAtt WAFMngIPSetForPartner.Arn
                  # URIパスがLINEWORKSサイト
                  - RegexMatchStatement:
                      FieldToMatch:
                        UriPath: {}
                      RegexString: !Ref AppLineWorksCallbackUriPattern
                      TextTransformations:
                        - Type: "URL_DECODE"
                          Priority: 0
                  # URIパスがAdminerサイトで、バックオフィスサイト管理用のIPセット
                  - AndStatement:
                      Statements:
                        - RegexMatchStatement:
                            FieldToMatch:
                              UriPath: {}
                            RegexString: !Ref AdminerSiteUriPattern
                            TextTransformations:
                              - Type: "URL_DECODE"
                                Priority: 0
                        - IPSetReferenceStatement:
                            Arn: !GetAtt WAFMngIPSetForBackOffice.Arn
        Action:                                           # アクション
          Block: {}                                       #
        Priority: 1                                       # 優先度
        VisibilityConfig:                                 # 可視化設定
          CloudWatchMetricsEnabled: true                  #   CloudWatchメトリクスを送信するか
          MetricName: "BlockUnregisteredIPAddressRule"    #   メトリック名
          SampledRequestsEnabled: true                    #   サンプルリクエストを表示するか


      # AWS-不正インプットルールセット一致カウントルール
      - Name: "AWSManagedRulesKnownBadInputsRuleSet"      # 名前
        Statement:                                        # ステートメント
          ManagedRuleGroupStatement:                      #
            VendorName: "AWS"                             #   ベンダー名
            Name: "AWSManagedRulesKnownBadInputsRuleSet"  #   ルールグループ名
        OverrideAction:                                   # オーバーライドアクション
          None: {}                                        #   なし
        Priority: 4                                       # 優先度
        VisibilityConfig:                                 # 可視化設定
          CloudWatchMetricsEnabled: true                  #   CloudWatchメトリクスを送信するか
          MetricName: "AWSManagedRulesKnownBadInputsRuleSet"  #   メトリック名
          SampledRequestsEnabled: true                    #   サンプルリクエストを表示するか

      # AWS-SQLインジェクションルールセット一致カウントルール
      - Name: "AWSManagedRulesSQLiRuleSet"                # 名前
        Statement:                                        # ステートメント
          ManagedRuleGroupStatement:                      #
            VendorName: "AWS"                             #  ベンダー名
            Name: "AWSManagedRulesSQLiRuleSet"            #    ルールグループ名
            Version: "Version_2.0"                        #   バージョン ATTENTION 自動バージョンアップだと不意なブロックが発生しやすいため、バージョンを固定する
            ExcludedRules:                                #   除外ルール
              - Name: "SQLi_QUERYARGUMENTS"
              - Name: "SQLi_BODY"
              - Name: "SQLiExtendedPatterns_QUERYARGUMENTS"
              - Name: "SQLiExtendedPatterns_BODY"
        OverrideAction:                                   # オーバーライドアクション
          None: {}                                        #   なし
        Priority: 5                                       # 優先度
        VisibilityConfig:                                 # 可視化設定
          CloudWatchMetricsEnabled: true                  #   CloudWatchメトリクスを送信するか
          MetricName: "AWSManagedRulesSQLiRuleSet"        #   メトリック名
          SampledRequestsEnabled: true                    #   サンプルリクエストを表示するか

      # AWS-PHPルールセット一致カウントルール
      - Name: "AWSManagedRulesPHPRuleSet"                 # 名前
        Statement:                                        # ステートメント
          ManagedRuleGroupStatement:                      #
            VendorName: "AWS"                             #   ベンダー名
            Name: "AWSManagedRulesPHPRuleSet"             #   ルールグループ名
        OverrideAction:                                   # オーバーライドアクション
          None: {}                                        #   なし
        Priority: 6                                       # 優先度
        VisibilityConfig:                                 # 可視化設定
          CloudWatchMetricsEnabled: true                  #   CloudWatchメトリクスを送信するか
          MetricName: "AWSManagedRulesPHPRuleSet"         #   メトリック名
          SampledRequestsEnabled: true                    #   サンプルリクエストを表示するか



      # ファイルアップロード・Adminer以外のリクエストにおけるSQLインジェクション／XSSをブロックする
      - Name: "BlockSQLiXSSExceptUploadRule"              # 名前
        Statement:                                        # ステートメント
          AndStatement:
            Statements:
              # URIパスがファイルアップロードAPI・Adminerではない
              - NotStatement:
                  Statement:
                    OrStatement:
                      Statements:
                        - RegexMatchStatement:
                            FieldToMatch:
                              UriPath: {}
                            RegexString: !Ref AppFileUploadUriPattern
                            TextTransformations:
                              - Type: "URL_DECODE"
                                Priority: 0
                        - RegexMatchStatement:
                            FieldToMatch:
                              UriPath: {}
                            RegexString: !Ref AdminerSiteUriPattern
                            TextTransformations:
                              - Type: "URL_DECODE"
                                Priority: 0
              # クエリ文字列がSQLインジェクションにマッチする
              # リクエストボディがSQLインジェクションにマッチする
              # リクエストボディがXSSにマッチする
              - OrStatement:
                  Statements:
                    - SqliMatchStatement:
                        FieldToMatch:
                          QueryString: {}
                        TextTransformations:
                          - Type: "URL_DECODE"
                            Priority: 0
                    - SqliMatchStatement:
                        FieldToMatch:
                          Body:
                            OversizeHandling: "CONTINUE"
                        TextTransformations:
                          - Type: "HTML_ENTITY_DECODE"
                            Priority: 0
                    - XssMatchStatement:
                        FieldToMatch:
                          Body:
                            OversizeHandling: "CONTINUE"
                        TextTransformations:
                          - Type: "HTML_ENTITY_DECODE"
                            Priority: 0
        Action:                                           # アクション
          Block: {}                                       #
        Priority: 8                                       # 優先度
        VisibilityConfig:                                 # 可視化設定
          CloudWatchMetricsEnabled: true                  #   CloudWatchメトリクスを送信するか
          MetricName: "BlockSQLiXSSExceptUploadRule"      #   メトリック名
          SampledRequestsEnabled: true                    #   サンプルリクエストを表示するか
*/
resource "aws_wafv2_web_acl" "this" {

  name = "${var.stack_name}-waf-web-acl"            # 名前
  scope = "REGIONAL"                              # スコープ

  # アクセス元IP制限ルール
  rule {
    name = "BlockUnregisteredIPAddress"
    priority = 0
    statement {
      not_statement {
        statement {
          ip_set_reference_statement {
            arn = aws_wafv2_ip_set.this.arn
          }
        }
      }
    }
    action {
      block {}
    }
    visibility_config {
      cloudwatch_metrics_enabled = true
      metric_name = "BlockUnregisteredIPAddress"
      sampled_requests_enabled = true
    }
  }

  # AWS-IPレピュテーションリストルール
  rule {
    name     = "AWSManagedRulesAmazonIpReputationList"     # 名前
    priority = 1                                      # 優先度
    statement {
      managed_rule_group_statement {
        vendor_name = "AWS"                             #   ベンダー名
        name        = "AWSManagedRulesAmazonIpReputationList" #   ルールグループ名
      }
    }
    override_action {
      # オーバーライドアクション
      none {}
      #   なし
    }
    visibility_config {
      # 可視化設定
      cloudwatch_metrics_enabled = true                  #   CloudWatchメトリクスを送信するか
      metric_name                = "AWSManagedRulesAmazonIpReputationList"  #   メトリック名
      sampled_requests_enabled   = true                    #   サンプルリクエストを表示するか
    }
  }

  # 一般ルール
  rule {
    name = "AWSManagedRulesCommonRuleSet"              # 名前
    priority = 2                                      # 優先度
    statement {
      managed_rule_group_statement {
        vendor_name = "AWS"                             #   ベンダー名
        name = "AWSManagedRulesCommonRuleSet"          #   ルールグループ名
      }
    }
    override_action {                                  # オーバーライドアクション
      none {
      }                                       #   なし
    }
    visibility_config {                                 # 可視化設定
      cloudwatch_metrics_enabled = true                  #   CloudWatchメトリクスを送信するか
      metric_name = "AWSManagedRulesCommonRuleSet"      #   メトリック名
      sampled_requests_enabled = true                    #   サンプルリクエストを表示するか
    }
  }

  # Linuxルール
  rule {
    name = "AWSManagedRulesLinuxRuleSet"               # 名前
    priority = 3                            # 優先度
    statement {
      managed_rule_group_statement {
        vendor_name = "AWS"                             #   ベンダー名
        name = "AWSManagedRulesLinuxRuleSet"           #   ルールグループ名
      }
    }
    override_action {                                   # オーバーライドアクション
      none {}                                        #   なし
    }
    visibility_config {
      cloudwatch_metrics_enabled = true                  #   CloudWatchメトリクスを送信するか
      metric_name = "AWSManagedRulesCommonRuleSet"      #   メトリック名
      sampled_requests_enabled = true                    #   サンプルリクエストを表示するか
    }
  }


  default_action {                                # デフォルトアクション
    allow {}                                      #   許可
  }
  visibility_config {
    # 可視化設定
    cloudwatch_metrics_enabled = true             #   CloudWatchメトリクスを送信するか
    metric_name                = "DefaultAction"  #   メトリック名
    sampled_requests_enabled   = false            #   サンプルリクエストを表示するか
  }
}

/**
 * WAF-アクセス許可IPセット
 */
resource "aws_wafv2_ip_set" "this" {
  name = "${var.stack_name}-waf-ip-set" # 名前
  scope = "REGIONAL"                    # スコープ
  ip_address_version = "IPV4"           # IPアドレスバージョン
  addresses = var.waf_allow_ip_addresses  # アドレス
}

/*
#--------------------------------
# WAF-バックオフィスサイトアクセス許可IPセット
#--------------------------------
/*WAFIPSetForBackOffice:
  Type: AWS::WAFv2::IPSet
  Properties:
*/

#--------------------------------
# WAF-バックオフィスサイト管理用アクセス許可IPセット
#--------------------------------
/*WAFMngIPSetForBackOffice:
  Type: AWS::WAFv2::IPSet
  Properties:
    Name: !Sub "${AWS::StackName}-WAFMngIPSetForBackOffice"  # 名前
    Scope: "REGIONAL"                                        # スコープ
    IPAddressVersion: "IPV4"                                 # IPバージョン
    Addresses: !Ref AppMngBackOfficeIPAddresses              # IPアドレスリスト
*/
#--------------------------------
# WAF-提携先サイトアクセス許可IPセット
#--------------------------------
/*WAFIPSetForPartner:
  Type: AWS::WAFv2::IPSet
  Properties:
    Name: !Sub "${AWS::StackName}-WAFIPSetForPartner"  # 名前
    Scope: "REGIONAL"                                  # スコープ
    IPAddressVersion: "IPV4"                           # IPバージョン
    Addresses: [ "127.0.0.1/32" ]                      # IPアドレスリスト ATTENTION IPが1つも登録されていないIPSetを作成するとエラーになるため初期値としてループバックアドレスを登録している
*/
#--------------------------------
# WAF-提携先サイト管理用アクセス許可IPセット
#--------------------------------
/*WAFMngIPSetForPartner:
  Type: AWS::WAFv2::IPSet
  Properties:
    Name: !Sub "${AWS::StackName}-WAFMngIPSetForPartner"  # 名前
    Scope: "REGIONAL"                                     # スコープ
    IPAddressVersion: "IPV4"                              # IPバージョン
    Addresses: [ "127.0.0.1/32" ]                         # IPアドレスリスト ATTENTION IPが1つも登録されていないIPSetを作成するとエラーになるため初期値としてループバックアドレスを登録している
*/

/**
 * WAFロギング設定
 */
resource "aws_wafv2_web_acl_logging_configuration" "this" {

  resource_arn = aws_wafv2_web_acl.this.arn                     # リソース
  log_destination_configs = [aws_s3_bucket.log.arn]     # ログ格納先

  logging_filter {
    default_behavior = "DROP"

    filter {
      behavior = "KEEP"

      condition {
        action_condition {
          action = "COUNT"
        }
      }
      condition {
        action_condition {
          action = "BLOCK"
        }
      }
      condition {
        action_condition {
          action = "EXCLUDED_AS_COUNT"
        }
      }
      requirement = "MEETS_ANY"
    }
  }

  redacted_fields {
    single_header {
      name = "cookie"
    }
  }

  redacted_fields {
    single_header {
      name = "if-none-match"
    }
  }
}

/**
 * WAF-WebACL関連付け
 */
resource "aws_wafv2_web_acl_association" "this" {
  web_acl_arn = aws_wafv2_web_acl.this.arn  # WebACL
  resource_arn = aws_alb.this.arn           # リソース
}
