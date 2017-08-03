<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * OpenedQuestion Entity
 *
 * @property string $id
 * @property string $name
 * @property string $notes
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $updated
 * @property string $expected_answer_id
 *
 * @property \App\Model\Entity\ExpectedAnswer $expected_answer
 * @property \App\Model\Entity\Step[] $steps
 */
class OpenedQuestion extends Entity
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
