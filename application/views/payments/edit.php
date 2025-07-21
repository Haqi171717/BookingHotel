<main class="app-main">
  <div class="app-content-header">
    <div class="container-fluid">
      <h3 class="mb-3">Edit Pembayaran</h3>
      <a href="<?= base_url('payments') ?>" class="btn btn-secondary mb-3">← Kembali</a>

      <div class="card">
        <div class="card-body">
          <form action="<?= base_url('payments/update/' . $payment->id) ?>" method="post">
            <div class="mb-3">
              <label>Jumlah Bayar</label>
              <input type="number" name="amount" class="form-control" value="<?= $payment->amount ?>" required>
            </div>

            <div class="mb-3">
              <label>Metode</label>
              <select name="method" class="form-control">
                <option value="Transfer Bank" <?= $payment->method == 'Transfer Bank' ? 'selected' : '' ?>>Transfer Bank</option>
                <option value="Cash" <?= $payment->method == 'Cash' ? 'selected' : '' ?>>Cash</option>
                <option value="E-Wallet" <?= $payment->method == 'E-Wallet' ? 'selected' : '' ?>>E-Wallet</option>
              </select>
            </div>

            <div class="mb-3">
              <label>Tanggal Bayar</label>
              <input type="date" name="payment_date" class="form-control" value="<?= $payment->payment_date ?>">
            </div>

            <div class="mb-3">
              <label>Status</label>
              <select name="status" class="form-control">
                <option value="unpaid" <?= $payment->status == 'unpaid' ? 'selected' : '' ?>>Belum Bayar</option>
                <option value="paid" <?= $payment->status == 'paid' ? 'selected' : '' ?>>Dibayar</option>
              </select>
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</main>
