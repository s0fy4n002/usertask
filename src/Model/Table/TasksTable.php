<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class TasksTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('tasks');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');
        $this->setEntityClass('App\Model\Entity\Tasks');

        $this->addBehavior('Timestamp');

        $this->belongsTo('User', [
            'foreignKey' => 'user_id',
        ]);
    }


    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('user_id')
            ->allowEmptyString('user_id');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->notEmptyString('name','name tidak boleh kosong');

        $validator
            ->scalar('description')
            ->notEmptyString('description', 'description tidak boleh kosong');

        $validator
            ->scalar('status')
            ->requirePresence('status')
            ->notEmptyString('status','status tidak boleh kosong');


        $validator->date('expired')
                    ->notEmptyDate('expired','expired tidak boleh kosong');
            
        return $validator;
    }

  
}
