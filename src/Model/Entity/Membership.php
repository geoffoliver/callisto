<?php
namespace Callisto\Model\Entity;

use Cake\ORM\Entity;

/**
 * Membership Entity.
 *
 * @property string $id
 * @property string $subscription_id
 * @property \Callisto\Model\Entity\Subscription $subscription
 * @property string $reader_id
 * @property \Callisto\Model\Entity\Reader $reader
 * @property \Cake\I18n\Time $deleted
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 */
class Membership extends Entity
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
        'id' => false,
    ];
}
