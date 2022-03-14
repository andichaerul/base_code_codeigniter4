<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\HTTP\RedirectResponse;

class AuthController extends BaseController
{
    public function index(): string
    {
        return view('v_login');
    }

    public function auth(): RedirectResponse
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $userModel = new UserModel;
        $user = $userModel->builder()
            ->where('users_username', $username)
            ->get()
            ->getFirstRow();
        if ($user) {
            if (password_verify($password, $user->users_password)) {
                $this->setSession($user);
                return redirect()->to(base_url("/"));
            }
        }
        session()->setFlashdata("error", "Username atau password salah");
        return redirect()->back();
    }

    private function setSession(object $user): void
    {
        session()->set([
            "is_login" => true,
            "nama_lengkap" => $user->users_nama_lengkap
        ]);
    }
}
