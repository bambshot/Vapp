<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * VtuberGroup Entity
 *
 * @property int $id
 * @property string $name
 * @property string $site_url
 * @property int $youtube_channel_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\YoutubeChannel $youtube_channel
 * @property \App\Model\Entity\Vtuber[] $vtubers
 */
class VtuberGroup extends Entity
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
        'site_url' => true,
        'youtube_channel_id' => true,
        'created' => true,
        'modified' => true,
        'youtube_channel' => true,
        'vtubers' => true,
    ];
}
