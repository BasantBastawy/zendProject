<?php

class CourseController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

     public function indexAction()
    {
        // action body
        $user = new Application_Model_DbTable_User();
        $this->view->course = $course->fetchAll();
    }

    public function addAction()
    {
        // action body
        $form=new Application_Form_Course();
        $form->submit->setLabel('Add');
        $this->view->form=$form;
        if($this->getRequest()->isPost()){
            $formData=$this->getRequest()->getPost();
            if($form->isValid($formData)){
                $coursename=$form->getValue('Coursename');
                $course=new Application_Model_DbTable_Course();
                $course->addCourse($coursename,$category_id);
            }
        }
    }

    public function editAction()
    {
        // action body
        $form=new Application_Form_Course();
        $form->submit->setLabel('Save');
        $this->view->form=$form;
        if($this->getRequest()->isPost()){
            $formData=$this->getRequest()->getPost();
            if($form->isValid($formData)){
                $course=new Application_Model_DbTable_Course();
                $course->updateCourse($,$)
                $this->_helper->redirector('index');
            }else{
                $form->populate($formData);
            }
        }else {
            $id = $this->_getParam('id', 0);
            if ($id > 0){
                $course = new Application_Model_DbTable_Course();
                $form->populate($course->getCourse($id));
                 }}

}

    public function deleteAction()
    {
        if ($this->getRequest()->isPost()) {
            $del = $this->getRequest()->getPost('del');
            if ($del == 'Yes') {
                $id = $this->getRequest()->getPost('id');
                $user = new Application_Model_DbTable_User();
                $user->deleteUser($id);
                }
                $this->_helper->redirector('index');
                } else {
                    $id = $this->_getParam('id', 0);
                    $course = new Application_Model_DbTable_Course();
                    //edited
                    $this->view->course = $course->getCourse($id);
                    }

    }

}









