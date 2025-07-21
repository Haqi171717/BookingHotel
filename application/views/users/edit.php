<main class="app-main">
  <div class="app-content-header">
    <div class="container-fluid">
      <h3 class="mb-3">Edit Pengguna</h3>
      <a href="<?= base_url('users') ?>" class="btn btn-secondary mb-3">← Kembali</a>
      <div class="card">
        <div class="card-body">
          <form action="<?= base_url('users/update/' . $user->id) ?>" method="post">
            <div class="mb-3">
              <label>Nama</label>
              <input type="text" name="nama" class="form-control" value="<?= $user->nama ?>" required>
            </div>
            <div class="mb-3">
              <label>Username</label>
              <input type="text" name="username" class="form-control" value="<?= $user->username ?>" required>
            </div>
            <div class="mb-3">
              <label>Role</label>
              <select name="role" class="form-control" required>
                <option value="user" <?= $user->role == 'user' ? 'selected' : '' ?>>User</option>
                <option value="admin" <?= $user->role == 'admin' ? 'selected' : '' ?>>Admin</option>
              </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</main>
