<?php

include(ROOT_PATH . "/app/database/db.php");
include(ROOT_PATH . "/app/helpers/middleware.php");
include(ROOT_PATH . "/app/helpers/validateUser.php");

$table = 'users';

$users = selectALL($table);

$errors = array();
$id = '';
$fullname = '';
$mobileNum = NULL;
$email = '';
$password = '';
$passwordConf = '';
$admin = '';

function loginUser($user) {
    $_SESSION['id'] = $user['id'];
    $_SESSION['fullname'] = $user['fullname'];
    $_SESSION['admin'] = $user['admin'];
    $_SESSION['message'] = 'You are now logged in';
    $_SESSION['type'] = 'success';

    if ($_SESSION['admin']) {
        header('location:' . BASE_URL . '/admin/dashboard.php');
    } else {
        header('location:' . BASE_URL . '/index.php');
    }
    exit();
}

if (isset($_POST['register-btn']) || isset($_POST['create-admin']) ) {
    $errors = validateUser($_POST);

    if (count($errors) === 0) {
        unset($_POST['register-btn'], $_POST['passwordConf'], $_POST['create-admin']);
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        
        if (isset($_POST['admin'])) {
            $_POST['admin'] = 1;
            $user_id = create($table, $_POST);
            $_SESSION['message'] = 'Admin user created successfully';
            $_SESSION['type'] = 'success';
            header('location:' . BASE_URL . '/admin/users/index.php');
            exit();
        } else {
            $_POST['admin'] = 0;
            $user_id = create($table, $_POST);
            $user = selectOne($table, ['id' => $user_id]);
            loginUser($user);
        }

    } else {
        $fullname = $_POST['fullname'];
        $mobileNum = $_POST['mobileNum'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passwordConf = $_POST['passwordConf'];
        $admin = $_POST['admin'] == 1 ? 1 : 0;
    }
}

if (isset($_POST['login-btn'])) {
    $errors = validateLogin($_POST);

    if (count($errors) === 0) {
        $user = selectOne($table, ['fullname' => $_POST['fullname']]);
    
        if ($user && password_verify($_POST['password'], $user['password'])) {
            loginUser($user);
        } else {
            array_push($errors, 'Wrong credentials');
        }    
    }

    $fullname = $_POST['fullname'];
    $password = $_POST['password'];
    
}

if (isset($_POST['update-user'])) {
    //TODO: to be replaced with user can also update their info
    adminOnly();
    $errors = validateUser($_POST);

    if (count($errors) === 0) {
        $id = $_POST['id'];
        unset($_POST['passwordConf'], $_POST['update-user'], $_POST['id']);
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        
        $_POST['admin'] = isset($_POST['admin']) ? 1 : 0;
        $count = update($table, $id, $_POST);
        $_SESSION['message'] = 'User updated successfully';
        $_SESSION['type'] = 'success';
        header('location:' . BASE_URL . '/admin/users/index.php');
        exit();

    } else {
        $fullname = $_POST['fullname'];
        $mobileNum = $_POST['mobileNum'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passwordConf = $_POST['passwordConf'];
        $admin = $_POST['admin'] == 1 ? 1 : 0;
    }
}

if (isset($_GET['id'])) {
    $user = selectOne($table, ['id' => $_GET['id']]);

    $id = $user['id'];
    $fullname = $user['fullname'];
    $mobileNum = $user['mobilenum'];
    $email = $user['email'];
    $admin = $user['admin'];
}

if (isset($_GET['delete_id'])) {
    //TODO: to be replaced with user can also delete their account
    adminOnly();
    $count = delete($table, $_GET['delete_id']);
    $_SESSION['message'] = 'User deleted successfully';
    $_SESSION['type'] = 'success';
    header('location: ' . BASE_URL . '/admin/users/index.php');
    exit();
}

if(isset($_GET['admin']) && isset($_GET['u_id'])) {
    adminOnly();
    $admin = $_GET['admin'];
    $u_id = $_GET['u_id'];
    $count = update($table, $u_id, ['admin' => $admin]);

    if($_SESSION['id'] == $u_id) {
        $_SESSION['admin'] = 0;
        adminOnly();
    }

    $_SESSION['message'] = 'User\'s admin state changed!';
    $_SESSION['type'] = 'success';
    header('location: ' . BASE_URL . '/admin/users/index.php');
    exit();
}
