<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Welcome to CodeIgniter</title>

    <link rel="stylesheet" href="<?php echo base_url('assets/css/styles.css'); ?>">
</head>

<body>

    <div id="container">
        <h1>Welcome to Fitness App</h1>

        <ul>
            <li><a href=<?php echo site_url('example/first'); ?>>first page</a></li>
            <li><a href=<?php echo site_url('example/second'); ?>>second page</a></li>
        </ul>