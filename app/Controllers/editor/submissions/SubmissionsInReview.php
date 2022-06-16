<?php

namespace App\Controllers\Editor\Submissions;

use App\Controllers\BaseController;

class SubmissionsInReview extends BaseController
{
    public function index()
    {
        $articles = $this->articlesModel->where('status', 'In Review')->findAll();
        foreach ($articles as $article) {
            $data['authors'][$article['article_id']] = $this->articleAuthorsModel->where('article_id', $article['article_id'])->findAll();
        }

        $data['articles'] = $articles;

        return view('pages/editor/submissions/submissionsInReview', $data);
    }
}
