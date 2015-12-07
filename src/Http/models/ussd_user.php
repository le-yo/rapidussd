<?php

namespace leyo\rapidussd\Http\models;
use Illuminate\Database\Eloquent\Model;

class ussd_user extends Model {

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['difficulty_level','name','office_id','client_id','phone_no','email','session','progress','pin','confirm_from','menu_item_id'];




}
