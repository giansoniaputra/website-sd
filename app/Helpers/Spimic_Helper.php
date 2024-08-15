<?php

use App\Models\Kelas;
use App\Models\Siswa;
function getKelas($tahun_ajaran_uuid)
{
    return Kelas::where('tahun_ajaran_uuid', $tahun_ajaran_uuid)->get();
}
function getSiswa($kelas_uuid)
{
    return Siswa::where('kelas_uuid', $kelas_uuid)->get();
}