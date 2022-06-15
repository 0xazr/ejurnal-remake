<?php

namespace App\Controllers\Editor;

use App\Controllers\BaseController;

class createIssue extends BaseController
{
  public function index()
  {
    $data['issue'] = $this->issuesModel->findAll();
    return view('pages/editor/createIssue', $data);
  }
}
