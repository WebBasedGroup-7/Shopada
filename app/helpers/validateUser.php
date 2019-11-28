<?php

function validateUser($user){
    
    $errors = array();

    if (empty($user['fullname'])) {
        array_push($errors, 'Fullname is required');
    }
    if (empty($user['mobileNum'])) {
        array_push($errors, 'Mobile number is required');
    }
    if (empty($user['email'])) {
        array_push($errors, 'Email is required');
    }
    if (empty($user['password'])) {
        array_push($errors, 'Password is required');
    }
    if ($user['passwordConf'] !== $user['password'] ) {
        array_push($errors, 'Password do not match');
    }

    if ($user['password'] == '0' ) {
        array_push($errors, 'Password should not be zero');
    }

    $existingUser = selectOne('users', ['email' => $user['email']]);
    if ($existingUser) {
        if (isset($user['update-user']) && $existingUser['id'] != $user['id']) {
            array_push($errors, 'Email already exist');            
        }

        if (isset($user['create-admin'])) {
            array_push($errors, 'Email already exist');
        }
    }
    
    return $errors;
}

function validateLogin($user){
    
    $errors = array();

    if (empty($user['fullname'])) {
        array_push($errors, 'Fullname is required');
    }

    if (empty($user['password'])) {
        array_push($errors, 'Password is required');
    }
    
    return $errors;
}
