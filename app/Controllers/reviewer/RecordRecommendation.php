<?php

namespace App\Controllers\Reviewer;

use App\Controllers\BaseController;

class RecordRecommendation extends BaseController
{
  public function index()
  {
    $assignmentID = $this->request->getPost('reviewId');
    $recommendation = $this->request->getPost('recommendation');

    $assignment = $this->reviewAssignmentsModel->where('assignment_id', $assignmentID)->first();

    $data = [
      'recommendation' => $recommendation,
      'article_id' => $assignment["article_id"],
      'reviewer_id' => $assignment["reviewer_id"],
      'date_submit' => date('Y-m-d')
    ];

    $this->reviewAssignmentsModel->whereIn('assignment_id', [$assignmentID])->set($data)->update();
    $this->assignmenstModel->save([
      'assignment_id' => $assignmentID,
      'round' => 2
    ]);

    return redirect()->to(base_url() . '/reviewer/submission/' . $assignmentID);
  }
}
