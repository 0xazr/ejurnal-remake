<?php

namespace App\Controllers\Editor;

use App\Controllers\BaseController;

class SubmissionReview extends BaseController
{
    public function index($article_id)
    {
        if ($assignment = $this->assignmenstModel->where('article_id', $article_id)->first()) {
            if ($assign_editor = $this->usersModel->where('user_id', $assignment['editor_id'])->first()) {
                $data['assign_editor'] = $assign_editor;
            }

            if ($assign_reviewer = $this->usersModel->where('user_id', $assignment['reviewer_id'])->first()) {
                $data['assign_reviewer'] = $assign_reviewer;
            }

            if ($assignment['round'] == 1) {
                $data['request_reviewer'] = $assignment;
            }

            if ($decision = $this->editAssignmentsModel->where('article_id', $article_id)->findAll()) {
                $data['decision_editor'] = $decision;
                $data['decision_select'] = $decision = $this->editAssignmentsModel->where('article_id', $article_id)->first();
            }

            if ($notified = $this->editAssignmentsModel->where('article_id', $article_id)->first()) {
                if ($notified['notified'] == 1) {
                    $data['notified'] = $notified;
                }
            }

            if ($recommendation = $this->reviewAssignmentsModel->where('article_id', $article_id)->first()) {
                $data['sementara'] = $recommendation;
            }
        }

        $type_review_version = [
            'type' => 1,
            'article_id' => $article_id
        ];

        $type_editor_version = [
            'type' => 2,
            'article_id' => $article_id
        ];

        $type_author_version = [
            'type' => 3,
            'article_id' => $article_id
        ];

        $type_reviewer_version = [
            'type' => 4,
            'article_id' => $article_id
        ];

        if ($review_version = $this->articleRevisionFilesModel->where($type_review_version)->orderBy('article_revision_file_id', 'desc')->first()) {
            $data['review_version'] = $review_version;
        }

        if ($editor_version = $this->articleRevisionFilesModel->where($type_editor_version)->orderBy('article_revision_file_id', 'desc')->first()) {
            $data['editor_version'] = $editor_version;
        }

        if ($author_version = $this->articleRevisionFilesModel->where($type_author_version)->orderBy('article_revision_file_id', 'desc')->first()) {
            $data['author_version'] = $author_version;
        }

        if ($reviewer_version = $this->articleRevisionFilesModel->where($type_reviewer_version)->orderBy('article_revision_file_id', 'desc')->first()) {
            $data['reviewer_version'] = $reviewer_version;
        }

        if ($this->articleCommentsModel->where('article_id', $article_id)->findColumn('editor_to_author')[0]) {
            $data['editorToAuthor'] = $this->articleCommentsModel->where('article_id', $article_id)->findColumn('editor_to_author');
        }

        if ($reviewer_to_editor = $this->articleCommentsModel->where('article_id', $article_id)->findColumn('reviewer_to_editor')[0]) {
            $data['comment_from_reviewer'] = $reviewer_to_editor;
        }

        if ($recommendation = $this->reviewAssignmentsModel->where('article_id', $article_id)->first()) {
            $data['recommendation'] = $recommendation;
        }

        if ($copyedit_file = $this->articleCopyedFilesModel->where('article_id', $article_id)->first()) {
            $data['copyedit_file'] = $copyedit_file;
        }

        $data['article'] = $this->articlesModel->find($article_id);
        $data['authors'] = $this->articleAuthorsModel->where('article_id', $data['article']['article_id'])->findAll();
        $data['supplementary_files'] = $this->articleSupplementaryFilesModel->where('article_id', $article_id)->first();

        return view('pages/editor/submissionReview', $data);
    }
}
