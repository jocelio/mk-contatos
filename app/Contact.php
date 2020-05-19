<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'tb_contact_profile';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $fillable = ['id','user_id','id_category','name','phone1','phone2','product_description','opening_hours','city','shipping_method'];
}
