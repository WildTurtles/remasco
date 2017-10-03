<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * LinksStepsUser Entity
 *
 * @property string $user_id
 * @property string $step_id
 * @property string $link_id
 * @property bool $lock
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $updated
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Step $step
 * @property \App\Model\Entity\Link $link
 */
class LinksStepsUser extends Entity
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
        'user_id' => false,
        'step_id' => false,
        'link_id' => false
    ];
}
