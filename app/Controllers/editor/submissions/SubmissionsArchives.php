<?php

namespace App\Controllers\Editor\Submissions;

use App\Controllers\BaseController;

class SubmissionsArchives extends BaseController
{
    public function index()
    {
        $articles = $this->articlesModel->like('status', 'Archived')->orLike('status', 'Vol')->findAll();

        foreach ($articles as $article) {
            $data['issue'][$article['article_id']] = $this->issuesModel->find($article['issue_id']);
            $data['authors'][$article['article_id']] = $this->articleAuthorsModel->where('article_id', $article['article_id'])->findAll();
        }

        $data['articles'] = $articles;

        return view('pages/editor/submissions/submissionsArchives', $data);
    }
}
