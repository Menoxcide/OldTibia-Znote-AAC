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
            <td width="60%" valign="middle">
                <h1>Server Information</h1>
            </td>
            <td valign="middle">
			Information about OldTibia's settings.
            </td>
        </tr>
    </tbody>
</table>

<div class="well">
<center><strong><p>Welcome to OldTibia</strong>, we were founded in March 2014.<br>
Since then, we have added all 7.4 formulas and values, all major quests are also working.<br>
We force the use of our anti-bot client to provide a pleasant gameplay for everyone!<br>
If you have any suggestions, please post them on the forums under the Feedback section.<br>
The following information is what you can expect to find on OldTibia.</p>
</center>

<table class="table table-striped">
<thead>
<tr>
<th style="background-color:#505050" width="30%"><font color="white"><strong>From Level</strong></font></th>
<th style="background-color:#505050" width="40%"><font color="white"><strong>To Level</strong></font></th>
<th style="background-color:#505050" width="30%"><font color="white"><strong>Rate</strong></font></th>
</tr>
<!-- tr><td>Level 1</td><td>Level 7</td><td>10x</td></tr -->
<tr><td>Level 8</td><td>Level 20</td><td>32x</td></tr>
<tr><td>Level 21</td><td>Level 40</td><td>16x</td></tr>
<tr><td>Level 41</td><td>Level 60</td><td>12x</td></tr>
<tr><td>Level 61</td><td>Level 70</td><td>8x</td></tr>
<tr><td>Level 71</td><td>Level 80</td><td>5x</td></tr>
<tr><td>Level 81</td><td>Level 90</td><td>4x</td></tr>
<tr><td>Level 91</td><td>Level 120</td><td>3x</td></tr>
<tr><td>Level 121</td><td>Level 150</td><td>2x</td></tr>
<tr><td>Level 151</td><td>*</td><td>1.5x</td></tr>
</tbody>


<table class="table table-striped">
<thead>
<tr>
<th style="background-color:#505050" width="20%"><center><font color="white"><strong>Skills:</strong></font></th>
<th style="background-color:#505050" width="20%"><center><font color="white"><strong>Magic:</strong></font></th>
<th style="background-color:#505050" width="20%"><center><font color="white"><strong>Loot:</strong></font></th>
<th style="background-color:#505050" width="20%"><center><font color="white"><strong>PvP-EXP:</strong></font></th>
</tr>
<tr><td><center>8x</td><td><center>5x</td><td><center>3x</td><td><center>1% of Victims EXP</center></td></tr>
</tbody>
</table>

<table class="table table-striped">
<thead>
<tr>
<th style="background-color:#505050" width="100%"><center><font color="white"><strong>Daily Frag Limit - Resets 24 hours after last frag!</strong></font></th>
</tr>
</thead>

<tr><td><center>2 Kills to Red Skull. (Lasts 48 Hours)</td></tr>
<tr><td><center>3 Kills for Banishment. (Lasts 24 Hours)</td></tr>
</tbody>
</table>

<table class="table table-striped">
<thead>
<tr>
<th style="background-color:#505050" width="50%"><center><font color="white"><strong>Blessing System Talkactions</strong></font></th>
<th style="background-color:#505050" width="50%"><center><font color="white"><strong>Attribute Loss Information.</strong></font></th>
</tr>
<tr><td><center>Say: !buyfirst Cost: 7,500GP</td><td><center>70% Experience & Item Loss.</td></tr>
<tr><td><center>Say: !buysecond Cost: 10,000GP</td><td><center>50% Experience & Item Loss.</td></tr>
<tr><td><center>Say: !buythird Cost: 15,000GP</td><td><center>30% Experience & Item Loss.</td></tr>
<tr><td><center>Say: !buyfourth Cost: 20,000GP</td><td><center>10% Experience & Item Loss.</td></tr>
<tr><td><center>Say: !buyfifth Cost: 25,000GP</td><td><center>0% Experience & Item Loss.</td></tr>
</tbody>
</table>

<table class="table table-striped">
<thead>
<tr>
<th style="background-color:#505050" width="30%"><center><font color="white"><strong>Server Information</strong></font></th>
</tr>
</tbody>
</table>
<table class="table table-striped">
<thead>
<tr class="auto"><td width="15%" style="font-weight:bold;">Level Protection:</td><td>You will only lose 10% of experience and 0% of Containers and Items until level 40.</td></tr>
<tr class="auto"><td style="font-weight:bold;">Promotion Price</td><td>10,000 Gold Coins from King Tibianus in Thais.</td></tr>
<tr class="auto"><td style="font-weight:bold;">Custom Additions</td><td>PoI Dragon Lords, Shared Experience, Task System, Blessings and more.</td></tr>
<tr class="auto"><td style="font-weight:bold;">Runes</td><td>Are not available in any shops on the game, you must conjure them. You create double charged runes.</td></tr>
<tr class="auto"><td style="font-weight:bold;">Antibot Client</td><td>Our required custom client makes offers an anti-bot feature. Press <a href="/downloads.php">here</a> to download our antibot client.</td></tr>	
<tr class="auto"><td style="font-weight:bold;">Houses</td><td>To buy a house use <span class="gold">"!buyhouse"</span> infront of the house you want. Price 250gp/sqm. Rent 1000gp/weekly.</td></tr>
<tr class="auto"><td style="font-weight:bold;">Party Share</td><td>To use Party Share Experience, say <span class="gold">"!share enable"</span> while being a party leader. 10% bonus experience per person in group.</td></tr>
<tr class="auto"><td style="font-weight:bold;">Blessing System</td><td>You can buy up to five blessings using the talk actions listed above. With all five blessings you will never lose any experience or items.</td></tr>
<tr class="auto"><td style="font-weight:bold;">Task System</td><td>Say "task" to <a href="http://tibia.wikia.com/wiki/Mapper?coords=126.133,125.229,7,3,1,1" target="_blank">Donald McRonald</a> to start Free Account Tasks, and <a href="http://tibia.wikia.com/wiki/Mapper?coords=129.166,124.52,7,3,1,1" target="_blank">Daniel Soulsteel</a> to start Premium Account Tasks.</td></tr>
</tbody>
</table>

<table>
<thead><th style="background-color:#505050" width="100%"><font color="white"><strong>OldTibia Feature List:</strong></font></th></thead>
</table>
<ul>
<li>All strong monsters drop up to 100 gold coins at 80% chance.</li>
<li>All average monsters drop up too 35-55 gold coins at 50% chance.</li>
<li>No runes available in shop, must be conjured.</li>
<li>Double Rune Charges when Player-Made.</li>
<li>All Spell Exhausts match 7.4 Gameplay.</li>
<li>Full Health & Mana on Level Advance.</li>
<li>Spears do not break, they drop under monsters.</li>
<li>Cannot rope if items block hole.</li>
<li>Slightly Faster Attack Speed for Knights and Paladins.</li>
<li>All account types can travel by boat to any city.</li>
<li>All account types can use Premium Spells.</li>
<li>No Protection Zone on Boats + Travel with Skull.</li>
<li>Boats use "bring me to" function for fast travel.</li>
<li>Soul Points & Wands/Rods are not used.</li>
<li>Promotion increases regen speeds by 1 second.</li>
<li>Port Hope is accessible and open for use.</li>
<li>Bank System.</li>
<li><strong>Client w/ Anti-Bot Protection & DirectX9/OpenGL.</strong> <a href="downloads.php">(Download Here)</a></li>
<br>
</ul>

<table>
<thead><th style="background-color:#505050" width="100%"><font color="white"><strong>Enabled/Disable Server Features:</strong></font></th></thead>
</table>
<ul>
<li>Auto-Stack Item in Container = <strong>Enabled</strong></li>
<li>Luring/Roping Creatures = <strong>Enabled</strong></li>
<li>Last Hit & Most Damage Takes PZ = <strong>Enabled</strong></li>
<li>Boat Travel with PZ/Skull = <strong>Enabled</strong></li>
<li>Anti-Mage Bot = <strong>Enabled</strong> (8 second delayed attack on login)</li>
<li>Both Enforcer/Victim get PZ Lock = <strong>Enabled</strong></li>
<li>UH Trap = <strong>Enabled</strong></li>
<li>Premium to Use Beds = <strong>Disabled</strong></li>
<li>Premium to Buy House = <strong>Enabled</strong></li>
<li>Rune Level Requirements - <strong>Disabled</strong></li>
<li>Learn Spells = <strong>Disabled</strong></li><br> 
</ul>

<table>
<thead><th style="background-color:#505050" width="100%"><font color="white"><strong>Premium Benefits:</strong></font></th></thead>
</table>

<ul>
<li>Ability to wear <b>Premium Outfits</b>.</li>
<li><b>24/7 Free Light.</b> (Granted "utevo vis lux" on login).</li>
<li>You will have access to Daniel Steelsoul - <b>Premium Only Tasks</b>.</li>
<li>Be <b>excluded</b> from the <b>Anti-PK Broadcast</b> when you frag someone.</li>
<li>Gain <b>10%</b> of the <b>Monsters Max Health</b> as <b>Bonus Experience</b> when you kill it!
<br>(<b>Example:</b> Rat = 2<b>xp</b>, Warlock = 320<b>xp</b>, Demon = 820<b>xp</b>)</li>
</ul>

<table>
<thead><th style="background-color:#505050" width="100%"><font color="white"><strong>Map Changes:</strong></font></th></thead>
</table>
<ul>
<li>Rashid spawns in Thais Library.</li>
<li>Pits of Inferno Dragon Lord Lair added.</li>
<li>Desert Quest requires only 1 player (no items needed).</li>
</ul>
            </div>

<?php include 'layout/overall/footer.php'; ?>