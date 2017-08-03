<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tries Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\AnswersQuestionsTable|\Cake\ORM\Association\BelongsToMany $AnswersQuestions
 * @property \App\Model\Table\MultipleChoiceQuestionsTable|\Cake\ORM\Association\BelongsToMany $MultipleChoiceQuestions
 * @property \App\Model\Table\QuestionsTable|\Cake\ORM\Association\BelongsToMany $Questions
 * @property \App\Model\Table\PathsTable|\Cake\ORM\Association\BelongsToMany $Paths
 *
 * @method \App\Model\Entity\Try get($primaryKey, $options = [])
 * @method \App\Model\Entity\Try newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Try[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Try|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Try patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Try[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Try findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TriesTable extends Table
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

        $this->setTable('tries');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsToMany('AnswersQuestions', [
            'foreignKey' => 'try_id',
            'targetForeignKey' => 'answers_question_id',
            'joinTable' => 'answers_questions_tries'
        ]);
        $this->belongsToMany('MultipleChoiceQuestions', [
            'foreignKey' => 'try_id',
            'targetForeignKey' => 'multiple_choice_question_id',
            'joinTable' => 'multiple_choice_questions_tries'
        ]);
        $this->belongsToMany('Questions', [
            'foreignKey' => 'try_id',
            'targetForeignKey' => 'question_id',
            'joinTable' => 'questions_tries'
        ]);
        $this->belongsToMany('Paths', [
            'foreignKey' => 'try_id',
            'targetForeignKey' => 'path_id',
            'joinTable' => 'tries_paths'
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
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
