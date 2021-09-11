<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar" style="transition: all 0.9s;">

	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin') ?>">
		<div class="sidebar-brand-icon">
			<i class="fas fa-building"></i>
		</div>
		<div class="sidebar-brand-text mx-3">Absensi IT Company</div>
	</a>

	<!-- Divider -->
	<hr class="sidebar-divider my-0">

	<li class="nav-item active">
		<a style="transition: all 0.9s;" class="nav-link" href="<?= base_url('admin') ?>">
			<i class="fas fa-fw fa-tachometer-alt"></i>
			<span>Dashboard</span></a>
	</li>

	<li class="nav-item">
		<a style="transition: all 0.9s;" class="nav-link" href=" <?= base_url('anggota/add') ?>">
			<i class="fas fa-fw fa-user-plus"></i>
			<span>Tambah Anggota</span></a>
	</li>

	<li class="nav-item">
		<a style="transition: all 0.9s;" class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
			<i class="fas fa-fw fa-users"></i>
			<span>Data Anggota</span>
		</a>
		<div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
			<div style="transition: all 0.9s;" class="bg-white py-2 collapse-inner rounded">
				<a class="collapse-item" href="<?= base_url('anggota/web_developer') ?>">Web Developer</a>
				<a class="collapse-item" href="<?= base_url('anggota/software_engineer') ?>">Software Engineer</a>
				<a class="collapse-item" href="<?= base_url('anggota/mobile_developer') ?>">Mobile Developer</a>
				<a class="collapse-item" href="<?= base_url('anggota/manager') ?>">Project Manager</a>
			</div>
		</div>
	</li>


	<li class="nav-item">
		<a style="transition: all 0.9s;" class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#kehadiran" aria-expanded="true" aria-controls="kehadiran">
			<i class="fas fa-fw fa-list"></i>
			<span>Kehadiran</span>
		</a>
		<div id="kehadiran" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a class="collapse-item" href="<?= base_url('kehadiran/konfirmasi_kehadiran') ?>">Konfirmasi Kehadiran</a>
				<a class="collapse-item" href="<?= base_url('kehadiran/tabel_kehadiran') ?>">Tabel Kehadiran</a>
				<a class="collapse-item" href="<?= base_url('kehadiran/rekap_kehadiran') ?>">Rekap Kehadiran</a>
			</div>
		</div>
	</li>

	<li class="nav-item">
		<a style="transition: all 0.9s;" href="#" class="nav-link" data-toggle="modal" data-target="#logoutModal">
			<i class="fas fa-fw fa-sign-out-alt"></i>
			<span>Keluar</span></a>
	</li>

	<!-- Divider -->
	<hr class="sidebar-divider d-none d-md-block">

	<!-- Sidebar Toggler (Sidebar) -->
	<div class="text-center d-none d-md-inline">
		<button class="rounded-circle border-0" id="sidebarToggle"></button>
	</div>

</ul>