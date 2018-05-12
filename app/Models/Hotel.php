<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Comment;


/**
 * Class Hotel
 * @package App\Models
 * @version May 4, 2018, 6:35 pm UTC
 */
class Hotel extends Model
{
    use SoftDeletes;

    public $table = 'hotels';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'adress',
        'price',
        'rating',
        'image',
        'city_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'adress' => 'string',
        'image' => 'string',
        'city_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public function city(){
        return $this->belongsTo('App\Models\City');
    }


    public function comments(){
        return $this->hasMany('App\Models\Comment');
    }

    
}
