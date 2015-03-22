<?php require_once 'engine/init.php'; include 'layout/overall/header.php';?>
				<form action="" method="GET">
				<b>World:</b>
				<select name="world" onchange="this.form.submit()">
				<?php foreach ($config['available_worlds'] as $tid) { $worldname = world_id_to_name($tid); ?>
				<option value="<?php echo $worldname; ?>" <?php if ($worldname == $getworldname) echo "selected"; ?>><?php echo $worldname; ?></option>
				<?php } ?>
				</select>
				</form>
		<?php
if ($config['TFSVersion'] == 'Old_TFS02' || $config['TFSVersion'] == 'TFS_10') {
$cache = new Cache('engine/cache/killers');
if ($cache->hasExpired()) {
	$killers = fetchMurders();
	
	$cache->setContent($killers);
	$cache->save();
} else {
	$killers = $cache->load();
}
$cache = new Cache('engine/cache/victims');
if ($cache->hasExpired()) {
	$victims = fetchLoosers();
	
	$cache->setContent($victims);
	$cache->save();
} else {
	$victims = $cache->load();
}
$cache = new Cache('engine/cache/lastkillers');
if ($cache->hasExpired()) {
	$latests = mysql_select_multi("SELECT `p`.`name` AS `victim`, `d`.`killed_by` as `killed_by`, `d`.`time` as `time` FROM `player_deaths` as `d` INNER JOIN `players` as `p` ON d.player_id = p.id WHERE d.`is_player`='1' ORDER BY `time` DESC LIMIT 20;");
	if ($latests !== false) {
		$cache->setContent($latests);
		$cache->save();
	}
} else {
	$latests = $cache->load();
}
if ($killers) {
?>
<h1>Biggest Murders</h1>
<table id="killersTable" class="table table-striped">
	<tr class="yellow">
		<th>Name</th>
		<th>Kills</th>
	</tr>
	<?php foreach ($killers as $killer) { 
		echo '<tr>';
		echo "<td width='70%'><a href='characterprofile.php?name=". $killer['killed_by'] ."'&world='. $getworldname .'>". $killer['killed_by'] ."</a></td>";
		echo "<td width='30%'>". $killer['kills'] ."</td>";
		echo '</tr>';
	} ?>
</table>
<?php
} else echo 'No player kills exist.';

if ($victims) {
?>
<h1>Biggest Victims</h1>
<table id="victimsTable" class="table table-striped">
	<tr class="yellow">
		<th>Name</th>
		<th>Deaths</th>
	</tr>
	<?php foreach ($victims as $victim) { 
		echo '<tr>';
		echo "<td width='70%'><a href='characterprofile.php?name=". $victim['name'] ."&world=". $getworldname ."'>". $victim['name'] ."</a></td>";
		echo "<td width='30%'>". $victim['Deaths'] ."</td>";
		echo '</tr>';
	} ?>
</table>
<?php
} else echo 'No player kills exist.';

if ($latests) {
?>
<h1>Latest kills</h1>
<table id="killersTable" class="table table-striped">
	<tr class="yellow">
		<th>Killer</th>
		<th>Time</th>
		<th>Victim</th>
	</tr>
	<?php foreach ($latests as $last) { 
		echo '<tr>';
		echo "<td width='35%'><a href='characterprofile.php?name=". $last['killed_by'] ."&world=". $getworldname ."'>". $last['killed_by'] ."</a></td>";
		echo "<td width='30%'>". getClock($last['time'], true) ."</td>";
		echo "<td width='35%'><a href='characterprofile.php?name=". $last['victim'] ."&world=". $getworldname ."'>". $last['victim'] ."</a></td>";
		echo '</tr>';
	} ?>
</table>
<?php
} else echo 'No player kills exist.';

} else if ($config['TFSVersion'] == 'OTH') {
	/////////
	$cache = new Cache('engine/cache/killers');
	if ($cache->hasExpired()) {
		$deaths = fetchLatestDeaths_03(30, true);
		$cache->setContent($deaths);
		$cache->save();
	} else {
		$deaths = $cache->load();
	}
	?>

	<table class="heading">
		<tbody>
			<tr class="transparent nopadding">
			<td width="50%" valign="middle">
            <h1>Latest Killers</h1>
            </td>
            <td valign="middle">
			Most recent player killings are listed here.
            </td>
        </tr>
    </tbody>
</table>
	<table id="deathsTable" class="table table-striped">
		<tr class="yellow">
			<th>Killer</th>
			<th>Time</th>
			<th>Victim</th>
		</tr>
		<?php foreach ($deaths as $death) { 
			echo '<tr>';
			echo "<td><a href='characterprofile.php?name=". $death['killed_by'] ."&world=". $getworldname ."'>". $death['killed_by'] ."</a></td>";
			echo "<td>". getClock($death['time'], true) ."</td>";
			echo "<td>At level ". $death['level'] .": <a href='characterprofile.php?name=". $death['victim'] ."&world=". $getworldname ."'>". $death['victim'] ."</a></td>";
			echo '</tr>';
		} ?>
	</table>

	<?php
	/////////
}
include 'layout/overall/footer.php'; ?>
