<?php
namespace App\Model\Table;

use App\Model\Entity\Person;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class PersonsTable extends Table
{

    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('persons');
        $this->displayField('name');
        $this->primaryKey('id');
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->add('age', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('age');

        $validator
            ->allowEmpty('mail');

        return $validator;
    }
}