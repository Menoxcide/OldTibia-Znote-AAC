						
			<table class="heading">
			<tr class="transparent nopadding">
				<td width="40%" valign="middle"><h1>Latest News</h1></td>
				<td valign="middle">
				Here you will find the latest news about OldTibia.<br>Come back often to stay informed about important changes in the game.
				</td>
			</tr>
		</table>
							
						
													<a href="register.php" style="float: right; margin: 0px 0px 30px 100px;"><img src="http://4.ii.gl/ZsanwCWr.gif"></a>
<h1 style="margin-top: 0;">Welcome to OldTibia 7.4!</h1>
<p>After 8+ long months of development, OldTibia is proud to present you with a true 7.4 real map experience! &nbsp; We are eager to satisfy the community with a stable and professionally handled server!</p>
<p>
Are you looking for a good fight, or do you just want to revive some old memories in the lands of 7.4 Tibia? Then this should be the perfect place for you! 
For more detailed information check out our <a href="serverinfo.php">F.A.Q section</a> here!
</p>
<p><a href="register.php">Create an account</a> and <a href="downloads.php">download our client</a> today, and being your very own journey in the lands of 7.4 Tibia!</p>

<!-- ?php

$curr = time();
$date = strtotime("February 30, 2015");
$diff = $date - $curr;
$diff_dd = floor($diff / 86400);
$diff %= 86400;
$diff_hh = floor($diff / 3600);
$diff %= 3600;
$diff_mm = floor($diff / 60);
$diff %= 60;
$diff_ss = $diff;
echo "Current date: " . date("Y-m-d H:i:s", $curr) . "\n<br>";
echo "Target date: " . date("Y-m-d H:i:s", $date) . "\n<br>";
echo sprintf(
    "%d days, %d hours, %d minutes, %d seconds remaining",
    $diff_dd,
    $diff_hh,
    $diff_mm,
    $diff_ss
);
    ? -->

<!-- div style="margin: 15px 0px 0px;" align="center"><noscript><div style="width: 140px; border: 1px solid rgb(204, 204, 204); text-align: center; color: rgb(249, 249, 255); font-weight: bold; font-size: 12px; background-color: transparent;" align="center"><a style="text-decoration: none; font-size: inherit; color: rgb(249, 249, 255);" href="http://mycountdown.org/Event/Launch/">Launch </a></div></noscript><script src="http://mycountdown.org/countdown.php?cp2_Hex=040244&cp1_Hex=F9F9FF&img=-1&hbg=1&fwdt=250&lab=1&ocd=Launch&text1=OldTibia Launches!&text2=OldTibia will be going live&group=Event&countdown=Launch&widget_number=3015&event_time=1415977200&timezone=America/New_York" type="text/javascript"></script></div -->

<!-- iframe width="600" height="250" src="http://itsalmo.st/#timetolauncholdtibia:embed" scrolling="no" frameborder="0" style="border: 1px solid #dbd8d7"></iframe -->

<table>
<?php
$cache = new Cache('engine/cache/news');
if ($cache->hasExpired()) {
	$news = fetchAllNews();
	
	$cache->setContent($news);
	$cache->save();
} else {
	$news = $cache->load();
}

// Design and present the list
if ($news) {
	function TransformToBBCode($string) {
		$tags = array(
			'[center]{$1}[/center]' => '<center>$1</center>',
			'[b]{$1}[/b]' => '<b>$1</b>',
			'[size={$1}]{$2}[/size]' => '<font size="$1">$2</font>',
			'[img]{$1}[/img]'    => '<a href="$1" target="_BLANK"><img src="$1" alt="image" style="width: 100%"></a>',
			'[link]{$1}[/link]'    => '<a href="$1">$1</a>',
			'[link={$1}]{$2}[/link]'   => '<a href="$1" target="_BLANK">$2</a>',
			'[color={$1}]{$2}[/color]' => '<font color="$1">$2</font>',
			'[*]{$1}[/*]' => '<li>$1</li>',
		);

		foreach ($tags as $tag => $value) {
			$code = preg_replace('/placeholder([0-9]+)/', '(.*?)', preg_quote(preg_replace('/\{\$([0-9]+)\}/', 'placeholder$1', $tag), '/'));
			$string = preg_replace('/'.$code.'/i', $value, $string);
		}

		return $string;
	}
	echo '<div id="news">';
	foreach ($news as $n) {
		?>
<tr><td class="zheadline">&nbsp;&nbsp;&nbsp;<font size="2" color="white"><?php echo date('l, d M Y', $n['date']); ?> - <b><?php echo TransformToBBCode($n['title']); ?></font></td></tr>
<tr><td class="znewsbody" colspan="2"><?php echo TransformToBBCode(nl2br($n['text'])); ?></td></tr>
<!-- tr><td class="znewsdate" style="border-bottom:1px solid #000000;background-color:#505050" colspan="2"></td></tr -->
<tr><td class="znewsdate" align="right">Posted by <a href="characterprofile.php?name=<?php echo $n['name']; ?>"><?php echo $n['name']; ?></a> on <?php echo date('l, d M Y', $n['date']); ?></td></tr>
<!-- tr><td class="znewsdate" style="background-color:#505050" colspan="2"></td></tr -->
		<?php
	}
	echo '</div>';
}
?>
</table>