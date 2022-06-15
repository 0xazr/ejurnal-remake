<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div id="breadcrumb">
  <a href="<?= base_url(); ?>/index">Home</a> &gt;
  <a href="<?= base_url(); ?>/user" class="hierarchyLink">User</a> &gt;
  <a href="<?= base_url(); ?>/author" class="hierarchyLink">Editor</a> &gt;
  <a href="<?= base_url(); ?>/author" class="hierarchyLink">Submissions</a> &gt;
  <a href="<?= base_url(); ?>/author/submission/12687" class="hierarchyLink">#12687</a> &gt;
  <a href="<?= base_url(); ?>/author/submissionEditing/12687" class="current">Editing</a>
</div>

<h2>#<?= $article['article_id']; ?> Editing</h2>


<div id="content">



  <ul class="menu">
    <li><a href="<?= base_url(); ?>/author/submission/<?= $article['article_id']; ?>">Summary</a></li>
    <li class="current"><a href="<?= base_url(); ?>/author/submissionReview/<?= $article['article_id']; ?>">Review</a></li>
    <li><a href="<?= base_url(); ?>/author/submissionEditing/<?= $article['article_id']; ?>">Editing</a></li>
  </ul>

  <div id="submission">
    <h3>Submission</h3>

    <table width="100%" class="data">
      <tr>
        <td width="20%" class="label">Authors</td>
        <td width="80%">
          <?php if (isset($article['first_name'])) : ?>
            <?= $article['first_name']; ?>
          <?php elseif (isset($article['first_name']) && $article['middle_name']) : ?>
            <?= $article['first_name'] . " " . $article['middle_name']; ?>
          <?php elseif (isset($article['first_name']) && $article['middle_name'] && $article['last_name']) : ?>
            <?= $article['first_name'] . " " . $article['first_name'] . " " . $article['last_name']; ?>
          <?php endif; ?>
          <a href="<?= base_url(); ?>/user/email?redirectUrl=http%3A%2F%2Fiptek.its.ac.id%2Findex.php%2Fitj%2Feditor%2FsubmissionEditing%2F12687&amp;to%5B%5D=%22Cyntia%20dfdsd%20Niani%22%20%3Ccyntian%40ppi.its.ac.id%3E&amp;subject=xczxzcxcz&amp;articleId=12687" class="icon"><img src="https://iptek.its.ac.id/lib/pkp/templates/images/icons/mail.gif" width="16" height="14" alt="Mail" /></a>
        </td>
      </tr>
      <tr>
        <td class="label">Title</td>
        <td>
          <?= $article['title']; ?>
        </td>
      </tr>
      <tr>
        <td class="label">Section</td>
        <td>Articles</td>
      </tr>
      <tr>
        <td class="label">Editor</td>
        <td>
          <?php if (isset($editor_name)) : ?>
            <?= $editor_name['username']; ?>
          <?php else : ?>
            None Assigned
          <?php endif; ?>
        </td>
      </tr>
    </table>
  </div>

  <div class="separator"></div>

  <div id="copyedit">
    <h3>Copyediting</h3>


    <table width="100%" class="info">
      <tr>
        <td width="28%" colspan="2"><a href="<?= base_url(); ?>/author/viewMetadata/<?= $article['article_id']; ?>" class="action">Review Metadata</a></td>
        <td width="18%" class="heading">Request</td>
        <td width="18%" class="heading">Underway</td>
        <td width="18%" class="heading">Complete</td>
      </tr>
      <tr>
        <td width="2%">1.</td>
        <td width="26%">Initial Copyedit</td>
        <td>
          <?php if (isset($copyedit_file)) : ?>
            <?php if (isset($date_step_1['date_request'])) : ?>
              <?= $date_step_1['date_request']; ?>
            <?php else : ?>
              <a href="<?= base_url(); ?>/author/initiateCopyedit/<?= $article['article_id']; ?>">Initiate</a>
            <?php endif; ?>
          <?php else : ?>
          <?php endif; ?>
        </td>
        <td>
          N/A
        </td>
        <td>
          <?php if (isset($date_step_1['date_complete'])) : ?>
            <?= $date_step_1['date_complete']; ?>
          <?php else : ?>
            <a href="<?= base_url(); ?>/author/completeCopyedit/<?= $article['article_id']; ?>" class="action">Complete</a>
          <?php endif; ?>
        </td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="5">
          <?php if (isset($copyedit_file)) : ?>
            <a href="#">
              <?= $copyedit_file['file_name']; ?>
            </a>
            &nbsp;&nbsp;&nbsp;
            <?= $copyedit_file['date_uploaded']; ?>
          <?php else : ?>
            File:
            Request email cannot be sent until file is selected for copyediting in Editor Decision, Review page.
          <?php endif; ?>
        </td>
      </tr>
      <tr>
        <td colspan="6" class="separator">&nbsp;</td>
      </tr>
      <tr>
        <td>2.</td>
        <td>Author Copyedit</td>
        <td>
          <?php if (isset($date_step_1['date_complete'])) : ?>
            <?php if (isset($date_step_2['date_request'])) : ?>
              <?= $date_step_2['date_request']; ?>
            <?php else : ?>
              <a href="<?= base_url(); ?>/author/notifyAuthorCopyedit/<?= $article['article_id']; ?>">
                <img src="https://iptek.its.ac.id/lib/pkp/templates/images/icons/mail.gif" width="16" height="14" alt="Mail" />
              </a>
            <?php endif; ?>
          <?php else : ?>
            <img src="https://iptek.its.ac.id/lib/pkp/templates/images/icons/mail_disabled.gif" width="16" height="14" alt="Mail" />
          <?php endif; ?>
        </td>
        <td>
          &mdash;
        </td>
        <td>
          <?php if (isset($date_step_1['date_complete'])) : ?>
            <?php if (isset($date_step_2['date_complete'])) : ?>
              <?= $date_step_2['date_complete']; ?>
            <?php else : ?>
              <a href="<?= base_url(); ?>/author/completeAuthorCopyedit/<?= $article['article_id']; ?>" class="icon"><img src="https://iptek.its.ac.id/lib/pkp/templates/images/icons/mail.gif" width="16" height="14" alt="Mail" onclick="return confirm('Are you sure you wish to mark this task as completed? You may not be able to make changes afterwards.')" /></a>
            <?php endif; ?>
          <?php else : ?>
            -
          <?php endif; ?>
        </td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="5">
          File:
          <?php if (isset($file_step_2)) : ?>
            <a href="#">
              <?= $file_step_2['file_name']; ?>
            </a>
          <?php else : ?>
          <?php endif; ?>
        </td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="5">
          <form method="post" action="<?= base_url(); ?>/author/uploadCopyeditVersion" enctype="multipart/form-data">
            <input type="hidden" name="article_id" value="<?= $article['article_id']; ?>" />
            <input type="hidden" name="copyeditStage" value="author" />
            <?php if (isset($date_step_1['date_complete'])) : ?>
              <?php if (isset($date_step_2['date_complete'])) : ?>
                <input type="file" name="upload" disabled="disabled" class="uploadField" />
                <input type="submit" class="button" value="Upload" disabled="disabled" />
              <?php else : ?>
                <input type="file" name="upload" class="uploadField" />
                <input type="submit" class="button" value="Upload" />
              <?php endif; ?>
            <?php else : ?>
              <input type="file" name="upload" disabled="disabled" class="uploadField" />
              <input type="submit" class="button" value="Upload" disabled="disabled" />
            <?php endif; ?>
          </form>
        </td>
      </tr>
      <tr>
        <td colspan="6" class="separator">&nbsp;</td>
      </tr>
      <tr>
        <td>3.</td>
        <td>Final Copyedit</td>
        <td>
          <?php if (isset($date_step_3['date_request'])) : ?>
            <?= $date_step_3['date_request']; ?>
          <?php else : ?>
          <?php endif; ?>
        </td>
        <td>
          N/A
        </td>
        <td>
          <?php if (isset($date_step_3['date_complete'])) : ?>
            <?= $date_step_3['date_complete']; ?>
          <?php else : ?>
            <a href="<?= base_url(); ?>/author/completeFinalCopyedit/<?= $article['article_id']; ?>" class="action">Complete</a>
          <?php endif; ?>
        </td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td colspan="5">
          File:
          <?php if (isset($file_step_3['file_name'])) : ?>
            <a href="#">
              <?= $file_step_3['file_name']; ?>
            </a>
          <?php else : ?>
          <?php endif; ?>
        </td>
      </tr>
      <tr>
        <td colspan="6" class="separator">&nbsp;</td>
      </tr>
    </table>

    Copyedit Comments
    <a href="javascript:openComments('/author/viewCopyeditComments/12687');" class="icon"><img src="https://iptek.its.ac.id/lib/pkp/templates/images/icons/comment.gif" width="16" height="14" alt="Comment" /></a>No Comments

    &nbsp;&nbsp;
    <a href="javascript:openHelp('/author/instructions/copy')" class="action">Copyedit Instructions</a>
  </div>

  <div class="separator"></div>

  <div id="layout">
    <h3>Layout</h3>


    <table width="100%" class="info">
      <tr>
        <td width="40%" colspan="2">Galley Format</td>
        <td width="40%" colspan="2" class="heading">File</td>
      </tr>
      <?php if (isset($galley_format)) : ?>
        <?php $i = 1; ?>
        <?php foreach ($galley_format as $galley) : ?>
          <tr>
            <td width="5%"><?= $i; ?></td>
            <td width="35%">PDF &nbsp; <a href="<?= base_url(); ?>/author/proofGalley/12517/6786" class="action">View Proof</td>
            <td colspan="3"><a href="<?= base_url(); ?>/author/downloadFile/12517/33049" class="file"><?= $galley['file_name']; ?></a>&nbsp;&nbsp;<?= $galley['date_uploaded']; ?></td>
          </tr>
          <?php $i++; ?>
        <?php endforeach; ?>
      <?php else : ?>
        <tr>
          <td colspan="2">No Submission</td>
        </tr>
      <?php endif; ?>
      <tr>
        <td colspan="6" class="separator">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2">Supplementary Files</td>
        <td colspan="4" class="heading">File</td>
      </tr>
      <?php if (isset($supp_file)) : ?>
        <?php $i = 1; ?>
        <?php foreach ($supp_file  as $suppFile) : ?>
          <tr>
            <td width="5%"><?= $i; ?></td>
            <td width="35%">Untitled</td>
            <td colspan="4"><a href="<?= base_url(); ?>/author/downloadFile/12517/33051" class="file"><?= $suppFile['file_name']; ?></a>&nbsp;&nbsp;<?= $suppFile['date_uploaded']; ?></td>
          </tr>
          <?php $i++; ?>
        <?php endforeach; ?>
      <?php else : ?>
        <tr>
          <td colspan="2">No Submission</td>
        </tr>
      <?php endif; ?>
      <tr>
        <td colspan="6" class="separator">&nbsp;</td>
      </tr>
    </table>

    <div id="layoutComments">
      Layout Comments
      <a href="javascript:openComments('https://iptek.its.ac.id/index.php/itj/author/viewLayoutComments/12517');" class="icon"><img src="https://iptek.its.ac.id/lib/pkp/templates/images/icons/comment.gif" width="16" height="14" alt="Comment" /></a>No Comments
    </div>
  </div>
  <div class="separator"></div>

  Proofreading Corrections
  <a href="javascript:openComments('/author/viewProofreadComments/12687');" class="icon"><img src="https://iptek.its.ac.id/lib/pkp/templates/images/icons/comment.gif" width="16" height="14" alt="Comment" /></a>No Comments

  &nbsp;&nbsp;
  <a href="javascript:openHelp('/author/instructions/proof')" class="action">Proofing Instructions</a>
</div>


</div><!-- content -->
<?= $this->endSection(); ?>