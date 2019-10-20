<?php
include_once "../core/db.php";
include_once "../core/helper.php";
session_start();
session_destroy();
header("Location: login.php");
