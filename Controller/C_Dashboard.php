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
            view('dashboard/dashboard', [ 'contacts' => Contact::select()]);
        }
    }

    static function insert()
    {
        $post = array_map('htmlspecialchars', $_POST);

        $user_id = $post['user_id'];
        $owner = $post['owner'];
        $no_hp = $post['no_hp'];
        $email = $post['email'];

        Contact::insert($user_id, $owner, $no_hp, $email);
    }

    static function delete($id)
    {
        $id = $_GET['id'];
        Contact::delete($id);
    }

    
}