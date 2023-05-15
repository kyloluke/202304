/**
 * APインスタンス
 * 以下は起動後に実施
 *   sudo amazon-linux-extras install -y collectd
 *   sudo yum install -y amazon-cloudwatch-agent
 *   sudo /opt/aws/amazon-cloudwatch-agent/bin/amazon-cloudwatch-agent-config-wizard
 *   メトリクスの選択では Standard を選択
 *   CloudWatch Log Agent があるかでは no を選択
 *   モニタするログファイルがあるかでは no を選択
 *   設定をSSMパラメーターストアに保存するかでは no を選択
 *   sudo /opt/aws/amazon-cloudwatch-agent/bin/amazon-cloudwatch-agent-ctl -a fetch-config -m ec2 -s -c file:/opt/aws/amazon-cloudwatch-agent/bin/config.json
 *   sudo /opt/aws/amazon-cloudwatch-agent/bin/amazon-cloudwatch-agent-ctl -m ec2 -a status
 */
resource "aws_instance" "ap" {
  count = var.ap_instance_count

  instance_type = "t3.small"                                # タイプ
  ami = var.ap_ami                                          # AMI
  root_block_device {                                       # ルートブロックデバイス
    volume_type = "gp2"                                     #   ボリュームタイプ
    volume_size = 32                                        #   ボリュームサイズ
    encrypted = true                                        #   暗号化するか
    kms_key_id = aws_kms_alias.this.target_key_id           #   暗号化キー
    delete_on_termination = var.force_destroy               #   インスタンス終了時に削除する
    tags = {                                                # タグ
      Name = format("%s-ap-instance%02d-root-volume", var.stack_name, count.index) #   名前
    }
  }
  availability_zone = data.aws_availability_zones.current.names[count.index]  # アベイラビリティゾーン
  subnet_id = aws_subnet.private[count.index].id            # サブネット
  vpc_security_group_ids = [                                # セキュリティグループ
    aws_security_group.ap.id,
    aws_security_group.ap_mng.id
  ]
  iam_instance_profile = aws_iam_instance_profile.ap.id     # インスタンスプロファイル
  monitoring = true                                         # 詳細モニタリングを行うか
  user_data = templatefile("${path.module}/ap-user_data.sh", { "cw_agent_config_name": "ssm:${aws_ssm_parameter.cw_agent_config.id}" }) # ユーザーデータ

  tags = {                                                  # タグ
    Name = format("%s-ap-instance%02d", var.stack_name, count.index) # 名前
  }

  lifecycle {                                               # ライフサイクルルール
    ignore_changes = [root_block_device[0].kms_key_id]      #   変更を無視するプロパティ
  }
}
