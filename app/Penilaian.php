<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    protected $fillable = ['user_id', 'kehadiran', 'disiplin', 'dedikasi', 'komunikasi', 'kerjasama', 'kepatuhan', 'kepuasan_pelanggan', 'pemahaman_tupoksi']; 

    public function user() {
        return $this->belongsTo('App\User');
    }

    // 50
    // kehadiran, disiplin, dedikasi
    // 30
    // komunikasi, kerjasama, kepatuhan
    // 20
    // kepuasan_pelanggan, pemahaman_tupoksi

    public function nilai() {
        $alpha = ($this->kehadiran + $this->disiplin + $this->dedikasi) * 0.5;
        $gama = ($this->komunikasi + $this->kerjasama + $this->kepatuhan) * 0.3;
        $beta = ($this->kepuasan_pelanggan + $this->pemahaman_tupoksi) * 0.2;

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
}
