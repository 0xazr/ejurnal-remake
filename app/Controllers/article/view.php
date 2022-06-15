<?php

namespace App\Controllers\Article;

use App\Controllers\BaseController;

class view extends BaseController
{
  public function index($article_id)
  {
    $data['article'] = $this->articlesModel->where('article_id', $article_id)->first();
    $data['issues'] = $this->issuesModel->where('issue_id', $data['article']['issue_id'])->first();
    $data['authors'] = $this->articleAuthorsModel->where('article_id', $data['article']['article_id'])->findAll();
    $data['file'] = $this->articleCopyedFilesModel->where('article_id', $data['article']['article_id'])->orderBy('article_copyed_file_id', 'DESC')->first();
    // dd($data['authors']);
    return view('pages/article/view', $data);
  }
}
