<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    /** @use HasFactory<\Database\Factories\RecordFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'user_id',
        "date",
        "time",
        "weight",
        "systolic",
        "diastolic",
        "pulse",
        "notes"
    ];

    /**
     * The attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'date' => 'date:Y-m-d',
            'time' => 'datetime:H:i a',
            'weight' => 'integer',
            'systolic' => 'integer',
            'diastolic' => 'integer',
            'pulse' => 'integer',
            'notes' => 'string'
        ];
    }

    /**
     * Get the records for the user.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
