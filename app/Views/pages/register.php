<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div id="breadcrumb">
  <form action="<?= base_url(); ?>/User/daftar" method="post">
    <table>
      <tr>
        <td>First Name</td>
        <td>
          <input type="text" name="first_name">
        </td>
      </tr>
      <tr>
        <td>Last Name</td>
        <td>
          <input type="text" name="last_name">
        </td>
      </tr>
      <tr>
        <td>Email</td>
        <td>
          <input type="text" name="email">
        </td>
      </tr>
      <tr>
        <td>Username</td>
        <td>
          <input type="text" name="username">
        </td>
      </tr>
      <tr>
        <td>Role</td>
        <td>
          <select name="role" id="role" class="selectMenu">
            <option name="role" value="author">author</option>
            <option name="role" value="editor">editor</option>
            <option name="role" value="reviewer">reviewer</option>
          </select>
        </td>
      </tr>
      <tr>
        <td>Password</td>
        <td>
          <input type="password" name="password">
        </td>
      </tr>
      <tr>
        <td>Confirm Password</td>
        <td>
          <input type="password" name="password_conf">
        </td>
      </tr>
    </table>
    <input type="submit" value="Register">
  </form>
</div>
<?= $this->endSection(); ?>