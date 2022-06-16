<?php

namespace App\Controllers\Editor\Submissions;

use App\Controllers\BaseController;

class Home extends BaseController
{
    public function index($article_id)
    {
        $data = [
            'editor' => $this->usersModel->find(session()->get('user_id')),
            'editor_id' => session()->get('user_id'),
            'editor_assign' => $this->assignmenstModel->where('article_id', $article_id)->first(),
            'original_file' => $this->articleSubmissionFilesModel->where('article_id', $article_id)->orderBy('article_submission_file_id', 'desc')->first(),
            'supp_files' => $this->articleSupplementaryFilesModel->where('article_id', $article_id)->findAll(),
            'author_comments' => $this->articleCommentsModel->where('article_id', $article_id)->first()['author_to_editor'],
        ];

        $data['article'] = $this->articlesModel->find($article_id);
        $data['submitter'] = $this->usersModel->find($data['article']['submitter_id']);
        $data['authors'] = $this->articleAuthorsModel->where('article_id', $data['article']['article_id'])->findAll();

        // dd($data);
        return view('pages/editor/submissions/submissions', $data);
    }
}
