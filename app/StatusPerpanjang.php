<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
class StatusPerpanjang extends Model
{
    protected $fillable = ['penilai_id', 'penilaian_id', 'status'];
    
    public function penilai() {
        return $this->belongsTo('App\User');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function penilaian() {
        return $this->belongsTo('App\Penilaian');
    }

    public static function boot()
    {
        parent::boot();

        self::creating(function($model){
            $user = Auth::user();
            if($user){
                $model->penilai_id = $user->id;
            }
        });

        self::updating(function($model){
            $user = Auth::user();
            if($user){
                $model->penilai_id = $user->id;
            }
        });
    }
}
