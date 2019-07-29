<?php


namespace App\Controller;


use App\Controller\AppController;

class PersonsController extends AppController
{
//    データベースに新規登録
    public function add()
    {
        if ($this->request->is('post')) {
            $person = $this->Persons->newEntity();
            $person = $this->Persons->patchEntity($person, $this->request->getData());
            if ($this->Persons->save($person)) {
                return $this->redirect(['action' => 'index']);
            }
        }
    }

//      データベースから全レコードをエンティティ配列として取得
    public function index()
    {
        $this->set('persons', $this->Persons->find('all'));
    }

//    データベースを登録
    public function edit($id = null)
    {
        $person = $this->Persons->get($id);
        if ($this->request->is(['post', 'put'])) {
            $person = $this->Persons->patchEntity($person, $this->request->data);
            if ($this->Persons->save($person)) {
                return $this->redirect(['action' => 'index']);
            }
        } else {
            $this->set('person', $person);
        }
    }

//    データベースからデータを削除
    public function delete($id = null)
    {
        $person = $this->Persons->get($id);
        if ($this->request->is(['post', 'put'])) {
            if ($this->Persons->delete($person)) {
                return $this->redirect(['action' => 'index']);
            }
        } else {
            $this->set('person', $person);
        }
    }

//    レコードの検索
    public function find() {
        $persons = [];
        if ($this->request->is('post')) {
            $find = $this->request->data['find'];
            $query = $this->Persons->find();
            $exp = $query->newExpr();
            $fnc = function($exp, $f) {
                return $exp
                    ->isNotNull('name')
                    ->isNotNull('mail')
                    ->gt('age',0)
                    ->in('name', explode(',',$f));
            };
            $persons = $query->where($fnc($exp,$find));
        }
        $this->set('persons', $persons);
        $this->set('msg', null);
    }
}