<?php

namespace App\Controllers\Editor;

use App\Controllers\BaseController;

class scheduleForPublication extends BaseController
{
  public function index($article_id)
  {
    $issue_id = $this->request->getVar('issue_id');
    $issue = $this->issuesModel->where('issue_id', $issue_id)->first();
    $this->articlesModel->save([
      'article_id' => $article_id,
      'issue_id' => $issue_id,
      'status' => "Vol " . $issue['volume'] . " No. " . $issue['number'] . " (" . $issue['year'] . ")",
    ]);

    return redirect()->to('editor/submissionEditing/' . $article_id);
  }
}
