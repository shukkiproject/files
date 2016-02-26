<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Welcome!</title>
</head>
<body>
	<h1>Information</h1>
	<hr />
	<div>
		<p><small>See <a href="./phpinfo.php" title="PHP Info">PHP Info</a> here.</small></p>
	</div>
	<div>
		<p>Just so you know, here's a list of available commands on this system:</p>
		<dl>
			<dt>proxy_on</dt><dd>Will ask your proxy credentials to set up your environment. (if you made any mistake in your password, type "rm ~/.config/proxycredentials")</dd>
			<dt>proxy_off</dt><dd>Does the opposite of the previous command.</dd>
			<dt>imie-share `session_name`</dt><dd>Will mount the directories of your session (for example: "imie-share dl12" will mount cours_dl12, donnees_dl12 and sources in /mnt). (if you made any mistake in your password, type "sudo rm /etc/smbcredentials")</dd>
			<dt>composer</dt><dd>Will invoke composer. Type 'sudo composer selfupdate' to update.</dd>
			<dt>symfony</dt><dd>Same as composer.</dd>
			<dt>npm</dt><dd>Node.js is here too.</dd>
			<dt>clean</dt><dd>Removes temporary files (such as '*~' or '#*').</dd>
		</dl>
		<p>Here are some programs installed:</p>
		<dl>
			<dt>NetBeans</dt><dd>You can look it up in the 'Applications Menu', under 'Development'.</dd>
			<dt>SublimeText</dt><dd>You can look it up in the 'Applications Menu', under 'Development'.</dd>
			<dt>Emacs</dt><dd>You can look it up in the 'Applications Menu', under 'Development'.</dd>
			<dt>Vim</dt><dd>You can look it up in the 'Applications Menu', under 'Development'.</dd>
			<dt>GParted</dt><dd>You can look it up in the 'Applications Menu', under 'System'.</dd>
		</dl>
	</div>
	<div>
		<p>If you wish to change some config files from the web server (don't forget to 'sudo service apache2 restart' afterwards), here's where:</p>
		<dl>
			<dt>Apache2</dt><dd>Look into /etc/apache2.</dd>
			<dt>PHP5</dt><dd>Look into /etc/php5.</dd>
		</dl>
	</div>
	<hr />
	<div>
		<p>
			Here's a link to the <a href="http://localhost/~imie/symfony_demo/web/app_dev.php" title="Symfony rules">symfony demo</a> installed.<br />
			<small>(if this isn't working, try 'sudo chmod -R 777 /home/imie/public_html/symfony_demo/app/cache' and 'sudo chmod -R 777 /home/imie/public_html/symfony_demo/app/cache')</small>
		</p>
	</div>
</body>
</html>