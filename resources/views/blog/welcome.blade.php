<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="UTF-8">
  
<link rel="apple-touch-icon" type="image/png" href="https://cpwebassets.codepen.io/assets/favicon/apple-touch-icon-5ae1a0698dcc2402e9712f7d01ed509a57814f994c660df9f7a952f3060705ee.png">
<meta name="apple-mobile-web-app-title" content="CodePen">
<meta name="csrf-token" content="{{ csrf_token() }}">

<link rel="shortcut icon" type="image/x-icon" href="https://cpwebassets.codepen.io/assets/favicon/favicon-aec34940fbc1a6e787974dcd360f2c6b63348d4b1f4e06c77743096d55480f33.ico">

<link rel="mask-icon" type="image/x-icon" href="https://cpwebassets.codepen.io/assets/favicon/logo-pin-8f3771b1072e3c38bd662872f6b673a722f4b3ca2421637d5596661b4e2132cc.svg" color="#111">


  <title>CodePen - Bootstrap 4 Navbar</title>
  
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
  
<style>
.navbar { background-color: #484848; }
.navbar .navbar-nav .nav-link { color: #fff; }
.navbar .navbar-nav .nav-link:hover { color: #fbc531; }
.navbar .navbar-nav .active > .nav-link { color: #fbc531; }

footer a.text-light:hover { color: #fed136!important; text-decoration: none; }
footer .cizgi { border-right: 1px solid #535e67; }
@media (max-width: 992px) { footer .cizgi { border-right: none; } }
</style>

  <script>
  window.console = window.console || function(t) {};
</script>

  
  
  <script>
  if (document.location.search.match(/type=embed/gi)) {
    window.parent.postMessage("resize", "*");
  }
</script>


</head>
<body style="height:1500px">

<x-header />
<br>
<br>


<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1>Blog 1</h1>      
    <p>This is the first blog</p>
  </div>
</div>
<br>
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1>Blog 2</h1>      
    <p>This is the second blog</p>
  </div>
</div>

</body>
</html>