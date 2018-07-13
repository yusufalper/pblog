<?php
class Home extends Controller
{
    protected function Index()
    {
        $viewModel = new HomeModel();
        $this->returnView($viewModel->Index(), true);
    }
}
