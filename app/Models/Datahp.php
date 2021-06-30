<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datahp extends Model
{
    use HasFactory;
    protected $fillable = [
        'nip', 'nama', 'alamat', 'image'
    ];
}
