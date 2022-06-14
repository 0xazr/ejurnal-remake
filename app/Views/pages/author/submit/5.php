<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div id="breadcrumb">
   <a href="<?= base_url(); ?>/index">Home</a> &gt;
   <a href="<?= base_url(); ?>/user" class="hierarchyLink">User</a> &gt;
   <a href="<?= base_url(); ?>/author" class="hierarchyLink">Author</a> &gt;
   <a href="<?= base_url(); ?>/author" class="hierarchyLink">Submissions</a> &gt;
   <a href="<?= base_url(); ?>/author/submit/5?articleId=12525" class="current">New Submission</a>
</div>
<h2>Step 5. Confirming the Submission</h2>
<div id="content">
   <ul class="steplist">
      <li id="step1"><a href="<?= base_url(); ?>/author/submit/1?articleId=12536">1. Start</a></li>
      <li id="step2"><a href="<?= base_url(); ?>/author/submit/2?articleId=12536">2. Upload Submission</a></li>
      <li id="step3"><a href="<?= base_url(); ?>/author/submit/3?articleId=12536">3. Enter Metadata</a></li>
      <li id="step4"><a href="<?= base_url(); ?>/author/submit/4?articleId=12536">4. Upload Supplementary Files</a></li>
      <li id="step5" class="current">5. Confirmation</li>
   </ul>
   <p>To submit your manuscript to Information Technology Journal click Finish Submission. The submission's principal contact will receive an acknowledgement by email and will be able to view the submission's progress through the editorial process by logging in to the journal web site. Thank you for your interest in publishing with Information Technology Journal.</p>
   <form method="post" action="<?= base_url(); ?>/author/saveSubmit/5/<?= $article['article_id']; ?>">
      <input type="hidden" name="articleId" value="12536" />
      <h3>File Summary</h3>
      <table class="listing" width="100%">
         <tr>
            <td colspan="5" class="headseparator">&nbsp;</td>
         </tr>
         <tr class="heading" valign="bottom">
            <td width="10%">ID</td>
            <td width="35%">Original file name</td>
            <td width="25%">Type</td>
            <td width="20%" class="nowrap">File Size</td>
            <td width="10%" class="nowrap">Date uploaded</td>
         </tr>
         <tr>
            <td colspan="5" class="headseparator">&nbsp;</td>
         </tr>
         <?php if (isset($main_file)) : ?>
            <tr valign="top">
               <td><?= $main_file['file_id']; ?></td>
               <td><a class="file" href=""><?= $main_file['file_name']; ?></a></td>
               <td>Submission Main File</td>
               <td><?= $main_file['file_size']; ?>KB</td>
               <td><?= $main_file['date_uploaded']; ?></td>
            </tr>
         <?php endif; ?>

         <?php if (isset($support_file)) : ?>
            <?php foreach ($support_file as $supplementary_file) : ?>
               <tr valign="top">
                  <td><?= $supplementary_file['file_id']; ?></td>
                  <td><a class="file" href=""><?= $supplementary_file['file_name']; ?></a></td>
                  <td>Submission Supplementary File</td>
                  <td><?= $supplementary_file['file_size']; ?>KB</td>
                  <td><?= $supplementary_file['date_uploaded']; ?></td>
               </tr>
            <?php endforeach; ?>
         <?php endif; ?>

         <?php if (!isset($main_file) && !isset($support_file)) : ?>
            <tr valign="top">
               <td colspan="5" class="nodata">No files have been attached to this submission.</td>
            </tr>
         <?php endif; ?>
      </table>

      <div class="separator"></div>
      <p><input type="submit" value="Finish Submission" class="button defaultButton" /> <input type="button" value="Cancel" class="button" onclick="confirmAction('/author', 'You can complete this submission at a later date by selecting Active Submissions from the Author home.')" /></p>
   </form>
</div>

<?= $this->endSection(); ?>