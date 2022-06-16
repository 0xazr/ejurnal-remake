<?php

namespace App\Controllers\Editor;

use App\Controllers\BaseController;

class backIssues extends BaseController
{
  public function index()
  {
    $issues = $this->issuesModel->where('status', 1)->findAll();

    foreach ($issues as $issue) {
      $data['articles'][$issue['issue_id']] = $this->articlesModel->where('issue_id', $issue['issue_id'])->findAll();
    }

    $data['issues'] = $issues;

    return view('pages/editor/backIssues', $data);
  }
}
