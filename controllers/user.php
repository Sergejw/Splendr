<?php

class User extends Controller {

    public function __construct() {
        parent::__construct();
    }

    private function render($path, $data) {
        $this->_view->render('header', $data);
        $this->_view->render('user' . $path, $data);
        $this->_view->render('footer');
    }
    
    public function index() {
        URL::redirect();
    }
    
    public function profile() {
        
        if (is_numeric($this->_url[2]) &&
            ($data = $this->_model->get('id', $this->_url[2])[0])) {

            if ($data['name'] != NULL) {
                $data['title'] = 'Profil von ' . $data['name'];
                $this->render('/profile', $data);
            
            } else {
                Message::set('Sie haben noch kein Profil.', 'danger');
                $this->render('/edit', $data);
            }
                        
        } else {
            Message::set('Es gibt kein Profil mit dieser ID.', 'danger');
            URL::redirect();
        }
    }

    public function input() {
        if (!Session::get('user')) {
            $data['title'] = 'Login / Registrieren';
            
            if ($this->_url[2] == 'activ') {
                Message::set('Account aktiviert.');
            }
            
            $this->render('/form', $data);
            
        
        } else {
            Message::set('Bereits angemeldet.', 'danger');
            URL::redirect();
        }
    }
        
    public function edit() {
        if (is_numeric($this->_url[2]) && 
            Session::get('user')['id'] == $this->_url[2]) {
            
            if (($data = $this->_model->get('id', $this->_url[2])[0]) &&
                $data['name'] != NULL) {
                
                $data['title'] = 'Profil bearbeiten';
                unset($data['password']);
                
            } else {
                $data['title'] = 'Profil erstellen';
            }
            
            $this->render('/edit', $data);
            
        } else {
            Message::set('Die Funktion benötigt ein Profil.', 'danger');
            URL::redirect('user/input');  
        }
    }
    
    public function add() {
        if (Session::get('user')['id'] == $this->_url[2]) {
            
            if (($post = Post::get()) && 
                $this->_model->update($post, Session::get('user')['mail']) && 
                move_uploaded_file($_FILES['file']['tmp_name'],  __DIR__ . '/../static/img/' . Session::get('user')['mail'] . '.jpg')) {

                Message::set('Profildaten gespeichert.');
                URL::redirect('user/profile/' . $this->_url[2]);

            } else {
                Message::set('Fehlerhafte Daten.', 'danger');
                URL::redirect('user/edit/' . $this->_url[2]);
            }
            
        } else {
            Message::set('Die Funktion benötigt ein Profil.', 'danger');
            URL::redirect('user/input'); 
        }
    }

    public function signup() {
        Message::set('Nicht registriert. Die E-Mail konnte nicht gesenden werden.', 'danger');
        $post = Post::get();

        if (!Session::get('user') && 
            !$this->_model->get('mail', $post['mail']) && 
            $this->_model->insert($post) &&
            Mail::send($post)) {
                
            Message::set('Erfolgreich registriert. An Ihre Mail wurde '
                       . 'ein Aktivierungslink gesendet. (Serverfunktion wegen Spam deaktiviert, deswegen können sich die Benutzer sofort ohne Aktivierungslink anmelden.)');
        }

        URL::redirect('user/input');
    }

    public function activate() {
        
        if (($user = $this->_model->get('mail', $this->_url[2])[0]) && 
            $this->_url[3] == $user['code']) {
            
            $user['code'] = '';
            
            if ($this->_model->update($user, $this->_url[2])) {
                URL::redirect('user/input/activ');
            }
        }
        
        URL::redirect('user/input');
    }

    public function login() {
        
        if (!Session::get('user') && 
            ($post = Post::get()) &&
            ($data = $this->_model->get('mail', $post['mail'])[0]) && 
            ($data = $this->_model->get('mail', $post['mail'])[0]) &&
            $data['code'] == 0 &&
            Password::validate($post['password'], $data['password'])) {

                unset($data['password']);
                Session::set('user', $data);
                
                            Message::set('Angemeldet.');
            URL::redirect('user/profile/' . $data['id']);
            
        } else {
            Message::set('Fehlerhafte Zugangsdaten.', 'danger');
            URL::redirect('/user/input');
        }
    }
     
    public function logout() {
        Session::destroy();
        URL::redirect();
    }
}