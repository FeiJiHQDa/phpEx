<?php

// 将二维数组的 全部id 链接在一起
// 使用 array_column

function column_arr($array2D) {
        $stringId = array_column($array2D, 'id');
        $id = implode(',', $stringId);
        $temp = [];
        foreach ($array2D as $key => $val) {
            $val['id'] = $id;
            $temp = $val;
        }
        return $temp;
    }