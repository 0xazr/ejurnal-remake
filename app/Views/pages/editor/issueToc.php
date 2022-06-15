<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div id="breadcrumb">
  <a href="<?= base_url(); ?>/index">Home</a> &gt;
  <a href="<?= base_url(); ?>/user" class="hierarchyLink">User</a> &gt;
  <a href="<?= base_url(); ?>/editor" class="hierarchyLink">Editor</a> &gt;
  <a href="<?= base_url(); ?>/editor/futureIssues" class="hierarchyLink">Issues</a> &gt;
  <a href="<?= base_url(); ?>/editor/issueToc/<?= $issue['issue_id']; ?>" class="current">Vol <?= $issue['volume']; ?>, No <?= $issue['number']; ?> (<?= $issue['year']; ?>)</a>
</div>

<h2>Vol <?= $issue['volume']; ?>, No <?= $issue['number']; ?> (<?= $issue['year']; ?>)</h2>


<div id="content">

  <script type="text/javascript">
    $(document).ready(function() {

      setupTableDND("#issueToc-84", "<?= base_url(); ?>/editor/moveArticleToc");

    });
  </script>

  <ul class="menu">
    <li><a href="<?= base_url(); ?>/editor/createIssue">Create Issue</a></li>
    <li class="current"><a href="<?= base_url(); ?>/editor/futureIssues">Future Issues</a></li>
    <li><a href="<?= base_url(); ?>/editor/backIssues">Back Issues</a></li>
  </ul>

  <br />

  <form action="#">
    Issue: <select name="issue" class="selectMenu" onchange="if(this.options[this.selectedIndex].value > 0) location.href='<?= base_url(); ?>/editor/issueToc/ISSUE_ID'.replace('ISSUE_ID', this.options[this.selectedIndex].value)" size="1">
      <?php if (isset($all_issues)) : ?>
        <option label="------    Future Issues    ------" value="-100">------ Future Issues ------</option>
        <?php foreach ($all_issues as $is) : ?>
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

  <div class="separator"></div>

  <ul class="menu">
    <li class="current"><a href="<?= base_url(); ?>/editor/issueToc/<?= $issue['issue_id']; ?>">Table of Contents</a></li>
    <li><a href="<?= base_url(); ?>/editor/issueData/<?= $issue['issue_id']; ?>">Issue Data</a></li>
    <li><a href="<?= base_url(); ?>/editor/issueGalleys/<?= $issue['issue_id']; ?>">Issue Galleys</a></li>
    <li><a href="<?= base_url(); ?>/issue/view/<?= $issue['issue_id']; ?>">Preview Issue</a></li>
  </ul>

  <h3>Table of Contents</h3>

  <form method="post" action="<?= base_url(); ?>/editor/<?= (isset($havePublish)) ? 'unPublishIssueToc' : 'updateIssueToc' ?>/<?= $issue_id; ?>" onsubmit="return confirm('Save changes to table of contents?')">

    <h4>Articles&uarr; &darr;</h4>

    <table width="100%" class="listing" id="issueToc-84">
      <tr>
        <td colspan="6" class="headseparator">&nbsp;</td>
      </tr>
      <tr class="heading" valign="bottom">
        <td width="5%">&nbsp;</td>
        <td width="25%">Authors</td>
        <td>Title</td>
        <!-- <td width="7%">Pages</td>
        <td width="5%">Remove</td>
        <td width="5%">Proofed</td> -->
      </tr>
      <tr>
        <td colspan="6" class="headseparator">&nbsp;</td>
      </tr>

      <?php if (isset($schedule_publications)) : ?>
        <?php foreach ($schedule_publications as $schedule_publication) : ?>
          <tr id="article-5700" class="data">
            <td><a href="<?= base_url(); ?>/editor/moveArticleToc?d=u&amp;id=5700" class="plain">&uarr;</a>&nbsp;<a href="<?= base_url(); ?>/editor/moveArticleToc?d=d&amp;id=5700" class="plain">&darr;</a></td>
            <td>
              <?php for ($i = 0; $i < count($authors[$schedule_publication['article_id']]); $i++) :  ?>
                <?php if (count($authors[$schedule_publication['article_id']]) == 1) : ?>
                  <?= $authors[$schedule_publication['article_id']][$i]['first_name']; ?>
                <?php elseif ($i < count($authors[$schedule_publication['article_id']]) - 1) : ?>
                  <?= $authors[$schedule_publication['article_id']][$i]['first_name'] . ', '; ?>
                <?php elseif ($i == count($authors[$schedule_publication['article_id']]) - 1) : ?>
                  <?= $authors[$schedule_publication['article_id']][$i]['first_name']; ?>
                <?php endif; ?>
              <?php endfor; ?>
            </td>
            <td class="drag"><a href="<?= base_url(); ?>/editor/submission/<?= $schedule_publication['article_id']; ?>" class="action"><?= $articles[$schedule_publication['article_id']]['title']; ?></a></td>
            <!-- <td><input type="text" name="pages[12541]" value="" size="7" maxlength="255" class="textField" /></td>
            <td><input type="checkbox" name="remove[12541]" value="5700" /></td>
            <td>
              <img src="https://iptek.its.ac.id/lib/pkp/templates/images/icons/unchecked.gif" width="16" height="14" alt="Unchecked" />
            </td> -->
          </tr>
        <?php endforeach; ?>
      <?php else : ?>
        <tr>
          <td></td>
          <td></td>
          <td colspan="6">No Article with Issue</td>
        </tr>
      <?php endif; ?>
    </table>

    <input type="submit" value="Save" class="button defaultButton" />
    <?php if (isset($havePublish)) : ?>
      <input type="submit" value="Unpublish Issue" onclick="confirmAction('<?= base_url(); ?>/editor/publishIssue/<?= $issue['issue_id']; ?>', 'Are you sure you want to publish the new issue?')" class="button" />
    <?php else : ?>
      <input type="submit" value="Publish Issue" onclick="confirmAction('<?= base_url(); ?>/editor/updateIssueToc/<?= $issue_id; ?>', 'Are you sure you want to publish the new issue?')" class="button" />
    <?php endif; ?>
  </form>



</div><!-- content -->
</div><!-- main -->
</div><!-- body -->



</div><!-- container -->
<?= $this->endSection(); ?>