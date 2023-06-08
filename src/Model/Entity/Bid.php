<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Bid Entity
 *
 * @property int $id
 * @property int $listing_id
 * @property int $vendor_id
 * @property float $bid_amount
 * @property string $status
 *
 * @property \App\Model\Entity\Procurement $procurement
 * @property \App\Model\Entity\User $user
 */
class Bid extends Entity
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
        'listing_id' => true,
        'vendor_id' => true,
        'bid_amount' => true,
        'status' => true,
        'procurement' => true,
        'user' => true,
    ];
}
