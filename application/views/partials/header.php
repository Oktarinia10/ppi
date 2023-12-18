<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>Tiny Dashboard - A Bootstrap Dashboard Template</title>
    <!-- Simple bar CSS -->
    <!-- <link rel="stylesheet" href="../../public/css/simplebar.css"> -->
    <link rel="stylesheet" href="<?php echo base_url('public/css/simplebar.css'); ?>">
    <!-- Fonts CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="../../public/css/feather.css">
    <!-- <link rel="stylesheet" href="../../public/css/dataTables.bootstrap4.css"> -->
    <link rel="stylesheet" href="<?php echo base_url('public/css/dataTables.bootstrap4.css'); ?>">

    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="../../public/css/daterangepicker.css">
    <!-- App CSS -->
    

    <!-- <link rel="stylesheet" href="../../public/css/app-light.css" id="lightTheme">
    <link rel="stylesheet" href="../../public/css/app-dark.css" id="darkTheme" disabled> -->
    <link rel="stylesheet" href="<?php echo base_url('public/css/app-light.css'); ?>" id="lightTheme">
    <link rel="stylesheet" href="<?php echo base_url('public/css/app-dark.css" id="darkTheme'); ?>" id="darkTheme" disabled>
  </head>
  <body class="vertical light  ">
  <?php
    if (empty($this->session->userdata('pic_flag'))) {
      redirect(site_url(''));
    }
    
?>
    <div class="wrapper">