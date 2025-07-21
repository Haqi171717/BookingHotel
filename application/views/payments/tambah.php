<main class="app-main">
  <div class="app-content-header">
    <div class="container-fluid">
      <h3 class="mb-3">Tambah Pembayaran</h3>
      <a href="<?= base_url('payments') ?>" class="btn btn-secondary mb-3">← Kembali</a>

      <div class="card">
        <div class="card-body">
          <form action="<?= base_url('payments/simpan') ?>" method="post">
            <input type="hidden" name="booking_id" value="<?= $booking_id ?>">

            <div class="mb-3">
              <label>Jumlah Bayar</label>
              <input type="number" name="amount" class="form-control" required>
            </div>
            <div class="mb-3">
              <label>Metode</label>
              <select name="method" class="form-control">
                <option value="Transfer Bank">Transfer Bank</option>
                <option value="Cash">Cash</option>
                <option value="E-Wallet">E-Wallet</option>
              </select>
            </div>

            <button type="submit" class="btn btn-primary">Bayar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</main>
