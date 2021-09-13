<?php

namespace App\Models;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Model;
use LaravelLegends\EloquentFilter\HasFilter;

class Dummy extends Model
{
    use UsesUuid;
    use HasFilter;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'DummyTable';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['uuid'];

    protected $casts = [
        'json_data' => 'array'
    ];
}
