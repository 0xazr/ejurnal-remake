<?php

namespace App\Controllers\Editor;

use App\Controllers\BaseController;

class saveIssue extends BaseController
{
  public function index()
  {
    $this->issuesModel->insert([
      'volume' => $this->request->getVar('volume'),
      'number' => $this->request->getVar('number'),
      'year' => $this->request->getVar('year'),
      'title' => $this->request->getVar('title'),
      'description' => $this->request->getVar('description'),
      'status' => 0,
    ]);

    return redirect()->to('editor/futureIssues/');
  }
}
