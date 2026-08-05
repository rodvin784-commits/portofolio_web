<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class project extends Model
{
    use HasFactory;

// ==========================================
    // FIELD YANG BOLEH DIISI SECARA MASS ASSIGNMENT
    // ==========================================
    protected $fillable = [
        'title',
        'description',
        'link',
        'views',
    ];

}
