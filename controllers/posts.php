<?php
class Posts extends Controller
{
    protected function Index()
    {
        $viewModel = new PostModel();
        $this->returnView($viewModel->Index(), true);
    }

    protected function add()
    {
        if (!isset($_SESSION['is_logged_in'])) {
            header('Location: ' . ROOT_URL . 'shares');
        }
        $viewModel = new PostModel();
        $this->returnView($viewModel->add(), true);
    }

    protected function details()
    {
        $viewModel = new PostModel();
        $this->returnView($viewModel->details(), true);
    }

    protected function myposts()
    {
        $viewModel = new PostModel();
        $this->returnView($viewModel->myposts(), true);
    }

    protected function delete()
    {
        $viewModel = new PostModel();
        $this->returnView($viewModel->delete(), true);
    }
}