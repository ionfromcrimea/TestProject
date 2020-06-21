<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model

{
    protected $fillable = [
        'id_sender', 'id_reseiver', 'realname', 'filename', 'size', 'ext', 'delivered',
    ];

    /*
     * Получаем имя отправителя
     */
    public function sendername()
    {
        $user = (User::find($this->id_sender));
        return $user->name;
    }

}
