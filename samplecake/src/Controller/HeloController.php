<?php

namespace App\Controller;

use App\Controller\AppController;

class HeloController extends AppController
{
    public function index()
    {
        $str = $this->request->getData('text1', null); //deafult : 最初に表示されるやつ
        $msg = 'typed: '.$str;
        if($str == null)
            {$msg = "please typed...";}
        $this->set('message', $msg);
    }
}