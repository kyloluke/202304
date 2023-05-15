/**
 * FSバケットアクセスポリシー
 */
resource "aws_iam_policy" "fs_bucket_access" {

  name = "${var.stack_name}-fs-bucket-access-policy"          # 名前
  policy = data.aws_iam_policy_document.fs_bucket_access.json # ポリシー
}

/**
 * FSバケットアクセスポリシードキュメント
 * FSバケット内のオブジェクトに対するリスト・取得・作成操作・削除（特定パス以下のみ）を許可する
 */
data "aws_iam_policy_document" "fs_bucket_access" {

  version = "2012-10-17"
  statement {
    effect = "Allow"
    actions = [
      "s3:ListBucket",
      "s3:GetBucketLocation",
      "s3:GetBucketAcl",
      "s3:GetObject",
      "s3:GetObjectAcl",
      "s3:PutObject",
      "s3:PutObjectAcl"
    ]
    resources = [
      aws_s3_bucket.fs.arn,
      "${aws_s3_bucket.fs.arn}/*"
    ]
  }
  statement {
    effect = "Allow"
    actions = [
      "s3:DeleteObject"
    ]
    resources = [
      "${aws_s3_bucket.fs.arn}/temporary/*"
    ]
  }
  /* statement {
    effect = "Allow"
    actions = [
      "s3:ListAllMyBuckets"
    ]
    resources = [
      "*"
    ]
  } */
}
