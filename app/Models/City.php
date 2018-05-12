<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class City
 * @package App\Models
 * @version May 4, 2018, 6:20 pm UTC
 */
class City extends Model
{
    use SoftDeletes;

    public $table = 'cities';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'country'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'country' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];


    public function hotels(){
        return $this->hasMany('App\Models\Hotel');
    }
    
}
