<?php

include_once 'model/M_Credentials.php';
include_once 'model/M_Contact.php';




class C_Dashboard
{
    static function index()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL . 'login?auth=false');
            exit;
        } else {
            view('dashboard/dashboard', [ 'contacts' => Contact::select(), 'user' => $_SESSION['user']]);
        }
    }

    static function insert()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL . 'login?auth=false');
            exit;
        } else {
            $post = array_map('htmlspecialchars', $_POST);
    
            $id_credentials = $_SESSION['user']['id'];
            $owner = $post['owner'];
            $no_hp = $post['no_hp'];
            $email = $post['email'];
    
            Contact::insert($id_credentials, $owner, $no_hp, $email);

            
        }
    }
    static function edit()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASEURL . 'login?auth=false');
            exit;
        } else {
            $post = array_map('htmlspecialchars', $_POST);
            
            $id = $post['id'];
            $owner = $post['owner'];
            $no_hp = $post['no_hp'];
            $email = $post['email'];
    
            Contact::edit($id, $owner, $no_hp, $email);

            
        }
    }

    static function delete()
    {
        $post = array_map('htmlspecialchars', $_POST);
        $id = $post['id'];
        Contact::delete($id);
    }

    
}