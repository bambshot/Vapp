<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Vtuber Entity
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $age
 * @property int $sex
 * @property string $height
 * @property \Cake\I18n\FrozenDate $debut_date
 * @property \Cake\I18n\FrozenDate $birthday
 * @property int $vtuber_group_id
 * @property int $youtube_channel_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\VtuberGroup $vtuber_group
 * @property \App\Model\Entity\YoutubeChannel $youtube_channel
 */
class Vtuber extends Entity
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
        'name' => true,
        'description' => true,
        'age' => true,
        'sex' => true,
        'height' => true,
        'debut_date' => true,
        'birthday' => true,
        'vtuber_group_id' => true,
        'youtube_channel_id' => true,
        'created' => true,
        'modified' => true,
        'vtuber_group' => true,
        'youtube_channel' => true,
    ];
}
