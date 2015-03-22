<?php require_once 'engine/init.php'; include 'layout/overall/header.php'; ?>

<table class="heading">
    <tbody>
        <tr class="transparent nopadding">
            <td width="50%" valign="middle">
                <h1>Account</h1>
            </td>
            <td valign="middle">
			View and edit your OldTibia account. 
            </td>
        </tr>
    </tbody>
</table>

<p>Please enter your account credentials below.<br>If you do not have an account yet, simply <a href="register.php">sign up</a> up to get one.</p>

	<table>
		<tbody><tr class="header">
			<th colspan="2">Account Log In</th>
		</tr>
<!-- /table -->
		<div class="inner" id="login">
		<center>
		<form action="login.php" method="post">
				<tr><td width="20%">&nbsp;<i style="font-size:12px">Account number:</i></td>
				<td><input type="text" name="username"></td></tr>
				<tr><td>&nbsp;<i style="font-size:12px">Password:</i></td>
				<td><input type="password" name="password"></td></tr>
		</table>
		
		<input class="button" type="submit" value="&nbsp;&raquo;Log in">
			<?php
				/* Form file */
				Token::create();
			?></center>
		</form>
		<a href='register.php'><input class="button" type="submit" value="&nbsp;&raquo;Create Account"></a> 
		<a href='sub.php?page=recover'><input class="button" type="submit" value="&nbsp;&raquo;Lost Account"></a>
	</div>
	</center>

<?php include 'layout/overall/footer.php'; ?>