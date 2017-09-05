<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Step Entity
 *
 * @property string $id
 * @property string $path_id
 * @property bool $lock
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $updated
 * @property int $number
 *
 * @property \App\Model\Entity\Path $path
 * @property \App\Model\Entity\Link[] $links
 * @property \App\Model\Entity\MultipleChoiceQuestion[] $multiple_choice_questions
 * @property \App\Model\Entity\OpenedQuestion[] $opened_questions
 */
class Step extends Entity
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
