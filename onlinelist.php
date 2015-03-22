<?php require_once 'engine/init.php'; include 'layout/overall/header.php'; ?>
				<form action="" method="GET">
				<b>World:</b>
				<select name="world" onchange="this.form.submit()">
				<?php foreach ($config['available_worlds'] as $tid) { $worldname = world_id_to_name($tid); ?>
				<option value="<?php echo $worldname; ?>" <?php if ($worldname == $getworldname) echo "selected"; ?>><?php echo $worldname; ?></option>
				<?php } ?>
				</select>
				</form>
<table class="heading">
    <tbody>
        <tr class="transparent nopadding">
            <td width="50%" valign="middle">
                <h1>Who Is Online</h1>
            </td>
            <td valign="middle">
			Detailed information about all players on OldTibia. 
            </td>
        </tr>
    </tbody>
</table>
<?php
$array = online_list();
if ($array) {
	?>
	
	<table id="onlinelistTable" class="table table-striped table-hover">
		<tr class="yellow">
			<th>Name:</th>
			<th>Guild:</th>
			<th>Level:</th>
			<th>Vocation:</th>
		</tr>
			<?php
			foreach ($array as $value) {
			$url = url("characterprofile.php?name=". $value['name']);
			echo '<tr class="special" onclick="javascript:window.location.href=\'' . $url . '\'">';
			echo '<td><a href="characterprofile.php?name='. $value['name'] .'&world='. $getworldname .'">'. $value['name'] .'</a></td>';
			if (!empty($value['gname'])) echo '<td><a href="guilds.php?name='. $value['gname'] .'&world='. $getworldname .'">'. $value['gname'] .'</a></td>'; else echo '<td></td>'; 
			echo '<td>'. $value['level'] .'</td>';
			echo '<td>'. vocation_id_to_name($value['vocation']) .'</td>';
			echo '</tr>';
			}
			?>
	</table>

	<?php
} else {
	echo 'Nobody is online.';
}
?>
<?php include 'layout/overall/footer.php'; ?>