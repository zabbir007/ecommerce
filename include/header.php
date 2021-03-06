<?php 
    $filedir = realpath(dirname(__FILE__));
    include $filedir."/../libs/Database.php";
    include $filedir."/../libs/Helpers.php";
    include $filedir."/../libs/Session.php";
    include $filedir."/../libs/Brand.php";
    include $filedir."/../libs/Category.php";
    include $filedir."/../libs/Products.php";
    include $filedir."/../libs/Cart.php";
    include $filedir."/../libs/Customers.php";
    Session::init();
?>
<?php
    $helper= new Helpers();
    $pro   = new Products();
    $brand = new Brand();
    $cat   = new Category();
    $cart  = new Cart();
    $cstmr = new Customers();
 ?>

 <?php 
    if (isset($_GET['action']) && $_GET['action'] == 'logout') {
        $delCart = $cart->delCartData();
        Session::destroy();
        header("Location: login.php");
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/icon/favicon.gif">
</head><!--/head-->

<body>
    <header id="header"><!--header-->
        <div class="header_top"><!--header_top-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="contactinfo">
                            <ul class="nav nav-pills">
                                <li><a href="tel:+2 95 01 88 821"><i class="fa fa-phone"></i> +8801613722564</a></li>
                                <li><a href="mailto:info@domain.com"><i class="fa fa-envelope"></i> zabbir@gmail.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="social-icons pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header_top-->
        
        <div class="header-middle"><!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logo pull-left">
                            <a href="index.php"><img src="images/home/logo.png" alt="" /></a>
                        </div>
                        <div class="btn-group pull-right">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                    USA
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Canada</a></li>
                                    <li><a href="#">UK</a></li>
                                </ul>
                            </div>
                            
                            <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                    DOLLAR
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Canadian Dollar</a></li>
                                    <li><a href="#">Pound</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">
                                <li>
                                <?php
                                    $login = Session::get('customerLogin');
                                    if ($login == true) {
                                        $customersName =Session::get("customersName");                
                                        $customersId =Session::get("customersId");                
                                ?>
                                <a href="profile.php?user_account=<?php echo $customersId; ?>"><i class="fa fa-user"></i> <?php echo $customersName; ?>
                                <?php } ?></a></li>
                                <li><a href="#"><i class="fa fa-star"></i> Wishlist</a></li>
                                <li><a href="checkout.php"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                                <li><a href="cart.php"><i class="fa fa-shopping-cart"></i> Cart <span class="badge badge-light">
                                    <?php
                                        $chekcCart = $cart->checkCartTable();
                                        if ($chekcCart) {
                                            $qty = Session::get("quantity");
                                            if ($qty) {
                                                echo $qty;
                                            }
                                            else{
                                                echo "0";
                                            }
                                        }
                                        else{
                                            echo "0";
                                        }
                                     ?>
                                </span></a></li>
                                <?php
                                    $login = Session::get('customerLogin');
                                    if ($login == false) {
                                ?>
                                <li><a href="login.php"><i class="fa fa-lock"></i> Login</a></li>
                                <?php }else{ ?>
                                <li><a href="?action=logout&<?php echo Session::get("customersId"); ?>"><i class="fa fa-lock"></i> Logout</a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-middle-->
    
        <div class="header-bottom"><!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-9">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a href="index.php" class="active">Home</a></li>
                                <li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="shop.php">Products</a></li>
                                        <li><a href="product-details.php">Product Details</a></li> 
                                        <li><a href="checkout.php">Checkout</a></li> 
                                        <li><a href="cart.php">Cart <span class="badge badge-light">
                                            <?php
                                                $chekcCart = $cart->checkCartTable();
                                                if ($chekcCart) {
                                                    if ($qty) {
                                                        echo $qty;
                                                    }
                                                    else{
                                                        echo "0";
                                                    }
                                                }else{
                                                    echo "0";
                                                }
                                            ?>
                                        </span></a></li>
                                        <?php
                                            $login = Session::get('customerLogin');
                                            if ($login == false) {
                                        ?>
                                        <li><a href="login.php">Login</a></li>
                                        <?php }else{ ?>
                                        <li><a href="?action=logout&<?php echo Session::get("customersId"); ?>">Logout</a></li>
                                        <?php } ?>
                                    </ul>
                                </li> 
                                <li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="blog.php">Blog List</a></li>
                                        <li><a href="blog-single.php">Blog Single</a></li>
                                    </ul>
                                </li> 
                                <li><a href="404.php">404</a></li>
                                <li><a href="contact-us.php">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="search_box pull-right">
                            <input type="text" placeholder="Search"/>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-bottom-->
    </header><!--/header-->