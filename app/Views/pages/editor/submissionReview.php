<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div id="breadcrumb">
	<a href="<?= base_url(); ?>/index">Home</a> &gt;
	<a href="<?= base_url(); ?>/user" class="hierarchyLink">User</a> &gt;
	<a href="<?= base_url(); ?>/editor" class="hierarchyLink">Editor</a> &gt;
	<a href="<?= base_url(); ?>/editor" class="hierarchyLink">Submissions</a> &gt;
	<a href="<?= base_url(); ?>/editor/submission/<?= $article['article_id']; ?>" class="hierarchyLink">#<?= $article['article_id']; ?></a> &gt;
	<a href="<?= base_url(); ?>/editor/submissionReview/<?= $article['article_id']; ?>" class="current">Review</a>
</div>

<h2>#<?= $article['article_id']; ?> Review</h2>


<div id="content">



	<ul class="menu">
		<li><a href="<?= base_url(); ?>/editor/submissions/<?= $article['article_id']; ?>">Summary</a></li>
		<li class="current"><a href="<?= base_url(); ?>/editor/submissionReview/<?= $article['article_id']; ?>">Review</a></li>
		<li><a href="<?= base_url(); ?>/editor/submissionEditing/<?= $article['article_id']; ?>">Editing</a></li>
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
			<tr valign="top">
				<td class="label" width="20%">Review Version</td>
				<td width="80%" class="nodata">
					<?php if (isset($review_version)) : ?>
						<a href="<?= base_url(); ?>/editor/downloadFile/<?= $review_version["file_id"]; ?>">
							<?= $review_version['file_name']; ?>
						</a>
					<?php else : ?>
						None
					<?php endif; ?>
				</td>
			</tr>
			<tr valign="top">
				<td>&nbsp;</td>
				<td>
					<form method="post" action="<?= base_url(); ?>/editor/uploadReviewVersion" enctype="multipart/form-data">
						Upload a revised Review Version
						<input type="hidden" name="article_id" value="<?= $article['article_id']; ?>" />
						<input type="file" name="file_name" class="uploadField" />
						<input type="submit" name="submit" value="Upload" class="button" />
					</form>
				</td>
			</tr>
			<tr valign="top">
				<td class="label">Supp. files</td>
				<td class="nodata">
					<?php if (isset($supplementary_files)) : ?>
						<a href="<?= base_url(); ?>/editor/downloadFile/<?= $supplementary_files['article_supplementary_file_id']; ?>">
							<?= $supplementary_files['file_name']; ?>
						</a>
					<?php else : ?>
						None
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
				<td width="14%">
					<h4>Round&nbsp;1</h4>
				</td>
				<td width="64%" class="nowrap">
					<a href="<?= base_url(); ?>/editor/selectReviewer/<?= $article['article_id']; ?>" class="action">Select Reviewer</a>&nbsp;&nbsp;&nbsp;&nbsp;
					<a href="<?= base_url(); ?>/editor/submissionRegrets/<?= $article['article_id']; ?>" class="action">View Regrets, Cancels, Previous Rounds</a>
				</td>
			</tr>
		</table>

		<?php if (isset($assign_reviewer)) : ?>
			<table>
				<tr>
					<td>
						<h4>Reviewer A</h4>
					</td>
					<td colspan="3">
						<h4>
							<?= $assign_reviewer['username']; ?>
						</h4>
					</td>
					<td>
						<a href="<?= base_url(); ?>/editor/clearReview/<?= $article['article_id']; ?>/<?= $assign_reviewer['user_id']; ?>">Clear Reviewer</a>
					</td>
				</tr>
				<tr>
					<td>
						Review Form
					</td>
					<td colspan="4">
						None / Free Form Review
					</td>
				</tr>
				<tr>
					<td></td>
					<td>REQUEST</td>
					<td>UNDERWAY</td>
					<td>DUE</td>
					<td>Acknowledge</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<?php if (isset($assign_reviewer['date_assign_reviewer'])) : ?>
							<?= $assign_reviewer['date_assign_reviewer']; ?>
						<?php else : ?>
							<?php if (isset($review_version)) : ?>
								<form action="<?= base_url(); ?>/editor/notifyReviewer/<?= $assign_reviewer['user_id']; ?>/<?= $article['article_id']; ?>" method="post">
									<button>ok</button>
								</form>
							<?php else : ?>
								<button disabled="disabled">ok</button>
							<?php endif; ?>
						<?php endif; ?>
					</td>
					<td>
						<?php if (isset($assign_reviewer['date_assign_reviewer'])) : ?>
							<?= $assign_reviewer['date_assign_reviewer']; ?>
						<?php else : ?>
							--
						<?php endif; ?>
					</td>
					<td>
						DUE DI ISI APA?
					</td>
					<td>
						<?php if (isset($review_version)) : ?>
							<button>ok</button>
						<?php else : ?>
							<button disabled="disabled">ok</button>
						<?php endif; ?>
					</td>
				</tr>
				<?php if (isset($request_reviewer)) : ?>
					<tr>
						<td>Recommendation</td>
						<td colspan="4">
							<?php if (isset($recommendation)) : ?>
								<?php
								switch ($recommendation['recommendation']) {
									case 1:
										echo "Accept Submission";
										break;
									case 2:
										echo "Revision Required";
										break;
									case 3:
										echo "Resubmit for Review";
										break;
									case 4:
										echo "Resubmit Elsewhere";
										break;
									case 5:
										echo "Decline Submission";
										break;
								}
								?>
							<?php else : ?>
								None
							<?php endif; ?>
						</td>
					</tr>
					<tr>
						<td>Review</td>
						<td>
							<?php if (isset($comment_from_reviewer)) : ?>
								<?= $comment_from_reviewer; ?>
							<?php else : ?>
								No Comments
							<?php endif; ?>
						</td>
					</tr>
					<tr>
						<td>Uploaded Files</td>
						<td>
							<?php if (isset($reviewer_version)) : ?>
								<a href="<?= base_url(); ?>/editor/downloadFile/<?= $reviewer_version['file_id']; ?>">
									<?= $reviewer_version['file_name']; ?>
								</a>
							<?php else : ?>
								None
							<?php endif; ?>
						</td>
					</tr>
				<?php else : ?>
					<tr>
						<td></td>
						<td colspan="4">Request email cannot be sent until a Review Version is in place. </td>
					</tr>
				<?php endif; ?>
			</table>
		<?php else : ?>
		<?php endif; ?>

	</div>

	<div class="separator"></div>

	<div id="editorDecision">
		<h3>Editor Decision</h3>

		<table id="table1" width="100%" class="data">
			<tr valign="top">
				<td class="label" width="20%">Select decision</td>
				<td width="80%" class="value">
					<form method="post" action="<?= base_url(); ?>/editor/recordDecision">
						<?php if (isset($review_version)) : ?>
							<input type="hidden" name="article_id" value="<?= $article['article_id']; ?>" />
							<select name="decision" size="1" class="selectMenu">
								<option label="Choose One" value="">Choose One</option>
								<option label="Accept Submission" value="1">Accept Submission</option>
								<option label="Revisions Required" value="2">Revisions Required</option>
								<option label="Resubmit for Review" value="3">Resubmit for Review</option>
								<option label="Decline Submission" value="4">Decline Submission</option>
							</select>
							<input type="submit" onclick="return confirm('Are you sure you wish to record this decision?')" name="submit" value="Record Decision" class="button" />
						<?php else : ?>
							<input type="hidden" name="article_id" value="<?= $article['article_id']; ?>" />
							<select name="decision" size="1" class="selectMenu" disabled="disabled">
								<option label="Choose One" value="">Choose One</option>
								<option label="Accept Submission" value="1">Accept Submission</option>
								<option label="Revisions Required" value="2">Revisions Required</option>
								<option label="Resubmit for Review" value="3">Resubmit for Review</option>
								<option label="Decline Submission" value="4">Decline Submission</option>
							</select>
							<input type="submit" onclick="return confirm('Are you sure you wish to record this decision?')" name="submit" value="Record Decision" disabled="disabled" class="button" />
						<?php endif; ?>
						<!-- &nbsp;&nbsp;Section editor not yet recorded or no review file present. -->
					</form>
				</td>
			</tr>
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
			<form method="post" action="<?= base_url(); ?>/editor/editorReview" enctype="multipart/form-data">
				<input type="hidden" name="article_id" value="<?= $article['article_id']; ?>">
				<!-- FORM UNTUK SEND TO COPYEDITING -->

				<tr valign="top">
					<td class="label">Notify Author</td>
					<td class="value">
						<a href="<?= base_url(); ?>/editor/emailEditorDecisionComment/<?= $article['article_id']; ?>" class="icon"><img src="https://iptek.its.ac.id/lib/pkp/templates/images/icons/mail.gif" width="16" height="14" alt="Mail" /></a>
						&nbsp;&nbsp;&nbsp;&nbsp;
						Editor/Author Email Record
						<a onclick="window.open('<?= base_url(); ?>/editor/viewEditorDecisionComments/<?= $article['article_id']; ?>', 'popup', 'width=800, height=600')" href="#" class="icon"><img src="https://iptek.its.ac.id/lib/pkp/templates/images/icons/comment.gif" width="16" height="14" alt="Comment" /></a>
						<?php if (isset($editorToAuthor)) : ?>
							Comments
						<?php else : ?>
							No Comments
						<?php endif; ?>
						<?php if (isset($decision_editor)) : ?>
							<?php if (isset($review_version)) : ?>
								<?php if (isset($notified)) : ?>
									<br>
									<input type="submit" name="setCopyeditFile" value="Send to Copyediting" class="button" />
								<?php else : ?>
									<br>
									<button disabled="disabled">Send to Copyediting</button>
								<?php endif; ?>
							<?php else : ?>
								<button disabled="disabled">Send to Copyediting</button>
								<p>Before sending a submission to Copyediting, use Notify Author link to inform author of decision and select the version to be sent.</p>
							<?php endif; ?>
						<?php else : ?>
						<?php endif; ?>
					</td>
				</tr>
		</table>

		<table id="table2" class="data" width="100%">
			<tr valign="top">
				<td width="20%" class="label">Review Version</td>
				<td width="80%" class="nodata">
					<?php if (isset($review_version)) : ?>
						<?php if (isset($notified) && (!isset($copyedit_file))) : ?>
							<input type="radio" name="editorDecisionFile" value="<?= $review_version['article_revision_file_id']; ?>">
							<a href="/editor/downloadFile/<?= $review_version['file_id'] ?>">
								<?= $review_version['file_name']; ?>
							</a>
						<?php else : ?>
							<a href="/editor/downloadFile/<?= $review_version['file_id'] ?>">
								<?= $review_version['file_name']; ?>
							</a>
						<?php endif; ?>
					<?php else : ?>
						None
					<?php endif; ?>
				</td>
			</tr>
			<tr valign="top">
				<td width="20%" class="label">Author Version</td>
				<td width="80%" class="nodata">
					<?php if (isset($author_version)) : ?>
						<?php if (isset($notified) && (!isset($copyedit_file))) : ?>
							<input type="radio" name="editorDecisionFile" value="<?= $author_version['article_revision_file_id']; ?>">
							<a href="/editor/downloadFile/<?= $author_version['file_id'] ?>">
								<?= $author_version['file_name']; ?>
							</a>
						<?php else : ?>
							<a href="/editor/downloadFile/<?= $author_version['file_id'] ?>">
								<?= $author_version['file_name']; ?>
							</a>
						<?php endif; ?>
					<?php else : ?>
						None
					<?php endif; ?>
				</td>
			</tr>
			<tr valign="top">
				<td width="20%" class="label">Editor Version</td>
				<td width="80%" class="nodata">
					<?php if (isset($editor_version)) : ?>
						<?php if (isset($notified) && (!isset($copyedit_file))) : ?>
							<input type="radio" name="editorDecisionFile" value="<?= $editor_version['article_revision_file_id']; ?>">
							<a href="/editor/downloadFile/<?= $editor_version['file_id'] ?>">
								<?= $editor_version['file_name']; ?>
							</a>
						<?php else : ?>
							<a href="/editor/downloadFile/<?= $editor_version['file_id'] ?>">
								<?= $editor_version['file_name']; ?>
							</a>
						<?php endif; ?>
					<?php else : ?>
						None
					<?php endif; ?>
				</td>
			</tr>
			</form>
			<tr valign="top">
				<td class="label">&nbsp;</td>
				<form action="<?= base_url(); ?>/editor/uploadEditorVersion" method="post" enctype="multipart/form-data">
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