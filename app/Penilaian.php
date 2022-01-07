<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    protected $fillable = ['user_id', 'kehadiran', 'disiplin', 'dedikasi', 'komunikasi', 'kerjasama', 'kepatuhan', 'kepuasan_pelanggan', 'pemahaman_tupoksi']; 

    public function user() {
        return $this->belongsTo('App\User');
    }
}
