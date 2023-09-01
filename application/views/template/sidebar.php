<body id="page-top">

	<!-- Page Wrapper -->
	<div id="wrapper">

		<!-- Sidebar -->
		<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion " id="accordionSidebar">

			<!-- Sidebar - Brand -->
			<a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
				<div class="sidebar-brand-icon">
					<i class="fas fa-store"></i>
				</div>
			</a>

			<!-- Divider -->
			<hr class="sidebar-divider my-0">

			<!-- Nav Item - Dashboard -->
			<li class="nav-item active">
				<a class="nav-link" href="<?php echo base_url('/c_transaksi') ?>">
					<i class="fas fa-fw fa-tachometer-alt"></i>
					<span>Dashboard</span></a>
			</li>
			<!-- Heading -->
			<div class="sidebar-heading">
				Kategoori
			</div>

			<!-- Divider -->
			<hr class="sidebar-divider">

			<!-- Nav Item - Tables -->
			<li class="nav-item">
				<a class="nav-link" href="<?php echo base_url('c_barang/tampil_barang') ?>">
					<i class="fas fa-fw fa-tv"></i>
					<span>Barang</span></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?php echo base_url('c_pelanggan/tampil_pelanggan') ?>">
					<i class="fas fa-fw fa-user"></i>
					<span>Pelanggan</span></a>
			</li>

			<!-- Divider -->
			<hr class="sidebar-divider d-none d-md-block">

			<!-- Sidebar Toggler (Sidebar) -->
			<div class="text-center d-none d-md-inline">
				<button class="rounded-circle border-0" id="sidebarToggle"></button>
			</div>
			<div class="checkbox">
				<label>
					<input type="checkbox" id="darkModeSwitch">
				</label>
			</div>

		</ul>
		<!-- End of Sidebar -->

		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column bg-light text-dark">

			<!-- Main Content -->
			<div id="content">
