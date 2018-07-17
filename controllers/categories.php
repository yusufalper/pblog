<?php
class Categories extends Controller
{
    protected function Index()
    {
        $viewModel = new CategoryModel();
        $this->returnView($viewModel->Index(), true);
    }

    protected function selected()
    {
        $viewModel = new CategoryModel();
        $this->returnView($viewModel->selected(), true);
    }
}
