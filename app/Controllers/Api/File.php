<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\fileModel;

class File extends BaseController
{
    public function upload()
    {
        session();
        if (isset($_SESSION['email'])) {
            if ($this->request->isAJAX()) {
                $file = $this->request->getFile('uploadedFile');
                if (isset($file)) {
                    $fileValidationRule = [
                        'uploadedFile' => [
                            'label' => 'Selected file',
                            'rules' => 'uploaded[uploadedFile]'
                                . '|mime_in[uploadedFile,image/jpg,image/jpeg,application/pdf]'
                                . '|max_size[uploadedFile,2000]',
                        ],
                    ];
                    if (!$this->validate($fileValidationRule)) {
                        $data = ['errors' => $this->validator->getErrors()];
                        $json             = array();
                        $json['status']   = "error";
                        $json['text']     = $data['errors']['uploadedFile'];
                        $json['script'][] = "$('#uploadedFile').addClass('is-invalid');";
                        echo json_encode($json);
                        exit;
                    }
                    $fileName = $file->getName();
                    $fileSize = $file->getSize();
                    $fileType = $file->getClientExtension();
                    $file->move('upload');
                    if ($file->hasMoved()) {
                        $data         = array();
                        $data['name'] = $fileName;
                        $data['type'] = $fileType;
                        $data['size'] = $fileSize;
                        $fileModel    = new fileModel();
                        $fileModel->save($data);
                        $allFiles     = $fileModel->findAll();
                        $json['data']     = $allFiles;
                        $json['status']   = "success";
                        $json['text']     = "File uploaded!";
                        $json['script'][] = "$('#uploadedFile').val('');";
                        $json['script'][] = "A1.files = msg.data;";
                        $json['script'][] = "buildFileTable();";
                    } else {
                        $json['status']   = "error";
                        $json['text']     = "Something went to wrong!";
                    }
                    echo json_encode($json);
                    exit;
                }
            } else {
                $json['status']   = "error";
                $json['text']     = "This is for ajax!";
                echo json_encode($json);
                exit;
            }
        } else {
            $json             = array();
            $json['status']   = "error";
            $json['text']     = "You should login!";
            echo json_encode($json);
            exit;
        }
    }

    public function list()
    {
        session();

        if (isset($_SESSION['email'])) {
            if ($this->request->isAJAX()) {
                $file = new fileModel();
                $files = $file->findAll();
                $json               = array();
                $json['data']       = $files;
                $json['script'][]   = "A1.files = msg.data";
                $json['script'][]   = "buildFileTable();";
                echo json_encode($json);
                exit;
            } else {
                $json['status']   = "error";
                $json['text']     = "This is for ajax!";
                echo json_encode($json);
                exit;
            }
        } else {
            $json             = array();
            $json['status']   = "error";
            $json['text']     = "You should login!";
            echo json_encode($json);
            exit;
        }
    }

    public function delete()
    {

        session();
        if (isset($_SESSION['email'])) {
            if ($this->request->isAJAX()) {
                $data   = json_decode($this->request->getPostGet()['data'], true);
                $file   = new fileModel();
                $result = $file->where('id', $data['id'])->delete();
                $json   = array();
                if ($result) {
                    unlink('upload/' . $data['name']);
                    $allFiles         = $file->findAll();
                    $json['data']     = $allFiles;
                    $json['status']   = "success";
                    $json['text']     = "File uploaded!";
                    $json['script'][] = "A1.files = msg.data;";
                    $json['script'][] = "buildFileTable();";
                } else {
                    $json['status']   = "error";
                    $json['text']     = "Data couldn't delete!";
                }
                echo json_encode($json);
                exit;
            } else {
                $json['status']   = "error";
                $json['text']     = "This is for ajax!";
                echo json_encode($json);
                exit;
            }
        } else {
            $json             = array();
            $json['status']   = "error";
            $json['text']     = "You should login!";
            echo json_encode($json);
            exit;
        }
    }
}
