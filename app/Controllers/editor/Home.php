<?php

namespace App\Controllers\Editor;

use App\Controllers\BaseController;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'submissionUnAssigned' => count($this->articlesModel->where('status', 'Waiting Assignment')->findAll()),
            'submissionInReview' => count($this->articlesModel->where('status', 'In Review')->findAll()),
            'submissionInEditing' => count($this->articlesModel->where('status', 'In Editing')->findAll())
        ];
        return view('pages/editor/home', $data);
    }
}
