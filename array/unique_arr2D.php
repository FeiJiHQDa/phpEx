<?php

$input = array("a" => "green","", "red","b" => "green", "","blue", "red","c" => "witer","hello","witer");
//$result = array_unique($input); //去除重复元素
$result = a_array_unique($input);   //只留下单一元素
foreach($result as $aa)
{
echo $aa."<br />";
}
function multi_unique($array) {
   foreach ($array as $k=>$na)
       $new[$k] = serialize($na);
   $uniq = array_unique($new);
   foreach($uniq as $k=>$ser)
       $new1[$k] = unserialize($ser);
   return ($new1);
}

function a_array_unique($array)//写的比较好
{
   $out = array();
   foreach ($array as $key=>$value) {
       if (!in_array($value, $out))
{
           $out[$key] = $value;
       }
   }
   return $out;
} 

// PHP数组去除重复项 有个内置函数array_unique ()，但是php的 array_unique函数只适用于一维数组，对多维数组并不适用，以下提供一个二维数组 的 array_unique函数

 
function unique_arr($array2D,$stkeep=false,$ndformat=true)
{
    // 判断是否保留一级数组键 (一级数组键可以为非数字)
    if($stkeep) $stArr = array_keys($array2D);
    // 判断是否保留二级数组键 (所有二级数组键必须相同)
    if($ndformat) $ndArr = array_keys(end($array2D));
    //降维,也可以用implode,将一维数组转换为用逗号连接的字符串
    foreach ($array2D as $v){
        $v = join(",",$v);
        $temp[] = $v;
    }
    //去掉重复的字符串,也就是重复的一维数组
    $temp = array_unique($temp);
    //再将拆开的数组重新组装
    foreach ($temp as $k => $v)
    {
        if($stkeep) $k = $stArr[$k];
        if($ndformat)
        {
            $tempArr = explode(",",$v);
            foreach($tempArr as $ndkey => $ndval) $output[$k][$ndArr[$ndkey]] = $ndval;
        }
        else $output[$k] = explode(",",$v);
    }
    return $output;
}

 

 

 
// 演示：

 
$array2D = array('first'=>array('title'=>'1111','date'=>'2222'),'second'=>array('title'=>'1111','date'=>'2222'),'third'=>array('title'=>'2222','date'=>'3333'));  

print_r("<pre>");
print_r($array2D);  
print_r(unique_arr($array2D,true));
print_r("</pre>");