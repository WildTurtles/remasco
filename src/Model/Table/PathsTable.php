<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Paths Model
 *
 * @property \App\Model\Table\StepsTable|\Cake\ORM\Association\HasMany $Steps
 * @property \App\Model\Table\ChaptersTable|\Cake\ORM\Association\BelongsToMany $Chapters
 * @property \App\Model\Table\TriesTable|\Cake\ORM\Association\BelongsToMany $Tries
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsToMany $Users
 *
 * @method \App\Model\Entity\Path get($primaryKey, $options = [])
 * @method \App\Model\Entity\Path newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Path[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Path|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Path patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Path[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Path findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PathsTable extends Table
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

        $this->setTable('paths');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Steps', [
            'foreignKey' => 'path_id'
        ]);
        $this->belongsToMany('Chapters', [
            'foreignKey' => 'path_id',
            'targetForeignKey' => 'chapter_id',
            'joinTable' => 'chapters_paths'
        ]);
        $this->belongsToMany('Tries', [
            'foreignKey' => 'path_id',
            'targetForeignKey' => 'try_id',
            'joinTable' => 'paths_tries'
        ]);
        $this->belongsToMany('Users', [
            'foreignKey' => 'path_id',
            'targetForeignKey' => 'user_id',
            'joinTable' => 'paths_users'
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

        return $rules;
    }
}
