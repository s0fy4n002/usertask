<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Tasks extends Entity
{

    protected $_accessible = [
        'user_id' => true,
        'name' => true,
        'description' => true,
        'status' => true,
        'expired' => true,
        'created' => true,
        'user' => true,
    ];
}
