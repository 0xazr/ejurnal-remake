<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div id="breadcrumb">
  <a href="<?= base_url(); ?>/index">Home</a> &gt;
  <a href="<?= base_url(); ?>/issue/archive" class="hierarchyLink">Archives</a> &gt;
  <a href="<?= base_url(); ?>/issue/view/789" class="current">Vol 1, No 2 (2022)</a>
</div>

<h2>Vol <?= $issue['volume']; ?>, No <?= $issue['number']; ?> (<?= $issue['year']; ?>)</h2>


<div id="content">



  <div id="issueDescription"></div>
  <h3>Table of Contents</h3>

  <h4 class="tocSectionTitle">Articles</h4>
  <?php if (isset($articles)) : ?>
    <?php foreach ($articles as $article) : ?>
      <table class="tocArticle" width="100%">
        <tr valign="top">
          <td class="tocTitle"><a href="<?= base_url(); ?>/article/view/<?= $article['article_id']; ?>"><?= $article['title']; ?></a></td>
          <td class="tocGalleys">
            <a href="<?= base_url(); ?>/article/view/12892/6732" class="file">PDF</a>
          </td>
        </tr>
        <?php foreach ($authors[$article['article_id']] as $author) : ?>
          <tr>
            <td class="tocAuthors">
              <?= $author['first_name']; ?></td>
            <td class="tocPages"></td>
          </tr>
        <?php endforeach; ?>
      </table>
    <?php endforeach; ?>
  <?php endif; ?>


</div><!-- content -->
</div><!-- main -->
</div><!-- body -->



</div><!-- container -->
<?= $this->endSection(); ?>