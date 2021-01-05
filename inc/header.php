<?php
include 'lib/session.php';
Session::init();
include 'lib/Database.php';
include 'helper/Format.php';

spl_autoload_register(function($class){
  include_once "classes/".$class.".php";
});
$db = new Database();
$fm = new Format();
$pd = new Product();
$cat = new Category();
$bank = new Bank();
$bd = new Bid();
?>

<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>
<!DOCTYPE HTML>
<head>
<title>Bank Auction</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
 <!-- Meta Tag -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <!-- SEO -->
    <meta name="description" content="150 words">
    <meta name="author" content="uipasta">
    <meta name="url" content="http://www.yourdomainname.com">
    <meta name="copyright" content="company name">
    <meta name="robots" content="index,follow">
<link href="css/menu.css" rel="stylesheet" type="text/css" media="all"/>
<script src="js/jquerymain.js"></script>
<script src="js/script.js" type="text/javascript"></script>
<!-- Bootstrap JS -->
<script src="inc/bootstrap.min.js" type="text/javascript"></script>
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
<link href='inc/bootstrap.min.css' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="js/nav.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script> 
<script type="text/javascript" src="js/nav-hover.js"></script>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href='css/style2.css' rel='stylesheet' type='text/css'>
<link href='css/style3.css' rel='stylesheet' type='text/css'>

    

<script type="text/javascript">
  $(document).ready(function($){
    $('#dc_mega-menu-orange').dcMegaMenu({rowItems:'4',speed:'fast',effect:'fade'});
  });
</script>
</head>

