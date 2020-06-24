<?= $this->session->flashdata('pesan'); ?>
<div class="row">
    <div class="p-3 mb-2 bg-primary text-white col-6 mx-auto text-center text-lg">Data Pasien</div>
    <div class="p-3 mb-2 bg-primary text-white col-5 mx-auto text-center text-lg">Poliklinik Tujuan</div>
</div>
<form action="" method="post">
    <div class="row">
        <div class="mb-2 col-6 mx-auto">
            <div class="form-group row">
                <label for="nama" class="col-sm-4 col-form-label text-right">Nama</label>
                <div class="col-sm-8">
                    <input name="nama" type="text" class="form-control" id="nama" value="<?= ($reset) ? "" : set_value('nama'); ?>">
                    <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="jk" class="col-sm-4 col-form-label text-right">Jenis Kelamin</label>
                <div class="col-sm-8">
                    <select class="form-control" id="jk" name="jk">
                        <option>Perempuan</option>
                        <option>Laki-laki</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="tgl" class="col-sm-4 col-form-label text-right">Tgl. Lahir</label>
                <div class="col-sm-8">
                    <input class="form-control datepicker" type="text" value="<?= date("d-m-Y"); ?>" id="tgl" name="tgl">
                </div>
            </div>
            <div class="form-group row">
                <label for="alamat" class="col-sm-4 col-form-label text-right">Alamat</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?= ($reset) ? "" : set_value('alamat'); ?>">
                    <?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="kab" class="col-sm-4 col-form-label text-right">Kabupaten/Kota</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="kab" name="kab" value="<?= ($reset) ? "" : set_value('kab'); ?>">
                    <?= form_error('kab', '<small class="text-danger">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="kec" class="col-sm-4 col-form-label text-right">Kecamatan</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="kec" name="kec" value="<?= ($reset) ? "" : set_value('kec'); ?>">
                    <?= form_error('kec', '<small class="text-danger">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="kel" class="col-sm-4 col-form-label text-right">Kelurahan</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="kel" name="kel" value="<?= ($reset) ? "" : set_value('kel'); ?>">
                    <?= form_error('kel', '<small class="text-danger">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="tlep" class="col-sm-4 col-form-label text-right">Telepon</label>
                <div class="col-sm-8">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">+62</div>
                        </div>
                        <input type="number" class="form-control" id="tlep" name="tlep" value="<?= ($reset) ? "" : set_value('tlep'); ?>">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-4 col-form-label text-right">Email</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="email" name="email" value="<?= ($reset) ? "" : set_value('email'); ?>">
                </div>
            </div>
        </div>
        <div class="p-3 mb-2 col-5 mx-auto">
            <div class="form-group row">
                <label for="poli" class="col-sm-4 col-form-label text-right">Poliklinik</label>
                <div class="col-sm-8">
                    <select class="form-control" id="poli" name="poli">
                        <?php foreach ($poli as $v) : ?>
                            <option value="<?= $v['id']; ?>"><?= $v['poliklinik']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-check row">
                <input type="checkbox" class="form-check-input" id="cek" name="cek" value="1" checked>
                <label class="form-check-label" for="cek">Dengan ini saya menyatakan bahwa informasi tersebut benar</label>
                <?= form_error('cek', '<small class="text-danger">', '</small>'); ?>
            </div>
            <div class="form-group row">
                <button type="submit" class="btn btn-primary mx-auto col-3 mt-3">Daftar</button>
            </div>
        </div>
    </div>
</form>