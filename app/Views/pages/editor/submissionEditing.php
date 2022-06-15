<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div id="breadcrumb">
	<a href="<?= base_url(); ?>/index">Home</a> &gt;
	<a href="<?= base_url(); ?>/user" class="hierarchyLink">User</a> &gt;
	<a href="<?= base_url(); ?>/editor" class="hierarchyLink">Editor</a> &gt;
	<a href="<?= base_url(); ?>/editor" class="hierarchyLink">Submissions</a> &gt;
	<a href="<?= base_url(); ?>/editor/submission/<?= $article['article_id']; ?>" class="hierarchyLink">#<?= $article['article_id']; ?></a> &gt;
	<a href="<?= base_url(); ?>/editor/submissionEditing/<?= $article['article_id']; ?>" class="current">Editing</a>
</div>

<h2>#<?= $article['article_id']; ?> Editing</h2>


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
					<?php if (isset($article['first_name'])) : ?>
						<?= $article['first_name']; ?>
					<?php elseif (isset($article['first_name']) && $article['middle_name']) : ?>
						<?= $article['first_name'] . " " . $article['middle_name']; ?>
					<?php elseif (isset($article['first_name']) && $article['middle_name'] && $article['last_name']) : ?>
						<?= $article['first_name'] . " " . $article['first_name'] . " " . $article['last_name']; ?>
					<?php endif; ?>
					<a href="<?= base_url(); ?>/user/email?redirectUrl=http%3A%2F%2Fiptek.its.ac.id%2Findex.php%2Fitj%2Feditor%2FsubmissionEditing%2F12687&amp;to%5B%5D=%22Cyntia%20dfdsd%20Niani%22%20%3Ccyntian%40ppi.its.ac.id%3E&amp;subject=xczxzcxcz&amp;articleId=12687" class="icon"><img src="https://iptek.its.ac.id/lib/pkp/templates/images/icons/mail.gif" width="16" height="14" alt="Mail" /></a>
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
					<?php if (isset($editor_name)) : ?>
						<?= (isset($editor_name['first_name'])) ? $editor_name['first_name'] : ''; ?>
						<?= (isset($editor_name['middle_name'])) ? $editor_name['middle_name'] : ''; ?>
						<?= (isset($editor_name['last_name'])) ? $editor_name['last_name'] : ''; ?>
					<?php else : ?>
						None Assigned
					<?php endif; ?>
				</td>
			</tr>
		</table>
	</div>

	<div class="separator"></div>

	<div id="copyedit">
		<h3>Copyediting</h3>


		<table width="100%" class="info">
			<tr>
				<td width="28%" colspan="2"><a href="<?= base_url(); ?>/editor/viewMetadata/<?= $article['article_id']; ?>" class="action">Review Metadata</a></td>
				<td width="18%" class="heading">Request</td>
				<td width="18%" class="heading">Underway</td>
				<td width="18%" class="heading">Complete</td>
				<td width="18%" class="heading">Acknowledge</td>
			</tr>
			<tr>
				<td width="2%">1.</td>
				<td width="26%">Initial Copyedit</td>
				<td>
					<?php if (isset($copyedit_file)) : ?>
						<?php if (isset($date_step_1['date_request'])) : ?>
							<?= $date_step_1['date_request']; ?>
						<?php else : ?>
							<a href="<?= base_url(); ?>/editor/initiateCopyedit/<?= $article['article_id']; ?>">Initiate</a>
						<?php endif; ?>
					<?php else : ?>
					<?php endif; ?>
				</td>
				<td>
					N/A
				</td>
				<td>
					<?php if (isset($date_step_1['date_complete'])) : ?>
						<?= $date_step_1['date_complete']; ?>
					<?php else : ?>
						<a href="<?= base_url(); ?>/editor/completeCopyedit/<?= $article['article_id']; ?>" class="action">Complete</a>
					<?php endif; ?>
				</td>
				<td>
					N/A
				</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td colspan="5">
					<?php if (isset($copyedit_file)) : ?>
						<a href="#">
							<?= $copyedit_file['file_name']; ?>
						</a>
						&nbsp;&nbsp;&nbsp;
						<?= $copyedit_file['date_uploaded']; ?>
					<?php else : ?>
						File:
						Request email cannot be sent until file is selected for copyediting in Editor Decision, Review page.
					<?php endif; ?>
				</td>
			</tr>
			<tr>
				<td colspan="6" class="separator">&nbsp;</td>
			</tr>
			<tr>
				<td>2.</td>
				<td>Author Copyedit</td>
				<td>
					<?php if (isset($date_step_1['date_complete'])) : ?>
						<?php if (isset($date_step_2['date_request'])) : ?>
							<?= $date_step_2['date_request']; ?>
						<?php else : ?>
							<a href="<?= base_url(); ?>/editor/notifyAuthorCopyedit/<?= $article['article_id']; ?>">
								<img src="https://iptek.its.ac.id/lib/pkp/templates/images/icons/mail.gif" width="16" height="14" alt="Mail" />
							</a>
						<?php endif; ?>
					<?php else : ?>
						<img src="https://iptek.its.ac.id/lib/pkp/templates/images/icons/mail_disabled.gif" width="16" height="14" alt="Mail" />
					<?php endif; ?>
				</td>
				<td>
					&mdash;
				</td>
				<td>
					<?php if (isset($date_step_2['date_complete'])) : ?>
						<?= $date_step_2['date_complete']; ?>
					<?php else : ?>
						&mdash;
					<?php endif; ?>
				</td>
				<td>
					<?php if (isset($date_step_1['date_complete'])) : ?>
						<?php if (isset($date_step_2['date_acknowledge'])) : ?>
							<?= $date_step_2['date_acknowledge']; ?>
						<?php else : ?>
							<a href="<?= base_url(); ?>/editor/thankAuthorCopyedit/<?= $article['article_id']; ?>">
								<img src="https://iptek.its.ac.id/lib/pkp/templates/images/icons/mail.gif" width="16" height="14" alt="Mail" />
							</a>
						<?php endif; ?>
					<?php else : ?>
						<img src="https://iptek.its.ac.id/lib/pkp/templates/images/icons/mail_disabled.gif" width="16" height="14" alt="Mail" />
					<?php endif; ?>
				</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td colspan="5">
					File:
					<?php if (isset($file_step_2)) : ?>
						<a href="#">
							<?= $file_step_2['file_name']; ?>
						</a>
						&nbsp;&nbsp;&nbsp;
						<?= $file_step_2['date_uploaded']; ?>
					<?php else : ?>
					<?php endif; ?>
				</td>
			</tr>
			<tr>
				<td colspan="6" class="separator">&nbsp;</td>
			</tr>
			<tr>
				<td>3.</td>
				<td>Final Copyedit</td>
				<td>
					<?php if (isset($date_step_2['date_complete'])) : ?>
						<?= $date_step_2['date_complete']; ?>
					<?php else : ?>

					<?php endif; ?>
				</td>
				<td>
					N/A
				</td>
				<td>
					<?php if (isset($date_step_3['date_complete'])) : ?>
						<?= $date_step_3['date_complete']; ?>
					<?php else : ?>
						<a href="<?= base_url(); ?>/editor/completeFinalCopyedit/<?= $article['article_id']; ?>" class="action">Complete</a>
					<?php endif; ?>
				</td>
				<td>
					N/A
				</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td colspan="5">
					File:
					<?php if (isset($file_step_3['file_name'])) : ?>
						<a href="#">
							<?= $file_step_3['file_name']; ?>
						</a>
						<?= $file_step_3['date_uploaded']; ?>
					<?php else : ?>
						&nbsp;
					<?php endif; ?>
				</td>
			</tr>
			<tr>
				<td colspan="6" class="separator"></td>
			</tr>
		</table>

		<form method="post" action="<?= base_url(); ?>/editor/uploadCopyeditVersion" enctype="multipart/form-data">
			<input type="hidden" name="articleId" value="<?= $article['article_id']; ?>" />
			Upload file to
			<?php if (isset($date_step_1['date_complete'])) : ?>
				<?php if (isset($date_step_2['date_complete'])) : ?>
					<input type="radio" name="copyeditStage" id="copyeditStageInitial" value="initial" /><label for="copyeditStageInitial">Step 1</label>,
					<input type="radio" name="copyeditStage" id="copyeditStageAuthor" value="author" checked="checked" /><label for="copyeditStageAuthor">Step 2</label>, or
					<input type="radio" name="copyeditStage" id="copyeditStageFinal" value="final" checked="checked" /><label for="copyeditStageFinal">Step 3</label>
				<?php else : ?>
					<input type="radio" name="copyeditStage" id="copyeditStageInitial" value="initial" /><label for="copyeditStageInitial">Step 1</label>,
					<input type="radio" name="copyeditStage" id="copyeditStageAuthor" value="author" checked="checked" /><label for="copyeditStageAuthor">Step 2</label>, or
					<input type="radio" name="copyeditStage" id="copyeditStageFinal" value="final" disabled="disabled" /><label for="copyeditStageFinal" class="disabled">Step 3</label>
				<?php endif; ?>
			<?php else : ?>
				<input type="radio" name="copyeditStage" id="copyeditStageInitial" value="initial" checked="checked" /><label for="copyeditStageInitial">Step 1</label>,
				<input type="radio" name="copyeditStage" id="copyeditStageAuthor" value="author" disabled="disabled" /><label for="copyeditStageAuthor" class="disabled">Step 2</label>, or
				<input type="radio" name="copyeditStage" id="copyeditStageFinal" value="final" disabled="disabled" /><label for="copyeditStageFinal" class="disabled">Step 3</label>
			<?php endif; ?>
			<input type="file" name="file_name" size="10" class="uploadField" />
			<input type="submit" value="Upload" class="button" />
		</form>

		Copyedit Comments
		<a href="javascript:openComments('/editor/viewCopyeditComments/12687');" class="icon"><img src="https://iptek.its.ac.id/lib/pkp/templates/images/icons/comment.gif" width="16" height="14" alt="Comment" /></a>No Comments

		&nbsp;&nbsp;
		<a href="javascript:openHelp('/editor/instructions/copy')" class="action">Copyedit Instructions</a>
	</div>

	<div class="separator"></div>

	<div id="scheduling">
		<h3>Scheduling</h3>

		<table class="data" width="100%">
			<form action="<?= base_url(); ?>/editor/scheduleForPublication/<?= $article['article_id']; ?>" method="post">
				<tr valign="top">
					<td width="25%" class="label">
						<label for="issueId">Schedule for publication in</label>
					</td>
					<td width="25%" class="value">
						<select name="issue_id" id="issue_id" class="selectMenu">
							<option value="">To Be Assigned</option>
							<?php if (isset($issue)) : ?>
								<option label="------    Future Issues    ------" value="-100">------ Future Issues ------</option>
								<?php foreach ($issue as $is) : ?>
									<option label="Vol <?= $is['volume']; ?>, No <?= $is['number']; ?> (<?= $is['year']; ?>)" value="<?= $is['issue_id']; ?>">Vol <?= $is['volume']; ?>, No <?= $is['number']; ?> (<?= $is['year']; ?>)</option>
								<?php endforeach; ?>
								<option label="------    Current Issue    ------" value="-101">------ Current Issue ------</option>
								<option label="------    Back Issues    ------" value="-102">------ Back Issues ------</option>
							<?php else : ?>
								<option label="------    Future Issues    ------" value="-100">------ Future Issues ------</option>
								<option label="------    Current Issue    ------" value="-101">------ Current Issue ------</option>
								<option label="------    Back Issues    ------" value="-102">------ Back Issues ------</option>
							<?php endif; ?>
						</select>
					</td>
					<td width="50%" class="value">
						<input type="submit" value="Record" class="button defaultButton" />&nbsp;
					</td>
				</tr>
			</form>
			<?php if (isset($issue_assign)) : ?>
				<form action="<?= base_url(); ?>/editor/setDatePublished/<?= $article['article_id']; ?>" method="post">
					<tr valign="top">
						<td width="20%" class="label">
							<label for="issueId">Published</label>
						</td>
						<td class="value">
							<select name="datePublishedMonth" class="selectMenu">
								<option label="-" value="">-</option>
								<option label="January" value="01">January</option>
								<option label="February" value="02">February</option>
								<option label="March" value="03">March</option>
								<option label="April" value="04">April</option>
								<option label="May" value="05">May</option>
								<option label="June" value="06" selected="selected">June</option>
								<option label="July" value="07">July</option>
								<option label="August" value="08">August</option>
								<option label="September" value="09">September</option>
								<option label="October" value="10">October</option>
								<option label="November" value="11">November</option>
								<option label="December" value="12">December</option>
							</select>
							<select name="datePublishedDay" class="selectMenu">
								<option label="-" value="">-</option>
								<option label="01" value="1">01</option>
								<option label="02" value="2">02</option>
								<option label="03" value="3">03</option>
								<option label="04" value="4">04</option>
								<option label="05" value="5">05</option>
								<option label="06" value="6">06</option>
								<option label="07" value="7" selected="selected">07</option>
								<option label="08" value="8">08</option>
								<option label="09" value="9">09</option>
								<option label="10" value="10">10</option>
								<option label="11" value="11">11</option>
								<option label="12" value="12">12</option>
								<option label="13" value="13">13</option>
								<option label="14" value="14">14</option>
								<option label="15" value="15">15</option>
								<option label="16" value="16">16</option>
								<option label="17" value="17">17</option>
								<option label="18" value="18">18</option>
								<option label="19" value="19">19</option>
								<option label="20" value="20">20</option>
								<option label="21" value="21">21</option>
								<option label="22" value="22">22</option>
								<option label="23" value="23">23</option>
								<option label="24" value="24">24</option>
								<option label="25" value="25">25</option>
								<option label="26" value="26">26</option>
								<option label="27" value="27">27</option>
								<option label="28" value="28">28</option>
								<option label="29" value="29">29</option>
								<option label="30" value="30">30</option>
								<option label="31" value="31">31</option>
							</select>
							<select name="datePublishedYear" class="selectMenu">
								<option label="-" value="">-</option>
								<option label="2012" value="2012">2012</option>
								<option label="2013" value="2013">2013</option>
								<option label="2014" value="2014">2014</option>
								<option label="2015" value="2015">2015</option>
								<option label="2016" value="2016">2016</option>
								<option label="2017" value="2017">2017</option>
								<option label="2018" value="2018">2018</option>
								<option label="2019" value="2019">2019</option>
								<option label="2020" value="2020">2020</option>
								<option label="2021" value="2021">2021</option>
								<option label="2022" value="2022" selected="selected">2022</option>
								<option label="2023" value="2023">2023</option>
								<option label="2024" value="2024">2024</option>
							</select>
						</td>
						<td class="value">
							<input type="submit" value="Record" class="button defaultButton" />&nbsp;
						</td>
					</tr>
				</form>
			<?php else : ?>
			<?php endif; ?>
		</table>
	</div>
	<div class="separator"></div>


	<div id="layout">
		<h3>Layout</h3>


		<table width="100%" class="info">
			<tr>
				<td width="28%" colspan="2">&nbsp;</td>
				<td width="18%" class="heading">Request</td>
				<td width="16%" class="heading">Underway</td>
				<td width="16%" class="heading">Complete</td>
				<td width="22%" colspan="2" class="heading">Acknowledge</td>
			</tr>
			<tr>
				<td colspan="2">
					Layout Version
				</td>
				<td>
					N/A
				</td>
				<td>
					N/A
				</td>
				<td>
					N/A
				</td>
				<td colspan="2">
					N/A
				</td>
			</tr>
			<tr valign="top">
				<td colspan="6">
					File:&nbsp;&nbsp;&nbsp;&nbsp;
					<?php if (isset($layout_version)) : ?>
						<a class="file" href="<?= base_url('/downloadFile') . $layout_version['file_id']; ?>"><?= $layout_version['file_name']; ?></a>&nbsp;&nbsp;<?= $layout_version['date_uploaded']; ?>
					<?php else : ?>
						None (Upload final copyedit version as Layout Version prior to sending request)
					<?php endif; ?>
				</td>
			</tr>
			<tr>
				<td colspan="7" class="separator">&nbsp;</td>
			</tr>

			<tr>
				<td colspan="2">Galley Format</td>
				<td colspan="2" class="heading">File</td>
				<td class="heading">Order</td>
				<td class="heading">Action</td>
				<td class="heading">Views</td>
			</tr>
			<?php if (isset($galley_format)) : ?>
				<?php for ($index = 0; $index < count($galley_format); $index++) : ?>
					<tr>
						<td width="2%"><?= $index + 1; ?></td>
						<td width="26%">PDF &nbsp; <a href="https://iptek.its.ac.id/index.php/itj/editor/proofGalley/12517/6786" class="action">View Proof</a></td>
						<td colspan="2"><a href="<?= base_url('/editor/downloadFile/' . $galley_format[$index]['file_id']); ?>" class="file"><?= $galley_format[$index]['file_name']; ?></a>&nbsp;&nbsp;<?= $galley_format[$index]['date_uploaded']; ?></td>
						<td><a href="" class="plain">&uarr;</a> <a href="" class="plain">&darr;</a></td>
						<td>
							<a href="https://iptek.its.ac.id/index.php/itj/editor/editGalley/12517/6786" class="action">Edit</a>&nbsp;|&nbsp;<a href="<?= base_url('/editor/deleteGalley/' . $galley_format[$index]['article_layout_file_id']); ?>" onclick="return confirm('Are you sure you want to permanently delete this galley?')" class="action">Delete</a>
						</td>
						<td>0</td>
					</tr>
				<?php endfor; ?>
			<?php else : ?>
				<tr>
					<td colspan="7" class="nodata">None</td>
				</tr>
			<?php endif; ?>
			<tr>
				<td colspan="7" class="separator">&nbsp;</td>
			</tr>
			<tr>
				<td width="28%" colspan="2">Supplementary Files</td>
				<td width="34%" colspan="2" class="heading">File</td>
				<td width="16%" class="heading">Order</td>
				<td width="16%" colspan="2" class="heading">Action</td>
			</tr>
			<?php if (isset($supp_file)) : ?>
				<?php for ($index = 0; $index < count($supp_file); $index++) : ?>
					<tr>
						<td width="2%"><?= $index + 1; ?></td>
						<td width="26%">PDF &nbsp; <a href="https://iptek.its.ac.id/index.php/itj/editor/proofGalley/12517/6786" class="action">View Proof</a></td>
						<td colspan="2"><a href="<?= base_url('/editor/downloadFile/' . $supp_file[$index]['file_id']); ?>" class="file"><?= $supp_file[$index]['file_name']; ?></a>&nbsp;&nbsp;<?= $supp_file[$index]['date_uploaded']; ?></td>
						<td><a href="" class="plain">&uarr;</a> <a href="" class="plain">&darr;</a></td>
						<td>
							<a href="https://iptek.its.ac.id/index.php/itj/editor/editSuppFile/12517/6786" class="action">Edit</a>&nbsp;|&nbsp;<a href="<?= base_url('/editor/deleteSuppFile/' . $supp_file[$index]['article_layout_file_id']); ?>" onclick="return confirm('Are you sure you want to permanently delete this galley?')" class="action">Delete</a>
						</td>
						<td>0</td>
					</tr>
				<?php endfor; ?>
			<?php else : ?>
				<tr>
					<td colspan="7" class="nodata">None</td>
				</tr>
			<?php endif; ?>
			<tr>
				<td colspan="7" class="separator">&nbsp;</td>
			</tr>
		</table>

		<form method="post" action="<?= base_url(); ?>/editor/uploadLayoutFile" enctype="multipart/form-data">
			<input type="hidden" name="from" value="submissionEditing" />
			<input type="hidden" name="article_id" value="<?= $article['article_id']; ?>" />
			Upload file to <input type="radio" name="layoutFileType" id="layoutFileTypeSubmission" value="submission" checked="checked" /><label for="layoutFileTypeSubmission">Layout Version</label>, <input type="radio" name="layoutFileType" id="layoutFileTypeGalley" value="galley" /><label for="layoutFileTypeGalley">Galley</label>, <input type="radio" name="layoutFileType" id="layoutFileTypeSupp" value="supp" /><label for="layoutFileTypeSupp">Supp. files</label>
			<input type="file" name="layoutFile" size="10" class="uploadField" />
			<input type="submit" value="Upload" class="button" />
			<br />
			Create remote <input type="radio" name="layoutFileType" id="layoutFileTypeGalley" value="galley" /><label for="layoutFileTypeGalley">Galley</label>, <input type="radio" name="layoutFileType" id="layoutFileTypeSupp" value="supp" /><label for="layoutFileTypeSupp">Supp. files</label>
			<input type="submit" name="createRemote" value="Create" class="button" />
		</form>

		<div id="layoutComments">
			Layout Comments
			<a href="javascript:openComments('/editor/viewLayoutComments/12687');" class="icon"><img src="https://iptek.its.ac.id/lib/pkp/templates/images/icons/comment.gif" width="16" height="14" alt="Comment" /></a> No Comments

		</div>
	</div>


</div><!-- content -->
<?= $this->endSection(); ?>