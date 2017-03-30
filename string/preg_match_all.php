<?php
/**
 * Created by PhpStorm.
 * User: whaichao
 * Date: 2017/3/30
 * Time: 17:59
 */

preg_match_all("|<[^>]+>(.*)</[^>]+>|U",
    "<b>example: </b><div align=left>this is a test</div>",
    $out, PREG_PATTERN_ORDER);

print_r($out);