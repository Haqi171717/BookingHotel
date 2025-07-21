<main class="app-main">
  <div class="app-content-header">
    <div class="container-fluid">
      <h3 class="mb-3">Data Pembayaran</h3>

      <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
      <?php endif; ?>

      <div class="card">
        <div class="card-body table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Pengguna</th>
                <th>Nomor Kamar</th>
                <th>Jumlah</th>
                <th>Metode</th>
                <th>Tanggal</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; foreach ($payments as $p): ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $p->nama_user ?></td>
                <td><?= $p->room_number ?></td>
                <td>Rp <?= number_format($p->amount, 0, ',', '.') ?></td>
                <td><?= $p->method ?></td>
                <td><?= $p->payment_date ?></td>
              </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</main>

