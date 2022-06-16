<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div id="breadcrumb">
	<a href="<?= base_url(); ?>/index">Home</a> &gt;
	<a href="<?= base_url(); ?>/user" class="hierarchyLink">User</a> &gt;
	<a href="<?= base_url(); ?>/editor" class="hierarchyLink">Editor</a> &gt;
	<a href="<?= base_url(); ?>/editor/submissions" class="hierarchyLink">Submissions</a> &gt;
	<a href="<?= base_url(); ?>/editor" class="current">Submissions in Editing</a>
</div>

<h2>Submissions in Editing</h2>


<div id="content">



	<ul class="menu">
		<li><a href="<?= base_url(); ?>/editor/submissions/submissionsUnassigned">Unassigned</a></li>
		<li><a href="<?= base_url(); ?>/editor/submissions/submissionsInReview">In Review</a></li>
		<li class="current"><a href="<?= base_url(); ?>/editor/submissions/submissionsInEditing">In Editing</a></li>
		<li><a href="<?= base_url(); ?>/editor/submissions/submissionsArchives">Archives</a></li>
	</ul>

	<br>

	<div id="submissions">
		<table width="100%" class="listing">
			<tr>
				<td colspan="9" class="headseparator">&nbsp;</td>
			</tr>
			<tr class="heading" valign="bottom">
				<td width="5%"><a href="javascript:sortSearch('id','1')" style="font-weight:bold">ID</a></td>
				<td width="5%"><span class="disabled">MM-DD</span><br /><a href="<?= base_url(); ?>/editor/submissions/submissionsInEditing?sort=submitDate&amp;sortDirection=1">Submit</a></td>
				<td width="5%"><a href="javascript:sortSearch('section','1')">Sec</a></td>
				<td width="15%"><a href="javascript:sortSearch('authors','1')">Authors</a></td>
				<td width="25%"><a href="javascript:sortSearch('title','1')">Title</a></td>
				<td width="10%"><a href="javascript:sortSearch('subCopyedit','1')">Copyedit</a></td>
				<td width="10%"><a href="javascript:sortSearch('subLayout','1')">Layout</a></td>
				<td width="10%"><a href="javascript:sortSearch('subProof','1')">Proof</a></td>
				<td width="5%">SE</td>
			</tr>
			<?php foreach ($articles as $article) : ?>
				<tr>
					<td><?= $article['article_id']; ?></td>
					<td><?= $article['date_created']; ?></td>
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
						<a href="<?= base_url('/editor/submissionEditing/' . $article['article_id']); ?>"><?= $article['title']; ?></a>
					</td>
				</tr>
			<?php endforeach; ?>

		</table>
	</div>

	<br />


</div><!-- content -->
<?= $this->endSection(); ?>