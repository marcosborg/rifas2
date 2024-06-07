<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Feature extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'features';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const PLACEMENT_RADIO = [
        '1' => 'Secção 1',
        '2' => 'Secção 2',
        '3' => 'Secção 3',
    ];

    protected $fillable = [
        'page_id',
        'placement',
        'position',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function page()
    {
        return $this->belongsTo(Page::class, 'page_id');
    }
}
