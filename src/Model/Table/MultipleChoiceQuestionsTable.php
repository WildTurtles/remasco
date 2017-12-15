<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MultipleChoiceQuestions Model
 *
 * @property \App\Model\Table\QuestionsTable|\Cake\ORM\Association\BelongsToMany $Questions
 * @property \App\Model\Table\StepsTable|\Cake\ORM\Association\BelongsToMany $Steps
 * @property \App\Model\Table\TriesTable|\Cake\ORM\Association\BelongsToMany $Tries
 *
 * @method \App\Model\Entity\MultipleChoiceQuestion get($primaryKey, $options = [])
 * @method \App\Model\Entity\MultipleChoiceQuestion newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MultipleChoiceQuestion[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MultipleChoiceQuestion|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MultipleChoiceQuestion patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MultipleChoiceQuestion[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MultipleChoiceQuestion findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MultipleChoiceQuestionsTable extends Table
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

        $this->setTable('multiple_choice_questions');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsToMany('Questions', [
            'foreignKey' => 'multiple_choice_question_id',
            'targetForeignKey' => 'question_id',
            'joinTable' => 'multiple_choice_questions_questions'
        ]);
/*        $this->belongsToMany('Steps', [
            'foreignKey' => 'multiple_choice_question_id',
            'targetForeignKey' => 'step_id',
            'joinTable' => 'multiple_choice_questions_steps'
        ]);*/
        $this->belongsToMany('Tries', [
            'foreignKey' => 'multiple_choice_question_id',
            'targetForeignKey' => 'try_id',
            'joinTable' => 'multiple_choice_questions_tries'
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
            ->uuid('id')
            ->allowEmpty('id', 'create')
            ->add('id', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->allowEmpty('name');

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

        return $rules;
    }
}
