<main class="app-main">
  <div class="app-content-header">
    <div class="container-fluid">
      <h3 class="mb-3">Edit Booking</h3>
      <a href="<?= base_url('bookings') ?>" class="btn btn-secondary mb-3">← Kembali</a>

      <div class="card">
        <div class="card-body">
          <form action="<?= base_url('bookings/update/' . $booking->id) ?>" method="post">
            <div class="mb-3">
              <label>Kamar</label>
              <select name="room_id" class="form-control" required>
                <?php foreach ($rooms as $room): ?>
                  <option value="<?= $room->id ?>" <?= $room->id == $booking->room_id ? 'selected' : '' ?>>
                    <?= $room->room_number ?> - <?= $room->type ?>
                  </option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="mb-3">
              <label>Check In</label>
              <input type="date" name="check_in" class="form-control" value="<?= $booking->check_in ?>" required>
            </div>
            <div class="mb-3">
              <label>Check Out</label>
              <input type="date" name="check_out" class="form-control" value="<?= $booking->check_out ?>" required>
            </div>
            <div class="mb-3">
              <label>Status</label>
            <select name="status" class="form-control" required>
            <option value="pending" <?= $booking->status == 'pending' ? 'selected' : '' ?>>Pending</option>
            <option value="approved" <?= $booking->status == 'approved' ? 'selected' : '' ?>>Diterima</option>
            <option value="rejected" <?= $booking->status == 'rejected' ? 'selected' : '' ?>>Ditolak</option>
            <option value="cancelled" <?= $booking->status == 'cancelled' ? 'selected' : '' ?>>Dibatalkan</option>
            </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</main>
