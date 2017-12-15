<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * OpenedQuestions Model
 *
 * @property \App\Model\Table\ExpectedAnswersTable|\Cake\ORM\Association\BelongsTo $ExpectedAnswers
 * @property \App\Model\Table\StepsTable|\Cake\ORM\Association\BelongsToMany $Steps
 *
 * @method \App\Model\Entity\OpenedQuestion get($primaryKey, $options = [])
 * @method \App\Model\Entity\OpenedQuestion newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\OpenedQuestion[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\OpenedQuestion|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OpenedQuestion patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\OpenedQuestion[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\OpenedQuestion findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class OpenedQuestionsTable extends Table
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

        $this->setTable('opened_questions');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('ExpectedAnswers', [
            'foreignKey' => 'expected_answer_id',
            'joinType' => 'INNER'
        ]);
/*        $this->belongsToMany('Steps', [
            'foreignKey' => 'opened_question_id',
            'targetForeignKey' => 'step_id',
            'joinTable' => 'opened_questions_steps'
        ]);*/
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
            ->uuid('id')
            ->allowEmpty('id', 'create')
            ->add('id', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->allowEmpty('notes');

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
        $rules->add($rules->isUnique(['id']));
        $rules->add($rules->existsIn(['expected_answer_id'], 'ExpectedAnswers'));

        return $rules;
    }
}
