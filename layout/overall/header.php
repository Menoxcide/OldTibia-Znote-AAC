<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
$time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$start = $time;
//Get World ID
$configworlds = $config['worlds'];
if(isset($_GET['world'])){
	$getworldname = ($_GET['world']);
		if ($getworldname !== $configworlds[1] && $getworldname !== $configworlds[2]){
			$getworldname = $configworlds[1];
		}
}else{
	$getworldname = ($configworlds[1]); //If World not set, default as first world
}
?>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="distribution" content="Global" />
		<meta name="author" content="OldTibia" />
		<meta name="robots" content="index,follow" />
		<meta name="description" content="OldTibia.net - Old School Server." />
		<meta name="keywords" content="ots, open tibia server, oldtibia, 7.4 realmap, old school" />
	<title><?PHP echo $config['site_title'];?> - <?PHP echo $config['site_title_context'];?></title>
<link href="layout/favicon.ico" rel="shortcut icon" />

 <!-- Stylesheets -->
    <link href="/layout/css/app.css" rel="stylesheet" media="all">
    <link href="/layout/css/colorbox.css" rel="stylesheet" media="all">
</head>
<body>
<div class="m_position"> 
	<section id="pandaac">
		<header id="header">
			<a href="index.php?world=<?php echo $getworldname;?>"><img src="/layout/img/header-left.png" alt="Tibia"></a>
		</header>

		<aside id="topbar">
			<ul>
				<li><a href="index.php?world=<?php echo $getworldname;?>">Home</a></li>
				<li><a href="guilds.php?world=<?php echo $getworldname;?>">Guilds</a></li>
				<li><a href="onlinelist.php?world=<?php echo $getworldname;?>">Who Is Online</a></li>
				<li><a href="downloads.php">Download</a></li>
				<li><a href="support.php">Staff</a></li>
				<li><a href="serverinfo.php">Faq</a></li>
			</ul>
		</aside>

		<div id="content-container">
			<aside id="sidebar">
				<section id="sidebar-links">

					<div class="line"></div>
					<div class="line wide"></div>

					<ul>
						<li><a href="index.php?world=<?php echo $getworldname;?>">News</a></li>
						<li><a href="changelog.php?world=<?php echo $getworldname;?>">Change Logs</a></li>
						<div class="line"></div>						
						<?php
						if (user_logged_in() === true) {
							include 'layout/widgets/loggedin.php'; 
								} else {
							include 'layout/widgets/login.php';
								}
						if (user_logged_in() && is_admin($user_data)) include 'layout/widgets/Wadmin.php'; 
						?>
						<!-- li><a href="register.php">Sign Up</a></li -->
						<div class="line"></div>
						<li><a href="sub.php?page=charactersearch&world=<?php echo $getworldname;?>">Characters</a></li>
						<li><a href="highscores.php?world=<?php echo $getworldname;?>">High Scores</a></li>
						<li><a href="houses.php?world=<?php echo $getworldname;?>">Houses</a></li>
						<li><a href="forum.php?world=<?php echo $getworldname;?>">Forum</a></li>
						<li><a href="serverinfo.php?world=<?php echo $getworldname;?>">Server Info</a></li>
						<div class="line"></div>
						<li><a href="deaths.php?world=<?php echo $getworldname;?>">Latest Deaths</a></li>
						<li><a href="killers.php?world=<?php echo $getworldname;?>"><font color="red">PK List</font></a></li>
						<div class="line"></div>
						<li><a href="buypoints.php">Donate</a></li>
						<li><a href="terms.php">Agreements</a></li>
						<li><a href="shop.php">Store</a></li>
					</ul>

					<div class="line wide"></div>
					<div class="line"></div>
				</section>
				<ul>
				<form action="index.php" method="GET">
				<li><b><font color="ffffff">World:</font></b></li>
				<select name="world" onchange="this.form.submit()">
				<?php foreach ($config['available_worlds'] as $tid) { $worldname = world_id_to_name($tid); ?>
				<option value="<?php echo $worldname; ?>" <?php if ($worldname == $getworldname) echo "selected"; ?>><?php echo $worldname; ?></option>
				<?php } ?>
				</select>
				</form>
				<li><font color="ff0000" size="1">Warning: Redirects page</font></li></ul>
				<section id="sidebar-misc">
					<div class="lineblack"></div>
						<a href="myaccount.php?world=<?php echo $getworldname;?>" class="martel">My Account</a>
					<div class="lineblack"></div>

					<br>
					<b><a href="onlinelist.php?world=<?php echo $getworldname;?>">Players Online</a></b>
					<div class="lineblack"></div>
						<?php
			include 'layout/widgets/serverinfo.php'; ?>
					
					<div class="lineblack"></div>
					

<br>

<a href="https://www.facebook.com/OldTibiaOT"><font color="gold">OldTibia on<br>Facebook</font></a><br>
<img src="/layout/img/blank.gif" border="0" height="3" width="1">
<div class="lineblack"></div>
<img src="/layout/img/blank.gif" border="0" height="3" width="1">
<iframe src="//www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2FOldTibiaOT&amp;width&amp;layout=button_count&amp;action=like&amp;show_faces=false&amp;share=false&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:21px; margin-left:40px;" allowTransparency="true"></iframe>
<img src="/layout/img/blank.gif" border="0" height="3" width="1">
<div class="lineblack"></div>

<img src="/layout/img/blank.gif" border="0" height="3" width="1">
<br>
					
				</section>
			</aside>
			

			<div id="main-container">
				<main id="main">
					<div id="content">
						

		<div class="m_center">
			<?php include('layout/left_menu.php'); ?>
			<div class="m_content">
