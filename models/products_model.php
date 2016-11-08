<?php

class Products_Model extends Model {

    public function __construct(){
        parent::__construct();
    }

    /**
    * Gibt die letzten 20 Einträge im Archiv zurück.
    * @return array Liste aus Produkten mit id, timestamp, name, url, image und price
    */
    public function all() {
        return $this->_db->select('SELECT * FROM products ORDER BY id DESC');
    }
    
    public function get($id) {
        return $this->_db->select('SELECT * FROM products WHERE id LIKE ' . $id);
    }
    
    public function search($q) {
        return $this->_db->select('SELECT * FROM products WHERE name LIKE "%'.$q.'%" OR url LIKE "%'.$q.'%" OR tags LIKE "%' . $q . '%"');
    }

    public function insert($post) {
        return $this->_db->insert('products', $post);
    }
    
    public function update($post) {
        return $this->_db->update('products', $post, 'id LIKE ' . $post['id']);
    }
    
    public function delete($id) {
        return $this->_db->delete('products', 'id LIKE ' . $id);
    }
}