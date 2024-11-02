<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hasil extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ghqAnswers()
    {
        return $this->hasOne(GHQAnswers::class);
    }

    public function dass21Answers()
    {
        return $this->hasOne(DASS21Answers::class);
    }

    public function hscl25Answers()
    {
        return $this->hasOne(HSCL25Answers::class);
    }

    public function htqAnswers()
    {
        return $this->hasOne(HTQAnswers::class);
    }
}
