<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class M_category extends Model {

	//
    protected $table = 'categories';

    public $timestamps = false;

    protected $fillable = [
        'cate_name',
        'cate_des',
        'order',
        'active'
    ];
}
