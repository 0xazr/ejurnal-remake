<?php

namespace App\Controllers\Author;

use App\Controllers\BaseController;

class UploadCopyeditVersion extends BaseController
{
  /*
    BELUM PERNAH DI TEST APAKAH WORKS ATAU TIDAK
  */

  public function index()
  {
    if (!$this->validate([
      'file_name' => [
        'rules' => 'uploaded[file_name]|mime_in[file_name,application/pdf]|max_size[file_name,20480]',
        'errors' => [
          'uploaded' => 'Harus Ada File yang diupload',
          'mime_in' => 'File Extention Harus Berupa pdf',
          'max_size' => 'Ukuran File Maksimal 10 MB'
        ]
      ]
    ])) {
      session()->setFlashdata('error', $this->validator->listErrors());
      return redirect()->back()->withInput();
    }

    $file = $this->request->getFile('file_name');

    if ($file != NULL) {
      $post = $this->request->getPost();
      $articleID = $post["articleId"];

      $data['article_copyedit_file']['article_id'] = $articleID;

      $this->filesModel->insert([
        'path' => ''
      ]);

      $this->articleCopyedFilesModel->insert($data['article_copyedit_file']);

      $fileID = $this->filesModel->getInsertID();
      $articleCopyeditFileID = $this->articleCopyedFilesModel->getInsertID();

      $count = count($this->articleCopyedFilesModel->where('article_id', $articleID)->findAll());

      $data['article_copyedit_file'] = [
        'file_id' => $fileID,
        'file_name' => $articleID . '-' . $fileID . '-' . $count . '-ED.pdf',
        'original_file_name' => $file->getClientName(),
        'file_size' => $file->getSizeByUnit('kb'),
        'uploader_id' => session()->get('user_id')
      ];

      if ($post['copyeditStage'] == "initital") {
        $data['article_copyedit_file']['step'] = 1;
      } elseif ($post['copyeditStage'] == "author") {
        $data['article_copyedit_file']['step'] = 2;
      } elseif ($post['copyeditStage'] == "final") {
        $data['article_copyedit_file']['step'] = 3;
      } else {
        return redirect()->back();
      }

      $data['file'] = [
        'path' => 'uploads/author/' . $articleID . '/' . $fileID . '/' . $articleID . '-' . $fileID . '-' . $count . '-ED.pdf'
      ];


      if ($this->articleCopyedFilesModel->update($articleCopyeditFileID, $data['article_copyedit_file']) && $this->filesModel->update($fileID, $data['file'])) {
        $file->store('author/' . $articleID . '/' . $fileID, $data['article_copyedit_file']['file_name']);
      }
      return redirect()->to(base_url() . '/author/submissionEditing/' . $articleID);
    }
  }
}
