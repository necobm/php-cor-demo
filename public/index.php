<?php
require __DIR__ . '/../vendor/autoload.php';

ERROR_REPORTING(E_ALL);


use App\Security\User\User;
use App\Security\User\UserRepository;

global $userRepository;
$userRepository = new UserRepository();

$userRepository->add(new User(
    username: 'admin@myemail.com',
    password: 'admin-password',
    roles: ['ROLE_ADMIN']
));

$userRepository->add(new User(
    username: 'client@myemail.com',
    password: 'client-password'
));
