<?php 
//logout.php
session_start();
session_destroy();

header('Location: post.php');

?>