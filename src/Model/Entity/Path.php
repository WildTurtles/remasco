<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Path Entity
 *
 * @property string $id
 * @property string $name
 * @property string $notes
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $updated
 *
 * @property \App\Model\Entity\Step[] $steps
 * @property \App\Model\Entity\Chapter[] $chapters
 * @property \App\Model\Entity\Try[] $tries
 * @property \App\Model\Entity\User[] $users
 */
class Path extends Entity
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
