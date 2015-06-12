<nav class="navbar navbar-default affix" role="navigation">
	<!-- Brand and toggle get grouped for better mobile display -->
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="#" style="padding: 10px;"><img src="../img/logo.png" width="35px" style="display:inline-block" alt="logo"> <p style="display:inline-block"><?php echo "$sekolah"; ?></p></a>
	</div>

	<!-- Collect the nav links, forms, and other content for toggling -->
	<div class="collapse navbar-collapse navbar-ex1-collapse">
		<ul class="nav navbar-nav">
			<li ><a href="../index.php">Beranda</a></li>
			<li ><a href="index.php">Beranda Admin</a></li>
			<li class="dropdown visible-xs">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-th-list"></span> <strong>Menu Admin</strong> <b class="caret"></b></a>
			<ul class="dropdown-menu">
			<li><a href="index.php" ><span class="glyphicon glyphicon-home"></span> Beranda</a> </li>
			<li><a href="berita.php" ><span class="glyphicon glyphicon-comment"></span> Berita</a></li>
			<li id="agendamenu"><a href="agenda.php"><span class="glyphicon glyphicon-calendar"></span> Agenda</a></li>
			<li id="ekskul"><a href="ekskul.php"><span class="glyphicon glyphicon-knight"></span> Ekstrakurikuler</a></li>
			
			<li id="pengaturan"><a href="setting.php"><span class="glyphicon glyphicon-wrench"></span> Setting Profil Sekolah</a></li>
			<li><a href="guru.php" ><span class="glyphicon glyphicon-user"></span> Guru</a></li>
			<li><a href="" ><span class="glyphicon glyphicon-education"></span> Siswa</a></li>
			<li><a href="" ><span class="glyphicon glyphicon-pencil"></span> Pelajaran</a></li>
			</ul>
			</li>

		</ul>
		<ul class="nav navbar-nav navbar-right">
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> <strong><?php echo $_SESSION['user']; ?></strong> <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="user.php"><span class="glyphicon glyphicon-user"></span> Ganti Password</a></li>
					<li><a href="../logout.php"><span class="glyphicon glyphicon-log-out"></span> Keluar</a></li>
				</ul>
			</li>
		</ul>
	</div><!-- /.navbar-collapse -->
</nav>