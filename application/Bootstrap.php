<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{



    /**
     * Init the doctype.
     */
    protected function _initDoctype()
    {
        $this->bootstrap('view');
        $view = $this->getResource('view');
        $view->doctype('XHTML1_STRICT');
    }


    /**
     * Application routing
     */
    protected function _initRoutes()
    {

        // Action Helpers
        Zend_Controller_Action_HelperBroker::addPath( APPLICATION_PATH .'/controllers/helpers');

       // $hooks = Zend_Controller_Action_HelperBroker::getStaticHelper('Hooks');
///
        $router = Zend_Controller_Front::getInstance()->getRouter();
        include APPLICATION_PATH . "/configs/routes.php";
    }


    protected function _initUploadDirAndConstant()
    {
        $uploadPath = APPLICATION_PATH . '/uploads';
        if (!file_exists($uploadPath)) {
            if (!mkdir($uploadPath)) {
                throw new Exception('Cannot make the following directorry: ' . $uploadPath);
            }
        }
        // if $uploadPath was created than define a constant
        defined('UPLOAD_PATH') || define('UPLOAD_PATH', APPLICATION_PATH . '/uploads');
    }


}

