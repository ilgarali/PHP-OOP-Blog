<?php 
spl_autoload_register('my_autoloader');
function my_autoloader($class){
    include 'classes/' . $class .'.php';
}

?>
<!DOCTYPE html>
<html class="no-js" lang="en">
<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title>Wordsmith</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/vendor.css">
    <link rel="stylesheet" href="css/main.css">

    <!-- script
    ================================================== -->
    <script src="js/modernizr.js"></script>

    <!-- favicons
    ================================================== -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

</head>

<body id="top">

    <!-- preloader
    ================================================== -->
    <div id="preloader">
        <div id="loader" class="dots-fade">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>


    <!-- header
    ================================================== -->
    <header class="s-header header">

        <div class="header__logo">
            <a class="logo" href="index.php">
                <img src="images/logo.svg" alt="Homepage">
            </a>
        </div> <!-- end header__logo -->

        <a class="header__search-trigger" href="#0"></a>
        <div class="header__search">

            <form role="search" method="get" class="header__search-form" action="#">
                <label>
                    <span class="hide-content">Search for:</span>
                    <input type="search" class="search-field" placeholder="Type Keywords" value="" name="s" title="Search for:" autocomplete="off">
                </label>
                <input type="submit" class="search-submit" value="Search">
            </form>

            <a href="#0" title="Close Search" class="header__overlay-close">Close</a>

        </div>  <!-- end header__search -->

        <a class="header__toggle-menu" href="#0" title="Menu"><span>Menu</span></a>
        <nav class="header__nav-wrap">

            <h2 class="header__nav-heading h6">Navigate to</h2>

            <ul class="header__nav">
                <li class="current"><a href="index.php" title="">Home</a></li>
                <li class="has-children">
                    <a href="" title="">Categories</a>
                    <ul class="sub-menu">
                        <?php 
                        $sql = new Model;
                        $conditions = [
                            "leftjoin" =>"posts",
                            "from"=>"id",
                            "to"=>"category"
                        ];
                        $sql->getData("category");
                        ?>
                        <li><a href="category.php">Lifestyle</a></li>
                        <li><a href="category.php">Health</a></li>
                        <li><a href="category.php">Family</a></li>
                        <li><a href="category.php">Management</a></li>
                        <li><a href="category.php">Travel</a></li>
                        <li><a href="category.php">Work</a></li>
                    </ul>
                </li>
               
               
                <li><a href="about.php" title="">About</a></li>
                <li><a href="contact.php" title="">Contact</a></li>
            </ul> <!-- end header__nav -->

            <a href="#0" title="Close Menu" class="header__overlay-close close-mobile-menu">Close</a>

        </nav> <!-- end header__nav-wrap -->

    </header> <!-- s-header -->

