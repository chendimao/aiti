<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/2/24 0024
 * Time: 9:51
 */

namespace App\Repositories;


use App\Message;

class MessageRepository
{
        public function create(array $attributes){
                return Message::create($attributes);
        }
}