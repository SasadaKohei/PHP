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
    public function find()
    {
        $this->set('msg', null);
//        $persons = [];
        if ($this->request->is('post')) {
            $find = $this->request->data['find'];
            $persons = $this->Persons->find()
//                idとnameを取り出して、name順に並べ替えて表示
                ->select(['id', 'name'])    //select : 取り出すいフィールドを指定する
                ->order(['name', 'Asc'])    //order : 並び順を指定する(「Asc」昇順(小さいものから順に並べる)、「Desc」降順(大きいものから並べる))
                ->where(["name like " => '%' . $find . '%']);
        } else {
            $persons = [];
        }
//        $this->set('msg', null);
        $this ->set('persons',$persons);
    }
}