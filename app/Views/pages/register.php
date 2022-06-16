<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<h2>Register Account</h2>
<div id="content">
  <p>Register account as author : </p>
  <form action="<?= base_url(); ?>/User/daftar" method="post">
    <table class="data" width="100%">
      <tr valign="top">
        <td width="20%" class="label">First Name *</td>
        <td width="80%" class="value">
          <input type="text" name="first_name" class="textField">
        </td>
      </tr>
      <tr valign="top">
        <td width="20%" class="label">Middle Name</td>
        <td width="80%" class="value">
          <input type="text" name="middle_name" class="textField">
        </td>
      </tr>
      <tr valign="top">
        <td>Last Name *</td>
        <td>
          <input type="text" name="last_name" class="textField">
        </td>
      </tr>
      <tr valign="top">
        <td>Email *</td>
        <td>
          <input type="text" name="email" class="textField">
        </td>
      </tr>
      <tr valign="top">
        <td>Username *</td>
        <td>
          <input type="text" name="username" class="textField">
        </td>
      </tr>
      <tr valign="top">
        <td>Password *</td>
        <td>
          <input type="password" name="password" class="textField">
        </td>
      </tr>
      <tr valign="top">
        <td>Confirm Password *</td>
        <td>
          <input type="password" name="password_conf" class="textField">
        </td>
      </tr>
    </table>
    <p><span class="formRequired">* Denotes required field</span></p><br>
    <input type="submit" value="Register" class="button defaultButton">
  </form>
</div>
<?= $this->endSection(); ?>