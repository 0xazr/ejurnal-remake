<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<h2><?= $contentTitle; ?></h2>
<div id="content">
	<form id="signinForm" method="post" action="<?= base_url(); ?>/login/signIn">
		<input type="hidden" name="source" value="" />

		<table id="signinTable" class="data">
			<tr>
				<td class="label"><label for="loginUsername">Username</label></td>
				<td class="value"><input type="text" id="loginUsername" name="username" value="" size="20" maxlength="32" class="textField" /></td>
			</tr>
			<tr>
				<td class="label"><label for="loginPassword">Password</label></td>
				<td class="value"><input type="password" id="loginPassword" name="password" value="" size="20" maxlength="32" class="textField" /></td>
			</tr>
			<tr valign="middle">
				<td></td>
				<td class="value"><input type="checkbox" id="loginRemember" name="remember" value="1" /> <label for="loginRemember">Remember my username and password</label></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Login" class="button" /></td>
			</tr>
		</table>

		<p>
			&#187; <a href="<?= base_url(); ?>/login/lostPassword">Forgot your password?</a>
		</p>
		<script type="text/javascript">
			document.getElementById('loginUsername').focus();
			// -->
		</script>
	</form>


</div>
<?= $this->endSection(); ?>