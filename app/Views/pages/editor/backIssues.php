<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div id="breadcrumb">
  <a href="<?= base_url(); ?>/index">Home</a> &gt;
  <a href="<?= base_url(); ?>/user" class="hierarchyLink">User</a> &gt;
  <a href="<?= base_url(); ?>/editor" class="hierarchyLink">Editor</a> &gt;
  <a href="<?= base_url(); ?>/editor/futureIssues" class="hierarchyLink">Issues</a> &gt;
  <a href="<?= base_url(); ?>/editor/backIssues" class="current">Back Issues</a>
</div>

<h2>Back Issues</h2>


<div id="content">



  <script type="text/javascript">
    $(document).ready(function() {
      setupTableDND("#dragTable", "moveIssue");
    });
  </script>

  <ul class="menu">
    <li><a href="<?= base_url(); ?>/editor/createIssue">Create Issue</a></li>
    <li><a href="<?= base_url(); ?>/editor/futureIssues">Future Issues</a></li>
    <li class="current"><a href="<?= base_url(); ?>/editor/backIssues">Back Issues</a></li>
  </ul>

  <br />


  <div id="issues">
    <table width="100%" class="listing" id="dragTable">
      <tr>
        <td colspan="5" class="headseparator">&nbsp;</td>
      </tr>
      <tr class="heading" valign="bottom">
        <td width="60%">Issue</td>
        <td width="15%">Published</td>
        <td width="15%">Items</td>
        <td width="5%" align="right">Action</td>
      </tr>
      <tr>
        <td colspan="5" class="headseparator">&nbsp;</td>
      </tr>

      <?php if (isset($issues)) : ?>
        <?php foreach ($issues as $issue) : ?>
          <tr valign="top" class="data" id="<?= $issue['issue_id']; ?>">
            <td class="drag"><a href="<?= base_url(); ?>/editor/issueToc/<?= $issue['issue_id']; ?>" class="action">Vol <?= $issue['volume']; ?>, No <?= $issue['number']; ?> (<?= $issue['year']; ?>)</a></td>
            <td class="drag"><?= $issue['date_created']; ?></td>
            <td class="drag"><?= count($articles[$issue['issue_id']]); ?></td>
            <td align="right"><a href="<?= base_url(); ?>/editor/removeIssue/<?= $issue['issue_id']; ?>" onclick="return confirm('Are you sure you want to permanently delete this issue?')" class="action">Delete</a></td>
          </tr>
        <?php endforeach; ?>
      <?php else : ?>
        <tr>
          <td colspan="5">No Issue Publish</td>
        </tr>
      <?php endif; ?>
      <tr>
        <td colspan="5" class="endseparator">&nbsp;</td>
      </tr>
    </table>
  </div>

</div><!-- content -->
</div><!-- main -->
</div><!-- body -->



</div><!-- container -->
<?= $this->endSection(); ?>