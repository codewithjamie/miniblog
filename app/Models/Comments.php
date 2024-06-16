<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Posts;

class Comments extends Model
{
    use HasFactory;
    protected $fillable = [
        'comment',
    ];

}
