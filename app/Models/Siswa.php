<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Siswa extends Model
{
    use HasFactory;

    protected $guarded = ['uuid'];

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public static function getDataSiswa($kelas_uuid)
    {
        return DB::table('siswas as a')
            ->join('kelas as b', 'a.kelas_uuid', '=', 'b.uuid', 'left')
            ->join('tahun_ajarans as c', 'b.tahun_ajaran_uuid', '=', 'c.uuid', 'left')
            ->select('a.*', 'b.nama_kelas', 'c.tahun_awal', 'c.tahun_akhir')
            ->where('a.kelas_uuid', $kelas_uuid)
            ->get();
    }
}
