<!-- Menu -->
            <div class="menu">
                <ul class="list">
<?php if($jenjang=='dinas'){ ?>
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="active">
                        <a href="../../media">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">swap_calls</i>
                            <span>Managemen Data</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="../../modules/dinas/tabel">User Sekolah</a>
                            </li>
                            <li>
                                <a href="../../modules/dinas/th_pelajaran">Tahun Pelajaran</a>
                            </li>
                            <li>
                                <a href="../../modules/dinas/semester">Triwulan</a>
                            </li>
                            <li>
                                <a href="../../modules/dinas/tgl_sptjm">Tanggal Pengesahan</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="../../modules/dinas/pilih_progres">
                            <i class="material-icons">pie_chart</i>
                            <span>Progres Rekap BOS</span>
                        </a>
                    </li>
                    <li>
                        <a href="../../modules/dinas/pilih_pengesahan">
                            <i class="material-icons">layers</i>
                            <span>Pengesahan</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">print</i>
                            <span>Hasil Rekap Lembaga</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="../../modules/dinas/pilih_belanja">Laporan Belanja</a>
                            </li>
                            <li>
                                <a href="../../modules/dinas/pilih_tabel">Laporan K7a</a>
                            </li>
                            <li>
                                <a href="../../modules/dinas/pilih_snp">Laporan 8 (delapan) SNP</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="../../modules/dinas/pilih_chart">
                            <i class="material-icons">trending_down</i>
                            <span>Flow Chart Data BOS</span>
                        </a>
                    </li>
<?php } ?>

<?php if($jenjang=='smk'){ ?>
    <li class="header">MAIN NAVIGATION</li>
                    <li class="active">
                        <a href="../../home">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="../../modules/smk/act_rkas">
                            <i class="material-icons">layers</i>
                            <span>Input RKAS BOS</span>
                        </a>
                    </li>
                    <li>
                        <a href="../../modules/smk/act_pilih">
                            <i class="material-icons">money</i>
                            <span>Input Realisasi Penggunaan BOS</span>
                        </a>
                    </li>
                    <li>
                        <a href="../../modules/smk/act_pilih_snp">
                            <i class="material-icons">money</i>
                            <span>Input Penggunaan 8 (delapan) SNP</span>
                        </a>
                    </li>
                    <li>
                        <a href="../../modules/smk/act_pengesahan">
                            <i class="material-icons">assignment</i>
                            <span>Pengesahan Rekap Dana BOS</span>
                        </a>
                    </li>
                    <li>
                        <a href="../../chart">
                            <i class="material-icons">pie_chart</i>
                            <span>Diagram Penggunaan BOS</span>
                        </a>
                    </li>
<?php } ?>

<?php if($jenjang=='sma'){ ?>
    <li class="header">MAIN NAVIGATION</li>
                    <li class="active">
                        <a href="../../home">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="../../modules/sma/act_rkas">
                            <i class="material-icons">layers</i>
                            <span>Input RKAS BOS</span>
                        </a>
                    </li>
                    <li>
                        <a href="../../modules/sma/act_pilih">
                            <i class="material-icons">money</i>
                            <span>Input Realisasi Penggunaan BOS</span>
                        </a>
                    </li>
                    <li>
                        <a href="../../modules/sma/act_pilih_snp">
                            <i class="material-icons">money</i>
                            <span>Input Penggunaan 8 (delapan) SNP</span>
                        </a>
                    </li>
                    <li>
                        <a href="../../modules/sma/act_pengesahan">
                            <i class="material-icons">assignment</i>
                            <span>Pengesahan Rekap Dana BOS</span>
                        </a>
                    </li>
                    <li>
                        <a href="../../chart">
                            <i class="material-icons">pie_chart</i>
                            <span>Diagram Penggunaan BOS</span>
                        </a>
                    </li>
<?php } ?>

<?php if($jenjang=='pklk'){ ?>
    <li class="header">MAIN NAVIGATION</li>
                    <li class="active">
                        <a href="../../home">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="../../modules/pklk/act_rkas">
                            <i class="material-icons">layers</i>
                            <span>Input RKAS BOS</span>
                        </a>
                    </li>
                    <li>
                        <a href="../../modules/pklk/act_pilih">
                            <i class="material-icons">money</i>
                            <span>Input Realisasi Penggunaan BOS</span>
                        </a>
                    </li>
                    <li>
                        <a href="../../modules/pklk/act_pilih_snp">
                            <i class="material-icons">money</i>
                            <span>Input Penggunaan 8 (delapan) SNP</span>
                        </a>
                    </li>
                    <li>
                        <a href="../../modules/pklk/act_pengesahan">
                            <i class="material-icons">assignment</i>
                            <span>Pengesahan Rekap Dana BOS</span>
                        </a>
                    </li>
                    <li>
                        <a href="../../chart">
                            <i class="material-icons">pie_chart</i>
                            <span>Diagram Penggunaan BOS</span>
                        </a>
                    </li>
<?php } ?>
            </div>
            <!-- #Menu -->