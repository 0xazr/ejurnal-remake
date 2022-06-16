<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div id="breadcrumb">
  <a href="<?= base_url(); ?>/index">Home</a> &gt;
  <a href="<?= base_url(); ?>/user" class="hierarchyLink">User</a> &gt;
  <a href="<?= base_url(); ?>/author" class="hierarchyLink">Author</a> &gt;
  <a href="<?= base_url(); ?>/author" class="hierarchyLink">Submissions</a> &gt;
  <a href="<?= base_url(); ?>/author/submission/<?= $article["article_id"]; ?>" class="hierarchyLink">#<?= $article["article_id"]; ?></a> &gt;
  <a href="<?= base_url(); ?>/author/submission/<?= $article["article_id"]; ?>" class="current">Summary</a>
</div>

<h2>#<?= $article["article_id"]; ?> Summary</h2>


<div id="content">



  <ul class="menu">
    <li class="current"><a href="<?= base_url(); ?>/author/submission/<?= $article["article_id"]; ?>">Summary</a></li>
    <li><a href="<?= base_url(); ?>/author/submissionReview/<?= $article["article_id"]; ?>">Review</a></li>
    <li><a href="<?= base_url(); ?>/author/submissionEditing/<?= $article["article_id"]; ?>">Editing</a></li>
  </ul>

  <div id="submission">
    <h3>Submission</h3>


    <table width="100%" class="data">
      <tr>
        <td width="20%" class="label">Authors</td>
        <td width="80%" colspan="2" class="value">
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
        <td colspan="2" class="value"><?= $article["title"]; ?></td>
      </tr>
      <tr>
        <td class="label">Original file</td>
        <td colspan="2" class="value">
          <?php if (isset($original_file)) : ?>
            <a href="<?= base_url(); ?>/editor/downloadFile/<?= $original_file["file_id"] ?>" class="file"><?= $original_file["file_name"] ?></a>&nbsp;&nbsp;<?= $original_file["date_uploaded"]; ?>
          <?php else : ?>
            None
          <?php endif; ?>
        </td>
      </tr>
      <tr valign="top">
        <td class="label">Supp. files</td>
        <td colspan="2" class="value">
          <?php if (isset($supp_files)) : ?>
            <?php foreach ($supp_files as $supp_file) : ?>
              <a href="<?= base_url(); ?>/editor/downloadFile/<?= $supp_file["file_id"] ?>" class="file"><?= $supp_file["file_name"] ?></a>&nbsp;&nbsp;<?= $supp_file["date_uploaded"]; ?>
            <?php endforeach; ?>
          <?php else : ?>
            None
          <?php endif; ?>
          <a href="<?= base_url(); ?>/editor/addSuppFile/<?= $article["article_id"]; ?>" class="action">Add a Supplementary File</a>
        </td>
      </tr>
      <tr>
        <td class="label">Submitter</td>
        <td colspan="2" class="value">

          <?= $submitter["first_name"]; ?> <?= $submitter["last_name"]; ?>
        </td>
      </tr>
      <tr>
        <td class="label">Date submitted</td>
        <td><?= $article['date_submit']; ?></td>
      </tr>
      <tr>
        <td class="label">Section</td>
        <td class="value">Articles</td>
      </tr>
      <tr>
        <td>Editor</td>
        <td>
          <?php if (isset($editor_assign)) : ?>
            <?= $editor_assign['username']; ?>
          <?php else : ?>
            None
          <?php endif; ?>
        </td>
      </tr>
      <tr valign="top">
        <td width="20%" class="label">Author comments</td>
        <td width="80%" colspan="2" class="data"><?= $author_comments; ?><br /></td>
      </tr>
    </table>
  </div>

  <div class="separator"></div>

  <div id="status">
    <h3>Status</h3>

    <table width="100%" class="data">
      <tr>
        <td width="20%" class="label">Status</td>
        <td width="30%" class="value">
          <?= $article['status']; ?>
        </td>
        <td width="50%" class="value">
          <a href="<?= base_url(); ?>/editor/unsuitableSubmission?articleId=<?= $article["article_id"]; ?>" class="action">Reject and Archive Submission</a>
        </td>
      </tr>
      <tr>
        <td class="label">Initiated</td>
        <td colspan="2" class="value"><?= $article['date_created']; ?></td>
      </tr>
      <tr>
        <td class="label">Last modified</td>
        <td colspan="2" class="value">
          <?php if (isset($article['date_submit'])) : ?>
            <?= $article['date_submit']; ?>
          <?php else : ?>
            <?= $article['date_created']; ?>
          <?php endif; ?>
        </td>
      </tr>
    </table>
  </div>

  <div class="separator"></div>

  <div id="metadata">
    <h3>Submission Metadata</h3>

    <p><a href="<?= base_url(); ?>/editor/viewMetadata/<?= $article["article_id"]; ?>" class="action">Edit Metadata</a></p>


    <div id="authors">
      <h4>Authors</h4>

      <table width="100%" class="data">
        <tr valign="top">
          <td width="20%" class="label">Name</td>
          <td width="80%" class="value">
            <?php if (isset($article['first_name'])) : ?>
              <?= $article['first_name']; ?>
            <?php elseif (isset($article['first_name']) && $article['middle_name']) : ?>
              <?= $article['first_name'] . " " . $article['middle_name']; ?>
            <?php elseif (isset($article['first_name']) && $article['middle_name'] && $article['last_name']) : ?>
              <?= $article['first_name'] . " " . $article['first_name'] . " " . $article['last_name']; ?>
            <?php endif; ?>
            <a href="<?= base_url(); ?>/user/email?redirectUrl=http%3A%2F%2Fiptek.its.ac.id%2Findex.php%2Fitj%2Feditor%2Fsubmission%2F<?= $article["article_id"]; ?>&amp;to%5B%5D=Cyntia%20dfdsd%20Niani%20%3Ccyntian%40ppi.its.ac.id%3E&amp;subject=xczxzcxcz&amp;articleId=<?= $article["article_id"]; ?>" class="icon"><img src="https://iptek.its.ac.id/lib/pkp/templates/images/icons/mail.gif" width="16" height="14" alt="Mail" /></a>
          </td>
        </tr>
        <tr valign="top">
          <td class="label">Affiliation</td>
          <td class="value">
            <?php if (isset($article["affiliation"])) : ?>
              <?= $article["affiliation"]; ?>
            <?php else : ?>
            <?php endif; ?>
          </td>
        </tr>
        <tr valign="top">
          <td class="label">Country</td>
          <td class="value">
            <?php if (isset($article["country"])) : ?>
              <?= $article["country"]; ?>
            <?php else : ?>
            <?php endif; ?>
          </td>
        </tr>
        <tr valign="top">
          <td class="label">Bio Statement</td>
          <td class="value">
            <?php if (isset($article["bio"])) : ?>
              <?= $article["bio"]; ?>
            <?php else : ?>
            <?php endif; ?>
          </td>
        </tr>
        <tr valign="top">
          <td colspan="2" class="label">Principal contact for editorial correspondence.</td>
        </tr>
      </table>
    </div>

    <div id="titleAndAbstract">
      <h4>Title and Abstract</h4>

      <table width="100%" class="data">
        <tr valign="top">
          <td width="20%" class="label">Title</td>
          <td width="80%" class="value">
            <?php if (isset($article['title'])) : ?>
              <?= $article['title']; ?>
            <?php else : ?>
            <?php endif; ?>
          </td>
        </tr>

        <tr>
          <td colspan="2" class="separator">&nbsp;</td>
        </tr>
        <tr valign="top">
          <td class="label">Abstract</td>
          <td class="value">
            <?php if (isset($article['abstract'])) : ?>
              <?= $article['abstract']; ?>
            <?php else : ?>
            <?php endif; ?>
          </td>
        </tr>
      </table>
    </div>

    <div id="indexing">
      <h4>Indexing</h4>

      <table width="100%" class="data">
        <tr valign="top">
          <td width="20%" class="label">Keywords</td>
          <td width="80%" class="value">
            <?php if (isset($article['keyword'])) : ?>
              <?= $article['keyword']; ?>
            <?php else : ?>
            <?php endif; ?>
          </td>
        </tr>
        <tr>
          <td colspan="2" class="separator">&nbsp;</td>
        </tr>
        <tr valign="top">
          <td width="20%" class="label">Language</td>
          <td width="80%" class="value">
            <?php if (isset($article['language'])) : ?>
              <?= $article['language']; ?>
            <?php else : ?>
            <?php endif; ?>
          </td>
        </tr>
      </table>
    </div>

    <div id="supportingAgencies">
      <h4>Supporting Agencies</h4>

      <table width="100%" class="data">
        <tr valign="top">
          <td width="20%" class="label">Agencies</td>
          <td width="80%" class="value">
            <?php if (isset($article['support'])) : ?>
              <?= $article['support']; ?>
            <?php else : ?>
            <?php endif; ?>
          </td>
        </tr>
      </table>
    </div>



    <div id="citations">
      <h4>References</h4>

      <table width="100%" class="data">
        <tr valign="top">
          <td width="20%" class="label">References</td>
          <td width="80%" class="value">
            <?php if (isset($article['reference'])) : ?>
              <?= $article['reference']; ?>
            <?php else : ?>
            <?php endif; ?>
          </td>
        </tr>
      </table>
    </div>

  </div><!-- metadata -->


</div><!-- content -->
<?= $this->endSection(); ?>