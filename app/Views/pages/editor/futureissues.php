<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div id="breadcrumb">
  <a href="<?= base_url(); ?>/index">Home</a> &gt;
  <a href="<?= base_url(); ?>/user" class="hierarchyLink">User</a> &gt;
  <a href="<?= base_url(); ?>/editor" class="hierarchyLink">Editor</a> &gt;
  <a href="<?= base_url(); ?>/editor/futureIssues" class="hierarchyLink">Issues</a> &gt;
  <a href="<?= base_url(); ?>/editor/futureIssues" class="current">Future Issues</a>
</div>

<h2>Future Issues</h2>


<div id="content">



  <ul class="menu">
    <li><a href="<?= base_url(); ?>/editor/createIssue">Create Issue</a></li>
    <li class="current"><a href="<?= base_url(); ?>/editor/futureIssues">Future Issues</a></li>
    <li><a href="<?= base_url(); ?>/editor/backIssues">Back Issues</a></li>
  </ul>

  <br />

  <div id="issues">
    <table width="100%" class="listing">
      <tr>
        <td colspan="3" class="headseparator">&nbsp;</td>
      </tr>
      <tr class="heading" valign="bottom">
        <td width="80%">Issue</td>
        <td width="15%">Items</td>
        <td width="5%" align="right">Action</td>
      </tr>
      <tr>
        <td colspan="3" class="headseparator">&nbsp;</td>
      </tr>
      <?php if (isset($issues) && isset($article)) : ?>
        <?php foreach ($issues as $issue) : ?>
          <tr valign="top">
            <td><a href="<?= base_url(); ?>/editor/issueToc/<?= $issue['issue_id']; ?>" class="action">Vol <?= $issue['volume']; ?>, No <?= $issue['number']; ?> (<?= $issue['year']; ?>)</a></td>
            <td><?= count($article[$issue['issue_id']]) ?></td>
            <td align="right"><a href="<?= base_url(); ?>/editor/removeIssue/<?= $issue['issue_id']; ?>" onclick="return confirm('Are you sure you want to permanently delete this issue?')" class="action">Delete</a></td>
          </tr>
        <?php endforeach; ?>
      <?php else : ?>
        <tr valign="top">
          <td colspan="3">No Issue</td>
        </tr>
      <?php endif; ?>
      <td colspan="3" class="endseparator">&nbsp;</td>
      </tr>
      <!-- <tr>
        <td align="left">1 - 4 of 4 Items</td>
        <td colspan="2" align="right"></td>
      </tr> -->
    </table>
  </div>

</div><!-- content -->
</div><!-- main -->
</div><!-- body -->



</div><!-- container -->
<?= $this->endSection(); ?>