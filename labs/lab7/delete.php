<?php
session_start(); 
include 'functions.php';

checkLoggedIn(); 


$memeID = $_GET['id'];
deleteMemeFromDB($memeID); 

header('Location: profile.php');

