<?php

namespace App\Controllers\Editor;

use App\Controllers\BaseController;

class DeleteGalley extends BaseController
{
  public function index($article_layout_file_id)
  {
    $article_layout_file = $this->articleLayoutFilesModel->find($article_layout_file_id);

    $this->articleLayoutFilesModel->delete($article_layout_file_id);
    $this->filesModel->delete($article_layout_file['file_id']);
  }
}
