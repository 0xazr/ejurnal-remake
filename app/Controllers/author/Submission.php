<?php

namespace App\Controllers\Author;

use App\Controllers\BaseController;

class Submission extends BaseController
{
  public function index($article_id)
  {
    $data = [
      'editor' => $this->usersModel->find(session()->get('user_id')),
      'editor_id' => session()->get('user_id'),
      //   'editor_assign' => $this->assignmenstModel->where('article_id', $article_id)->first(),
      'original_file' => $this->articleSubmissionFilesModel->where('article_id', $article_id)->orderBy('article_submission_file_id', 'desc')->first(),
      'supp_files' => $this->articleSupplementaryFilesModel->where('article_id', $article_id)->findAll()
    ];

    if ($editor = $this->assignmenstModel->where('article_id', $article_id)->first()) {
      $data['editor_assign'] = $this->usersModel->where('user_id', $editor['editor_id'])->first();
    };

    $data['article'] = $this->articlesModel->find($article_id);
    $data['authors'] = $this->articleAuthorsModel->where('article_id', $data['article']['article_id'])->findAll();
    $data['submitter'] = $this->usersModel->find($data['article']['submitter_id']);
    $data['author_comments'] = $this->articleCommentsModel->where('article_id', $article_id)->first()['author_to_editor'];

    // dd($data);
    return view('pages/author/submissions', $data);
  }
}
