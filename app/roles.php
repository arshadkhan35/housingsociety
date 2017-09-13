<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class roles extends Model
{
	protected $connection = 'mysql';
	protected $primaryKey = 'user_id';
	protected $table = 'roles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = array('rid', 'description', 'user_id');
        public $timestamp = false;
}
