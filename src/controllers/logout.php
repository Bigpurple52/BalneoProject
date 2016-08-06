<?php

session_start();
session_unset();
session_destroy();
header('Content-Type: text/html; charset=utf-8');
header('Location: ../../index.php');
exit;
