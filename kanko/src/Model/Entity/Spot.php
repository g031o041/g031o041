<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Spot Entity
 *
 * @property int $id
 * @property string $spot_name
 * @property string $spot_description
 * @property string $spot_address
 * @property \Cake\I18n\FrozenTime $start_date
 * @property \Cake\I18n\FrozenTime $end_date
 *
 * @property \App\Model\Entity\Route[] $routes
 * @property \App\Model\Entity\Tag[] $tags
 * @property \App\Model\Entity\User[] $users
 */
class Spot extends Entity
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
        'spot_name' => true,
        'spot_description' => true,
        'spot_address' => true,
        'start_date' => true,
        'end_date' => true,
        'routes' => true,
        'tags' => true,
        'users' => true
    ];
}
