<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;

    protected $table = 'registros';

    protected $fillable = [
        'id',
        'type',
        'message',
        'is_identified',
        'whistleblower_name',
        'whistleblower_birth',
        'created_at',
        'deleted',
    ];

    public $timestamps = false;
}
