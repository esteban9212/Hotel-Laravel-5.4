<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Comment
 * @package App\Models
 * @version May 4, 2018, 8:04 pm UTC
 */
class Comment extends Model
{
    use SoftDeletes;

    public $table = 'comments';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'description',
        'Qualification',
        'user_id',
        'hotel_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'description' => 'string',
        'Qualification' => 'double',
        'user_id' => 'integer',
        'hotel_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];


    public function hotel(){
        return $this->belongsTo('App\Models\Hotel');
    }

     public function user(){
        return $this->belongsTo('App\User');
    }
    
}
