<?php

namespace App\Controllers\Editor;

use App\Controllers\BaseController;

class unPublishIssueToc extends BaseController
{
  public function index($issue_id)
  {
    $this->issuesModel->save([
      'issue_id' => $issue_id,
      'status' => 0
    ]);

    return redirect()->to(base_url('/editor/issueToc/' . $issue_id));
  }
}
