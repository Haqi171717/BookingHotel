php
<aside class="app-sidebar bg-primary-subtle" data-bs-theme="light">
  <div class="sidebar-brand">
    <a href="<?= base_url('dashboard') ?>" class="brand-link">
      <img src="<?= base_url('assets/img/AdminLTELogo.png') ?>" alt="Logo" class="brand-image opacity-75 shadow" />
      <span class="brand-text fw-light">Booking Hotel</span>
    </a>
  </div>

  <div class="sidebar-wrapper">
    <nav class="mt-2">
      <ul class="nav sidebar-menu flex-column" role="menu">
        <li class="nav-item">
          <a href="<?= base_url('dashboard') ?>" class="nav-link <?= ($this->uri->segment(1) == 'dashboard') ? 'active' : '' ?>">
            <i class="nav-icon bi bi-speedometer2"></i>
            <p>Dashboard</p>
          </a>
        </li>

        <?php if ($this->session->userdata('role') == 'admin'): ?>
  <li class="nav-item">
    <a href="<?= base_url('rooms') ?>" class="nav-link <?= ($this->uri->segment(1) == 'rooms') ? 'active' : '' ?>">
      <i class="nav-icon bi bi-house-door"></i>
      <p>Data Kamar</p>
    </a>
  </li>
<?php endif; ?>

        

        <li class="nav-item">
          <a href="<?= base_url('bookings') ?>" class="nav-link <?= ($this->uri->segment(1) == 'bookings') ? 'active' : '' ?>">
            <i class="nav-icon bi bi-calendar-check"></i>
            <p><?= ($this->session->userdata('role') == 'admin') ? 'Data Booking' : 'Booking Saya' ?></p>
          </a>
        </li>

        <?php if ($this->session->userdata('role') == 'admin'): ?>
        <li class="nav-item">
          <a href="<?= base_url('payments') ?>" class="nav-link <?= ($this->uri->segment(1) == 'payments') ? 'active' : '' ?>">
            <i class="nav-icon bi bi-credit-card"></i>
            <p>Pembayaran</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= base_url('users') ?>" class="nav-link <?= ($this->uri->segment(1) == 'users') ? 'active' : '' ?>">
            <i class="nav-icon bi bi-person-lines-fill"></i>
            <p>Manajemen User</p>
          </a>
        </li>
        <?php endif; ?>
      </ul>
    </nav>
  </div>
</aside>