			<?php
			$status = true;
			if ($status) {
				?>
				<TABLE BORDER=0 CELLSPACING=0 CELLPADDING=0>
				<TR><TD CLASS="playersonline">&#160;<A HREF="onlinelist.php?world=<?php echo $configworlds[1];?>"><?php echo $configworlds[1]; ?></A></TD><TD CLASS="playersonline" ALIGN="right"><A HREF="onlinelist.php?world=<?php echo $configworlds[1];?>"><?php echo user_count_online(1); ?></A>&#160;</TD></TR>
				<TR><TD CLASS="playersonline">&#160;<A HREF="onlinelist.php?world=<?php echo $configworlds[2];?>"><?php echo $configworlds[2]; ?></A></TD><TD CLASS="playersonline" ALIGN="right"><A HREF="onlinelist.php?world=<?php echo $configworlds[2];?>"><?php echo user_count_online(2); ?></A>&#160;</TD></TR>
				</TABLE>
				<?php
				}
				?>