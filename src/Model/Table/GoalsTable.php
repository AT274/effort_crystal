<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Goals Model
 *
 * @method \App\Model\Entity\Goal get($primaryKey, $options = [])
 * @method \App\Model\Entity\Goal newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Goal[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Goal|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Goal patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Goal[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Goal findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class GoalsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('goals');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('title')
            ->maxLength('title', 20)
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        $validator
            ->integer('target')
            ->requirePresence('target', 'create')
            ->notEmpty('target');

        $validator
            ->scalar('description')
            ->maxLength('description', 100)
            ->requirePresence('description', 'create');

        $validator
            ->integer('progress')
            ->requirePresence('progress', 'create')
            ->notEmpty('progress');

        $validator
            ->dateTime('due_date')
            ->requirePresence('due_date', 'create')
            ->notEmpty('due_date');

        return $validator;
    }
}
