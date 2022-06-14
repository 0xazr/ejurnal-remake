<?php

namespace App\Controllers\Author;

use App\Controllers\BaseController;

class SaveSubmit extends BaseController
{
  public function index($page = 1, $articleID = 0)
  {
    switch ($page) {
      case 1:
        $article_comments = $this->request->getPost()['commentsToEditor'];

        if ($this->articlesModel->where('article_id', $articleID)->first() == NULL) {
          $data['article']['progress'] = $page;
          $data['article']['submitter_id'] = session()->get('user_id');
          $data['article']['status'] = 'Incomplete';
          $this->articlesModel->insert($data['article']);
          $articleID = $this->articlesModel->getInsertID();
          $data['article_comments'] = [
            'author_to_editor' => $article_comments,
            'article_id' => $articleID,
          ];

          $this->articleCommentsModel->insert($data['article_comments']);
        } else {
          $articleID = $articleID;
        }

        return redirect()->to(base_url() . '/author/submit/2/' . $articleID);
        break;

      case 2:
        $validationRule = [
          'submissionFile' => [
            'label' => 'Submission File',
            'rules' => 'uploaded[submissionFile]'
              . '|mime_in[submissionFile,application/pdf]'
          ],
        ];

        if (!$this->validate($validationRule)) {
          return redirect()->to(base_url() . '/author/submit/2/' . $articleID . '?error=pdf+only');
        }

        $file = $this->request->getFile('submissionFile');

        if ($file != NULL) {
          $data['article_submission_file']['article_id'] = $articleID;

          $this->filesModel->insert([
            'path' => ''
          ]);
          $this->articleSubmissionFilesModel->insert($data['article_submission_file']);

          $fileID = $this->filesModel->getInsertID();
          $articleSubmissionFileID = $this->articleSubmissionFilesModel->getInsertID();

          $count = count($this->articleSubmissionFilesModel->where('article_id', $articleID)->findAll());

          $data['article_submission_file'] = [
            'file_id' => $fileID,
            'file_name' => $articleID . '-' . $fileID . '-' . $count . '-SM.pdf',
            'original_file_name' => $file->getClientName(),
            'file_size' => $file->getSizeByUnit('kb'),
            'uploader_id' => session()->get('user_id')
          ];

          $data['file'] = [
            'path' => 'uploads/author/' . $articleID . '/' . $fileID . '/' . $articleID . '-' . $fileID . '-' . $count . '-SM.pdf'
          ];


          if ($this->articleSubmissionFilesModel->update($articleSubmissionFileID, $data['article_submission_file']) && $this->filesModel->update($fileID, $data['file'])) {
            $file->store('author/' . $articleID . '/' . $fileID, $data['article_submission_file']['file_name']);
          }

          $data['article']['progress'] = $page;
          $this->articlesModel->update($articleID, $data['article']);

          return redirect()->to(base_url() . '/author/submit/2/' . $articleID);
        }
        break;
      case 3:
        $post = $this->request->getPost();
        if (isset($post['addAuthor'])) {
          $authors = $post['authors'];

          foreach ($authors as $author) {
            $data['authors'] = [
              'first_name' => $author['firstName'],
              'middle_name' => $author['middleName'],
              'last_name' => $author['lastName'],
              'url' => $author['url'],
              'email' => $author['email'],
              'affiliation' => $author['affiliation'],
              'country' => $author['country'],
              'bio' => $author['biography'],
              'article_id' => $articleID
            ];

            // Jika belum submit pertama kali
            if (strlen($author['authorId']) == 0) {
              // Submit Author First
              $this->articleAuthorsModel->insert($data['authors']);

              // Lalu, ambil author_id
              $authorID = $this->articleAuthorsModel->getInsertID();
            } else {
              $this->articleAuthorsModel->update($author['authorId'], $data['authors']);
              $authorID = $author['authorId'];
            }
          }
          return redirect()->back()->withInput();
        } else if (isset($post['submitArticle'])) {
          $authors = $post['authors'];

          foreach ($authors as $author) {
            $data['authors'] = [
              'first_name' => $author['firstName'],
              'middle_name' => $author['middleName'],
              'last_name' => $author['lastName'],
              'url' => $author['url'],
              'email' => $author['email'],
              'affiliation' => $author['affiliation'],
              'country' => $author['country'],
              'bio' => $author['biography'],
              'article_id' => $articleID
            ];

            // Jika belum submit pertama kali
            if (strlen($author['authorId']) == 0) {
              // Submit Author First
              $this->articleAuthorsModel->insert($data['authors']);

              // Lalu, ambil author_id
              $authorID = $this->articleAuthorsModel->getInsertID();
            } else {
              $this->articleAuthorsModel->update($author['authorId'], $data['authors']);
              $authorID = $author['authorId'];
            }
          }

          $article = $post['article'];

          $data['article'] = [
            'title' => $article['title'],
            'abstract' => $article['abstract'],
            'keyword' => $article['keyword'],
            'language' => $article['language'],
            'support' => $article['sponsor'],
            'reference' => $article['references'],
            'progress' => $page
          ];


          $this->articlesModel->update($articleID, $data['article']);

          return redirect()->to(base_url() . '/author/submit/4/' . $articleID);
        }
        break;

      case 4:
        $validationRule = [
          'submissionSuppFile' => [
            'label' => 'Submission Supplementary File',
            'rules' => 'uploaded[uploadSuppFile]'
              . '|mime_in[uploadSuppFile,application/pdf]'
          ],
        ];

        if (!$this->validate($validationRule)) {
          return redirect()->to(base_url() . '/author/submit/4/' . $articleID . '?error=pdf+only');
        }

        $file = $this->request->getFile('uploadSuppFile');

        if ($file != NULL) {
          // Buat article_id baru
          $data['article_supplementary_file']['article_id'] = $articleID;

          $this->filesModel->insert([
            'path' => ''
          ]);
          $this->articleSupplementaryFilesModel->insert($data['article_supplementary_file']);

          $fileID = $this->filesModel->getInsertID();
          $articleSupplementaryFileID = $this->articleSupplementaryFilesModel->getInsertID();

          $count = count($this->articleSupplementaryFilesModel->where('article_id', $articleID)->findAll());

          // Update fileinfo menggunakan submission id
          $data['article_supplementary_file'] = [
            'file_id' => $fileID,
            'file_name' => $articleID . '-' . $fileID . '-' . $count . '-SP.pdf',
            'original_file_name' => $file->getClientName(),
            'file_size' => $file->getSizeByUnit('kb'),
            'file_address' => 'uploads/author/' . $articleID . '/' . $fileID . '/' . $articleID . '-' . $fileID . '-' . $count . '-SP.pdf',
            'uploader_id' => session()->get('user_id')
          ];

          if ($this->articleSupplementaryFilesModel->update($articleSupplementaryFileID, $data['article_supplementary_file'])) {
            $file->store('author/' . $articleID . '/' . $fileID, $data['article_supplementary_file']['file_name']);
          }

          $data['article']['progress'] = $page;
          $this->articlesModel->update($articleID, $data['article']);

          return redirect()->to(base_url() . '/author/submit/4/' . $articleID);
        }
        break;

      case 5:
        $this->articlesModel->whereIn('article_id', [$articleID])->set(['status' => 'Waiting Assignment'])->update();

        $data['article']['progress'] = $page;
        $data['article']['date_submit'] = date("Y-m-d H:i:s");
        $this->articlesModel->update($articleID, $data['article']);

        return redirect()->to(base_url() . '/author/');
        break;
    }

    if ($page != 1 && $this->articlesModel->where('article_id', $articleID)->first() == NULL) {
      return redirect()->to(base_url() . '/author/submit/1');
    }
  }
}
