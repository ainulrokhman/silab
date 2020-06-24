<?= $this->session->flashdata('pesan'); ?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h4 class="m-0 font-weight-bold text-primary float-left">
            Data Pemakaian Logistik
        </h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Lot</th>
                        <th>Nama</th>
                        <th>Merk</th>
                        <th>Tanggal</th>
                        <th>Jumlah</th>
                        <th>Satuan</th>
                        <th>Harga</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Lot</th>
                        <th>Nama</th>
                        <th>Merk</th>
                        <th>Tanggal</th>
                        <th>Jumlah</th>
                        <th>Satuan</th>
                        <th>Harga</th>
                        <th>Keterangan</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach ($d as $value) : ?>
                        <tr>
                            <td><?= $value['lot']; ?></td>
                            <td><?= $value['nama']; ?></td>
                            <td><?= $value['merk']; ?></td>
                            <td><?= tampil_tgl($value['tanggal']); ?></td>
                            <td><?= $value['jumlah']; ?></td>
                            <td><?= $value['satuan']; ?></td>
                            <td><?= $value['harga']; ?></td>
                            <td><?= $value['keterangan']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>