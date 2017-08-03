<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Try Entity
 *
 * @property string $id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $updated
 * @property string $user_id
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\AnswersQuestion[] $answers_questions
 * @property \App\Model\Entity\MultipleChoiceQuestion[] $multiple_choice_questions
 * @property \App\Model\Entity\Question[] $questions
 * @property \App\Model\Entity\Path[] $paths
 */
class Try extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
