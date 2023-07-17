<?php 
// fungsi pengecekan level untuk menampilkan menu sesuai dengan hak akses
// jika hak akses = Super Admin, tampilkan menu
if ($_SESSION['hak_akses']=='Super Admin') { ?>
	<!-- sidebar menu start -->
    <ul class="sidebar-menu">
        <li class="header">MENU</li>

	<?php 
	// fungsi untuk pengecekan menu aktif
	// jika menu beranda dipilih, menu beranda aktif
	if ($_GET["module"]=="beranda") { ?>
		<li class="active">
			<a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a>
	  	</li>
	<?php
	}
	// jika tidak, menu home tidak aktif
	else { ?>
		<li>
			<a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a>
	  	</li>
	<?php
	}

  // jika menu data karyawan dipilih, menu data karyawan aktif
  if ($_GET["module"]=="karyawan" || $_GET["module"]=="form_karyawan") { ?>
    <li class="active">
      <a href="?module=karyawan"><i class="fa fa-folder"></i> Data Karyawan </a>
      </li>
  <?php
  }
  // jika tidak, menu data karyawan tidak aktif
  else { ?>
    <li>
      <a href="?module=karyawan"><i class="fa fa-folder"></i> Data Karyawan </a>
      </li>
  <?php
  }

  // jika menu data mobil dipilih, menu data mobil aktif
  if ($_GET["module"]=="mobil" || $_GET["module"]=="form_mobil") { ?>
    <li class="active">
      <a href="?module=mobil"><i class="fa fa-car"></i> Data Mobil </a>
      </li>
  <?php
  }
  // jika tidak, menu data mobil tidak aktif
  else { ?>
    <li>
      <a href="?module=mobil"><i class="fa fa-car"></i> Data Mobil </a>
      </li>
  <?php
  }

	// jika menu Laporan dipilih, menu Laporan aktif
	if ($_GET["module"]=="lap_karyawan") { ?>
		<li class="active treeview">
          	<a href="javascript:void(0);">
            	<i class="fa fa-file-text"></i> <span>Laporan</span> <i class="fa fa-angle-left pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
        		<li class="active"><a href="?module=lap_karyawan"><i class="fa fa-circle-o"></i> Data Karyawan </a></li>
        		<li><a href="?module=lap_mobil"><i class="fa fa-circle-o"></i> Data Mobil </a></li>
      		</ul>
    	</li>
    <?php
	}
	// jika menu Laporan dipilih, menu Laporan aktif
	elseif ($_GET["module"]=="lap_mobil") { ?>
		<li class="active treeview">
          	<a href="javascript:void(0);">
            	<i class="fa fa-file-text"></i> <span>Laporan</span> <i class="fa fa-angle-left pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
        		<li><a href="?module=lap_karyawan"><i class="fa fa-circle-o"></i> Data Karyawan </a></li>
        		<li class="active"><a href="?module=lap_mobil"><i class="fa fa-circle-o"></i> Data Mobil </a></li>
      		</ul>
    	</li>
    <?php
	}
	// jika menu Laporan tidak dipilih, menu Laporan tidak aktif
	else { ?>
		<li class="treeview">
          	<a href="javascript:void(0);">
            	<i class="fa fa-file-text"></i> <span>Laporan</span> <i class="fa fa-angle-left pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
        		<li><a href="?module=lap_karyawan"><i class="fa fa-circle-o"></i> Data Karyawan </a></li>
        		<li><a href="?module=lap_mobil"><i class="fa fa-circle-o"></i> Data Mobil </a></li>
      		</ul>
    	</li>
    <?php
	}

	// jika menu user dipilih, menu user aktif
	if ($_GET["module"]=="user" || $_GET["module"]=="form_user") { ?>
		<li class="active">
			<a href="?module=user"><i class="fa fa-user"></i> Manajemen User</a>
	  	</li>
	<?php
	}
	// jika tidak, menu user tidak aktif
	else { ?>
		<li>
			<a href="?module=user"><i class="fa fa-user"></i> Manajemen User</a>
	  	</li>
	<?php
	}

	// jika menu ubah password dipilih, menu ubah password aktif
	if ($_GET["module"]=="password") { ?>
		<li class="active">
			<a href="?module=password"><i class="fa fa-lock"></i> Ubah Password</a>
		</li>
	<?php
	}
	// jika tidak, menu ubah password tidak aktif
	else { ?>
		<li>
			<a href="?module=password"><i class="fa fa-lock"></i> Ubah Password</a>
		</li>
	<?php
	}
	?>
	</ul>
	<!--sidebar menu end-->
<?php
}
// jika hak akses = Manajer, tampilkan menu
elseif ($_SESSION['hak_akses']=='Manajer') { ?>
	<!-- sidebar menu start -->
    <ul class="sidebar-menu">
        <li class="header">MENU</li>

	<?php 
	// fungsi untuk pengecekan menu aktif
	// jika menu beranda dipilih, menu beranda aktif
	if ($_GET["module"]=="beranda") { ?>
		<li class="active">
			<a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a>
	  	</li>
	<?php
	}
	// jika tidak, menu beranda tidak aktif
	else { ?>
		<li>
			<a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a>
	  	</li>
	<?php
	}

	// jika menu Laporan dipilih, menu Laporan aktif
  if ($_GET["module"]=="lap_karyawan") { ?>
    <li class="active treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-file-text"></i> <span>Laporan</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li class="active"><a href="?module=lap_karyawan"><i class="fa fa-circle-o"></i> Data Karyawan </a></li>
            <li><a href="?module=lap_mobil"><i class="fa fa-circle-o"></i> Data Mobil </a></li>
          </ul>
      </li>
    <?php
  }
  // jika menu Laporan dipilih, menu Laporan aktif
  elseif ($_GET["module"]=="lap_mobil") { ?>
    <li class="active treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-file-text"></i> <span>Laporan</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li><a href="?module=lap_karyawan"><i class="fa fa-circle-o"></i> Data Karyawan </a></li>
            <li class="active"><a href="?module=lap_mobil"><i class="fa fa-circle-o"></i> Data Mobil </a></li>
          </ul>
      </li>
    <?php
  }
  // jika menu Laporan tidak dipilih, menu Laporan tidak aktif
  else { ?>
    <li class="treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-file-text"></i> <span>Laporan</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li><a href="?module=lap_karyawan"><i class="fa fa-circle-o"></i> Data Karyawan </a></li>
            <li><a href="?module=lap_mobil"><i class="fa fa-circle-o"></i> Data Mobil </a></li>
          </ul>
      </li>
    <?php
  }

	// jika menu ubah password dipilih, menu ubah password aktif
	if ($_GET["module"]=="password") { ?>
		<li class="active">
			<a href="?module=password"><i class="fa fa-lock"></i> Ubah Password</a>
		</li>
	<?php
	}
	// jika tidak, menu ubah password tidak aktif
	else { ?>
		<li>
			<a href="?module=password"><i class="fa fa-lock"></i> Ubah Password</a>
		</li>
	<?php
	}
	?>
	</ul>
	<!--sidebar menu end-->
<?php
}

?>