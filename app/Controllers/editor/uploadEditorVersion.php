<?php

namespace App\Controllers\Editor;

use App\Controllers\BaseController;

class uploadEditorVersion extends BaseController
{
  public function index()
  {
    $articleID = $this->request->getPost('article_id');

    $validationRule = [
      'file_name' => [
        'rules' => 'uploaded[file_name]|mime_in[file_name,application/pdf]|max_size[file_name,20480]',
        'errors' => [
          'uploaded' => 'Harus Ada File yang diupload',
          'mime_in' => 'File Extention Harus Berupa pdf',
          'max_size' => 'Ukuran File Maksimal 20 MB'
        ]
      ]
    ];

    if (!$this->validate($validationRule)) {
      session()->setFlashdata('error', $this->validator->listErrors());
      return redirect()->back()->withInput();
    }

    $file = $this->request->getFile('file_name');

    if ($file != NULL) {
      $data["article_revision_file"]["article_id"] = $articleID;

      $this->filesModel->insert([
        'path' => ''
      ]);

      $this->articleRevisionFilesModel->insert($data["article_revision_file"]);

      $fileID = $this->filesModel->getInsertID();
      $articleRevisionFileID = $this->articleRevisionFilesModel->getInsertID();

      $count = count($this->articleRevisionFilesModel->where('article_id', $articleID)->findAll());

      $data["article_revision_file"] = [
        'file_id' => $fileID,
        'file_name' => $articleID . '-' . $fileID . '-' . $count . '-RV.pdf',
        'original_file_name' => $file->getClientName(),
        'file_size' => $file->getSizeByUnit('kb'),
        'uploader_id' => session()->get('user_id'),
        'type' => 2
      ];

      $data["file"] = [
        'path' => 'uploads/editor/' . $articleID . '/' . $fileID . '/' . $articleID . '-' . $fileID . '-' . $count . '-RV.pdf'
      ];

      if ($this->articleRevisionFilesModel->update($articleRevisionFileID, $data['article_revision_file']) && $this->filesModel->update($fileID, $data['file'])) {
        $file->store('editor/' . $articleID . '/' . $fileID, $data['article_revision_file']['file_name']);
      }

      return redirect()->to('editor/submissionReview/' . $articleID);
    }
  }
}
