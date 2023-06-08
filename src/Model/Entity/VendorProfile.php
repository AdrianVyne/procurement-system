<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * VendorProfile Entity
 *
 * @property int $id
 * @property int $user_id
 * @property string $company_name
 * @property string $contact_person
 * @property string $address
 * @property string $phone_number
 *
 * @property \App\Model\Entity\User $user
 */
class VendorProfile extends Entity
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
        'user_id' => true,
        'company_name' => true,
        'contact_person' => true,
        'address' => true,
        'phone_number' => true,
        'user' => true,
    ];
}
