<?php

include_once 'model/M_Credentials.php';


class C_Auth
{

    static function login()
    {
        
        view('auth/layout' , ['url' => 'login']);
    }

    static function register()
    {
        // echo '<script>console.log("register")</script>';
        view('auth/layout' , ['url' => 'register']);
    }

    static function saveLogin()
    {
        $post = array_map('htmlspecialchars', $_POST);

        $user = M_Credentials::login([
            'username' => $post['username'],
            'password' => $post['password']
        ]);

        // echo '<script>console.log(' . json_encode($user) . ')</script>';

        if ($user) {
            unset($user['password']);
            $_SESSION['user'] = $user;

            // echo '<script>console.log(' . json_encode($_SESSION['user']) . ')</script>';

            header('Location: ' . BASEURL . 'dashboard');
        } else {
            header('Location: ' . BASEURL . 'login?failed=true');
        }
    }

    static function saveRegister()
    {
        $post = array_map('htmlspecialchars', $_POST);

        if ($post['password'] !== $post['confirm_password']) {
            header('Location: ' . BASEURL . 'register?failed=true');
            exit;
        }

        $user = M_Credentials::register([
            'username' => $post['username'],
            'password' => $post['password']
        ]);


        if ($user) {
            header('Location: ' . BASEURL . 'login');
        } else {
            header('Location: ' . BASEURL . 'register?failed=true');
        }
    }

    static function logout()
    {
        $_SESSION = array();

        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params["path"],
                $params["domain"],
                $params["secure"],
                $params["httponly"]
            );
        }

        session_destroy();
        header('Location: ' . BASEURL);
    }

    // static function forgotPassword()
    // {
    // }
}