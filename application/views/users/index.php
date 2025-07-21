<main class="app-main">
  <div class="app-content-header">
    <div class="container-fluid">
      <h3 class="mb-3">Manajemen Pengguna</h3>
      <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
      <?php endif; ?>
      <div class="card">
        <div class="card-body table-responsive">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Role</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; foreach ($users as $user): ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $user->nama ?></td>
                  <td><?= $user->username ?></td>
                  <td><?= $user->role ?></td>
                  <td>
                    <a href="<?= base_url('users/edit/' . $user->id) ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="<?= base_url('users/delete/' . $user->id) ?>" onclick="return confirm('Hapus user ini?')" class="btn btn-danger btn-sm">Hapus</a>
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
