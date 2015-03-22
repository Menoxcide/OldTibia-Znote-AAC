<table class="heading">
    <tbody>
        <tr class="transparent nopadding">
            <td width="50%" valign="middle">
                <h1>Characters</h1>
            </td>
            <td valign="middle">
			Detailed information about a certain player. 
            </td>
        </tr>
    </tbody>
</table>

<table>
<tr><td style="background-color:#505050"><font color="white"><strong>Search Character:</strong></font></td></tr>
<tr class="darkborder"><td>
	<form type="submit" action="characterprofile.php" method="get">
		Name: <input type="text" size="25" name="name" class="search">
				World:
		<select name="world">
		<?php foreach ($config['available_worlds'] as $tid) { $worldname = world_id_to_name($tid); ?>
		<option value="<?php echo $worldname; ?>" <?php if ($worldname == $getworldname) echo "selected"; ?>><?php echo $worldname; ?></option>
		<?php } ?>
		</select>
		<input type="submit" name="submitName" value="Submit">
	</form>
</td></tr>
</table>