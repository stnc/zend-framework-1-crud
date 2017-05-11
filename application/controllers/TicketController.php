<?php

class TicketController extends Zend_Controller_Action
{

    /**
     * Get flash messages and pass to the view.
     */
    public function init()
    {
        if ($this->_helper->FlashMessenger->hasMessages()) {
            $this->view->messages = $this->_helper->FlashMessenger->getMessages();
        }
    }

    /**
     * cvs import
     */
    public function cvsexportAction()
    {
        $blogTopic = new Application_Model_TicketMapper();
        Zend_Controller_Action_HelperBroker::addPath(APPLICATION_PATH . '/helpers');

        // $twice = $this->_helper->multiples->thrice(30);//helper testi

        $this->_helper->viewRenderer->setNoRender();
        $this->_helper->Csv($blogTopic->fetchAllCvs(), "tickets");

    }

    /**
     * Display the all tickets
     */
    public function indexAction()
    {
        $blogTopic = new Application_Model_TicketMapper();
        $this->view->blogTopics = $blogTopic->fetchAllTopics();


        /*   $result = $blogTopic->fetchAllTopics();
           $this->paginator = Zend_View_Helper_PaginationControl::setDefaultViewPartial('controls.phtml');
           $paginator = Zend_Paginator::factory($result);

           $paginator->setItemCountPerPage(2);
           $paginator->setPageRange(5);
           $paginator->setCurrentPageNumber($this->_getParam('page'));
           $this->view->paginator=$paginator;*/

        // For meta title.
        $this->view->dataname = 'View tickets';
    }

    /**
     * Save/Update tixkets
     */
    public function saveAction()
    {
        $form = new Application_Form_TopicBootstrapForm();

        $request = $this->getRequest();
        if ($this->getRequest()->isPost()) {
            if ($form->isValid($request->getPost())) {

                $blogTopicId = $this->getRequest()->getParam('id');
                $blogFormData = new Application_Model_Ticket($form->getValues());
                $blogMapper = new Application_Model_TicketMapper();

                $upload = new Zend_File_Transfer_Adapter_Http();

                try { //be sure to call receive() before getValues()
                    $upload->receive();
                } catch (Zend_File_Transfer_Exception $e) {
                    $e->getMessage();
                }

                //  $formData = $form->getValues(); //be sure to call this after receive()

                $filename = $upload->getFileName('files'); //optional info about uploaded file

                $filename = basename($filename);

                $uniqueToken = md5(uniqid(mt_rand(), true));
                $filterRename = new Zend_Filter_File_Rename(array('target' => UPLOAD_PATH . '/' . $uniqueToken . $filename, 'overwrite' => false));
                $upload->addFilter($filterRename);

                /*
                print_r($blogFormData);
                die;
                */
                if (trim($blogTopicId) >= 1) {
                    // For update the record.
                    if ($blogMapper->saveTopic($blogFormData)) {
                        $this->_helper->FlashMessenger->addMessage(array('success' => "Ticket has been successfully updated."));
                        $this->_redirect('/');
                    } else {
                        $this->_helper->FlashMessenger->addMessage(array('danger' => "Some error occurred while updating ticxket, Please try after some time."));
                        $this->_redirect('/');
                    }
                } else {
                    // For insert new record.
                    if ($blogMapper->saveTopic($blogFormData)) {
                        $this->_helper->FlashMessenger->addMessage(array('success' => "Ticket has been successfully posted."));
                        $this->_redirect('/');
                    } else {
                        $this->_helper->FlashMessenger->addMessage(array('danger' => "Some error occurred while posting tickets, Please try after some time."));
                        $this->_redirect('/');
                    }
                }
            }
        }

        //     $this->view->maxUploadFileSize = ini_get('upload_max_filesize');
        //      $this->view->postMaxSize = ini_get('post_max_size');


        // For meta title.
        $this->view->dataname = 'Add ticket';
        $this->view->blogTopicForm = $form;
    }

    /**
     * Edit tickets
     */
    public function editAction()
    {
        $request = $this->getRequest();
        $form = new Application_Form_TopicBootstrapForm();

        if ($this->getRequest()->isGet()) {

            $blogTopicId = $this->getRequest()->getParam('id');
            $blogFormData = new Application_Model_Ticket($form->getValues());
            $blogMapper = new Application_Model_TicketMapper();

            $editTopic = $blogMapper->findTopic($blogTopicId, $blogFormData);
            $this->view->blogTopicEditForm = $form->populate($editTopic->toArray());
        }

        // For meta title.
        $this->view->dataname = 'Edit ticket';
    }

    /**
     * Delete tickets
     */
    public function deleteAction()
    {
        $request = $this->getRequest();
        if ($this->getRequest()->isGet()) {
            $blogTopicId = $this->getRequest()->getParam('id');
            $modelObj = new Application_Model_TicketMapper();
            if ($modelObj->deleteTopic($blogTopicId)) {
                $this->_helper->FlashMessenger->addMessage(array('success' => "Ticket has been successfully deleted."));
                $this->_redirect('/');
            } else {
                $this->_helper->FlashMessenger->addMessage(array('danger' => "Some error occurred while deleting ticket, Please try after some time."));
                $this->_redirect('/');
            }
        }

        // For meta title.
        $this->view->dataname = 'Delete ticket';
    }


}

