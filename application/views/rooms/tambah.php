<main class="app-main">
  <div class="app-content-header">
    <div class="container-fluid">
      <h3 class="mb-3">Tambah Kamar</h3>
      <a href="<?= base_url('rooms') ?>" class="btn btn-secondary mb-3">← Kembali</a>

      <div class="card">
        <div class="card-body">
          <form action="<?= base_url('rooms/simpan') ?>" method="post">
            <div class="mb-3">
              <label>Nomor Kamar</label>
              <input type="text" name="room_number" class="form-control" required>
            </div>
            <div class="mb-3">
              <label>Tipe</label>
              <input type="text" name="type" class="form-control" required>
            </div>
            <div class="mb-3">
              <label>Harga per Malam</label>
              <input type="number" name="price" class="form-control" required>
            </div>
            <div class="mb-3">
              <label>Deskripsi</label>
              <textarea name="description" class="form-control"></textarea>
            </div>
            <div class="mb-3">
              <label>Status</label>
            <select name="status" class="form-control" required>
                <option value="available">Tersedia</option>
                <option value="booked">Terisi</option>
              </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</main>
