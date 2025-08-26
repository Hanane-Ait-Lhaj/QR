<!-- Google reCAPTCHA widget -->
<?php 
    if($this->config->item('reCaptcha'))
    echo '<div  class="g-recaptcha  '.isValide("g-recaptcha-response").'" data-sitekey="'.$this->config->item('google_key').'"></div>';
?>