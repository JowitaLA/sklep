<?php
//konfiguracja
$conf->server_name = 'localhost:80';
$conf->server_url = 'http://'.$conf->server_name;
$conf->app_root = '/PlayHunt';
$conf->action_root = $conf->app_root.'/ctrl.php?action=';

# konfiguracja bazy danych
$conf->db_type = 'mysql';
$conf->db_server = 'localhost';
$conf->db_name = 'playhunt';
$conf->db_user = 'root';
$conf->db_pass = '';
$conf->db_charset = 'utf8';

# konfiguracja bazy danych
$conf->db_port = '3306';
#$conf->db_prefix = '';

//wartości wygenerowane na podstawie powyższych
$conf->action_url = $conf->server_url.$conf->action_root;
$conf->app_url = $conf->server_url.$conf->app_root;
$conf->root_path = dirname(__FILE__);

