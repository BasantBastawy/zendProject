<?php
use Zend\Form\Element;
use Zend\Form\Form;
class Application_Form_Category extends Zend_Form
{
    public function init()
    {       
        /* Form Elements & Other Definitions Here ... */
        $this->setName('Material');
        $id=new Zend_Form_Element_Hidden('id');
        $id->addFilter('Int');
        
        $user_id=new Zend_Form_Element_Hidden('course_id');
        $user_id->addFilter('Int');

        $course_id=new Zend_Form_Element_Hidden('id');
        $course_id->addFilter('Int');

        $file_path=new Zend_Form_Element_Text('file_path');
        $file_path->setLabel('file_path')
    			 ->setRequired('true')
    			 ->addFilter('stripTags')
    			 ->addFilter('stringTrim')
    			 ->addValidator('NotEmpty');


        $type=new Zend_Form_Element_Text('type');
        $type->setLabel('type')
    			 ->setRequired('true')
    			 ->addFilter('stripTags')
    			 ->addFilter('stringTrim')
    			 ->addValidator('NotEmpty');

		$is_downloadable = new Zend_Form_Element_Radio('is_downloadable');
	    $is_downloadable->setLabel('Hidden:')
	      ->addMultiOptions(array(
	        '1' => 'downloadable',
	       
	      ));
		$is_hidden = new Zend_Form_Element_Radio('is_hidden');
	    $is_hidden->setLabel('Hidden:')
	      ->addMultiOptions(array(
	        '1' => 'Hidden',
	       
	      ));

    	$submit=new Zend_Form_Element_Submit('submit');
    	$submit->setAttrib('id','name','submitbutton');
		// $name, $file_path, $type,$is_downloadable,
    	//		 $is_hidden,$downloads_count,$course_id,$user_id
    	$this->addElements(array($id,$name, $file_path, $type,$is_downloadable,
    			 $is_hidden,$downloads_count,$course_id,$user_id, $submit));
    }
}

