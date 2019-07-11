<?php

namespace App\Controller;

use App\Controller\AppController;

class HeloController extends AppController
{
//    public function index($a = '')
    public function index()
    {
        $id = $this->request->query('id');
        $name = $this->request->query('name');
        $this->set('message', 'your id:'.$id. ', name :'.$name);

        $str = $this->request->data('text1');
        if ($str != null) { //フォーム送信時
            $str = $this->request->data['text1'];
            $this->set('message', 'you typed: ' . $str);
        } else { //通常アクセス時
            $this->set('message', 'please type...');
        }

//        $this->set('message', 'Hello! this is sample page ;-');
//        if ($a == ''){
//            $this -> setAction('err');
//            return;
//        }
//        $this->autoRender = false;
//        echo "<html><head></head><body>";
//        echo "<h1>Hello!</h1>";
//        echo "<p>これは、サンプルで作成したページです。</p><p>";
//        if ($a != '') {
//            echo "パラメータA: " . $a;
//        }
//        echo "</p></body></html>";
    }

//    public function err()
//    {
//        $this->autoRender = false;
//        echo "<html><head></head><body>";
//        echo "<h1>Hello!</h1>";
//        echo "<p>パラメータがありませんでした。</p>";
//        echo "</body></html>";
//    }
}