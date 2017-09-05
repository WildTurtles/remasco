<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Steps Model
 *
 * @property \App\Model\Table\PathsTable|\Cake\ORM\Association\BelongsTo $Paths
 * @property \App\Model\Table\LinksTable|\Cake\ORM\Association\BelongsToMany $Links
 * @property \App\Model\Table\MultipleChoiceQuestionsTable|\Cake\ORM\Association\BelongsToMany $MultipleChoiceQuestions
 * @property \App\Model\Table\OpenedQuestionsTable|\Cake\ORM\Association\BelongsToMany $OpenedQuestions
 *
 * @method \App\Model\Entity\Step get($primaryKey, $options = [])
 * @method \App\Model\Entity\Step newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Step[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Step|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Step patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Step[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Step findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class StepsTable extends Table
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

        $this->setTable('steps');
        $this->setDisplayField('Number');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Paths', [
            'foreignKey' => 'path_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsToMany('Links', [
            'foreignKey' => 'step_id',
            'targetForeignKey' => 'link_id',
            'joinTable' => 'links_steps'
        ]);
        $this->belongsToMany('MultipleChoiceQuestions', [
            'foreignKey' => 'step_id',
            'targetForeignKey' => 'multiple_choice_question_id',
            'joinTable' => 'multiple_choice_questions_steps'
        ]);
        $this->belongsToMany('OpenedQuestions', [
            'foreignKey' => 'step_id',
            'targetForeignKey' => 'opened_question_id',
            'joinTable' => 'opened_questions_steps'
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
            ->boolean('lock')
            ->allowEmpty('lock');

        $validator
            ->integer('number')
            ->allowEmpty('number');

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
        $rules->add($rules->existsIn(['path_id'], 'Paths'));

        return $rules;
    }
}
