<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class GarmentName extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'garment_names';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    public function materials()
    {
        return $this->hasMany('App\Model\Material');
    }

    public function garmentSizes()
    {
        return $this->hasMany(GarmentSize::class);
    }
    
}
