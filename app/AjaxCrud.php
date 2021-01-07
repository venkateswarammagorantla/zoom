<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AjaxCrud extends Model
{
	protected $table = 'ajax_cruds';
	public $timestamps = false;
    /*protected $fillable = [
     'first_name', 'last_name', 'image'
    ];*/
}