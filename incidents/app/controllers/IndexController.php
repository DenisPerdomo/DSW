<?php
/**
 * Pages
 */
class IndexController extends Controller
{
    public function index()
    {
        $this->view('pages/home');
    }
}