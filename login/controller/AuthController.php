<?php
require_once '../model/UserModel.php';

class AuthController {
    private $userModel;

    public function __construct($database) {
        $this->userModel = new UserModel($database);
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $role = 'user'; // Mặc định là "user"
    
            if ($this->userModel->register($firstname, $lastname, $email, $password, $role)) {
            header("Location: login.php");
            } else {
                echo "Registration failed.";
            }
        }
    }
    
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $user = $this->userModel->login($email, $password);

            if ($user) {
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['role'] = $user['role'];
                if ($user['role'] === 'admin') {
                    header("Location: admin.php");
                } else {
                    header("Location: index.php");
                }
            } else {
                echo "Invalid login credentials.";
            }
        }
    }

    public function logout() {
        session_start();
        session_unset();
        session_destroy();
        header("Location: login.php");
    }

