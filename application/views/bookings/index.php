<main class="app-main">
  <div class="app-content-header">
    <div class="container-fluid">
      <h3 class="mb-3">Data Booking</h3>

      <?php if ($this->session->userdata('role') == 'user'): ?>
        <a href="<?= base_url('bookings/tambah') ?>" class="btn btn-primary mb-3">+ Tambah Booking</a>
      <?php endif; ?>

      <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
      <?php endif; ?>

      <div class="card">
        <div class="card-body table-responsive">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Pengguna</th>
                <th>Nomor Kamar</th>
                <th>Check In</th>
                <th>Check Out</th>
                <th>Status</th>
                <?php if ($this->session->userdata('role') == 'admin'): ?>
                  <th>Aksi</th>
                <?php endif; ?>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; foreach ($bookings as $booking): ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $booking->nama_user ?? '-' ?></td>
                  <td><?= $booking->room_number ?? '-' ?></td>
                  <td><?= $booking->check_in ?></td>
                  <td><?= $booking->check_out ?></td>
                  <td><?= $booking->status ?></td>
                  <td>
                    <?php if ($this->session->userdata('role') == 'user' && $booking->status == 'approved'): ?>
                      <a href="<?= base_url('payments/tambah/' . $booking->id) ?>" class="btn btn-sm btn-success">Bayar</a>
                    <?php endif; ?>

                    <a href="<?= base_url('bookings/edit/' . $booking->id) ?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="<?= base_url('bookings/delete/' . $booking->id) ?>" onclick="return confirm('Yakin hapus?')" class="btn btn-sm btn-danger">Hapus</a>
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
