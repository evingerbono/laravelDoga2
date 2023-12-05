<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    use HasFactory;

    protected  $primaryKey = 'event_id';

    protected $fillable = [
        'date',
        'agency_id',
        'limit',
    ];

    public function agencies()
    {
        return $this->hasMany(Agencies::class, 'agency_id', 'agency_id');
    }

    public function participates()
    {
        return $this->hasMany(Participates::class, 'event_id', 'event_id');
    }
}
