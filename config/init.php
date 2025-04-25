<?php

define("ROOT", dirname(__DIR__));
const DEBUG = 1;
const ERROR_LOG_FILE = ROOT . '/tmp/error.log';
const WWW = ROOT . '/public';
const UPLOADS = WWW . '/uploads';
const APP = ROOT . '/app';
const CORE = ROOT . '/core';
const HELPERS = ROOT . '/helpers';
const CONFIG = ROOT . '/config';
const VIEWS = APP . '/Views';
const CACHE = ROOT . '/tmp/cache';
const LAYOUT = 'default';
const PATH = 'http://zenblog.loc';
const LOGIN_PAGE = PATH . '/login';
const DB = [
    'host' => 'mysql',
    'dbname' => 'my_database',
    'username' => 'user',
    'password' => 'userpassword',
    'charset' => 'utf8mb4',
    'options' => [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ],
];
const EMAIL = [
    'host' => 'sandbox.smtp.mailtrap.io',
    'auth' => true,
    'username' => 'ce3c65a015293a',
    'password' => 'dcc9d0d057cd1a',
    'secure' => 'tls',
    'port' => 587,
    'from_email' => '292103f866-428b5e@inbox.mailtrap.io',
    'is_html' => true,
    'charset' => 'utf-8',
    'debug' => 0,
];
