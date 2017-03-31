<?php

/**
 * A base curl
 *
 * Created by PhpStorm.
 * User: HJKLI
 * Date: 2017/3/30
 * Time: 0:03
 * @package curl
 * @author whchao <feijihqda@126.com>
 */
class curl {

    /**
     * 用户代理请求 发送
     *
     * @var string
     */
    protected $userAgent = '';

    /**
     * 存储错误信息
     */
    protected $error = '';

    /**
     * CURLOPT_ 发送相关请求的参数
     *
     * @var array
     */
    protected $options = [];

    /**
     * 存储当前curl 的资源句柄
     *
     * @var resource
     * @access protected
     */
    protected $request;


    /**
     * 初始化 cRL 对, 特定的属性初始化
     */
    function __construct() {
        $this->userAgent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] :
            'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/57.0.2987.133 Safari/537.36';
    }

    /**
     * get 数据
     */
    public function get($url, $vars='') {
        if (!empty($vars)) {
            $url .= (stripos($url, '?')  !== false ) ? '&' : '?';
            $url .= http_build_query($vars, '', '&');
        }

        print_r($url);
        return  $this->request('GET', $url);
    }

    /**
     *  post 数据
     */
    public function post($url, $vars) {
        return $this->request('POST', $url, $vars);
    }

    /**
     *
     */

    /**
     * request 使用指定的提交方式, 添加 url ，var 是可选模式，
     *         含有 body 发送 raw ,
     *         json 发送 json 数据，
     *         form 发送 表单数据,
     *         cookies 发送 cookies
     *
     * @param string $mother get && post && hear && delete 模式
     * @param string $url URL 链接
     * @param array $vars POST的数组， 含有 body, cookies, form, json 四种模式:
     */
    public function request($mother, $url, $vars = '') {
        $this->request = curl_init();

        $this->setRequestMother($mother);
        $this->setRequestOptions($url);
        $this->setRequestVars($vars);

        $response = curl_exec($this->request);

        if (!$response) {
            $this->error = curl_errno($this->request) . ' - ' . curl_error($this->request);
        }

        $response = $this->dealtCurl($response);

        curl_close($this->request);

        return $response;
    }

    /*
     * 设置关联的CURL请求方法的选项
     */
    protected function setRequestMother($mother) {
        switch (strtoupper($mother)) {
            case 'GET':
                curl_setopt($this->request, CURLOPT_HTTPGET, true);
                break;
            case 'POST':
                curl_setopt($this->request, CURLOPT_POST, true);
                break;
            case 'HEAD' :
                curl_setopt($this->request, CURLOPT_HEADER, true);
                break;
            default:
                curl_setopt($this->request, CURLOPT_CUSTOMREQUEST, $mother);

        }
    }

    /**
     * 对 cURL 设置当前的请求
     */
    protected function setRequestOptions($url) {
        curl_setopt($this->request, CURLOPT_URL, $url);
        curl_setopt($this->request, CURLOPT_HEADER, true);
        curl_setopt($this->request, CURLOPT_RETURNTRANSFER, true);   // 获取的信息以字符串返回，而不是直接输出
        curl_setopt($this->request, CURLOPT_USERAGENT, $this->userAgent);
        curl_setopt($this->request, CURLOPT_FOLLOWLOCATION, true);   // 时将会根据服务器返回 HTTP 头中的 "Location: " 重定向
        curl_setopt($this->request, CURLOPT_TIMEOUT, 10);                // 允许 cURL 函数执行的最长秒数。

        // 自定义 curl_setopt 任何选项
        foreach ($this->options as $option => $val) {
            curl_setopt($this->request, constant('CURLOPT_' . str_replace('CURLOPT_', '', strtoupper($option))), $val);
        }
    }

    /**
     *  处理 cURL 的内容
     * json, body, form, cookies
     */
    protected function setRequestVars($vars) {
        if (is_array($vars)) {

            // body 和 from 表单不能并存
            if (array_key_exists('body', $vars)) {
                curl_setopt($this->request, CURLOPT_POSTFIELDS, $vars['body']);
            } else if (array_key_exists('form', $vars)) {
                if (is_array($vars['form'])) {
                    curl_setopt($this->request, CURLOPT_POSTFIELDS, http_build_query($vars['form']));
                }
            } else if (array_key_exists('json', $vars)) {
                if (is_array($vars['json'])) {
                    curl_setopt($this->request, CURLOPT_POSTFIELDS, json_encode($vars['json']));
                }
            }

            // set cookies
            if (array_key_exists('cookies', $vars)) {
                if (is_array($vars['cookies'])) {
                    curl_setopt($this->request, CURLOPT_COOKIE, http_build_query($vars['cookies'], '', '; '));
                }
            }
        }
    }

    /**
     * 处理 cURL 返回的数据
     * @param $response
     */

    protected function dealtCurl($response) {

        $pattern = '#HTTP/\d\.\d.*?$.*?\r\n\r\n#ims';

        preg_match_all($pattern, $response, $matches);
        $headersString = array_pop($matches[0]);
        $headers = explode("\r\n", str_replace("\r\n\r\n", '', $headersString));

        // 获得 body 数据
        $body = str_replace($headersString, '', $response);

        $version_and_status = array_shift($headers);
        preg_match('#HTTP/(\d\.\d)\s(\d\d\d)\s(.*)#', $version_and_status, $matches);
        $headerArr['Http-Version'] = $matches[1];
        $headerArr['Status-Code'] = $matches[2];
        $headerArr['Status'] = $matches[2].' '.$matches[3];

        # 标题转换为一个关联数组
        foreach ($headers as $header) {
            preg_match('#(.*?)\:\s(.*)#', $header, $matches);
            $headerArr[$matches[1]] = $matches[2];
        }

        $merge['body'] = $body;
        $merge['headers'] = $headerArr;

        return $merge;
    }
}



