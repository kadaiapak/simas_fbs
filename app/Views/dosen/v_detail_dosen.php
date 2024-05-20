<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Data Dosen</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12">
            <div class="x_panel">
                    <div class="x_title">
                        <h2>Detail Dosen</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="col-md-6 col-sm-6">
                            <!-- detail mahasiswa -->
                            <table class="table table-striped table-bordered mb-0">
                                <tr>
                                    <td class="font-weight-bold">NIDN</td>
                                    <td><?= $satuDosen['nidn'] ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">NIP</td>
                                    <td><?= $satuDosen['peg_nip']; ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Nama</td>
                                    <td><?= $satuDosen['peg_gel_dep']; ?> <?= $satuDosen['peg_nama']; ?>, <?= $satuDosen['peg_gel_bel']; ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Departemen</td>
                                    <td><?= $satuDosen['nama_departemen']; ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Pendidikan</td>
                                    <td><?= $satuDosen['peg_pendidikan']; ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Pangkat</td>
                                    <td><?= $satuDosen['peg_pangkat']; ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Golongan</td>
                                    <td><?= $satuDosen['peg_golongan']; ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Jabatan</td>
                                    <td><?= $satuDosen['peg_jabatan']; ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Tempat / Tgl Lahir</td>
                                    <td><?= $satuDosen['peg_tmp_lahir']; ?>/ <?= $satuDosen['peg_tgl_lahir']; ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Jenis Kelamin</td>
                                    <td><?= $satuDosen['peg_sex'] == 'P' ? 'Perempuan' : ($satuDosen['peg_sex'] == 'P' ? 'Laki - laki' : null ) ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Agama</td>
                                    <td><?= $satuDosen['peg_agama']; ?></td>
                                </tr>
                            </table>
                            <!-- akhir detail mahasiswa -->
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <div class role="tabpanel" data-example-id="togglable-tabs">
                                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Dosen PA</a>
                                    </li>
                                    <li role="presentation" class><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Dosen Pembimbing</a>
                                    </li>
                                    <li role="presentation" class><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Penguji 1</a>
                                    </li>
                                    <li role="presentation" class><a href="#tab_content4" role="tab" id="profile-tab3" data-toggle="tab" aria-expanded="false">Penguji 2</a>
                                    </li>
                                </ul>
                                <div id="myTabContent" class="tab-content">
                                    <div role="tabpanel" class="tab-pane active " id="tab_content1" aria-labelledby="home-tab">
                                        <table class="data table table-striped no-margin">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nama</th>
                                                    <th>Nim</th>
                                                    <th>Departemen</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1 ?>
                                                <?php foreach ($pa as $p) { ?>
                                                    <tr>
                                                    <td><?= $no; ?></td>
                                                    <td><?= $p['nim_mahasiswa']; ?></td>
                                                    <td><?= $p['nama_mahasiswa']; ?></td>
                                                    <td><?= $p['nama_departemen']; ?></td>
                                                </tr>
                                                <?php $no++ ?>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                                        <table class="data table table-striped no-margin">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nama</th>
                                                    <th>Nim</th>
                                                    <th>Departemen</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1 ?>
                                                <?php foreach ($pembimbing as $pb) { ?>
                                                <tr>
                                                    <td><?= $no; ?></td>
                                                    <td><?= $pb['nama_mahasiswa']; ?></td>
                                                    <td><?= $pb['nim_mahasiswa']; ?></td>
                                                    <td><?= $pb['nama_departemen']; ?></td>
                                                </tr>
                                                <?php $no ++ ?>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                                        <table class="data table table-striped no-margin">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nim</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1 ?>
                                                <?php foreach ($pengujiSatu as $ps) { ?>
                                                <tr>
                                                    <td><?= $no; ?></td>
                                                    <td><?= $ps['nim_mahasiswa']; ?></td>
                                                </tr>
                                                <?php $no ++ ?>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="profile-tab">
                                    <table class="data table table-striped no-margin">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nim</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1 ?>
                                                <?php foreach ($pengujiDua as $pd) { ?>
                                                <tr>
                                                    <td><?= $no; ?></td>
                                                    <td><?= $pd['nim_mahasiswa']; ?></td>
                                                </tr>
                                                <?php $no ++ ?>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="form-group">
                        <a href="<?= base_url('/master-judul'); ?>" class="btn btn-warning btn-sm"><i class="fa fa-chevron-circle-left" style="margin-right: 5px;"></i>Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById("myframe").height = "400";
</script>
<?= $this->endSection(); ?>
