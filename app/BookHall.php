<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookHall extends Model
{
    protected $connection = 'mysql';
	protected $primaryKey = 'id';
	protected $table = 'hall_booking';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = array('user_id','from','to','is_approved');
        public $timestamp = false;
}
