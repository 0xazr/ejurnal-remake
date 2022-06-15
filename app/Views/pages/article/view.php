<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div id="breadcrumb">
  <a href="<?= base_url(); ?>/index" target="_parent">Home</a> &gt;
  <a href="<?= base_url(); ?>/issue/view/<?= $article['issue_id']; ?>" target="_parent">Vol <?= $issues['volume']; ?>, No <?= $issues['number']; ?> (<?= $issues['year']; ?>)</a>
</div>

<div id="content">

  <div id="topBar">
  </div>

  <div id="articleTitle">
    <h3><?= $article['title']; ?></h3>
  </div>
  <div id="authorString">
    <em>
      <?php for ($index = 0; $index < count($authors); $index++) : ?>
        <?= $authors[$index]['first_name'] . ' ' . $authors[$index]['last_name']; ?>
        <?php if ($index < count($authors) - 2) : ?>
          ,
        <?php endif; ?>
      <?php endfor; ?>
    </em>
  </div>
  <br />
  <div id="articleAbstract">
    <h4>Abstract</h4>
    <br />
    <div><?= $article['abstract']; ?></div>
    <br />
  </div>

  <div id="articleSubject">
    <h4>Keywords</h4>
    <br />
    <div><?= $article['keyword']; ?></div>
    <br />
  </div>


  <div id="articleFullText">
    <h4>Full Text:</h4>
    <?php if (isset($file)) : ?>
      <a href="<?= base_url(); ?>/downloadFile/<?= $file['file_id']; ?>" class="file" target="_parent">PDF</a>
    <?php endif; ?>
  </div>

  <div id="articleCitations">
    <h4>References</h4>
    <br />
    <div>
      <p><?= $article['reference']; ?></p>
    </div>
    <br />
  </div>

</div><!-- content -->
<?= $this->endSection(); ?>