<?php
/**
 * Created by PhpStorm.
 * User: HJKLI
 * Date: 2017/12/26
 * Time: 17:35
 */

/**
 * 利用PHP安装windows自动运行的服务
 * $Id: WinService.class.php
 * $winService = new WinService();
 * $winService->install();
 */
class WinService
{
    //服务名称
    var $name = 'PHP Service';
    //定义服务名称
    var $info_name = "Exsample PHP Service";
    //定义php.exe存放路径
//    var $path = "C:\\xampp\\php\\php.exe";
    var $path = '';
//    var $path = "C:\\xampp\htdocs\\tcp\\location_udp\\php\\php.exe";
    //定义所要执行的程序
//    var $params = "D:\\localhost\\Service\\win32_service.php";
    var $params = "C:\\xampp\htdocs\\tcp\\location_udp\\start_web.php" . '" run';
    //定义程序分隔执行时间，单位：秒
    var $sleep = 5;

    public function __construct($name = '', $infoName = '', $param = '')
    {
//        set_time_limit(0);
//        ob_implicit_flush();
        $this->name = $name;
        $this->info_name = $infoName;
        $this->params = $param;
        $this->path =  '"' . dirname(PHP_BINARY) .'\\php.exe"';
    }

    public function install()
    {
        /* 注册服务  */
        $x = win32_create_service(array(
            'service' => $this->name,
            'display' => $this->info_name,
            'path' => $this->path,
            'params' => $this->params,
        ));

        /* 启动服务 */
        win32_start_service($this->name);

        print_r($x);
        if ($x !== true) {
            die ('服务创建失败!');
        } else {
            die ('服务创建成功!');
        }
    }

    public function uninstall()
    {
        /* 移除服务 */
        $removeService = win32_delete_service($this->name);

        switch ($removeService) {
            case   1060:
                die ('服务不存在！');
                break;
            case   1072:
                die ('服务不能被正常移除! ');
                break;
            case      0:
                die ('服务已被成功移除！');
                break;
            default    :
                die ();
                break;
        }
    }

    public function restart()
    {
        /* 重启服务 */
        $svcStatus = win32_query_service_status($this->name);

        if ($svcStatus == 1060) {
            echo   "服务[" . $this->name . "]未被安装，请先安装";
        } else {
            if ($svcStatus['CurrentState'] == 1) {
                $s = win32_start_service($this->name);

                if ($s != 0) {
                    echo  "服务无法被启动，请重试！ ";
                } else {
                    echo  "服务已启动! ";
                }

            } else {
                $s = win32_stop_service($this->name);
                if ($s != 0) {
                    echo " 服务正在执行，请重试！ ";
                } else {
                    $s = win32_start_service($this->name);
                    if ($s != 0) {
                        echo   "服务无法被启动，请重试！ ";
                    } else {
                        echo   "服务已启动! ";
                    }
                }
            }
        }
    }

    public function start()
    {
        $s = win32_start_service($this->name);
        if ($s != 0) {
            echo   " 服务正在运行中！ ";
        } else {
            echo   " 服务已启动! ";
        }
    }

    public function stop()
    {
        $s = win32_stop_service($this->name);
        if ($s != 0) {
            echo   " 服务未启动！ ";
        } else {
            echo   " 服务已停止！ ";
        }
    }
}


$WinService1 = new WinService();

$WinService1->install();