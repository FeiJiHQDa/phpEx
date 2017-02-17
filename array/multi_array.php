<?php
/**
 * Created by PhpStorm.
 * User: HJKLI
 * Date: 2016/12/11
 * Time: 17:03
 */


$arr = [
    14 => [
    "id" => 14,
      "type"=>"student",
      "who_table" => "base_department",
      "field_name" => "com_id",
      "is_null" => null,
      "field_default_val" => null,
      "field_type" => 3,
      "rel_id" => "13",
      "table_order" => 1,
      "chinese_name" => "base_com的id",
      "field_key_val" => null,
    ],
    15 => [
      "id" => 15,
      "type" => "student",
      "who_table" => "base_department",
      "field_name" => "dept_id",
      "is_null" => null,
      "field_default_val" => null,
      "field_type" => 2,
      "rel_id" => null,
      "table_order" => 1,
      "chinese_name" => "id",
      "field_key_val" => null,
    ],
    16 => [
      "id" => 16,
      "type" => "student",
      "who_table" => "base_department",
      "field_name" => "name",
      "is_null" => null,
      "field_default_val" => null,
      "field_type" => 0,
      "rel_id" => null,
      "table_order" => 1,
      "chinese_name" => "年级",
      "field_key_val" => null,
    ],
    17 =>[
      "id" => 17,
      "type" => "student",
      "who_table" => "base_department",
      "field_name" => "name",
      "is_null" => null,
      "field_default_val" => null,
      "field_type" => 0,
      "rel_id" => null,
      "table_order" => 1,
      "chinese_name" => "班级",
      "field_key_val" => null,
    ],
    18 => [
      "id" => 18,
      "type" => "student",
      "who_table" => "base_department",
      "field_name" => "parent_id",
      "is_null" => null,
      "field_default_val" => null,
      "field_type" => 3,
      "rel_id" => "15",
      "table_order" => 1,
      "chinese_name" => "base_com的id",
      "field_key_val" => null,
    ],
    19 => [
      "id" => 19,
      "type" => "student",
      "who_table" => "base_department",
      "field_name" => "created_at",
      "is_null" => null,
      "field_default_val" => null,
      "field_type" => 1,
      "rel_id" => null,
      "table_order" => 1,
      "chinese_name" => "插入时间",
      "field_key_val" => null,
    ],
    20 => [
      "id" => 20,
      "type" => "student",
      "who_table" => "base_department",
      "field_name" => "updated_at",
      "is_null" => null,
      "field_default_val" => null,
      "field_type" => 1,
      "rel_id" => null,
      "table_order" => 1,
      "chinese_name" => "更新时间",
      "field_key_val" => null,
    ]
];

//print_r(array_unique($arr));

$res = array_column($arr, "field_name");
print_r($res);
unset($res[0]);

print_r(array_unique($res));

$value_sum = array_count_values($res)['name'];
print_r($value_sum);