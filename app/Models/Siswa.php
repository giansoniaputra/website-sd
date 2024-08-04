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

    public static function getDataSiswa($kelas, $tahun)
    {
        if ($tahun != "" && $kelas != "") {
            return DB::table('siswas as a')
                ->join('kelas as b', 'a.kelas_uuid', '=', 'b.uuid', 'left')
                ->select('a.*', 'b.nama_kelas', 'b.kelas')
                ->where('a.tahun_ajaran_uuid', $tahun)
                ->where('a.kelas', $kelas)
                ->get();
        } else if ($tahun != "" && $kelas == "") {
            return DB::table('kelas as a')
                ->join('tahun_ajarans as b', 'a.tahun_ajaran_uuid', '=', 'b.uuid', 'left')
                ->select('a.*', 'b.tahun_awal', 'b.tahun_akhir')
                ->where('a.tahun_ajaran_uuid', $tahun)
                ->get();
        } else if ($tahun == "" && $kelas != "") {
            return DB::table('kelas as a')
                ->join('tahun_ajarans as b', 'a.tahun_ajaran_uuid', '=', 'b.uuid', 'left')
                ->select('a.*', 'b.tahun_awal', 'b.tahun_akhir')
                ->where('a.kelas', $kelas)
                ->get();
        } else {
            return DB::table('kelas as a')
                ->join('tahun_ajarans as b', 'a.tahun_ajaran_uuid', '=', 'b.uuid', 'left')
                ->select('a.*', 'b.tahun_awal', 'b.tahun_akhir')
                ->get();
        }
    }
}
