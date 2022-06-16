<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div id="breadcrumb">
	<a href="<?= base_url(); ?>/index">Home</a> &gt;
	<a href="<?= base_url(); ?>/user" class="hierarchyLink">User</a> &gt;
	<a href="<?= base_url(); ?>/editor" class="hierarchyLink">Editor</a> &gt;
	<a href="<?= base_url(); ?>/editor/submissions" class="hierarchyLink">Submissions</a> &gt;
	<a href="<?= base_url(); ?>/editor" class="current">Archives</a>
</div>

<h2>Archives</h2>

<div id="content">

	<ul class="menu">
		<li><a href="<?= base_url(); ?>/editor/submissions/submissionsUnassigned">Unassigned</a></li>
		<li><a href="<?= base_url(); ?>/editor/submissions/submissionsInReview">In Review</a></li>
		<li><a href="<?= base_url(); ?>/editor/submissions/submissionsInEditing">In Editing</a></li>
		<li class="current"><a href="<?= base_url(); ?>/editor/submissions/submissionsArchives">Archives</a></li>
	</ul>

	<script type="text/javascript">
		// <!--
		function sortSearch(heading, direction) {
			var submitForm = document.getElementById('submit');
			submitForm.sort.value = heading;
			submitForm.sortDirection.value = direction;
			submitForm.submit();
		}
		// -->
	</script>
	&nbsp;

	<div id="submissions">
		<table width="100%" class="listing">
			<tr>
				<td colspan="6" class="headseparator">&nbsp;</td>
			</tr>
			<tr class="heading" valign="bottom">
				<td width="5%"><a href="javascript:sortSearch('id','1')" style="font-weight:bold">ID</a></td>
				<td width="15%"><span class="disabled"></span><br /><a href="javascript:sortSearch('submitDate','1')">Submitted</a></td>
				<td width="5%"><a href="javascript:sortSearch('section','1')">Sec</a></td>
				<td width="25%"><a href="javascript:sortSearch('authors','1')">Authors</a></td>
				<td width="30%"><a href="javascript:sortSearch('title','1')">Title</a></td>
				<td width="20%" align="right"><a href="javascript:sortSearch('status','1')">Status</a></td>
			</tr>
			<tr>
				<td colspan="6" class="headseparator">&nbsp;</td>
			</tr>

			<?php if (isset($articles)) : ?>
				<?php foreach ($articles as $article) : ?>
					<tr valign="top">
						<td><?= $article['article_id']; ?></td>
						<td><?= $article['date_submit']; ?></td>
						<td>ART</td>
						<td>
							<?php for ($i = 0; $i < count($authors[$article['article_id']]); $i++) :  ?>
								<?php if (count($authors[$article['article_id']]) == 1) : ?>
									<?= $authors[$article['article_id']][$i]['first_name']; ?>
								<?php elseif ($i < count($authors[$article['article_id']]) - 1) : ?>
									<?= $authors[$article['article_id']][$i]['first_name'] . ', '; ?>
								<?php elseif ($i == count($authors[$article['article_id']]) - 1) : ?>
									<?= $authors[$article['article_id']][$i]['first_name']; ?>
								<?php endif; ?>
							<?php endfor; ?>
						</td>
						<td>
							<a href="<?= base_url(); ?>/editor/submissionEditing/<?= $article['article_id']; ?>" class="action"><?= $article['title']; ?></a>
						</td>
						<td align="right">
							Vol <?= $issue[$article['article_id']]['volume']; ?>, No <?= $issue[$article['article_id']]['number']; ?> (<?= $issue[$article['article_id']]['year']; ?>)
						</td>
					</tr>
					<tr>
						<td colspan="6" class="endseparator">&nbsp;</td>
					</tr>
				<?php endforeach; ?>
			<?php else : ?>
				<tr>
					<td colspan="6">No Issue and No Article</td>
				</tr>
				<tr>
					<td colspan="6" class="endseparator">&nbsp;</td>
				</tr>
			<?php endif; ?>
		</table>
	</div>



</div><!-- content -->
<?= $this->endSection(); ?>