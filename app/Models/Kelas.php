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
     // Fungsi untuk mengambil kelas unik dari field 'kelas'
     public static function getUniqueKelas($tahun_ajaran_uuid)
     {
         return self::where('tahun_ajaran_uuid', $tahun_ajaran_uuid)
                    ->select('kelas') // Ambil field 'kelas' saja
                    ->distinct() // Pastikan nilai yang diambil unik
                    ->get();
     }
 
     // Fungsi untuk mengambil data kelas berdasarkan nomor kelas
     public static function getKelasByNumber($tahun_ajaran_uuid, $kelas_number)
     {
         return self::where('tahun_ajaran_uuid', $tahun_ajaran_uuid)
                    ->where('kelas', $kelas_number)
                    ->get();
     }
}
