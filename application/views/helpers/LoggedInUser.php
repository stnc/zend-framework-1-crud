<?php
class Zend_View_Helper_LoggedInUser
{
    public $view;
    
    function setView($view)
    {
        $this->view = $view;
    }
    
    function loggedInUser()
    {
        $auth = Zend_Auth::getInstance();
        if($auth->hasIdentity())
        {
            $logoutUrl = $this->view->url(array('controller'=>'auth', 'action'=>'logout'), 'default', true);
            $userId = (int)Zend_Auth::getInstance()->getIdentity()->id;
            $users = new Users();
            $user = $users->fetchRow('id='.$userId);            
            $username = $this->view->escape($user->name());
            
            $string = 'Logged in as ' . $username;
            $string .= ' | <a href="' . $logoutUrl . '">Log out</a>';
        } else {
            $loginUrl = $this->view->url(array('controller'=>'auth', 'action'=>'identify'), 'default', true);
            $string = '<a href="'. $loginUrl . '">Log in</a>';
        }
        return $string;
    }
    
}