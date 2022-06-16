<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div id="breadcrumb">
  <a href="<?= base_url(); ?>/index">Home</a> &gt;
  <a href="<?= base_url(); ?>/user" class="hierarchyLink">User</a> &gt;
  <a href="<?= base_url(); ?>/editor" class="current">Editor</a>
</div>

<h2>Editor Home</h2>

<div id="content">
  <div id="articleSubmissions">
    <h3>Submissions</h3>

    <ul class="plain">
      <li>&#187; <a href="<?= base_url(); ?>/editor/submissions/submissionsUnassigned">Unassigned</a> (<?= $submissionUnAssigned; ?>)</li>
      <li>&#187; <a href="<?= base_url(); ?>/editor/submissions/submissionsInReview">In Review</a> (<?= $submissionInReview; ?>)</li>
      <li>&#187; <a href="<?= base_url(); ?>/editor/submissions/submissionsInEditing">In Editing</a> (<?= $submissionInEditing; ?>)</li>
      <li>&#187; <a href="<?= base_url(); ?>/editor/submissions/submissionsArchives">Archives</a></li>
    </ul>
  </div>

  <div class="separator">&nbsp;</div>
  &nbsp;<br />

  <script type="text/javascript">
    //<!--
    function sortSearch(heading, direction) {
      var submitForm = document.getElementById('submit');
      submitForm.sort.value = heading;
      submitForm.sortDirection.value = direction;
      submitForm.submit();
    }
    // -->
  </script>

  <div id="issues">
    <h3>Issues</h3>

    <ul class="plain">
      <li>&#187; <a href="<?= base_url(); ?>/editor/createIssue">Create Issue</a></li>
      <li>&#187; <a href="<?= base_url(); ?>/editor/futureIssues">Future Issues</a></li>
      <li>&#187; <a href="<?= base_url(); ?>/editor/backIssues">Back Issues</a></li>

    </ul>
  </div>
</div><!-- content -->
<?= $this->endSection(); ?>