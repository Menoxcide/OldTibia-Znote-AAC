<img src="layout/images/titles/t_news.png"/>

<table width="100%" cellpadding="0" cellspacing="0" background-color: transparent;>
      <tbody><tr><td width="80%" style="background:transparent">
	  
      <font color="black">Welcome adventurer, to a medieval fantasy online game full of
      exciting adventures, mighty magic, and great battles. On your journey,
      you will meet players from all over the world.
      For more information about this multi user dungeon with a graphical
      user interface have a look at our <a href="serverinfo.php">server information</a> page. To start
      playing <a href="register.php">sign up</a> for a free account. See you in the game, enjoy your adventure!<br><br>
      
      Don't forget, you have to <a href="downloads.php">download</a> our anti-bot client to login and play OldTibia!
      </font></td><td align="center" width="20%" style="background:transparent">
      <a href="register.php"><img src="layout/images/signup.gif" border="0" height="132" width="100"></a>
      </td></tr>
</tbody></table>


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
<tr><td class="znewsdate" style="border-bottom:1px solid #000000;" colspan="2"></td></tr>
<tr><td class="znewsdate" align="center">Posted by <a href="characterprofile.php?name=<?php echo $n['name']; ?>"><?php echo $n['name']; ?></a> at <?php echo date('l, d M Y', $n['date']); ?></td></tr>
<tr><td class="znewsdate" colspan="2"></td></tr>
		<?php
	}
	echo '</div>';
}
?>
</table>