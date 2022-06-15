<?php

namespace App\Controllers\Author;

use App\Controllers\BaseController;

class Home extends BaseController
{
    public function index()
    {
        $articles = $this->articlesModel->where('submitter_id', session()->get('user_id'))->findAll();

        foreach ($articles as $article) {
            $authors[$article['article_id']] = $this->articleAuthorsModel->where('article_id', $article['article_id'])->findAll();
        }

        $data['articles'] = $articles;

        if (isset($authors)) {
            $data['authors'] = $authors;
        }
        // dd($data);
        return view('pages/author/home', $data);
    }
}
