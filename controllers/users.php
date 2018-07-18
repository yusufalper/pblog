<?php
class Users extends Controller
{
    protected function register()
    {
        $viewModel = new UserModel();
        $this->returnView($viewModel->register(), true);
    }

    protected function login()
    {
        $viewModel = new UserModel();
        $this->returnView($viewModel->login(), true);
    }

    protected function logout()
    {
        unset($_SESSION["is_logged_in"]);
        unset($_SESSION["user_data"]);
        session_destroy();

        header('Location: ' . ROOT_URL);
    }

    protected function profile()
    {
        $viewModel = new UserModel();
        $this->returnView($viewModel->profile(), true);
    }

    protected function settings()
    {
        $viewModel = new UserModel();
        $this->returnView($viewModel->settings(), true);
    }

    protected function cpassword()
    {
        $viewModel = new UserModel();
        $this->returnView($viewModel->cpassword(), true);
    }
}
