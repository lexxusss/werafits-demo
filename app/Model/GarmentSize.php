<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class GarmentSize extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'garment_sizes';

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
    protected $fillable = ['name', 's3_url_zpac', 'garment_name_id'];

    public function garmentName()
    {
        return $this->belongsTo(GarmentName::class);
    }
    
}
