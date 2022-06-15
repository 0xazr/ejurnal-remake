<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div id="breadcrumb">
   <a href="<?= base_url(); ?>/index">Home</a> &gt;
   <a href="<?= base_url(); ?>/user" class="hierarchyLink">User</a> &gt;
   <a href="<?= base_url(); ?>/author" class="hierarchyLink">Author</a> &gt;
   <a href="<?= base_url(); ?>/author" class="hierarchyLink">Submissions</a> &gt;
   <a href="<?= base_url(); ?>/author/submit/4/<?= $article['article_id']; ?>" class="current">New Submission</a>
</div>
<h2>Step 4. Uploading Supplementary Files</h2>
<div id="content">
   <ul class="steplist">
      <li id="step1"><a href="<?= base_url(); ?>/author/submit/1/<?= $article['article_id']; ?>">1. Start</a></li>
      <li id="step2"><a href="<?= base_url(); ?>/author/submit/2/<?= $article['article_id']; ?>">2. Upload Submission</a></li>
      <li id="step3"><a href="<?= base_url(); ?>/author/submit/3/<?= $article['article_id']; ?>">3. Enter Metadata</a></li>
      <li id="step4" class="current">4. Upload Supplementary Files</li>
      <li id="step5">5. Confirmation</li>
   </ul>
   <form id="submitForm" method="post" action="<?= base_url(); ?>/author/saveSubmit/4/<?= $article['article_id']; ?>" enctype="multipart/form-data">
      <input type="hidden" name="articleId" value="12536" />
      <p>This optional step allows Supplementary Files to be added to a submission. The files, which can be in any format, might include (a) research instruments, (b) data sets, which comply with the terms of the study's research ethics review, (c) sources that otherwise would be unavailable to readers, (d) figures and tables that cannot be integrated into the text itself, or other materials that add to the contribution of the work.</p>
      <table class="listing" width="100%">
         <tr>
            <td colspan="5" class="headseparator">&nbsp;</td>
         </tr>
         <tr class="heading" valign="bottom">
            <td width="5%">ID</td>
            <td width="40%">File Name</td>
            <td width="25%">Original file name</td>
            <td width="15%" class="nowrap">Date uploaded</td>
            <td width="15%" align="right">Action</td>
         </tr>
         <tr>
            <td colspan="6" class="headseparator">&nbsp;</td>
         </tr>
         <?php if (isset($filesinfo)) : ?>
            <?php foreach ($filesinfo as $fileinfo) : ?>
               <tr valign="top">
                  <td><?= $fileinfo['article_supplementary_file_id']; ?></td>
                  <td><?= $fileinfo['file_name']; ?></td>
                  <td><?= $fileinfo['original_file_name']; ?></td>
                  <td><?= $fileinfo['date_uploaded']; ?></td>
                  <td align="right"><a href="https://iptek.its.ac.id/index.php/itj/author/deleteSubmitSuppFile/1981?articleId=12541" onclick="return confirm('Are you sure you want to delete this supplementary file?')" class="action">Delete</a></td>
               </tr>
            <?php endforeach; ?>
         <?php else : ?>
            <tr valign="top">
               <td colspan="6" class="nodata">No supplementary files have been added to this submission.</td>
            </tr>
         <?php endif; ?>
      </table>
      <div class="separator"></div>
      <table class="data" width="100%">
         <tr>
            <td width="30%" class="label">
               <label for="uploadSuppFile">
                  Upload supplementary file </label>
            </td>
            <td width="70%" class="value">
               <input type="file" name="uploadSuppFile" id="uploadSuppFile" class="uploadField" /> <input name="submitUploadSuppFile" type="submit" class="button" value="Upload" />
            </td>
         </tr>
      </table>
      <div class="separator"></div>
      <p>
         <input type="submit" value="Save" class="button defaultButton" />
         <input type="button" value="Continue" class="button" onclick="window.location.href='<?= base_url('/author/submit/5/' . $article['article_id']); ?>'">
         <input type="button" value="Cancel" class="button" onclick="confirmAction('/author', 'You can complete this submission at a later date by selecting Active Submissions from the Author home.')" />
      </p>
   </form>
</div>

<?= $this->endSection(); ?>