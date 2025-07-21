<main class="app-main">
  <div class="app-content-header">
    <div class="container-fluid">
      <h3 class="mb-3">Data Kamar</h3>
      <a href="<?= base_url('rooms/tambah') ?>" class="btn btn-primary mb-3">+ Tambah Kamar</a>

      <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
      <?php endif; ?>

      <div class="card">
        <div class="card-body table-responsive">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Nomor Kamar</th>
                <th>Tipe</th>
                <th>Harga per Malam</th>
                <th>Status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; foreach ($rooms as $room): ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $room->room_number ?></td>
                <td><?= $room->type ?></td>
                <td>Rp <?= number_format($room->price, 0, ',', '.') ?></td>
                    <td>
                    <?php
                      if ($room->status == 'available') {
                          echo 'Tersedia';
                      } elseif ($room->status == 'booked') {
                          echo 'Terisi';
                      } else {
                          echo '-';
                      }
                    ?>
                  </td>
              <td>
                  <a href="<?= base_url('rooms/edit/' . $room->id) ?>" class="btn btn-sm btn-warning">Edit</a>
                  <a href="<?= base_url('rooms/delete/' . $room->id) ?>" onclick="return confirm('Yakin hapus?')" class="btn btn-sm btn-danger">Hapus</a>
                </td>
              </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</main>
