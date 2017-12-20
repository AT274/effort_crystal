<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Goal Entity
 *
 * @property int $id
 * @property string $title
 * @property int $target
 * @property string $description
 * @property int $progress
 * @property \Cake\I18n\FrozenTime $due_date
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class Goal extends Entity
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
        'title' => true,
        'target' => true,
        'description' => true,
        'progress' => true,
        'due_date' => true,
        'created' => true,
        'modified' => true
    ];
}
