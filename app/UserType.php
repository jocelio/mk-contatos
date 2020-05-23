<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Self_;

class UserType extends Model
{
    protected $table = 'tb_user_type';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $fillable = [
        'type'
    ];


    public static function getCostumerId(){
        return UserType::where('type', 'COSTUMER')->first()->id;
    }
}
