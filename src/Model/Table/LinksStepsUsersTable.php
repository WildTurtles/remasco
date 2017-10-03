<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * LinksStepsUsers Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\StepsTable|\Cake\ORM\Association\BelongsTo $Steps
 * @property \App\Model\Table\LinksTable|\Cake\ORM\Association\BelongsTo $Links
 *
 * @method \App\Model\Entity\LinksStepsUser get($primaryKey, $options = [])
 * @method \App\Model\Entity\LinksStepsUser newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\LinksStepsUser[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\LinksStepsUser|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\LinksStepsUser patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\LinksStepsUser[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\LinksStepsUser findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class LinksStepsUsersTable extends Table
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

        $this->setTable('links_steps_users');
        $this->setDisplayField('user_id');
        $this->setPrimaryKey(['user_id', 'step_id', 'link_id']);

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Steps', [
            'foreignKey' => 'step_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Links', [
            'foreignKey' => 'link_id',
            'joinType' => 'INNER'
        ]);
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
            ->boolean('lock')
            ->allowEmpty('lock');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['step_id'], 'Steps'));
        $rules->add($rules->existsIn(['link_id'], 'Links'));

        return $rules;
    }
}
