<?php
namespace Callisto\Model\Entity;

use Cake\ORM\Entity;

/**
 * Site Entity.
 *
 * @property string $id
 * @property string $name
 * @property string $domain
 * @property string $publisher_id
 * @property \Callisto\Model\Entity\Publisher $publisher
 * @property bool $active
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property \Cake\I18n\Time $deleted
 * @property \Callisto\Model\Entity\Subscription[] $subscriptions
 * @property \Callisto\Model\Entity\Ad[] $ads
 */
class Site extends Entity
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
