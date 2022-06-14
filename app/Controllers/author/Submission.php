<?php

namespace App\Controllers\Author;

use App\Controllers\BaseController;

class Submission extends BaseController
{
  public function index($article_id)
  {
    $data = [
      'article' => $this->articlesModel->joinArticleAuthorFiles($article_id)->first(),
      'editor' => $this->usersModel->find(session()->get('user_id')),
      'editor_id' => session()->get('user_id'),
      //   'editor_assign' => $this->assignmenstModel->where('article_id', $article_id)->first(),
      'original_file' => $this->articleSubmissionFilesModel->where('article_id', $article_id)->orderBy('article_submission_file_id', 'desc')->first(),
      'supp_files' => $this->articleSupplementaryFilesModel->where('article_id', $article_id)->findAll()
    ];

    if ($editor = $this->assignmenstModel->where('article_id', $article_id)->first()) {
      $data['editor_assign'] = $this->usersModel->where('user_id', $editor['editor_id'])->first();
    };

    // dd($data);
    return view('pages/author/submissions', $data);
  }
}
