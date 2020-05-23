<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invite extends Model
{
    protected $table = 'tb_invites';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $fillable = [
        'email', 'token',
    ];
}
