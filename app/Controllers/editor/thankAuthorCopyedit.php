<?php

namespace App\Controllers\Editor;

use App\Controllers\BaseController;

class thankAuthorCopyedit extends BaseController
{
  public function index($article_id)
  {
    if ($article_copyed_file = $this->articleCopyedFilesModel->where('article_id', $article_id)->first()) {
      $cari_article_step = [
        'article_id' => $article_id,
        'step' => 2
      ];
      if ($article_copyed_assignment = $this->copyedAssignmentsModel->where($cari_article_step)->first()) {
        // echo "test";
        // return;
        $this->copyedAssignmentsModel->save([
          'copyed_id' => $article_copyed_assignment['copyed_id'],
          'date_acknowledge' => date('Y-m-d'),
        ]);
      }
    }
    return redirect()->to(base_url('/editor/submissionEditing/' . $article_id));
  }
}
