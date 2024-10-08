
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreatePelamarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelamar', function (Blueprint $table) {
            $table->id('id_pelamar');
            $table->string('nama_lengkap');
            $table->date('tgl_lahir');
            $table->text('alamat')->nullable();
            $table->string('kode_pos', 10)->nullable();
            $table->string('email')->unique();
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('no_tlp', 20)->nullable();
            $table->unsignedBigInteger('id_pekerjaan')->nullable(); // foreign key ke id_pekerjaan di tabel pekerjaan
            $table->foreign('id_pekerjaan')->references('id_pekerjaan')->on('pekerjaan')->onDelete('set null');
            $table->string('lulusan');
            $table->string('berkas'); // file berkas PDF
            $table->enum('status', ['pending', 'diterima', 'ditolak'])->default('pending');
            $table->timestamps();
        });

        // Insert data pelamar
        DB::table('pelamar')->insert([
            [
                'nama_lengkap' => 'John Doe',
                'tgl_lahir' => '1990-01-01',
                'alamat' => 'Jl. Example No. 1',
                'kode_pos' => '12345',
                'email' => 'johndoe@example.com',
                'jenis_kelamin' => 'L',
                'no_tlp' => '081234567890',
                'id_pekerjaan' => 1, // Software Engineer
                'lulusan' => 'S1 Teknik Informatika',
                'berkas' => 'johndoe_cv.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_lengkap' => 'Jane Smith',
                'tgl_lahir' => '1992-02-02',
                'alamat' => 'Jl. Example No. 2',
                'kode_pos' => '54321',
                'email' => 'janesmith@example.com',
                'jenis_kelamin' => 'P',
                'no_tlp' => '089876543210',
                'id_pekerjaan' => 2, // Data Analyst
                'lulusan' => 'S1 Statistik',
                'berkas' => 'janesmith_cv.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_lengkap' => 'Michael Johnson',
                'tgl_lahir' => '1988-03-03',
                'alamat' => 'Jl. Example No. 3',
                'kode_pos' => '67890',
                'email' => 'michaeljohnson@example.com',
                'jenis_kelamin' => 'L',
                'no_tlp' => '087654321098',
                'id_pekerjaan' => 3, // Product Manager
                'lulusan' => 'S2 Manajemen Bisnis',
                'berkas' => 'michaeljohnson_cv.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pelamar');
    }
}

