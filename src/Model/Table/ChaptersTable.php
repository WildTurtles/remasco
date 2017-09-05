<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Chapters Model
 *
 * @property \App\Model\Table\PathsTable|\Cake\ORM\Association\BelongsToMany $Paths
 * @property \App\Model\Table\TopicsTable|\Cake\ORM\Association\BelongsToMany $Topics
 *
 * @method \App\Model\Entity\Chapter get($primaryKey, $options = [])
 * @method \App\Model\Entity\Chapter newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Chapter[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Chapter|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Chapter patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Chapter[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Chapter findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ChaptersTable extends Table
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

        $this->setTable('chapters');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsToMany('Paths', [
            'foreignKey' => 'chapter_id',
            'targetForeignKey' => 'path_id',
            'joinTable' => 'chapters_paths'
        ]);
        $this->belongsToMany('Topics', [
            'foreignKey' => 'chapter_id',
            'targetForeignKey' => 'topic_id',
            'joinTable' => 'topics_chapters'
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
