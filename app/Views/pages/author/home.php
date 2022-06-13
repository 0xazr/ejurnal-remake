<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div id="breadcrumb">
	<a href="<?= base_url(); ?>/">Home</a> &gt;
	<a href="<?= base_url(); ?>/user" class="hierarchyLink">User</a> &gt;
	<a href="<?= base_url(); ?>/author" class="hierarchyLink">Author</a> &gt;
	<a href="<?= base_url(); ?>/author/" class="current">Active Submissions</a>
</div>
<h2>Active Submissions</h2>


<div id="content">



	<ul class="menu">
		<li class="current"><a href="<?= base_url(); ?>/author/index/active">Active</a></li>
		<li><a href="<?= base_url(); ?>/author/index/completed">Archive</a></li>
	</ul>

	<br />

	<div id="submissions">
		<table class="listing" width="100%">
			<tr>
				<td colspan="6" class="headseparator">&nbsp;</td>
			</tr>
			<tr class="heading" valign="bottom">
				<td width="5%"><a href="<?= base_url(); ?>/author/index?sort=id&amp;sortDirection=1">ID</a></td>
				<td width="5%"><span class="disabled">MM-DD</span><br /><a href="<?= base_url(); ?>/author/index?sort=submitDate&amp;sortDirection=1">Submit</a></td>
				<td width="5%"><a href="<?= base_url(); ?>/author/index?sort=section&amp;sortDirection=1">Sec</a></td>
				<td width="25%"><a href="<?= base_url(); ?>/author/index?sort=authors&amp;sortDirection=1">Authors</a></td>
				<td width="35%"><a href="<?= base_url(); ?>/author/index?sort=title&amp;sortDirection=2" style="font-weight:bold">Title</a></td>
				<td width="25%" align="right"><a href="<?= base_url(); ?>/author/index?sort=status&amp;sortDirection=1">Status</a></td>
			</tr>

			<!-- Tampilan ketika tidak ada submission -->
			<tr>
				<td colspan="6" class="headseparator">&nbsp;</td>
			</tr>

			<?php if (isset($articles)) : ?>
				<?php foreach ($articles as $article) : ?>
					<tr>
						<td colspan="6" class="separator">&nbsp;</td>
					</tr>

					<tr valign="top">
						<td><?= $article['article_id']; ?></td>
						<td><?= $article['date_created']; ?></td>
						<td>ART</td>
						<td><?= $author['first_name'] ?></td>
						<td><a href="<?= base_url(); ?>/author/submit/<?= $article['progress'] . '/' . $article['article_id']; ?>" class="action"><?= (isset($article['title'])) ? $article['title'] : 'No Title' ?></a></td>
						<?php if ($article['status'] == "Incomplete") : ?>
							<td align="right"><?= $article['status'] ?><br /><a href="<?= base_url(); ?>/author/deleteSubmission/<?= $article['article_id']; ?>" class="action" onclick="confirm('Are you sure you want to delete this incomplete submission?')">Delete</a></td>
						<?php elseif ($article['status'] == "Waiting Assignment") : ?>
							<td align="right"><?= $article['status'] ?></td>
						<?php else : ?>
							<td align="right"><a href="<?= base_url(); ?>/author/submissionReview/<?= $article['article_id']; ?>" class="action"><?= $article['status'] ?></a></td>
						<?php endif; ?>
					</tr>
				<?php endforeach; ?>
			<?php else : ?>
				<tr valign="top">
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td><a>No Submission.</a></td>
					<td></td>
				</tr>
			<?php endif; ?>
		</table>
	</div>
	<div id="submitStart">
		<h4>Start a New Submission</h4>

		<a href="<?= base_url(); ?>/author/submit" class="action">Click here</a> to go to step one of the five-step submission process.<br />
	</div>




	<div class="separator"></div>

	<script type="text/javascript">
		function toggleChecked() {
			var elements = document.getElementsByName("referralId[]");
			for (var i = 0; i < elements.length; i++) {
				elements[i].checked = !elements[i].checked;
			}
		}
	</script>


</div>
</div><!-- content -->
<?= $this->endSection(); ?>