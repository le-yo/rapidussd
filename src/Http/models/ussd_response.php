<?php

namespace leyo\rapidussd\Http\models;
use Illuminate\Database\Eloquent\Model;

class ussd_response extends Model {

	//
    protected $fillable = ['user_id','menu_id','response','menu_item_id'];


}
