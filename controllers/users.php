<?php
class Users extends Controller
{
    protected function register()
    {
        if (isset($_SESSION['is_logged_in'])) {
            header('Location: ' . ROOT_URL . 'users/profile');
        }
        $viewModel = new UserModel();
        $this->returnView($viewModel->register(), true);
    }

    protected function login()
    {
        if (isset($_SESSION['is_logged_in'])) {
            header('Location: ' . ROOT_URL . 'users/profile');
        }
        $viewModel = new UserModel();
        $this->returnView($viewModel->login(), true);
    }

    protected function logout()
    {
        unset($_SESSION["is_logged_in"]);
        unset($_SESSION["user_data"]);
        unset($_SESSION["post_id"]);
        session_destroy();

        header('Location: ' . ROOT_URL);
    }

    protected function profile()
    {
        if (!isset($_SESSION['is_logged_in'])) {
            header('Location: ' . ROOT_URL . 'users/login');
        }
        $viewModel = new UserModel();
        $this->returnView($viewModel->profile(), true);
    }

    protected function settings()
    {
        if (!isset($_SESSION['is_logged_in'])) {
            header('Location: ' . ROOT_URL . 'users/login');
        }
        $viewModel = new UserModel();
        $this->returnView($viewModel->settings(), true);
    }

    protected function cpassword()
    {
        if (!isset($_SESSION['is_logged_in'])) {
            header('Location: ' . ROOT_URL . 'users/login');
        }
        $viewModel = new UserModel();
        $this->returnView($viewModel->cpassword(), true);
    }
}
