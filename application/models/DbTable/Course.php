<?php

class Application_Model_DbTable_Course extends Zend_Db_Table_Abstract
{

    protected $_name = 'course';
    public function getCourse($id)
    {
    	$id=int($id);
    	$row=$this->fetchrow('id='.$id);
    	if(!$row){
    		throw new Exception("couldn't find row $id");
    	}
    	return $row->toArray();
    }
    public function addCourse($coursename,$category_id)
    {
    	$row = $this->createRow();
    	$row->name='$coursename';
    	$row->category_id='$category_id';
    	return $row->save();

    }
    public function deleteCourse($id)
    {
    	$this->delete('id='.(int)$id);
    }
    public function updateCourse($name)
    {
    	$this->update(,'id = '.(int)$id);
    }
}

