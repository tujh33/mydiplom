<?php 
   require_once 'functions.php';
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="shortcut icon" href="/images/logo_company.jpg" type="image/jpg">
      <title>Market</title>
      <link rel="stylesheet" type="text/css" href="/styles_header.css">
      <link rel="stylesheet" href="/styles.css">
      <link rel="stylesheet" type="text/css" href="/popup.css">


      <link rel="preconnect" href="https://fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300&display=swap" rel="stylesheet">

      <script
         src="https://code.jquery.com/jquery-3.6.0.min.js"
         integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
         crossorigin="anonymous"></script>
      <script src="/js/drop_auth.js"></script>
   </head>
   <body>
<header>
   <div class="navbar">
      <div class="navbar__inner">
         <div class="navbar__inner_logo">

            
            <img src="/images/logo_company.jpg" alt="" class="logo">
            <label id='logo_sub'>
               <a href="/">MARKET</a>
            </label>

         </div>
         <div class="navbar_blocks">
            <div class="navbar__inner_elements_l">
             
            </div>
            <div class="navbar__inner_elements_r">
               <? check_user() ?>
            </div>
         </div>
      </div>
   </div>
</header>