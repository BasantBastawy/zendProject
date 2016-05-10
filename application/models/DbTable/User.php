<?php

class Application_Model_DbTable_User extends Zend_Db_Table_Abstract
{

    protected $_name = 'user';

    public function getUser($id)
    {
      $id = (int)$id;
      $row = $this->fetchRow('id = ' . $id);
      if (!$row) {
        throw new Exception("Could not find row $id");
      }
      return $row->toArray();
    }
    public function addUser($username, $email,$password, $image, $signature,
                            $gender, $country, $is_admin, $is_banned)
    {
      $data = array(
        'username' => $username,
        'email' => $email,
        'password' => md5($password),
        'image' => $image,
        'signature' => $signature,
        'gender' => $gender,
        'country' => $country,
        'is_admin' => $is_admin,
        'is_banned' => $is_banned,
        );
      $this->insert($data);
    }
    public function updateUser($username, $email,$password, $image, $signature,
      $gender, $country, $is_admin, $is_banned)
    {
      $data = array(
        'username' => $username,
        'email' => $email,
        'password' => md5($password),
        'image' => $image,
        'signature' => $signature,
        'gender' => $gender,
        'country' => $country,
        'is_admin' => $is_admin,
        'is_banned' => $is_banned,
        );
      $this->update($data, 'id = '. (int)$id);
    }
    public function deleteeUser($id)
    {
      $this->delete('id =' .(int)$id);
    }
}




