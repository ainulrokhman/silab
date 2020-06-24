<?= $this->session->flashdata('pesan'); ?>
<div class="row">
    <div class="p-3 mb-2 bg-primary text-white col-6 mx-auto text-center text-lg">Data Pasien</div>
    <div class="p-3 mb-2 bg-primary text-white col-5 mx-auto text-center text-lg">Jenis Pemeriksaan</div>
</div>
<form action="" method="post">
    <div class="row">
        <div class="mb-2 col-6 mx-auto">
            <div class="form-group row">
                <label for="pasien">Pilih id Pasien</label>
                <select class="form-control" id="pasien" name="pasien">
                    <option value="">Pilih</option>
                    <?php foreach ($pasien as $value) : ?>
                        <option value="<?= $value['id']; ?>"><?= $value['id']; ?></option>
                    <?php endforeach; ?>
                </select>
                <?= form_error('pasien', '<small class="text-danger ml-3">', '</small>'); ?>
            </div>
            <table class="table table-sm" style="width: 100%;">
                <tr>
                    <th scope="row" style="width: 40%;">Nama</th>
                    <td style="width: 5%;">:</td>
                    <td id="nama"></td>
                </tr>
                <tr>
                    <th scope="row">Jenis Kelamin</th>
                    <td>:</td>
                    <td id="jk"></td>
                </tr>
                <tr>
                    <th>Tanggal Lahir/ Usia</th>
                    <td>:</td>
                    <td id="lahir"></td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td>:</td>
                    <td id="alamat"></td>
                </tr>
                <tr>
                    <th>Kab/ Kota</th>
                    <td>:</td>
                    <td id="kab"></td>
                </tr>
                <tr>
                    <th>Kecamatan</th>
                    <td>:</td>
                    <td id="kec"></td>
                </tr>
                <tr>
                    <th>Kelurahan</th>
                    <td>:</td>
                    <td id="kel"></td>
                </tr>
                <tr>
                    <th>Tlep</th>
                    <td>:</td>
                    <td id="tlep"></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>:</td>
                    <td id="email"></td>
                </tr>
            </table>
        </div>
        <div class="p-3 mb-2 col-5 mx-auto">
            <?php foreach ($menu as $value) : ?>
                <?php if ($value['parent_id'] == 0) : ?>
                    <div style="display: block;" class="btn btn-primary text-left mb-2" data-toggle="collapse" href="#collapseExample<?= $value['id']; ?>" role="button" aria-expanded="false" aria-controls="collapseExample"><?= $value['desk']; ?></div>
                    <div class="collapse ml-3" id="collapseExample<?= $value['id']; ?>">
                        <?php foreach ($sub as $s) : ?>
                            <?php if ($value['id'] == $s['parent_id']) : ?>
                                <div class="form-check row">
                                    <input type="checkbox" class="form-check-input" id="<?= $s['id']; ?>" name="cek[]" value="<?= $s['id']; ?>">
                                    <label class="form-check-label" for="<?= $s['id']; ?>"><?= $s['desk']; ?></label>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        <?php foreach ($menu as $v) : ?>
                            <?php if ($value['id'] == $v['parent_id']) : ?>
                                <div style="display: block;" class="btn btn-primary text-left mb-2" data-toggle="collapse" href="#c<?= $v['id']; ?>" role="button" aria-expanded="false" aria-controls="collapseExample"><?= $v['desk']; ?></div>
                                <div class="collapse" id="c<?= $v['id']; ?>">
                                    <?php foreach ($sub as $s) : ?>
                                        <?php if ($v['id'] == $s['parent_id']) : ?>
                                            <div class="form-check row ml-1">
                                                <input type="checkbox" class="form-check-input" id="<?= $s['id']; ?>" name="cek[]" value="<?= $s['id']; ?>">
                                                <label class="form-check-label" for="<?= $s['id']; ?>"><?= $s['desk']; ?></label>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
            <?= form_error('cek', '<small class="text-danger ml-3">', '</small>'); ?>
            <div class="form-group row">
                <button type="submit" class="btn btn-primary mx-auto col-3 mt-3">Daftar</button>
            </div>
        </div>
    </div>
</form>