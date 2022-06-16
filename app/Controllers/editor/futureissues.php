<?php

namespace App\Controllers\Editor;

use App\Controllers\BaseController;

class futureissues extends BaseController
{
  public function index()
  {
    if ($issues = $this->issuesModel->notLike('status', 1)->findAll()) {
      foreach ($issues as $issue) {
        $data['article'][$issue['issue_id']] = $this->articlesModel->where('issue_id', $issue['issue_id'])->findAll();
      }
    }
    // dd($issues);



    $data['issues'] = $issues;
    // dd($this->issuesModel->findAll());
    return view('pages/editor/futureissues', $data);
  }
}
