<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Avatar extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'avatars';

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
    protected $fillable = ['hash', 'prop', 's3_url_abc', 's3_url_glb', 's3_url_obj'];
}
