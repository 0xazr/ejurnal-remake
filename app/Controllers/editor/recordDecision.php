<?php

namespace App\Controllers\Editor;

use App\Controllers\BaseController;

class recordDecision extends BaseController
{
    public function index()
    {
        $decision = $this->request->getVar('decision');
        $article_id = $this->request->getPost('article_id');
        // echo $decision;
        // return;
        switch ($decision) {
            case 1:
                $this->editAssignmentsModel->insert([
                    'article_id' => $article_id,
                    'editor_id' => session()->get('user_id'),
                    'decision' => "Accept Submission",
                    'date_recorded' => date('Y-m-d')
                ]);
                $editAssignment = $this->editAssignmentsModel->getInsertID();
                $assignment_id = $this->assignmenstModel->where('article_id', $article_id)->first();

                // dd($assignment_id);
                $this->assignmenstModel->save([
                    'assignment_id' => $assignment_id['assignment_id'],
                    'edit_assignment_id' => $editAssignment,
                ]);
                return redirect()->to(base_url('/editor/submissionReview/' . $article_id));
                // break;

            case 2:
                $this->editAssignmentsModel->insert([
                    'article_id' => $article_id,
                    'editor_id' => session()->get('user_id'),
                    'decision' => "Revisions Required",
                    'date_recorded' => date('Y-m-d')
                ]);
                $this->articlesModel->save([
                    'article_id' => $article_id,
                    'status' => "In Review : Revisions Required",
                ]);
                return redirect()->to(base_url('/editor/submissionReview/' . $article_id));
                // break;

            case 3:
                $this->editAssignmentsModel->insert([
                    'article_id' => $article_id,
                    'editor_id' => session()->get('user_id'),
                    'decision' => "Resubmit for Review",
                    'date_recorded' => date('Y-m-d')
                ]);
                $this->articlesModel->save([
                    'article_id' => $article_id,
                    'status' => "In Review : Resubmit for Review",
                ]);
                return redirect()->to(base_url('/editor/submissionReview/' . $article_id));
                // break;

            case 4:
                $this->editAssignmentsModel->insert([
                    'article_id' => $article_id,
                    'editor_id' => session()->get('user_id'),
                    'decision' => "Decline Submission",
                    'date_recorded' => date('Y-m-d')
                ]);
                $this->articlesModel->save([
                    'article_id' => $article_id,
                    'status' => "In Editing",
                ]);
                return redirect()->to(base_url('/editor/submissionReview/' . $article_id));
                // break;

            default:
                return redirect()->to(base_url('/editor/submissionReview/' . $article_id));
                // break;
        }
    }
}
