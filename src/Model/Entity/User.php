<?php
namespace App\Model\Entity;
use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;
/**
 * User Entity
 *
 * @property string $id
 * @property string $name
 * @property string $fistname
 * @property string $avatar
 * @property string $pseudo
 * @property string $email
 * @property string $password
 *
 * @property \App\Model\Entity\Try[] $tries
 * @property \App\Model\Entity\Group[] $groups
 * @property \App\Model\Entity\Path[] $paths
 */
class User extends Entity
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
    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];

    protected function _setPassword($password)
    {
        if (strlen($password) > 0) {
            return (new DefaultPasswordHasher)->hash($password);
        }
    }


}
