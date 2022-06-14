<?php

namespace App\Controllers\Author;

use App\Controllers\BaseController;

class Submit extends BaseController
{
  public function index($page = 1, $articleID = 0)
  {
    switch ($page) {
      case 1:
        $data['pages'] = [
          'title' => "Step 1. Starting the Submission"
        ];

        // Redirect ketika tidak ditemukan article_id di Database
        if ($articleID > 0 && $this->articlesModel->where('article_id', $articleID)->first() == NULL) {
          return redirect()->to(base_url() . '/author/submit/1');
        }

        $data['article'] = [
          'article_id' => $articleID,
        ];

        $data['comment'] = $this->articleCommentsModel->where('article_id', $articleID)->first();

        // Untuk Checkbox pada step 1
        $progress = $this->articlesModel->where('article_id', $articleID)->findColumn('progress');
        if (!$progress) break;
        $data['checked'] = $progress[0] >= 1 ? 'checked' : '';
        $data['article']['progress'] = $progress[0];
        break;

      case 2:
        $data['pages'] = [
          'title' => "Step 2. Uploading the Submission"
        ];

        if ($fileinfo = $this->articleSubmissionFilesModel->where('article_id', $articleID)->orderBy('article_submission_file_id', 'desc')->first()) {
          $data['fileinfo'] = $fileinfo;
        }

        $progress = $this->articlesModel->where('article_id', $articleID)->findColumn('progress');
        $data['article']['progress'] = $progress[0];
        break;

      case 3:
        $data = [
          'title' => "Step 3. Entering the Submission's Metadata"
        ];

        if ($submitter = $this->usersModel->find(session()->get('user_id'))) {
          $data['submitter'] = $submitter;
        }

        if ($article = $this->articlesModel->find($articleID)) {
          $data['article'] = $article;

          if ($authors = $this->articleAuthorsModel->where('article_id', $articleID)->findAll()) {
            $data['authors'] = $authors;
          }
        }

        $progress = $this->articlesModel->where('article_id', $articleID)->findColumn('progress');
        $data['article']['progress'] = $progress[0];

        break;

      case 4:
        $data = [
          'title' => "Step 4. Uploading Supplementary Files"
        ];

        if ($filesinfo = $this->articleSupplementaryFilesModel->where('article_id', $articleID)->findAll()) {
          $data['filesinfo'] = $filesinfo;
        }

        $progress = $this->articlesModel->where('article_id', $articleID)->findColumn('progress');
        $data['article']['progress'] = $progress[0];

        break;

      case 5:
        $data = [
          'title' => "Step 5. Confirming the Submission"
        ];

        if ($mainFile = $this->articleSubmissionFilesModel->where('article_id', $articleID)->orderBy('article_submission_file_id', 'desc')->first()) {
          $data['main_file'] = $mainFile;
        }

        if ($suppFile = $this->articleSupplementaryFilesModel->where('article_id', $articleID)->findAll()) {
          $data['support_file'] = $suppFile;
        }

        $progress = $this->articlesModel->where('article_id', $articleID)->findColumn('progress');
        $data['article']['progress'] = $progress[0];

        // dd($data['support_file']);
        break;
    }

    // Mengirim data article_id untuk view
    if ($articleID != 0) $data['article']['article_id'] = $articleID;

    // Redirect apabila tidak ditemukan article_id pada database
    if ($page != 1 && $this->articlesModel->where('article_id', $articleID)->first() == NULL) {
      return redirect()->to(base_url() . '/author/submit/1');
    }

    return view("pages/author/submit/$page", $data);
  }
}
