<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Symulation extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'symulations';

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
    protected $fillable = ['garment_size_id', 'avatar_id', 's3_url_garment_json', 's3_url_garment_preview_json', 's3_url_garment_usdz', 's3_url_garment_metadata_json'];

    public function garmentSize()
    {
        return $this->belongsTo('App\Model\GarmentSize');
    }
    public function avatar()
    {
        return $this->belongsTo('App\Model\Avatar');
    }
    
}
