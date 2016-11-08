<?php


class User_Model extends Model {

    public function __construct(){
        parent::__construct();
    }
    
    public function get($value, $value2) {
        return $this->_db->select('SELECT * FROM user WHERE ' . $value . ' LIKE "' . $value2 . '"');
    }
    
    public function insert($post) {
        return $this->_db->insert('user', $post);
    }
    
    public function update($post, $mail) {
        return $this->_db->update('user', $post, 'mail LIKE "' . $mail . '"');
    }
}