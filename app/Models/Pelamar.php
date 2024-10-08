<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelamar extends Model
{
    use HasFactory;

    protected $table = 'pelamar';

    protected $fillable = [
        'nama_lengkap',
        'tgl_lahir',
        'alamat',
        'kode_pos',
        'email',
        'jenis_kelamin',
        'no_tlp',
        'id_pekerjaan',
        'lulusan',
        'berkas',
        'status',
    ];

    public function pekerjaan()
    {
        return $this->belongsTo(Pekerjaan::class, 'id_pekerjaan', 'id_pekerjaan');
    }
}
