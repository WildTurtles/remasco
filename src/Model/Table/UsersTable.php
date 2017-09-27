<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Auth\DefaultPasswordHasher;

/**
 * Users Model
 *
 * @property \App\Model\Table\TriesTable|\Cake\ORM\Association\HasMany $Tries
 * @property \App\Model\Table\GroupsTable|\Cake\ORM\Association\BelongsToMany $Groups
 * @property \App\Model\Table\PathsTable|\Cake\ORM\Association\BelongsToMany $Paths
 * @property |\Cake\ORM\Association\BelongsToMany $Topics
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 */
class UsersTable extends Table
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

        $this->setTable('users');
        $this->setDisplayField('username');
        $this->setPrimaryKey('id');

        $this->hasMany('Tries', [
            'foreignKey' => 'user_id'
        ]);
        $this->belongsToMany('Groups', [
            'foreignKey' => 'user_id',
            'targetForeignKey' => 'group_id',
            'joinTable' => 'groups_users'
        ]);
        $this->belongsToMany('Paths', [
            'foreignKey' => 'user_id',
            'targetForeignKey' => 'path_id',
            'joinTable' => 'paths_users'
        ]);
        $this->belongsToMany('Topics', [
            'foreignKey' => 'user_id',
            'targetForeignKey' => 'topic_id',
            'joinTable' => 'topics_users'
        ]);
        $this->belongsToMany('Links', [
            'foreignKey' => 'user_id',
            'targetForeignKey' => 'link_id',
            'joinTable' => 'links_users'
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
            ->allowEmpty('username');

        $validator
            ->allowEmpty('password');

        $validator
            ->allowEmpty('lastname');

        $validator
            ->allowEmpty('firstname');

        $validator
            ->allowEmpty('avatar');

        $validator
            ->allowEmpty('display_name')
            ->add('display_name', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->email('email')
            ->allowEmpty('email');

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
        $rules->add($rules->isUnique(['username']));
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->isUnique(['id']));
        $rules->add($rules->isUnique(['display_name']));

        return $rules;
    }

		public function validationPassword(Validator $validator)
    {
        $validator
                ->add('old_password','custom',[
                    'rule' => function($value, $context){
                        $user = $this->get($context['data']['id']);
                        if($user)
                        {
                            if((new DefaultPasswordHasher)->check($value, $user->password))
                            {
                                return true;
                            }
                        }
                        return false;
                    },
                    'message' => 'Your old password does not match the entered password!',
                ])
                ->notEmpty('old_password');

        $validator
                ->add('new_password',[
                    'length' => [
                        'rule' => ['minLength',4],
                        'message' => 'Please enter atleast 4 characters in password your password.'
                    ]
                ])
                ->add('new_password',[
                    'match' => [
                        'rule' => ['compareWith','confirm_password'],
                        'message' => 'Sorry! Password dose not match. Please try again!'
                    ]
                ])
                ->notEmpty('new_password');

        $validator
                ->add('confirm_password',[
                    'length' => [
                        'rule' => ['minLength',4],
                        'message' => 'Please enter atleast 4 characters in password your password.'
                    ]
                ])
                ->add('confirm_password',[
                    'match' => [
                        'rule' => ['compareWith','new_password'],
                        'message' => 'Sorry! Password dose not match. Please try again!'
                    ]
                ])
                ->notEmpty('confirm_password');

        return $validator;
    }

}
