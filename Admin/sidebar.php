<style type="text/css">
	.nav {
		margin-left: -14px;
	}
</style>
<body class="hold-transition sidebar-mini">
	<div class="wrapper">
		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
			<!-- Left navbar links -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
				</li>
			</ul>
		</nav>
		<!-- /.navbar -->
		<!-- Main Sidebar Container -->
		<aside class="main-sidebar sidebar-dark-primary elevation-4">
			<!-- Brand Logo -->
			<a href="dashboard.php" class="brand-link">
				<img src="../images/logocari.png" type="image/png" class="brand-image img-circle elevation-3"
				style="opacity: .8">
				<span class="brand-text font-weight-light">CARICACAN&TEAM</span>
			</a>

			<!-- Sidebar -->
			<div class="sidebar">
				<!-- Sidebar user panel (optional) -->
				<div class="user-panel mt-3 pb-6 mb-6 d-flex">
					<div class="info">
						<a class="d-block">ADMIN <i class="fa fa-circle-o fa-xs" style="color: #51cf66;" title="Online"></i></a>
					</div>
				</div>

				<!-- Sidebar Menu -->
				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
          	with font-awesome or any other icon font library -->

          	<li class="nav-item">
          		<a href="dashboard.php" class="nav-link">
          			<i class="fa fa-home nav-icon"></i>
          			<p>Dashboard</p>
          		</a>
          	</li>
          	<li class="nav-item">
          		<a href="file-kelola/kelola_admin.php" class="nav-link">
          			<i class="nav-icon fa fa-user-circle"></i>
          			<p>
          				Kelola Admin
          			</p>
          		</a>
          	</li>
          	<li class="nav-item">
          		<a href="file-kelola/lihat_pelanggan.php" class="nav-link">
          			<i class="nav-icon fa fa-address-card"></i>
          			<p>
          				Lihat Pelanggan
          			</p>
          		</a>
          	</li>
          	<li class="nav-item has-treeview">
          		<a href="file-kelola/kelola_pemesanan.php" class="nav-link">
          			<i class="nav-icon fa fa-book"></i>
          			<p>
          				Kelola Pemesanan
          				<i class="right fa fa-angle-left"></i>
          			</p>
          		</a>
                    <ul class="nav nav-treeview">
                         <li class="nav-item">
                              <a href="file-kelola/kelola_pemesanan.php" class="nav-link">
                                   <i class="fa fa-circle-o text-info nav-icon"></i>
                                   <p>Kelola Pemesanan</p>
                              </a>
                         </li>
                    </ul>
          		<ul class="nav nav-treeview">
          			<li class="nav-item">
          				<a href="file-kelola/kelola_pembayaran.php" class="nav-link">
          					<i class="fa fa-circle-o text-danger nav-icon"></i>
          					<p>Kelola Pembayaran</p>
          				</a>
          			</li>
          		</ul>
          	</li>
          	<li class="nav-item">
          		<a href="file-kelola/kelola_Pesan.php" class="nav-link">
          			<i class="nav-icon fa fa-envelope"></i>
          			<p>
          				Kelola Pesan
          			</p>
          		</a>
          	</li>
          	<li class="nav-item">
          		<a href="file-kelola/kelola_review.php" class="nav-link">
          			<i class="nav-icon fa fa-comments"></i>
          			<p>
          				Kelola Review
          			</p>
          		</a>
          	</li>
          	<li class="nav-item has-treeview">
          		<a href="#" class="nav-link">
          			<i class="nav-icon fa fa-calendar"></i>
          			<p>
          				Lihat Jadwal
          				<i class="right fa fa-angle-left"></i>
          			</p>
          		</a>
          		<ul class="nav nav-treeview">
          			<li class="nav-item">
          				<a href="file-kelola/kelola_jadwal_acara.php" class="nav-link">
          					<i class="fa fa-circle-o text-danger nav-icon"></i>
          					<p>Lihat Jadwal Acara</p>
          				</a>
          			</li>
          			<li class="nav-item">
          				<a href="file-kelola/kelola_jadwal_pertemuan.php" class="nav-link">
          					<i class="fa fa-circle-o text-info nav-icon"></i>
          					<p>Lihat Jadwal Pertemuan</p>
          				</a>
          			</li>
          		</ul>
          	</li>
               <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                         <i class="nav-icon fa fa-pencil"></i>
                         <p>
                              Kelola Catatan Keuangan
                              <i class="right fa fa-angle-left"></i>
                         </p>
                    </a>
                    <ul class="nav nav-treeview">
                         <li class="nav-item">
                              <a href="file-kelola/kelola_pemasukan.php" class="nav-link">
                                   <i class="fa fa-circle-o text-danger nav-icon"></i>
                                   <p>Lihat Pemasukan</p>
                              </a>
                         </li>
                         <li class="nav-item">
                              <a href="file-kelola/kelola_pengeluaran.php" class="nav-link">
                                   <i class="fa fa-circle-o text-info nav-icon"></i>
                                   <p>Kelola Pengeluaran</p>
                              </a>
                         </li>
                    </ul>
               </li>
          	<li class="nav-item">
          		<a href="file-kelola/kelola_paket.php" class="nav-link">
          			<i class="nav-icon fa fa-gift"></i>
          			<p style="font-size: 14px;">
          				Kelola Paket dan Perlengkapan
          			</p>
          		</a>
          	</li>
          	<li class="nav-item">
          		<a href="file-kelola/kelola_layanan.php" class="nav-link">
          			<i class="nav-icon fa fa-paper-plane"></i>
          			<p>
          				Kelola Layanan dan Vendor
          			</p>
          		</a>
          	</li>
          	<li class="nav-item">
          		<a href="file-kelola/kelola_tentang.php" class="nav-link">
          			<i class="nav-icon fa fa-info-circle"></i>
          			<p>
          				Kelola Tentang Kami
          			</p>
          		</a>
          	</li>
          	<li class="nav-item">
          		<a href="file-kelola/kelola_inspirasi.php" class="nav-link">
          			<i class="nav-icon fa fa-star"></i>
          			<p>
          				Kelola Inspirasi
          			</p>
          		</a>
          	</li>
          	<li class="nav-item">
          		<a href="file-kelola/kelola_alur.php" class="nav-link">
          			<i class="nav-icon fa fa-bullhorn"></i>
          			<p>
          				Kelola Alur Pemesanan
          			</p>
          		</a>
          	</li>
          </ul>
      </nav>
      <div class="user-panel mt-3 pb-6 mb-6 d-flex">
      	<div class="info">
      		<a class="d-block" href="logout.php">LOG OUT <i class="fa fa-power-off"></i></a>
      	</div>
      </div>

      <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>