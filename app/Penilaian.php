<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Penilaian extends Model
{
    protected $fillable = ['user_id', 'penilai_id', 'kehadiran', 'disiplin', 'dedikasi', 'komunikasi', 'kerjasama', 'kepatuhan', 'kepuasan_pelanggan', 'pemahaman_tupoksi']; 

    public function user() {
        return $this->belongsTo('App\User');
    }
    
    public function penilai() {
        return $this->belongsTo('App\User');
    }

    // 50
    // kehadiran, disiplin, dedikasi
    // 30
    // komunikasi, kerjasama, kepatuhan
    // 20
    // kepuasan_pelanggan, pemahaman_tupoksi

    public function nilai() {
        $alpha = (($this->kehadiran + $this->disiplin + $this->dedikasi) * 0.5) / 3;
        $gama = (($this->komunikasi + $this->kerjasama + $this->kepatuhan) * 0.3) / 3;
        $beta = (($this->kepuasan_pelanggan + $this->pemahaman_tupoksi) * 0.2) / 2;

        $total = $alpha + $gama + $beta;
        if($total > 95) {
            return "a";
        }else if($total > 86 && $total <= 95){
            return "b";
        }else if($total > 66 && $total <= 85){
            return "c";
        }else if($total > 51 && $total <= 65){
            return "d";
        }else{
            return "e";
        }
    }

    public function getCaptionNilai($grade){
        switch ($grade) {
            case 'a':
                return "Sangat Baik";
                break;
            case 'b':
                return "Baik";
                break;
            case 'c':
                return "Cukup";
                break;
            case 'd':
                return "Kurang";
                break;
            case 'e':
                return "Sangat Kurang";
                break;
        }
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
