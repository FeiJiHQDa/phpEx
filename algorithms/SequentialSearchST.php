<?php
/**
* 测试 php 的链表模式
 * Time: 11:34
 */

class Node {
    public $key;
    public $val;
    public $next;

    public function __construct($key='', $val='', $next=null) {
        $this->key = $key;
        $this->val = $val;
        $this->next = $next;
    }
}

class SequentialSearchST {
    public $n;
    private $first;

    public function __construct() {
        $this->first = new Node();
    }

    public function get($key) {

        return null;
    }

    public function put($key, $val) {
        for ($x = $this->first; $x != null; $x = $x->next) {
            if ($key == $x->key) {
                $x->val = $val;
            }
        }

        $this->first = new Node($key, $val, $this->first);
    }

    /**
     * 展示 Node
     */
    public function showHeros(){
        $cur=$this->first;
        while($cur->next!=null){
            echo "key：".$cur->key."\n";
            echo "value: ".$cur->val."\n";
            $cur=$cur->next;
        }
    }
}



$s = new SequentialSearchST();

$s->put('ooo', 3);
$s->put('ooo44', 3);

$s->showHeros();