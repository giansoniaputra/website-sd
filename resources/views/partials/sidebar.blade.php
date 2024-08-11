<!-- ========== Left Sidebar Start ========== -->
<div class="leftside-menu">

    <!-- Brand Logo Light -->
    <a href="index.html" class="logo logo-light">
        <span class="logo-lg">
            <img src="/assets/images/logo.png" alt="logo">
        </span>
        <span class="logo-sm">
            <img src="/assets/images/logo-sm.png" alt="small logo">
        </span>
    </a>

    <!-- Brand Logo Dark -->
    <a href="index.html" class="logo logo-dark">
        <span class="logo-lg">
            <img src="/assets/images/logo-dark.png" alt="dark logo">
        </span>
        <span class="logo-sm">
            <img src="/assets/images/logo-sm.png" alt="small logo">
        </span>
    </a>

    <!-- Sidebar -left -->
    <div class="h-100" id="leftside-menu-container" data-simplebar>
        <!--- Sidemenu -->
        <ul class="side-nav">
            <li class="side-nav-title">Main</li>
            <li class="side-nav-item">
                <a href="index.html" class="side-nav-link">
                    <i class="ri-dashboard-3-line"></i>
                    <span class="badge bg-success float-end">9+</span>
                    <span> Dashboard </span>
                </a>
            </li>
            {{-- <li class="side-nav-item">
                <a href="/profil/yayasan" class="side-nav-link">
                    <i class="ri-dashboard-3-line"></i>
                    <span class="badge bg-success float-end"></span>
                    <span> Profil Yayasan </span>
                </a>
            </li> --}}
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarYayasan" aria-expanded="false" aria-controls="sidebarPages"
                    class="side-nav-link">
                    <i class="ri-pages-line"></i>
                    <span> Yayasan </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarYayasan">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="/profil/yayasan">Profil</a>
                        </li>
                        <li>
                            <a href="#">Pengurus</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarSekolah" aria-expanded="false" aria-controls="sidebarPages"
                    class="side-nav-link">
                    <i class="ri-pages-line"></i>
                    <span> Sekolah </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarSekolah">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="/profil/sekolah">Profil</a>
                        </li>
                        <li>
                            <a href="/informasi-umum">Informasi umum</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarWakasek" aria-expanded="false" aria-controls="sidebarWakasek"
                    class="side-nav-link">
                    <i class="ri-pages-line"></i>
                    <span> Wakasek </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarWakasek">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="/sarana">Sarana</a>
                        </li>
                        <li>
                            <a href="/humas">Humas</a>
                        </li>
                        <li>
                            <a href="/kurikulum">Kurikulum</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a href="/pegawai" class="side-nav-link">
                    <i class="ri-dashboard-3-line"></i>
                    <span class="badge bg-success float-end"></span>
                    <span> Guru & Staff </span>
                </a>
            </li>
            {{-- <li class="side-nav-item">
                <a href="/ppdb" class="side-nav-link">
                    <i class="ri-dashboard-3-line"></i>
                    <span class="badge bg-success float-end"></span>
                    <span> PPDB </span>
                </a>
            </li> --}}
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarPpdb" aria-expanded="false" aria-controls="sidebarPages"
                    class="side-nav-link">
                    <i class="ri-pages-line"></i>
                    <span> PPDB </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarPpdb">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="/ppdb">Data PPDB</a>
                        </li>
                        <li>
                            <a href="/cover-ppdb">Foto PPDB</a>
                        </li>
                    </ul>
                </div>
            </li>
            {{-- <li class="side-nav-item">
                <a href="/humas" class="side-nav-link">
                    <i class="ri-dashboard-3-line"></i>
                    <span class="badge bg-success float-end"></span>
                    <span> Humas </span>
                </a>
            </li> --}}
            <li class="side-nav-item">
                <a href="#" class="side-nav-link">
                    <i class="ri-dashboard-3-line"></i>
                    <span class="badge bg-success float-end"></span>
                    <span> Layanan </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarDataSiswa" aria-expanded="false"
                    aria-controls="sidebarDataSiswa" class="side-nav-link">
                    <i class="ri-pages-line"></i>
                    <span> Data Siswa </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarDataSiswa">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="/kelas">Kelas</a>
                        </li>
                        <li>
                            <a href="/tahun-ajaran">Tahun Ajaran</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarBerita" aria-expanded="false"
                    aria-controls="sidebarBerita" class="side-nav-link">
                    <i class="ri-pages-line"></i>
                    <span> Berita </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarBerita">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="/kategori">Kategori</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a href="#" class="side-nav-link">
                    <i class="ri-dashboard-3-line"></i>
                    <span class="badge bg-success float-end"></span>
                    <span> Galeri </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarGaleri" aria-expanded="false"
                    aria-controls="sidebarGaleri" class="side-nav-link">
                    <i class="ri-pages-line"></i>
                    <span> Galeri </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarGaleri">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="/gallery">Foto</a>
                        </li>
                        <li>
                            <a href="/video">Video</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a href="/auth/register" class="side-nav-link">
                    <i class="ri-dashboard-3-line"></i>
                    <span class="badge bg-success float-end"></span>
                    <span> Register </span>
                </a>
            </li>
        </ul>
        <!--- End Sidemenu -->

        <div class="clearfix"></div>
    </div>
</div>
<!-- ========== Left Sidebar End ========== -->
