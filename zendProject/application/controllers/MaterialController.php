<?php

class MaterialController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
        $material = new Application_Model_DbTable_Material();
        $this->view->materials = $material->fetchAll();
    }

    public function addAction($name, $file_path, $type,$is_downloadable,
    			 $is_hidden,$downloads_count,$course_id,$user_id)
    {
        $form=new Application_Form_Material();
        $form->submit->setLabel('Add');
        $this->view->form=$form;
        if($this->getRequest()->isPost()){
            $formData=$this->getRequest()->getPost();
            if($form->isValid($formData)){
                $name=$form->getValue('name');
                $file_path=$form->getValue('file_path');
                $type=$form->getValue('type');
                $is_downloadable=$form->getValue('is_downloadable');
                $is_hidden=$form->getValue('is_hidden');
                $downloads_count=$form->getValue('downloads_count');
                $course_id=$form->getValue('course_id');
                $user_id=$form->getValue('user_id');

                $user=new Application_Model_DbTable_Material();
                $user->addUser($name, $file_path, $type,$is_downloadable,
    			 $is_hidden,$downloads_count,$course_id,$user_id);
                $this->_helper->redirector('index');
            }
            else{
                $form->populate($formData);
            }
        }
    }

    public function deleteAction()
    {
        $user = new Application_Model_DbTable_Category();
        $id = $this->getRequest()->getParam('id');
        if($user->deleteCategory($id))
            $this->redirect('Category/index');
    }

    public function listAction()
    {
        // action body
    }

    public function editAction()
    {
        // action body
    }


}






