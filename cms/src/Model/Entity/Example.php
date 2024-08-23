<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Example Entity
 *
 * @property int $id
 * @property string $name
 * @property string $detail
 * @property float $price
 * @property int $stock
 * @property int $status
 * @property \Cake\I18n\DateTime|null $create_date
 * @property string|null $topic_type
 * @property \Cake\I18n\DateTime|null $update_time
 */
class Example extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'name' => true,
        'detail' => true,
        'price' => true,
        'stock' => true,
        'status' => true,
        'create_date' => true,
        'topic_type' => true,
        'update_time' => true,
    ];
}
