<?php
namespace leyo\rapidussd\Http\models;
use Illuminate\Database\Eloquent\Model;

class ussd_menu extends Model {

    protected $fillable = ['title','type','is_parent','confirmation_message'];


}
