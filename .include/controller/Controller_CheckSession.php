<?php

class GitPHP_Controller_CheckSession extends GitPHP_ControllerBase
{
    protected function GetTemplate()
    {
    }

    protected function GetCacheKey()
    {
    }

    public function GetName($local = false)
    {
    }

    protected function ReadQuery()
    {
    }

    protected function LoadData()
    {
    }

    protected function LoadHeaders()
    {
        $this->headers[] = 'Content-Type: application/json; charset=UTF-8';
    }

    public function Render()
    {
        $response = array('success' => true);
        echo json_encode($response);
        die;
    }
}
