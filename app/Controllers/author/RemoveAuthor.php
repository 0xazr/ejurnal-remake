<?php

namespace App\Controllers\Author;

use App\Controllers\BaseController;

class RemoveAuthor extends BaseController
{
  public function index($authorID)
  {
    $this->articleAuthorsModel->delete($authorID);
    return redirect()->back();
  }
}
