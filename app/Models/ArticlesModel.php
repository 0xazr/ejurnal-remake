<?php

namespace App\Models;

use CodeIgniter\Model;

class ArticlesModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'articles';
    protected $primaryKey       = 'article_id';
    protected $useAutoIncrement = true;
    // protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['article_id', 'title', 'abstract', 'keyword', 'language', 'support', 'reference', 'progress', 'status', 'submitter_id', 'date_submit', 'issue_id'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'date_created';
    protected $updatedField  = '';
    protected $deletedField  = '';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function joinSubmitterAuthor()
    {
        return $this
            ->select()
            ->join('users', 'users.user_id=articles.submitter_id')
            ->join('article_authors', 'article_authors.article_id=articles.article_id');
    }

    public function joinArticleAW()
    {
        return $this
            ->select()
            ->join('article_authors', 'article_authors.article_id = articles.article_id')
            ->where('articles.status', 'Waiting Assignment');
    }

    public function joinArticleIR()
    {
        return $this
            ->select()
            ->join('article_authors', 'article_authors.article_id=articles.article_id')
            // ->where('articles.status', 'In Review');
            ->like('articles.status', 'In Review');
    }

    public function joinArticleIE()
    {
        return $this
            ->select()
            ->join('article_authors', 'article_authors.article_id=articles.article_id')
            ->where('articles.status', 'In Editing');
    }

    public function joinArticleAuthorFiles($article_id)
    {
        return $this
            ->select()
            ->join('article_authors', 'article_authors.article_id = articles.article_id')
            ->join('article_comments', 'article_comments.article_id = articles.article_id')
            // ->join('article_submission_files', 'article_submission_files.article_id = articles.article_id')
            // ->join('article_supplementary_files', 'article_supplementary_files.article_id = articles.article_id')
            ->where('articles.article_id', $article_id);
    }

    public function joinReviewer($reviewer_id)
    {
        return $this
            ->select()
            ->join('assignments', 'assignments.article_id = articles.article_id')
            ->where('assignments.round', 1)
            ->where('assignments.reviewer_id', $reviewer_id);
    }
}
