<?php
session_start();
require_once 'config/database.php';
require_once 'config/config.php';
require_once 'includes/functions.php';

// Gestion des routes simples
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

// Sécurisation des pages
$allowed_pages = ['home', 'login', 'register', 'services', 'order', 'dashboard', 'contact', 'faq', 'payment-info', 'policy'];

if (!in_array($page, $allowed_pages)) {
    $page = 'home';
}

// Vérification de l'authentification pour certaines pages
$protected_pages = ['dashboard', 'order'];
if (in_array($page, $protected_pages) && !isset($_SESSION['user_id'])) {
    header('Location: index.php?page=login');
    exit();
}

include 'includes/header.php';

// Inclusion de la page demandée
switch($page) {
    case 'home':
        include 'pages/home.php';
        break;
    case 'login':
        include 'pages/login.php';
        break;
    case 'register':
        include 'pages/register.php';
        break;
    case 'services':
        include 'pages/services.php';
        break;
    case 'order':
        include 'pages/order.php';
        break;
    case 'dashboard':
        include 'pages/dashboard.php';
        break;
    case 'contact':
        include 'pages/contact.php';
        break;
    case 'faq':
        include 'pages/faq.php';
        break;
    case 'payment-info':
        include 'pages/payment-info.php';
        break;
    case 'policy':
        include 'pages/policy.php';
        break;
    default:
        include 'pages/404.php';
}

include 'includes/footer.php';
?>