/**
 * Terraform設定
 */
terraform {
  required_version = ">= 1.4.4"         # 必要バージョン
  backend "s3" {                        # S3バックエンド
    region = "ap-northeast-1"           #   リージョン
    bucket = "terraform.smart-port.jp"  #   バケット
    key = "prod.tfstate"                #   キー
    profile = "prod.smart-port.jp"      #   AWS-CLIプロファイル
  }
}
