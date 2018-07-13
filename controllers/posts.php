<?php
class Posts extends Controller
{
    protected function Index()
    {
        $viewModel = new PostModel();
        $this->returnView($viewModel->Index(), true);
    }
}
