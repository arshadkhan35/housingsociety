<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillMaintainance extends Model
{
    protected $connection = 'mysql';
	protected $primaryKey = 'user_id';
	protected $table = 'maintainance_bill';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = array('user_id','month','year','amount','description');
        public $timestamp = false;
}
