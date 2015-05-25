<nav class="navbar navbar-default affix" role="navigation">
	<!-- Brand and toggle get grouped for better mobile display -->
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="#"><?php echo "$sekolah"; ?></a>
	</div>

	<!-- Collect the nav links, forms, and other content for toggling -->
	<div class="collapse navbar-collapse navbar-ex1-collapse">
		<ul class="nav navbar-nav">
			<li ><a href="#">Beranda</a></li>
			<li ><a href="#">Beranda Admin</a></li>
			<li class="dropdown visible-xs">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-th-list"></span> <strong>Menu Admin</strong> <b class="caret"></b></a>
			<ul class="dropdown-menu">
			<li><a href="index.php" title=""><span class="glyphicon glyphicon-home"></span> Beranda</a> </li>
			<li><a href="berita.php" title=""><span class="glyphicon glyphicon-comment"></span> Berita</a></li>
			<li><a href="agenda.php" title=""><span class="glyphicon glyphicon-calendar"></span> Agenda</a></li>
			<li><a href="guru.php" title=""><span class="glyphicon glyphicon-user"></span> Guru</a></li>
			<li><a href="" title=""><span class="glyphicon glyphicon-education"></span> Siswa</a></li>
			<li><a href="" title=""><span class="glyphicon glyphicon-pencil"></span> Pelajaran</a></li>
			</ul>
			</li>

		</ul>
		<ul class="nav navbar-nav navbar-right">
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> <strong><?php echo $_SESSION['user']; ?></strong> <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="#"><span class="glyphicon glyphicon-user"></span> Profil</a></li>
					<li><a href="../logout.php"><span class="glyphicon glyphicon-log-out"></span> Keluar</a></li>
				</ul>
			</li>
		</ul>
	</div><!-- /.navbar-collapse -->
</nav>