<?php

namespace App\Controllers\Editor\Submissions;

use App\Controllers\BaseController;

class SubmissionsUnassigned extends BaseController
{
    public function index()
    {
        $articles = $this->articlesModel->where('status', 'Waiting Assignment')->findAll();
        foreach ($articles as $article) {
            $authors[$article['article_id']] = $this->articleAuthorsModel->where('article_id', $article['article_id'])->findAll();
        }

        $data = [
            'articles' => $articles,
            'authors' => $authors
        ];

        // dd($data);
        // $data = [
        //     'article' => $this->articlesModel->joinArticleAW()->findAll()
        // ];
        // dd($this->articlesModel->joinArticleAW()->findAll());
        return view('pages/editor/submissions/submissionsUnassigned', $data);
    }
}
