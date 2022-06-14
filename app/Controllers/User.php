<?php

namespace App\Controllers;

use App\Models\UsersModel;

class User extends BaseController
{
    ////////////////////////////////////
    //// Untuk validasi login user
    ////////////////////////////////////
    public function login()
    {
        helper(['form']);
        $data = [];
        // validasi login user
        if ($this->request->getMethod() == 'post') {
            // mengambil data dr database
            $model = new UsersModel();

            // mendapatkan inputan user
            $username = $this->request->getVar('username');
            $password = $this->request->getVar('password');

            // mencocokkan inputan user dengan data di database
            $user = $model->where('username', $username)->first();

            // mengambil data user

            if ($user) {
                if (password_verify($password, $user['password'])) {
                    $this->setUserSession($user);

                    // $this->usersModel->update([
                    //     'user_id' => session()->get('user_id'),
                    //     'last_login' => date('Y-m-d H:i:s'),
                    // ]);
                    $this->usersModel
                        ->whereIn('user_id', [session()->get('user_id')])
                        ->set(['last_login' => date('Y-m-d H:i:s')])
                        ->update();

                    // return redirect()->to(base_url('home'));
                    if ($user['role'] == "author") {
                        return redirect()->to(base_url('author'));

                        // jika role = editor
                    } else if ($user['role'] == "editor") {
                        return redirect()->to(base_url('editor'));

                        // jika role = reviewer
                    } else if ($user['role'] == "reviewer") {
                        return redirect()->to(base_url('reviewer'));
                    }

                    // jika role = admin
                    else if ($user['role'] == "admin") {
                        return redirect()->to(base_url('admin'));
                    }
                } else {
                    if (!password_verify($password, $user['password'])) {
                        session()->setFlashdata('error', 'Password salah');
                        return redirect()->back()->withInput();
                    } else {
                        session()->setFlashdata('error', 'Username & Password Salah');
                        return redirect()->back();
                    }
                }
            } else {
                session()->setFlashdata('error', 'Username & Password Salah');
                return redirect()->back();
            }
        }
    }

    ////////////////////////////////////
    //// Untuk set session pada login user
    ////////////////////////////////////
    private function setUserSession($user)
    {
        // mengambil data user
        $data = [
            'user_id' => $user['user_id'],
            'username' => $user['username'],
            'password' => $user['password'],
            'isLoggedIn' => true,
            'role' => $user['role'],
            'email' => $user['email'],
        ];

        // session dari user
        session()->set($data);
        return true;
    }

    ////////////////////////////////////
    //// Untuk logout user
    ////////////////////////////////////
    public function logout()
    {
        session()->destroy();
        // di redirect ke view login
        return redirect()->to(base_url('/'));
    }

    ////////////////////////////////////
    //// Untuk register new account
    ////////////////////////////////////
    public function daftar()
    {
        // validasi pengecekan data
        if (!$this->validate([
            'username' => [
                'rules' => 'required|min_length[4]|max_length[20]|is_unique[users.username]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 20 Karakter',
                    'is_unique' => 'Username sudah digunakan sebelumnya'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[4]|max_length[50]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 50 Karakter',
                ]
            ],
            'password_conf' => [
                'rules' => 'matches[password]',
                'errors' => [
                    'matches' => 'Konfirmasi Password tidak sesuai dengan password',
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email|is_unique[users.email]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'valid_email' => '{field} Tidak Valid',
                    'is_unique' => 'Email sudah digunakan sebelumnya'
                ]
            ],
            'role' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi',
                ]
            ],
        ])) {
            // jika tidak sesuai akan ditampilkan error nya
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        // $users = new UsersModel()
        $this->usersModel->insert([
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
            'role' => $this->request->getPost('role'),
            'email' => $this->request->getVar('email'),
            'first_name' => $this->request->getVar('first_name'),
            'last_name' => $this->request->getVar('last_name'),
        ]);

        // rediirect ke view login
        return redirect()->to(base_url('/'));
    }
}
