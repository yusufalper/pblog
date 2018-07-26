<?php
class Search extends Controller
{
    protected function Index()
    {
        $viewModel = new searchModel();
        $this->returnView($viewModel->Index(), true);
    }
}