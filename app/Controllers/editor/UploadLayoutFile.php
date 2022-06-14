<?php

namespace App\Controllers\Editor;

use App\Controllers\BaseController;

class UploadLayoutFile extends BaseController
{
  /*
    BELUM PERNAH DI TEST APAKAH WORKS ATAU TIDAK
  */

  public function index()
  {
    if (!$this->validate([
      'layoutFile' => [
        'rules' => 'uploaded[layoutFile]|mime_in[layoutFile,application/pdf]|max_size[layoutFile,20480]',
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

    $file = $this->request->getFile('layoutFile');

    if ($file != NULL) {
      $post = $this->request->getPost();
      $articleID = $post["article_id"];

      $data['article_layout_file']['article_id'] = $articleID;

      $this->filesModel->insert([
        'path' => ''
      ]);

      $fileID = $this->filesModel->getInsertID();

      $data['article_layout_file'] = [
        'file_id' => $fileID,
        'original_file_name' => $file->getClientName(),
        'file_size' => $file->getSizeByUnit('kb'),
        'date_uploaded' => date('Y-m-d'),
        'uploader_id' => session()->get('user_id')
      ];

      if ($post['layoutFileType'] == "submission") {
        $this->articleLayoutFilesModel->insert([
          'article_id' => $articleID,
          'type' => 1
        ]);

        $count = count($this->articleLayoutFilesModel->where('article_id', $articleID)->where('type', 1)->findAll());

        $data['article_layout_file']['file_name'] = $articleID . '-' . $fileID . '-' . $count . '-LE.pdf';
      } elseif ($post['layoutFileType'] == "galley") {
        $this->articleLayoutFilesModel->insert([
          'article_id' => $articleID,
          'type' => 2
        ]);

        $count = count($this->articleLayoutFilesModel->where('article_id', $articleID)->where('type', 2)->findAll());

        $data['article_layout_file']['file_name'] = $articleID . '-' . $fileID . '-' . $count . '-PB.pdf';
      } elseif ($post['layoutFileType'] == "supp") {
        $this->articleLayoutFilesModel->insert([
          'article_id' => $articleID,
          'type' => 3
        ]);

        $count = count($this->articleLayoutFilesModel->where('article_id', $articleID)->where('type', 3)->findAll());

        $data['article_layout_file']['file_name'] = $articleID . '-' . $fileID . '-' . $count . '-SP.pdf';
      } else {
        return redirect()->back();
      }

      $articleLayoutFileID = $this->articleLayoutFilesModel->getInsertID();

      $data['file'] = [
        'path' => 'uploads/editor/' . $data['article_layout_file']['file_name']
      ];


      if ($this->articleLayoutFilesModel->update($articleLayoutFileID, $data['article_layout_file']) && $this->filesModel->update($fileID, $data['file'])) {
        $file->store('editor/' . $articleID . '/' . $fileID, $data['article_layout_file']['file_name']);
      }
      return redirect()->to(base_url() . '/editor/submissionEditing/' . $articleID);
    }
  }
}
