<!DOCTYPE html>
<html>
<head>
    <title><?=$title?></title>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="<?=base_url()?>/packages/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?=base_url()?>/packages/css/animate.css">
    <link rel="stylesheet" href="<?=base_url()?>/packages/css/Ggrowl.mini.css">
    <!-- script -->
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>       
    <script src="<?=base_url()?>packages/js/Ggrowl.mini.js"></script>
    <script src='https://www.google.com/recaptcha/api.js?onload=onloadCallback' async defer></script>
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?=base_url()?>assets/authentication/style.css" />
    <!-- google  -->
    <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="457470367324-vgt1fgtmmegamsl8rokjpiafte74o9fp.apps.googleusercontent.com">

</head>
<body class="formBody">
<script>
var onloadCallback = function() {
    grecaptcha.execute();
};

function setResponse(response) { 
    document.getElementById('captcha-response').value = response; 
}
</script>

