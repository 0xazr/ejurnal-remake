<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div id="breadcrumb">
  <a href="<?= base_url(); ?>/index">Home</a> &gt;
  <a href="<?= base_url(); ?>/user" class="hierarchyLink">User</a> &gt;
  <a href="<?= base_url(); ?>/editor" class="hierarchyLink">Editor</a> &gt;
  <a href="<?= base_url(); ?>/editor/futureIssues" class="hierarchyLink">Issues</a> &gt;
  <a href="<?= base_url(); ?>/editor/createIssue" class="current">Create Issue</a>
</div>

<h2>Create Issue</h2>


<div id="content">




  <ul class="menu">
    <li class="current"><a href="<?= base_url(); ?>/editor/createIssue">Create Issue</a></li>
    <li><a href="<?= base_url(); ?>/editor/futureIssues">Future Issues</a></li>
    <li><a href="<?= base_url(); ?>/editor/backIssues">Back Issues</a></li>
  </ul>

  <br />

  <form action="#">
    Issue: <select name="issue" class="selectMenu" onchange="if(this.options[this.selectedIndex].value > 0) location.href='<?= base_url(); ?>/editor/issueToc/ISSUE_ID'.replace('ISSUE_ID', this.options[this.selectedIndex].value)" size="1">
      <?php if (isset($issue)) : ?>
        <option label="------    Future Issues    ------" value="-100">------ Future Issues ------</option>
        <?php foreach ($issue as $is) : ?>
          <option label="Vol <?= $is['volume']; ?>, No <?= $is['number']; ?> (<?= $is['year']; ?>)" value="<?= $is['issue_id']; ?>">Vol <?= $is['volume']; ?>, No <?= $is['number']; ?> (<?= $is['year']; ?>)</option>
        <?php endforeach; ?>
        <option label="------    Current Issue    ------" value="-101">------ Current Issue ------</option>
        <option label="------    Back Issues    ------" value="-102">------ Back Issues ------</option>
      <?php else : ?>
        <option label="------    Future Issues    ------" value="-100">------ Future Issues ------</option>
        <option label="------    Current Issue    ------" value="-101">------ Current Issue ------</option>
        <option label="------    Back Issues    ------" value="-102">------ Back Issues ------</option>
      <?php endif; ?>
    </select>
  </form>

  <form id="issue" method="post" action="<?= base_url(); ?>/editor/saveIssue" enctype="multipart/form-data">

    <div class="separator"></div>
    <div id="identification">
      <h3>Identification</h3>

      <table width="100%" class="data">
        <tr valign="top">
          <td width="20%" class="label">
            <label for="volume">
              Volume </label>
          </td>
          <td width="80%" class="value"><input type="text" name="volume" id="volume" value="1" size="5" maxlength="5" class="textField" /></td>
        </tr>
        <tr valign="top">
          <td class="label">
            <label for="number">
              Number </label>
          </td>
          <td class="value"><input type="text" name="number" id="number" value="1" size="5" maxlength="5" class="textField" /></td>
        </tr>
        <tr valign="top">
          <td class="label">
            <label for="year">
              Year </label>
          </td>
          <td class="value"><input type="text" name="year" id="year" value="2024" size="5" maxlength="4" class="textField" /></td>
        </tr>
        <!-- <tr valign="top">
          <td class="label">
            <label>
              Issue identification </label>
          </td>
          <td class="value"><input type="checkbox" name="showVolume" id="showVolume" value="1" checked="checked" /><label for="showVolume"> Volume</label><br /><input type="checkbox" name="showNumber" id="showNumber" value="1" checked="checked" /><label for="showNumber"> Number</label><br /><input type="checkbox" name="showYear" id="showYear" value="1" checked="checked" /><label for="showYear"> Year</label><br /><input type="checkbox" name="showTitle" id="showTitle" value="1" /><label for="showTitle"> Title</label></td>
        </tr> -->
        <tr valign="top">
          <td class="label">
            <label for="title">
              Title </label>
          </td>
          <td class="value"><input type="text" name="title" id="title" value="" size="40" maxlength="120" class="textField" /></td>
        </tr>
        <tr valign="top">
          <td class="label">
            <label for="description">
              Description </label>
          </td>
          <td class="value"><textarea name="description" id="description" cols="40" rows="5" class="textArea"></textarea></td>
        </tr>
      </table>
    </div>


    <!-- <div class="separator"></div>
    <div id="cover">
      <h3>Cover</h3>
      <table width="100%" class="data">
        <tr valign="top">
          <td class="label" colspan="2"><input type="checkbox" name="showCoverPage[en_US]" id="showCoverPage" value="1" /> <label for="showCoverPage">Create a cover for this issue with the following elements.</label></td>
        </tr>
        <tr valign="top">
          <td width="20%" class="label">
            <label for="coverPage">
              Cover image </label>
          </td>
          <td width="80%" class="value">
            <input type="file" name="coverPage" id="coverPage" class="uploadField" />&nbsp;&nbsp;Use Save to upload file.<br />
            (Allowed formats: .gif, .jpg, or .png )
          </td>
        </tr>
        <tr valign="top">
          <td width="20%" class="label">
            <label for="styleFile">
              Stylesheet </label>
          </td>
          <td width="80%" class="value"><input type="file" name="styleFile" id="styleFile" class="uploadField" />&nbsp;&nbsp;Use Save to upload file.<br />Uploaded:&nbsp;&mdash;</td>
        </tr>
        <tr valign="top">
          <td class="label">
            <label for="coverPageDescription">
              Cover caption </label>
          </td>
          <td class="value"><textarea name="coverPageDescription[en_US]" id="coverPageDescription" cols="40" rows="5" class="textArea"></textarea></td>
        </tr>
        <tr valign="top">
          <td width="20%" class="label">
            <label for="hideCoverPageArchives">
              Display </label>
          </td>
          <td width="80%" class="value"><input type="checkbox" name="hideCoverPageArchives[en_US]" id="hideCoverPageArchives" value="1" /> <label for="hideCoverPageArchives">Do not display cover image thumbnail in issue listing.</label></td>
        </tr>
        <tr valign="top">
          <td width="20%" class="label">&nbsp;</td>
          <td class="value"><input type="checkbox" name="hideCoverPageCover[en_US]" id="hideCoverPageCover" value="1" /> <label for="hideCoverPageCover">Do not display cover image prior to table of contents.</label></td>
        </tr>
      </table>
    </div> -->
    <p><input type="submit" value="Save" class="button defaultButton" /> <input type="button" value="Cancel" onclick="document.location.href='<?= base_url(); ?>/editor/index'" class="button" /></p>

  </form>


</div><!-- content -->
</div><!-- main -->
</div><!-- body -->



</div><!-- container -->
<?= $this->endSection(); ?>