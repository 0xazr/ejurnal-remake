<?php

namespace App\Controllers\Editor;

use App\Controllers\BaseController;

class initiateCopyedit extends BaseController
{
  public function index($article_id)
  {
    if ($article_copyed_file_id = $this->articleCopyedFilesModel->where('article_id', $article_id)->first()) {
      $this->copyedAssignmentsModel->insert([
        'article_id' => $article_id,
        'editor_id' => session()->get('user_id'),
        'date_request' => date('Y-m-d'),
        'step' => 1,
        'article_copyed_file_id' => $article_copyed_file_id,
      ]);
    }
    return redirect()->to(base_url('/editor/submissionEditing/' . $article_id));
  }
}
