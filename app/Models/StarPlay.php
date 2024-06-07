<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StarPlay extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'star_plays';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'user_id',
        'star_id',
        'payed',
        'confirmed',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function star()
    {
        return $this->belongsTo(Star::class, 'star_id');
    }

    public function plays()
    {
        return $this->hasMany(Play::class, 'play', 'id');
    }
}
