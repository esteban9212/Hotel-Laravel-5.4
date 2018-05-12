<?php

namespace App\Repositories;

use App\Models\Hotel;
use InfyOm\Generator\Common\BaseRepository;

class HotelRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'adress',
        'price',
        'rating',
        'image',
        'city_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Hotel::class;
    }
}
