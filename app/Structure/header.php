<style>
    @media (max-width: 1000px) {
        .navbar-header {
            float: none;
        }
        .navbar-left,.navbar-right {
            float: none !important;
        }
        .navbar-toggle {
            display: block;
        }
        .navbar-collapse {
            border-top: 1px solid transparent;
            box-shadow: inset 0 1px 0 rgba(255,255,255,0.1);
        }
        .navbar-fixed-top {
            top: 0;
            border-width: 0 0 1px;
        }
        .navbar-collapse.collapse {
            display: none!important;
        }
        .navbar-nav {
            float: none!important;
            margin-top: 7px;
        }
        .navbar-nav>li {
            float: none;
        }
        .navbar-nav>li>a {
            padding-top: 10px;
            padding-bottom: 10px;
        }
        .collapse.in{
            display:block !important;
        }
    }
</style>
<?php ?>
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="../UserPages/Home.php" style="color:#47c4b6" >L'Elegance Beauty</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="../UserPages/aboutUs.php">AboutUs</a></li>
                <li><a href="../UserPages/ContactUs.php">Contact</a></li>
                <li><a href="../UserPages/Products.php">Products</a></li>
                <li><a href="../UserPages/Services.php">Treatments</a></li>
                <li><a href="../UserPages/TermsConditions.php">Terms and Conditions</a></li>

            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="../UserPages/Account.php">myAccount</a></li>
                <li><a href="../UserPages/Orders.php">myOrders</a></li>
                <li><a href="../UserPages/CheckOut.php"><img src="../Images/shopping-cart.png" alt="Cart Icon" /> myCart</a></li>
                <li><a href="#" onclick="logout();">LogOut</a></li>

            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>
<script>
    function logout(){
        var out =window.confirm("Are you sure you want to log out of L'Elegance Beauty?");
        if(out==true){
            window.location.href = "../Processing/LogOut.php?id=" + "2";
        }
        else{


        }
    }
</script>