<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PizzaOrder Entity.
 *
 * @property int $id
 * @property string $userName
 * @property string $postalCode
 * @property string $province
 * @property string $city
 * @property string $size
 * @property string $topping
 * @property string $crustType
 * @property string $email
 * @property string $orderStatus
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 */
class PizzaOrder extends Entity
{

}
