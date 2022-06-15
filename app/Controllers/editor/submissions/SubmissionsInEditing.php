<?php

namespace App\Controllers\Editor\Submissions;

use App\Controllers\BaseController;

class SubmissionsInEditing extends BaseController
{
    public function index()
    {
        $articles = $this->articlesModel->where('status', 'In Editing')->findAll();
        foreach ($articles as $article) {
            $authors[$article['article_id']] = $this->articleAuthorsModel->where('article_id', $article['article_id'])->findAll();
        }

        $data = [
            'articles' => $articles,
            'authors' => $authors
        ];
        return view('pages/editor/submissions/submissionsInEditing', $data);
    }
}
