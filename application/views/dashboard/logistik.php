<?= $this->session->flashdata('pesan'); ?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h4 class="m-0 font-weight-bold text-primary float-left">
            Data Persediaan Logistik
        </h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <div class="row">
                <div class="col-lg-6">
                    <span class="tambah"><a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit">Tambah data</a></span>
                </div>

                <div class="col-lg-2 mb-3 text-right">
                    <label class="mt-2" for="typelog">Stok:</label>
                </div>
                <div class="col-lg-4 mb-3">
                    <select data-column="8" class="form-control float-left" id="typelog">
                        <option value="">Habis Pakai & Reagen</option>
                        <option value="1">Habis Pakai</option>
                        <option value="2">Reagen</option>
                    </select>
                </div>
            </div>
            <table class="hehe table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No Lot</th>
                        <th>Nama</th>
                        <th>Merk</th>
                        <th>Tanggal Masuk</th>
                        <th>Jumlah</th>
                        <th>Satuan</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No Lot</th>
                        <th>Nama</th>
                        <th>Merk</th>
                        <th>Tanggal Masuk</th>
                        <th>Jumlah</th>
                        <th>Satuan</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach ($menu as $value) : ?>
                        <tr>
                            <td><?= $value['no_lot']; ?></td>
                            <td><?= $value['nama']; ?></td>
                            <td><?= $value['merk']; ?></td>
                            <td><?= tampil_tgl($value['tanggal']); ?></td>
                            <td><?= $value['jumlah']; ?></td>
                            <td><?= $value['satuan']; ?></td>
                            <td><?= $value['harga']; ?></td>
                            <td>
                                <a href="#" class="badge badge-success edit" data-toggle="modal" data-target="#edit" data-id="<?= $value['id']; ?>">Edit</a>
                                <a href="#" class="badge badge-info gunakan" data-toggle="modal" data-target="#gunakan" data-id="<?= $value['id']; ?>" data-jml="<?= $value['jumlah']; ?>">Gunakan</a>
                                <a href="?hapus=<?= $value['id']; ?>" class="badge badge-danger hapus">Hapus</a>
                            </td>
                            <td><?= $value['type_id']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="modalform" action="" method="POST">
                            <input type="hidden" id="id" name="id">
                            <div class="form-group row">
                                <label for="no_lot" class="col-sm-4 col-form-label">No Lot</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" id="no_lot" name="no_lot">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama" class="col-sm-4 col-form-label">Nama</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="nama" name="nama">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="merk" class="col-sm-4 col-form-label">Merk</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="merk" name="merk">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tanggal" class="col-sm-4 col-form-label">Tanggal Masuk</label>
                                <div class="col-sm-8">
                                    <input class="form-control datepicker" type="text" name="tanggal" id="tanggal">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="jumlah" class="col-sm-4 col-form-label">Jumlah</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" id="jumlah" name="jumlah">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="satuan" class="col-sm-4 col-form-label">Satuan</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="satuan" name="satuan">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="harga" class="col-sm-4 col-form-label">Harga</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" id="harga" name="harga">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="type_id" class="col-sm-4 col-form-label">Stok:</label>
                                <div class="col-sm-8">
                                    <select class="form-control" id="type_id" name="type_id">
                                        <option value="1">Habis Pakai</option>
                                        <option value="2">Reagen</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary batal" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="gunakan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formgunakan" action="pemakaian" method="POST">
                    <input type="hidden" id="total" name="total">
                    <input type="hidden" id="id_log" name="id_log">
                    <div class="form-group row">
                        <label for="name" class="col-sm-4 col-form-label">Nama</label>
                        <div class="col-sm-8">
                            <input type="text" disabled class="form-control" id="name" name="name">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="jml" class="col-sm-4 col-form-label">Jumlah</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" id="jml" name="jml">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="ket" class="col-sm-4 col-form-label">Keterangan</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="ket" name="ket">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tgl" class="col-sm-4 col-form-label">Tanggal</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control datepicker" id="tgl" name="tgl">
                        </div>
                    </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary batal" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>