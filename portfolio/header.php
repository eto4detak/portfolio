<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="description" content="uza - Model Agency HTML5 Template">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title><?php bloginfo('name'); ?></title>

    <!-- Favicon -->
    <link rel="icon" href="./img/core-img/favicon.ico">

    <!-- Core Stylesheet -->
     <!-- <link rel="stylesheet" href="style.css"> -->
     
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> >

    <!-- Preloader -->
    <div id="preloader">
        <div class="wrapper">
            <div class="cssload-loader"></div>
        </div>
    </div>

    <!-- ***** Top Search Area Start ***** -->
    <div class="top-search-area">
        <!-- Search Modal -->
        <div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <!-- Close Button -->
                        <button type="button" class="btn close-btn" data-dismiss="modal"><i class="fa fa-times"></i></button>
                        <!-- Form -->
                        <form action="index.html" method="post">
                            <input type="search" name="top-search-bar" class="form-control" placeholder="Search and hit enter...">
                            <button type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Top Search Area End ***** -->

    <!-- ***** Header Area Start ***** -->
    <header class="header-area">
        <!-- Main Header Start -->
        <div class="main-header-area">
            <div class="classy-nav-container breakpoint-off">
                <!-- Classy Menu -->
                <nav class="classy-navbar justify-content-between" id="uzaNav">

                    <!-- Logo -->
                    <a class="nav-brand" href="index.html"><img src="<?php echo get_template_directory_uri(); ?>/img/core-img/logo.png" alt=""></a>

                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Menu -->
                    <div class="classy-menu">
                        <!-- Menu Close Button -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>

                        <!-- Nav Start -->
                        <div class="classynav">
                        <?php 

                        $items = wp_get_nav_menu_items( 'header', [] );

                        $mass = [];
                        if(!empty($items)){
                        
                        foreach($items as $item){
                            if($item->menu_item_parent == 0){
                               $mass[$item->ID] = new stdClass();
                               $mass[$item->ID]->ID = $item->ID;
                               $mass[$item->ID]->title = $item->title;
                               $mass[$item->ID]->guid = $item->guid;
                               $mass[$item->ID]->menu_item_parent = $item->menu_item_parent;
                               $mass[$item->ID]->items = [];
                            }else{
                                if(isset($mass[$item->menu_item_parent])){
                                    $mass[$item->menu_item_parent]->items[$item->ID] = new stdClass();
                                    $mass[$item->menu_item_parent]->items[$item->ID]->ID = $item->ID;
                                    $mass[$item->menu_item_parent]->items[$item->ID]->title = $item->title;
                                    $mass[$item->menu_item_parent]->items[$item->ID]->guid = $item->guid;
                                } 
                            }
                        }

                        ?><ul id="nav"><?php

                            foreach($mass as $item){
                                ?>
                                <li <?php if(get_permalink() == $item->guid) echo 'class="current-item"'; ?>>
                                    <a href="<?php echo $item->guid; ?>">
                                        <?php echo $item->title; ?></a><?php if(!empty($item->items)){
                                        echo '<ul class="dropdown">';
                                            foreach ($item->items as $value) {
                                                echo '<li>';
                                                ?>
                                                <a href="<?php echo $value->guid; ?>"><?php echo $value->title; ?></a>
                                                <?php
                                                echo '</li>';
                                            }
                                        echo '</ul>';
                                    }
                                     ?>
                                </li><?php
                            }

                            ?></ul><?php
                        }
                        ?>
                            <!-- Get A Quote -->
                            <div class="get-a-quote ml-4 mr-3">
                                <a href="#" class="btn uza-btn">Get A Quote</a>
                            </div>

                            <!-- Login / Register -->
                            <div class="login-register-btn mx-3">
                                <a href="#">Login <span>/ Register</span></a>
                            </div>

                            <!-- Search Icon -->
                            <div class="search-icon" data-toggle="modal" data-target="#searchModal">
                                <i class="icon_search"></i>
                            </div>
                        </div>
                        <!-- Nav End -->

                    </div>
                </nav>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Breadcrumb Area Start ***** -->
    <div class="breadcrumb-area">
        <div class="container h-100">
            <div class="row h-100 align-items-end">
                <div class="col-12">
                    <div class="breadcumb--con">
                        <h2 class="title"><?php the_title(); ?></h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo home_url(); ?>"><i class="fa fa-home"></i> Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?php the_title(); ?></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- Background Curve -->
        <div class="breadcrumb-bg-curve">
            <img src="<?php echo get_template_directory_uri(); ?>/img/core-img/curve-5.png" alt="">
        </div>
    </div>
    <!-- ***** Breadcrumb Area End ***** -->


<?php /////////////////////////////////////////////////////////////////// ?>
