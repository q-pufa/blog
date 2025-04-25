<?php

namespace App\Controllers;

use App\Models\User;

class UserController extends BaseController
{

    public function register()
    {
        if (request()->isPost()) {
            $model = new User();
            $model->loadData();
            if (isset($_FILES['avatar'])) {
                $model->attributes['avatar'] = $_FILES['avatar'];
            } else {
                $model->attributes['avatar'] = [];
            }

            if (!$model->validate()) {
                return view('users/register', ['title' => 'Register', 'errors' => $model->getErrors()], 'user');
            }

            if ($model->saveUser()) {
                session()->setFlash('success', 'You have successfully registered');
                response()->redirect(LOGIN_PAGE);
            } else {
                session()->setFlash('error', 'Error registration');
            }
        }
        return view('users/register', ['title' => 'Register'], 'user');
    }

    public function login()
    {
        if (request()->isPost()) {
            $model = new User();
            $model->loadData();
            if (!$model->validate($model->attributes, [
                'email' => ['required' => true],
                'password' => ['required' => true],
            ])) {
                echo json_encode(['status' => 'error', 'data' => $model->listErrors()]);
                die;
            }

            if ($model->auth()) {
                session()->setFlash('success', 'You have successfully logged');
                echo json_encode(['status' => 'success', 'data' => base_url('/')]);
            } else {
                echo json_encode(['status' => 'error', 'data' => 'Incorrect email or password']);
            }
            die;
//            $model = new User();
//            $model->loadData();
//            if (!$model->validate($model->attributes, [
//                'email' => ['required' => true],
//                'password' => ['required' => true],
//            ])) {
//                return view('users/login', ['title' => 'Login', 'errors' => $model->getErrors()], 'user');
//            }
//
//            if ($model->auth()) {
//                session()->setFlash('success', 'You have successfully logged');
//                response()->redirect(base_url('/'));
//            } else {
//                session()->setFlash('error', 'Incorrect email or password');
//                response()->redirect(LOGIN_PAGE);
//            }
        }
        return view('users/login', ['title' => 'Login'], 'user');
    }

    public function logout()
    {
        if (check_auth()) {
            session()->forget('user');
        }
        response()->redirect(LOGIN_PAGE);
    }

}