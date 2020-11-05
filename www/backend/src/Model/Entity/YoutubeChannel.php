<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * YoutubeChannel Entity
 *
 * @property int $id
 * @property string $channel_id
 * @property string $name
 * @property string $thumbnail
 * @property string $description
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Channel $channel
 * @property \App\Model\Entity\VtuberGroup[] $vtuber_groups
 * @property \App\Model\Entity\Vtuber[] $vtubers
 */
class YoutubeChannel extends Entity
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
        'channel_id' => true,
        'name' => true,
        'thumbnail' => true,
        'description' => true,
        'created' => true,
        'modified' => true,
        'channel' => true,
        'vtuber_groups' => true,
        'vtubers' => true,
    ];
}
