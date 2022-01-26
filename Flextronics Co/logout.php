<?php
//start session
session_start();

if (session_destroy()) { //menghapus session
    header("Location: index.php");
}
