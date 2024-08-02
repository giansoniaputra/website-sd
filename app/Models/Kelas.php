<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kelas extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public static function getKelas($tahun_ajaran_uuid = "", $kelas = "")
    {
        if ($tahun_ajaran_uuid != "" && $kelas != "") {
            return DB::table('kelas as a')
                ->join('tahun_ajarans as b', 'a.tahun_ajaran_uuid', '=', 'b.uuid', 'left')
                ->select('a.*', 'b.tahun_awal', 'b.tahun_akhir')
                ->where('a.tahun_ajaran_uuid', $tahun_ajaran_uuid)
                ->where('a.kelas', $kelas)
                ->get();
        } else if ($tahun_ajaran_uuid != "" && $kelas == "") {
            return DB::table('kelas as a')
                ->join('tahun_ajarans as b', 'a.tahun_ajaran_uuid', '=', 'b.uuid', 'left')
                ->select('a.*', 'b.tahun_awal', 'b.tahun_akhir')
                ->where('a.tahun_ajaran_uuid', $tahun_ajaran_uuid)
                ->get();
        } else if ($tahun_ajaran_uuid == "" && $kelas != "") {
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
