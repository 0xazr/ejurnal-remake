<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div id="breadcrumb">
	<a href="<?= base_url(); ?>/index">Home</a> &gt;
	<a href="<?= base_url(); ?>/user" class="hierarchyLink">User</a> &gt;
	<a href="<?= base_url(); ?>/reviewer" class="hierarchyLink">Reviewer</a> &gt;
	<a href="<?= base_url(); ?>/reviewer" class="current">Active Submissions</a>
</div>

<h2>Active Submissions</h2>


<div id="content">



	<ul class="menu">
		<li class="current"><a href="<?= base_url(); ?>/reviewer/index/active">Active</a></li>
		<li><a href="<?= base_url(); ?>/reviewer/index/completed">Archive</a></li>
	</ul>

	<br />

	<div id="submissions">
		<table class="listing" width="100%">
			<tr>
				<td colspan="6" class="headseparator">&nbsp;</td>
			</tr>
			<tr class="heading" valign="bottom">
				<td width="5%"><a href="<?= base_url(); ?>/reviewer/index?sort=id&amp;sortDirection=1">ID</a></td>
				<td width="5%"><span class="disabled">MM-DD</span><br /><a href="<?= base_url(); ?>/reviewer/index?sort=assignDate&amp;sortDirection=1">Assigned</a></td>
				<td width="5%"><a href="<?= base_url(); ?>/reviewer/index?sort=section&amp;sortDirection=1">Sec</a></td>
				<td width="70%"><a href="<?= base_url(); ?>/reviewer/index?sort=title&amp;sortDirection=1" style="font-weight:bold">Title</a></td>
				<td width="5%"><a href="<?= base_url(); ?>/reviewer/index?sort=dueDate&amp;sortDirection=1">Due</a></td>
				<td width="10%"><a href="<?= base_url(); ?>/reviewer/index?sort=round&amp;sortDirection=1">Review Round</a></td>
			</tr>
			<tr>
				<td colspan="6" class="headseparator">&nbsp;</td>
			</tr>

			<?php if (isset($articles) && $articles != NULL) : ?>
				<?php foreach ($articles as $article) : ?>
					<tr valign="top">
						<td><?= $article["article_id"]; ?></td>
						<td><?= $article['date_assign_reviewer']; ?></td>
						<td>ART</td>
						<td><a href="<?= base_url(); ?>/reviewer/submission/<?= $article["assignment_id"]; ?>" class="action"><?= $article["title"]; ?></a></td>
						<td class="nowrap">DUE?</td>
						<td><?= $article['round']; ?></td>
					</tr>
				<?php endforeach; ?>
			<?php else : ?>
				<tr valign="top">
					<td></td>
					<td></td>
					<td></td>
					<td>No Submissions.</a></td>
					<td></td>
					<td></td>
				</tr>
			<?php endif; ?>

			<tr>
				<td colspan="6" class="endseparator">&nbsp;</td>
			</tr>
		</table>
	</div>


</div><!-- content -->
<?= $this->endSection(); ?>