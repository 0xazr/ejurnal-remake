<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div id="breadcrumb">
  <a href="<?= base_url(); ?>/index">Home</a> &gt;
  <a href="<?= base_url(); ?>/user" class="hierarchyLink">User</a> &gt;
  <a href="<?= base_url(); ?>/author" class="hierarchyLink">Author</a> &gt;
  <a href="<?= base_url(); ?>/author" class="hierarchyLink">Submissions</a> &gt;
  <a href="<?= base_url(); ?>/author/submission/<?= $article['article_id']; ?>" class="hierarchyLink">#<?= $article['article_id']; ?></a> &gt;
  <a href="<?= base_url(); ?>/author/submissionReview/<?= $article['article_id']; ?>" class="current">Review</a>
</div>

<h2>#<?= $article['article_id']; ?> Review</h2>


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
          <?php for ($i = 0; $i < count($authors); $i++) :  ?>
            <?php if (count($authors) == 1) : ?>
              <?= $authors[$i]['first_name'] . ' ' . $authors[$i]['last_name']; ?>
            <?php elseif ($i < count($authors) - 1) : ?>
              <?= $authors[$i]['first_name'] . ' ' . $authors[$i]['last_name'] . ', '; ?>
            <?php elseif ($i == count($authors) - 1) : ?>
              <?= $authors[$i]['first_name'] . ' ' . $authors[$i]['last_name']; ?>
            <?php endif; ?>
          <?php endfor; ?>
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
          <?php if (isset($assign_editor)) : ?>
            <?= $assign_editor['username']; ?>
          <?php else : ?>
            None assigned
          <?php endif; ?>
        </td>
      </tr>
    </table>

    <div class="separator"></div>
  </div>

  <div id="peerReview">
    <table class="data" width="100%">
      <tr id="reviewersHeader" valign="middle">
        <td width="22%">
          <h3>PeerReview</h3>
        </td>
        <td width="14%"></td>
        <td width="64%"></td>
      </tr>
      <tr valign="top">
        <td class="label" width="20%">
          Review Version
        </td>
        <td class="value" width="80%">
          <?php if (isset($review_version['file_name'])) : ?>
            <a href="<?= base_url(); ?>/author/downloadFile/12923/32355/1" class="file">
              <?= $review_version['file_name']; ?>
            </a>&nbsp;&nbsp;<?= $review_version['date_uploaded']; ?>
          <?php else : ?>
            &mdash;
          <?php endif; ?>
        </td>
      </tr>
      <tr valign="top">
        <td class="label" width="20%">
          Last modified
        </td>
        <td class="value" width="80%">
          <?php if (isset($assign_reviewer['date_assign_reviewer'])) : ?>
            <?= $assign_reviewer['date_assign_reviewer']; ?>
          <?php else : ?>
            &mdash;
          <?php endif; ?>
        </td>
      </tr>
      <tr valign="top">
        <td class="label" width="20%">
          Uploaded file
        </td>
        <td class="value" width="80%">
          <?php if (isset($reviewer_version['file_name'])) : ?>
            <a href="">
              <?= $reviewer_version['file_name']; ?>
            </a>&nbsp;&nbsp;<?= $review_version['date_uploaded']; ?>
          <?php else : ?>
            None
          <?php endif; ?>
        </td>
      </tr>
    </table>
    <br>
  </div>

  <div class="separator"></div>

  <div id="editorDecision">
    <h3>Editor Decision</h3>

    <table id="table1" width="100%" class="data">
      <tr valign="top">
        <td class="label">Decision</td>
        <td class="value">
          <?php if (isset($decision_editor)) : ?>
            <?php foreach ($decision_editor as $decision) : ?>
              <?= $decision['decision'] . "    " . $decision['date_recorded'] . "  |  "; ?>
            <?php endforeach; ?>
          <?php else : ?>
            None
          <?php endif; ?>
        </td>
      </tr>

      <!-- FORM UNTUK SEND TO COPYEDITING -->
      <form method="post" action="<?= base_url(); ?>/author/editorReview" enctype="multipart/form-data">
        <input type="hidden" name="article_id" value="<?= $article['article_id']; ?>">
        <!-- FORM UNTUK SEND TO COPYEDITING -->

        <tr valign="top">
          <td class="label">Notify Author</td>
          <td class="value">
            <a href="<?= base_url(); ?>/author/emailEditorDecisionComment/<?= $article['article_id']; ?>" class="icon"><img src="https://iptek.its.ac.id/lib/pkp/templates/images/icons/mail.gif" width="16" height="14" alt="Mail" /></a>
            &nbsp;&nbsp;&nbsp;&nbsp;
            Editor/Author Email Record
            <a onclick="window.open('<?= base_url(); ?>/author/viewEditorDecisionComments/<?= $article['article_id']; ?>', 'popup', 'width=800, height=600')" href="#" class="icon"><img src="https://iptek.its.ac.id/lib/pkp/templates/images/icons/comment.gif" width="16" height="14" alt="Comment" /></a>
            <?php if (isset($editorToAuthor)) : ?>
              Comments
            <?php else : ?>
              No Comments
            <?php endif; ?>
          </td>
        </tr>
    </table>

    <table id="table2" class="data" width="100%">
      <tr valign="top">
        <td width="20%" class="label">Editor Version</td>
        <td width="80%" class="nodata">
          <?php if (isset($editor_version)) : ?>
            <a href="/author/downloadFile/<?= $editor_version['file_id'] ?>">
              <?= $editor_version['file_name']; ?>
            </a>
          <?php else : ?>
            None
          <?php endif; ?>
        </td>
      </tr>
      <tr valign="top">
        <td width="20%" class="label">Author Version</td>
        <td width="80%" class="nodata">
          <?php if (isset($author_version)) : ?>
            <a href="/author/downloadFile/<?= $author_version['file_id'] ?>">
              <?= $author_version['file_name']; ?>
            </a>
          <?php else : ?>
            None
          <?php endif; ?>
        </td>
      </tr>
      </form>
      <tr valign="top">
        <td class="label">&nbsp;</td>
        <form action="<?= base_url(); ?>/author/uploadAuthorVersion" method="post" enctype="multipart/form-data">
          <input type="hidden" name="article_id" value="<?= $article['article_id']; ?>">
          <td class="value">
            <input type="file" name="file_name" class="uploadField" />
            <input type="submit" name="upload" value="Upload" class="button" />
          </td>
        </form>
      </tr>

    </table>
  </div>


</div><!-- content -->
<?= $this->endSection(); ?>