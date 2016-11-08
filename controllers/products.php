<?php

class Products extends Controller {

    public function __construct() {
        parent::__construct();
    }
    
    private function render($path, $data) {
        $this->_view->render('header', $data);
        $this->_view->render('products' . $path, $data);
        $this->_view->render('footer');
    }
    
    public function index() {
        $data['title'] = 'Produktübersicht';
        $data['products'] = $this->_model->all();
        $this->render('/list', $data);
    }
    
    public function add() {
        $data['title'] = 'Neues Produkt anlegen';
        $this->render('/form', $data);
    }
    
    public function tags() {
        $data['title'] = 'Schlagwörter';
        $data['tags'] = Tags::get($this->_model->all());
        $this->render('/tags', $data);
    }
    
    public function insert() {
        
        if (($post = Post::get()) && 
            $this->_model->insert($post)) {
            
            Message::set('Produkt angelegt.');
            URL::redirect();
            
        } else {
            Message::set('Fehlerhafte Eingabe.', 'danger');
            URL::redirect('products/add');
        }
    }
    
    public function edit() {
        
        if (is_numeric($this->_url[2]) && 
            $data['product'] = $this->_model->get($this->_url[2])[0]) {
        
            $data['title'] = 'Produkt bearbeiten';
            $this->render('/form', $data);
            
        } else {
            Message::set('Produktbearbeitung nicht möglich.', 'danger');
            URL::redirect();
        }
    }

    public function update() {

        if (($post = Post::get()) && 
            $this->_model->update($post)) {
            
            Message::set('Produkt aktualisiert.');
            URL::redirect();
            
        } else {
            Message::set('Fehlerhafte Eingabe.', 'danger');
            URL::redirect('products/edit/' . Post::getId());
        }
    }
    
    public function delete() {
        
        if (is_numeric($this->_url[2]) && 
            $this->_model->delete($this->_url[2])) {
            
            Message::set('Produkt gelöscht.');
        
        } else {
            Message::set('Produkt konnte nicht gelöscht werden.', 'danger');
        }
        
        URL::redirect();
    }
    
    public function search() {  
        $data['title'] = 'Suchergebnis';
        $data['products'] = $this->_model->search(Post::getQ());
        $this->render('/list', $data);
    }
}