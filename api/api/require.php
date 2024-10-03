<?php
// this will require the config file 
require_once 'config/config.php';
// this will require libraries form the foldder
require_once 'libraries/Core.php';
require_once 'libraries/Controller.php';
require_once 'libraries/MySQL.php';
require_once 'libraries/MongoDB.php';
// this will include the required files for sending mails
require_once 'services/PHPMailer/PHPMailer.php';
require_once 'services/PHPMailer/SMTP.php';
require_once 'services/PHPMailer/Exception.php';
// this will include the fpdf document files
require_once 'services/fpdf/fpdf.php';
// instantiate core class
$init = new Core();
