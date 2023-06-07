<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Procurement Entity
 *
 * @property int $id
 * @property int $organization_id
 * @property string $title
 * @property string $description
 * @property string $category
 * @property \Cake\I18n\FrozenTime $deadline
 * @property float $budget
 *
 * @property \App\Model\Entity\User $user
 */
class Procurement extends Entity
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
        'organization_id' => true,
        'title' => true,
        'description' => true,
        'category' => true,
        'deadline' => true,
        'budget' => true,
        'user' => true,
    ];
}
