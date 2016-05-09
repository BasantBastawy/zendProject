<?php

class Application_Model_DbTable_Material extends Zend_Db_Table_Abstract
{

    protected $_name = 'material';

    public function getmaterial($id)
	{
		$id = (int)$id;
		$row = $this->fetchRow('id = ' . $id);
		if (!$row) {
		throw new Exception("Could not find row $id");
		}
		return $row->toArray();
	}

    public function addMategial($id,$name, $file_path, $type,$is_downloadable,
    			 $is_hidden,$downloads_count,$course_id,$user_id)
    {
   	    $data = array('name' => $name,
   	    	'file_path' => $file_path,
   	    	'type' => $type,
   	    	'is_downloadable' => $is_downloadable,
   	    	'is_hidden' => $is_hidden,
   	    	'downloads_count' => $downloads_count,
   	    	'course_id' => $course_id,
   	    	'user_id' => $user_id,
   	    	);
	    $this->insert($data);
    }

    public function updateMaterial($id, $name)
    {
         $data = array('name' => $name,
   	    	'file_path' => $file_path,
   	    	'type' => $type,
   	    	'is_downloadable' => $is_downloadable,
   	    	'is_hidden' => $is_hidden,
   	    	'downloads_count' => $downloads_count,
   	    	'course_id' => $course_id,
   	    	'user_id' => $user_id,
   	    	);
        $this->update($data, 'id = '. (int)$id);
   }

    public function deleteMaterial($id)
    {
        return $this->delete('id='.$id);
    }
}