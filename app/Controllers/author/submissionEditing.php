<?php

namespace App\Controllers\Author;

use App\Controllers\BaseController;

class submissionEditing extends BaseController
{
  public function index($article_id)
  {
    if ($editor_id = $this->assignmenstModel->where('article_id', $article_id)->first()) {
      $editor_name = $this->usersModel->where('user_id', $editor_id['editor_id'])->first();
      $data['editor_name'] = $editor_name;
    }

    if ($copyEditingFile = $this->articleCopyedFilesModel->where('article_id', $article_id)->first()) {
      $data['copyedit_file'] = $copyEditingFile;
    }

    $data['article'] =  $this->articlesModel->joinArticleAuthorFiles($article_id)->first();

    if ($issue = $this->issuesModel->findAll()) {
      $data['issue'] = $issue;
    }

    if ($issue = $this->articlesModel->where('article_id', $article_id)->findColumn('issue_id')[0]) {
      // dd($issue);
      $data['issue_assign'] = $issue;
    }

    $step_1 = [
      'article_id' => $article_id,
      'step' => 1,
    ];

    if ($date_step_1 = $this->copyedAssignmentsModel->where($step_1)->first()) {
      $data['date_step_1'] = $date_step_1;
    }

    $step_2 = [
      'article_id' => $article_id,
      'step' => 2,
    ];

    if ($file_step_2 = $this->articleCopyedFilesModel->where($step_2)->first()) {
      $data['file_step_2'] = $file_step_2;
    }

    if ($date_step_2 = $this->copyedAssignmentsModel->where($step_2)->first()) {
      $data['date_step_2'] = $date_step_2;
    }

    $step_2 = [
      'article_id' => $article_id,
      'step' => 2,
    ];

    return view('pages/author/submissionEditing', $data);
  }
}