<main class="app-main">
  <div class="app-content-header">
    <div class="container-fluid">
      <h3 class="mb-3">Edit Kamar</h3>
      <a href="<?= base_url('rooms') ?>" class="btn btn-secondary mb-3">← Kembali</a>

      <div class="card">
        <div class="card-body">
          <form action="<?= base_url('rooms/update/' . $room->id) ?>" method="post">
            <div class="mb-3">
              <label>Nomor Kamar</label>
               <input type="text" name="room_number" class="form-control" value="<?= $room->room_number ?>" required>

            </div>
            <div class="mb-3">
              <label>Tipe</label>
              <input type="text" name="type" class="form-control" value="<?= $room->type ?>" required>

            </div>
            <div class="mb-3">
              <label>Harga per Malam</label>
              <input type="number" name="price" class="form-control" value="<?= $room->price ?>" required>

            <div class="mb-3">
              <label>Status</label>
              <select name="status" class="form-control" required>
                <option value="available" <?= $room->status == 'available' ? 'selected' : '' ?>>Tersedia</option>
                <option value="booked" <?= $room->status == 'booked' ? 'selected' : '' ?>>Terisi</option>
              </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</main>
