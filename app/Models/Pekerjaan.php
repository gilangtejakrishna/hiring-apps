<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pekerjaan extends Model
{
    use HasFactory;

    protected $table = 'pekerjaan';

    protected $fillable = [
        'nama',
        'status',
    ];

    public function pelamars()
    {
        return $this->hasMany(Pelamar::class, 'id_pekerjaan', 'id_pekerjaan');
    }
}
