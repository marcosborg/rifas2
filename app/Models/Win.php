<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Win extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'wins';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'star_id',
        'star_play_id',
        'user_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function star()
    {
        return $this->belongsTo(Star::class, 'star_id');
    }

    public function star_play()
    {
        return $this->belongsTo(StarPlay::class, 'star_play_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
