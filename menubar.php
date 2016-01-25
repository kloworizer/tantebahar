<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand" href="./index.php?menu=home"><?php echo $namaapp; ?></a>
		</div>
		<div>
			<ul class="nav navbar-nav">
				<?php
				if(isset($_SESSION['login_user'])){
					include('menuuser.php');
				}
				?>
			</ul>
		</div>
		<div class="navbar-header navbar-right">
		<?php
		if(isset($_SESSION['login_user'])){
			include('profile.php');
		}else{
			include('form_login.php');
		}
		?>
		</div>
	</div>
</nav>