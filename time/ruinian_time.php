<?php

        $search = input::admin_index_input(array(
            array('title' => '开始时间', 'input_name' => 'startime'),
            array('title' => '结束时间', 'input_name' => 'endtime'),
        ));


        if (isset($_GET['startime']) && trim($_GET['startime']) != '') {
            $where .= ' and add_time >'. strtotime ($_GET['startime']);
        }
        if (isset($_GET['endtime']) && trim($_GET['endtime']) != '') {
            $where .= ' and add_time < '. strtotime ($_GET['endtime']);
        }
?>

    <script type="text/javascript" src="{Js}My97DatePicker/WdatePicker.js"></script>
<script>
	$("input[name='startime']").addClass("Wdate");
    $("input[name='endtime']").addClass("Wdate");
    $("input[name='startime']").attr('onClick', 'WdatePicker()');
    $("input[name='endtime']").attr('onClick', 'WdatePicker()');
</script>


<?php
/*
 导出 类型文件
 */
        $startime = isset($_GET['startime']) ? $_GET['startime'] : false;
        $endtime = isset($_GET['endtime']) ? $_GET['endtime'] : false;

        $page_url = '&page=' . $page. '&startime=' .$startime . '&endtime=' .$endtime;
        $url_index = './?g=Admin&c=Member&a=derive&type=5'.$page_url;
		$this->assign('url_index', $url_index);


        $url_index1 = './?g=Admin&c=Store&a=derive&type=2';
        $this->assign('url_index1', $url_index1);

?>
<span style="margin-left: 20px; width: 120px; height: 39px; border-radius: 5px; background-color: #2185C5; line-height: 39px; text-align: center;">
                <a onclick="baobiao();" style="color: #fff; display: block;" >导出</a></span>

<script type="text/javascript" charset="utf-8">
	var url = '{$url_index1}';
    var url = '{$url_index}';
    function baobiao() {
        $.ajax({
            url: url,
            type: "get",
            dataType: "json",
            success : function(data) {
                if (data.way == 'download') {
                    window.location.href = data.url;
                }
            }

        })
    }
</script>
