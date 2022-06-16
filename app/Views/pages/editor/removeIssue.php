<?php

namespace App\Controllers\Editor;

use App\Controllers\BaseController;

class removeIssue extends BaseController
{
  public function index($issue_id)
  {
    $this->issuesModel->delete($issue_id);
    return redirect()->to(base_url('editor/backIssues'));
  }
}
