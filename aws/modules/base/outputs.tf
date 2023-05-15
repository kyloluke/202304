/**
 * リージョン
 */
output "region" {
  value = data.aws_region.current.name
}

/**
 * アベイラビリティゾーン
 */
output "availabillity_zones" {
  value = data.aws_availability_zones.current.names
}
