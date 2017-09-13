<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
   protected $connection = 'mysql';
	protected $primaryKey = 'id';
	protected $table = 'notices';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = array('description');
        public $timestamp = false;
}
