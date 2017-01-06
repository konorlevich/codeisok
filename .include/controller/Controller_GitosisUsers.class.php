<?php

class GitPHP_Controller_GitosisUsers extends GitPHP_Controller_GitosisBase
{
    protected $_edit_user;

    protected function ReadQuery()
    {
        if (isset($_GET['id']) && is_string($_GET['id'])) {
            if (isset($_GET['delete'])) {
                $this->ModelGitosis->removeUser((int)$_GET['id']);
            } else {
                $this->_edit_user = $this->ModelGitosis->getUser((int)$_GET['id']);
            }
        }

        if (count($_POST)) {
            $username = empty($_POST['username']) || !is_string($_POST['username']) ? '' : $_POST['username'];
            $username = trim($username);

            $public_key = empty($_POST['public_key']) || !is_string($_POST['public_key']) ? '' : $_POST['public_key'];
            $public_key = trim($public_key);

            if (!$username) {
                $this->_form_errors[] = 'Username can not be empty.';
            }
            if (!$public_key) {
                $this->_form_errors[] = 'Public key can not be empty.';
            }

            if ($username && $public_key) {
                $this->ModelGitosis->saveUser($username, $public_key);
                $this->redirect('/?a=gitosis&section=users');
            }

            $this->_edit_user = $_POST;
        }
    }

    protected function LoadData()
    {
        parent::LoadData();

        $this->tpl->assign('users', $this->ModelGitosis->getUsers());

        $this->tpl->assign('edit_user', $this->_edit_user);
    }
}
