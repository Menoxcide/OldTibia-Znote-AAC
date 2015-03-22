<?php require_once 'engine/init.php'; include 'layout/overall/header.php'; ?>

<table class="heading">
			<tbody>
				<tr class="transparent nopadding">
				<td width="50%" valign="middle">
                <h1>Support Team</h1>
            </td>
            <td valign="middle">
			List of all support members.
            </td>
        </tr>
    </tbody>
</table>

<?php
$cache = new Cache('engine/cache/support');
if ($cache->hasExpired()) {
	// Fetch all staffs in-game.
	$staffs = support_list();
	// Fetch group ids and names from config.php
	$groups = $config['ingame_positions'];
	// Loops through groups, separating each group element into an ID variable and name variable
	foreach ($groups as $group_id => $group_name) {
		// Loops through list of staffs
		if (!empty($staffs))
		foreach ($staffs as $staff) {
			if ($staff['group_id'] == $group_id) $srtGrp[$group_name][] = $staff;
		}
	}
	if (!empty($srtGrp)) {
		$cache->setContent($srtGrp);
		$cache->save();
	}
} else {
	$srtGrp = $cache->load();
}
$writeHeader = true;
if (!empty($srtGrp)) {
	foreach (array_reverse($srtGrp) as $grpName => $grpList) {
		?>
		<table id="supportTable" class="table table-striped">
			<?php if ($writeHeader) {
			$writeHeader = false; ?>
			<tr class="yellow">
				<th style="background-color:#505050" width="30%"><font color="white"><strong>Group</strong></font></th>
				<th style="background-color:#505050" width="40%"><font color="white"><strong>Name</strong></font></th>
				<th style="background-color:#505050" width="30%"><font color="white"><strong>Status</strong></font></th>
			</tr>
			<?php
			}
			foreach ($grpList as $char) {
				if ($char['name'] != $config['website_char']) {
					echo '<tr>';
					echo "<td width='30%'>". $grpName ."</td>";
					echo '<td width="40%"><a href="characterprofile.php?name='. $char['name'] .'">'. $char['name'] .'</a></td>';
					echo "<td width='30%'><strong>". online_id_to_name($char['online']) ."</strong></td>";
					echo '</tr>';
				}
			}
			?>
		</table>
		<?php
	}
}
echo'</table>'; include 'layout/overall/footer.php'; ?>