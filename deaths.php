<?php require_once 'engine/init.php'; include 'layout/overall/header.php';
$cache = new Cache('engine/cache/deaths');?>
				<form action="" method="GET">
				<b>World:</b>
				<select name="world" onchange="this.form.submit()">
				<?php foreach ($config['available_worlds'] as $tid) { $worldname = world_id_to_name($tid); ?>
				<option value="<?php echo $worldname; ?>" <?php if ($worldname == $getworldname) echo "selected"; ?>><?php echo $worldname; ?></option>
				<?php } ?>
				</select>
				</form>
		<?php
if ($cache->hasExpired()) {
	
	if ($config['TFSVersion'] == 'Old_TFS02' || $config['TFSVersion'] == 'TFS_10') {
		$deaths = fetchLatestDeaths();
	} else if ($config['TFSVersion'] == 'OTH') {
		$deaths = fetchLatestDeaths_03(30);
	}
	$cache->setContent($deaths);
	$cache->save();
} else {
	$deaths = $cache->load();
}
if ($deaths) {
?>

<table class="heading">
		<tbody>
			<tr class="transparent nopadding">
			<td width="50%" valign="middle">
            <h1>Latest Deaths</h1>
            </td>
            <td valign="middle">
			Latest deaths on OldTibia are listed here.
            </td>
        </tr>
    </tbody>
</table>
<table id="deathsTable" class="table table-striped">
	<tr class="yellow">
		<th>Victim</th>
		<th>Time</th>
		<th>Killer</th>
	</tr>
	<?php foreach ($deaths as $death) { 
		echo '<tr>';
		echo "<td>At level ". $death['level'] .": <a href='characterprofile.php?name=". $death['victim'] ."&world=". $getworldname ."'>". $death['victim'] ."</a></td>";
		echo "<td>". getClock($death['time'], true) ."</td>";
		if ($death['is_player'] == 1) echo "<td>Player: <a href='characterprofile.php?name=". $death['killed_by'] ."&world=". $getworldname ."'>". $death['killed_by'] ."</a></td>";
		else if ($death['is_player'] == 0) {
			if ($config['TFSVersion'] == 'TFS_03') echo "<td>Monster: ". ucfirst(str_replace("a ", "", $death['killed_by'])) ."</td>";
			else echo "<td>Monster: ". ucfirst($death['killed_by']) ."</td>";
		}
		else echo "<td>". $death['killed_by'] ."</td>";
		echo '</tr>';
	} ?>
</table>
<?php
} else echo 'No deaths exist.';
include 'layout/overall/footer.php'; ?>