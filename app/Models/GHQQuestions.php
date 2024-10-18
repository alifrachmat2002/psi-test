<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GHQQuestions extends Model
{
    protected $table = 'ref_qghq12';
    protected $fillable = ['question', 'pil1', 'pil2', 'pil3', 'pil4'];
}
