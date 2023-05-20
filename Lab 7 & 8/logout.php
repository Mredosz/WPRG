<?php
session_start();
session_unset();
session_destroy();
header("Location: ex 1.php");
