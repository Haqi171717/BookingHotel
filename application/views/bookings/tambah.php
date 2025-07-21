<main class="app-main">
  <div class="app-content-header">
    <div class="container-fluid">
      <h3 class="mb-3">Tambah Booking</h3>
      <a href="<?= base_url('bookings') ?>" class="btn btn-secondary mb-3">← Kembali</a>

      <div class="card">
        <div class="card-body">
          <form action="<?= base_url('bookings/simpan') ?>" method="post">
            <div class="mb-3">
              <label>Kamar</label>
              <select name="room_id" class="form-control" required>
                <?php foreach ($rooms as $room): ?>
                  <option value="<?= $room->id ?>"><?= $room->room_number ?> - <?= $room->type ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="mb-3">
              <label>Check In</label>
              <input type="date" name="check_in" class="form-control" required>
            </div>
            <div class="mb-3">
              <label>Check Out</label>
              <input type="date" name="check_out" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Booking</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</main>
