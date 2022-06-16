<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div id="breadcrumb">
	<a href="<?= base_url(); ?>/index">Home</a> &gt;
	<a href="<?= base_url(); ?>/user" class="hierarchyLink">User</a> &gt;
	<a href="<?= base_url(); ?>/editor" class="hierarchyLink">Editor</a> &gt;
	<a href="<?= base_url(); ?>/editor" class="hierarchyLink">Submissions</a> &gt;
	<a href="<?= base_url(); ?>/editor/submission/<?= $article["article_id"]; ?>" class="hierarchyLink">#<?= $article["article_id"]; ?></a> &gt;
	<a href="<?= base_url(); ?>/editor/submission/<?= $article["article_id"]; ?>" class="current">Summary</a>
</div>

<h2>#<?= $article["article_id"]; ?> Summary</h2>


<div id="content">



	<ul class="menu">
		<li class="current"><a href="<?= base_url(); ?>/editor/submission/<?= $article["article_id"]; ?>">Summary</a></li>
		<li><a href="<?= base_url(); ?>/editor/submissionReview/<?= $article["article_id"]; ?>">Review</a></li>
		<li><a href="<?= base_url(); ?>/editor/submissionEditing/<?= $article["article_id"]; ?>">Editing</a></li>
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
							<a href="<?= base_url(); ?>/editor/editSuppFile/<?= $supp_file["article_supplementary_file_id"]; ?>" class="action">Edit</a>&nbsp;|&nbsp;
							<a href="<?= base_url(); ?>/editor/deleteSuppFile/<?= $supp_file["article_supplementary_file_id"]; ?>" onclick="return confirm('Are you sure you want to delete this supplementary file?')" class="action">Delete</a><br>
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
				<td>
					<?php if (isset($article['date_submit'])) : ?>
						<?= $article['date_submit']; ?>
					<?php else : ?>
						<?= $article['date_created']; ?>
					<?php endif; ?>
				</td>
			</tr>
			<tr>
				<td class="label">Section</td>
				<td class="value">Articles</td>
				<td class="value">
					<form action="<?= base_url(); ?>/editor/updateSection/<?= $article["article_id"]; ?>" method="post">Change to <select name="section" size="1" class="selectMenu">
							<option label="Articles" value="84" selected="selected">Articles</option>
						</select> <input type="submit" value="Record" class="button" /></form>
				</td>
			</tr>
			<tr valign="top">
				<td width="20%" class="label">Author comments</td>
				<td width="80%" colspan="2" class="data"><?= $author_comments; ?><br /></td>
			</tr>
		</table>
	</div>


	<div class="separator"></div>

	<div id="editors">
		<h3>Editors</h3>
		<form action="<?= base_url(); ?>/editor/setEditorFlags" method="post">
			<input type="hidden" name="articleId" value="<?= $article["article_id"]; ?>" />
			<table width="100%" class="listing">
				<tr class="heading" valign="bottom">
					<td width="20%">&nbsp;</td>
					<td width="30%">&nbsp;</td>
					<td width="10%">Review</td>
					<td width="10%">Editing</td>
					<td width="20%">Request</td>
					<td width="10%">Action</td>
				</tr>
				<?php if (isset($editor_assign)) : ?>
					<tr valign="top">
						<td>Editor</td>
						<td>
							<?= $editor['username']; ?>
							<a href="<?= base_url(); ?>/user/email?redirectUrl=http%3A%2F%2Fiptek.its.ac.id%2Findex.php%2Fitj%2Feditor%2Fsubmission%2F12923&amp;to%5B%5D=Baru%20Nanto%20%3Cbarunanto%40ppi.its.ac.id%3E&amp;subject=&amp;articleId=12923" class="icon"><img src="https://iptek.its.ac.id/lib/pkp/templates/images/icons/mail.gif" width="16" height="14" alt="Mail" /></a>
						</td>
						<td>
							&nbsp;&nbsp;
							<input type="checkbox" name="canReview-6923" checked="checked" disabled="disabled" />
						</td>
						<td>
							&nbsp;&nbsp;
							<input type="checkbox" name="canEdit-6923" checked="checked" disabled="disabled" />
						</td>
						<td>2022-06-05</td>
						<td><a href="<?= base_url(); ?>/editor/submissions/deleteEditAssignment/<?= $article['article_id']; ?>" class="action">Delete</a></td>
					</tr>
				<?php else : ?>
					<tr>
						<td colspan="6" class="nodata">
							None assigned
						</td>
					</tr>
				<?php endif; ?>
			</table>
			<input type="submit" class="button defaultButton" value="Record" />&nbsp;&nbsp;
			<a href="<?= base_url(); ?>/editor/assignEditor/sectionEditor/<?= $article["article_id"]; ?>" class="action">Add Section Editor</a>
			|&nbsp;<a href="<?= base_url(); ?>/editor/submissions/assignEditor/<?= $article["article_id"]; ?>" class="action">Add Editor</a>
			<?php if (isset($editor_assign)) : ?>
			<?php else : ?>
				|&nbsp;<a href="<?= base_url(); ?>/editor/submissions/assignEditor/<?= $article["article_id"]; ?>/<?= $editor_id ?>" class="action">Add Self</a>
		</form>
	<?php endif; ?>
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
				<?php foreach ($authors as $author) : ?>
					<tr valign="top">
						<td width="20%" class="label">Name</td>
						<td width="80%" class="value">
							<?= $author['first_name'] . ' ' . $author['last_name']; ?>
						</td>
					</tr>
					<tr valign="top">
						<td class="label">Affiliation</td>
						<td class="value">
							<?php if (isset($author["affiliation"])) : ?>
								<?= $author["affiliation"]; ?>
							<?php else : ?>
							<?php endif; ?>
						</td>
					</tr>
					<tr valign="top">
						<td class="label">Country</td>
						<td class="value">
							<?php if (isset($author["country"])) : ?>
								<?= $author["country"]; ?>
							<?php else : ?>
							<?php endif; ?>
						</td>
					</tr>
					<tr valign="top">
						<td class="label">Bio Statement</td>
						<td class="value">
							<?php if (isset($author["bio"])) : ?>
								<?= $author["bio"]; ?>
							<?php else : ?>
							<?php endif; ?>
						</td>
					</tr>
				<?php endforeach; ?>
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