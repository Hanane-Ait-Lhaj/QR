<?php $this->load->view($path_page.'/head')?>
<style>
.g-recaptcha>div{
    margin: auto;
}
.social-icon{
  position: relative;
  overflow: hidden;
}
#fb-login{
  height: 72px;
  width: 130px;
  position: absolute;
  overflow: hidden;
  background-color: red;
 
}
.fb_iframe_widget {
    display: inline-block;
    opacity: 0;
    position: absolute;
    left: 0;
    right: 0;
    background: red;
}
</style>



<div class="container <?=$sign_up_mode?>">
      <div class="forms-container">
        <div class="signin-signup">
            <?php 
                $attributes = array('class' => 'sign-in-form');
                echo form_open(base_url().'Login/validation',$attributes);
                function isValide($inputName,$get="style"){
                    if(form_error($inputName)!="" && $get=="style"){
                        return " input-error";
                    }
                    if(form_error($inputName)!=""){
                        return '$.Ggrowl.show("'.$inputName.'",{type:"Error",message:"'.form_error($inputName).'","position":"bottom-left",showAnimate:"fadeInLeftBig"});';
                    }
                }
            ?>
            <h2 class="title">Sign in</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" class="form-control <?=isValide("username")?>" name="username" value="<?=$username?>" placeholder="username *" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password"  class="form-control <?=isValide("password")?>" name="password" placeholder="Password *" value="" />
            </div>
                                        <!-- Google reCAPTCHA widget -->
                                        <?php $this->load->view('authentication/reCaptcha');?>
            <a href="<?=base_url()?>Login/forgot">I forgot my password</a>
            <input type="submit" value="Login" class="btn solid" />
            <p class="social-text">Or Sign in with social platforms</p>
            <div class="social-media" onclick="fbLoding()">
              <a href="#" class="social-icon" >
              <!-- <fb:login-button id="fb-login" width="300px" size="large"  scope="public_profile,email" onlogin="checkLoginState();">
              </fb:login-button> -->
              <div class="fb-login-button" data-width="100px" data-size="large" onlogin="checkLoginState();" data-button-type="continue_with" data-layout="rounded" data-auto-logout-link="false" data-use-continue-as="false"></div>
                <i class="fab fa-facebook-f"></i>
              </a>
              
              <div class="g-signin2 social-icon" data-onsuccess="onSignIn" data-theme="dark">
                <a href="#" >
                  <i class="fab fa-google"></i>
                </a>
              </div>

            </div>
            <?=form_close();?>
            <?php 
                $attributes = array('class' => 'sign-up-form');
                echo form_open(base_url().'Register/validation',$attributes); 
                function isValide2($inputName,$get="style"){
                    if(form_error($inputName)!="" && $get=="style"){
                        return " input-error";
                    }
                    if(form_error($inputName)!=""){
                        return '$.Ggrowl.show("'.$inputName.'",{type:"Error",message:"'.form_error($inputName).'","position":"bottom-left",showAnimate:"fadeInUp",closeAnimate:"fadeInDown"});';
                    }
                }
            ?>
            <h2 class="title">Sign up</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" class="form-control <?=isValide("username")?>" name="username" value="<?=$username?>" placeholder="Username *" />
            </div>

            <?php if($elements->firstname){?>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" class="form-control <?=isValide("firstname")?>" name="firstname" value="<?=$firstname?>" placeholder="Firstname *" />
            </div>
            <?php }?>

            <?php if($elements->lastname){?>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" class="form-control <?=isValide("lastname")?>" name="lastname" value="<?=$lastname?>"  placeholder="Last Name *"  />
            </div>
            <?php }?>

            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" class="form-control <?=isValide("email")?>" name="email"  placeholder="Your Email *" value="<?=$email?>" />
            </div>
            <?php if($elements->gender){?>
            <div class="btn-group btn-group-toggle mgi-bottom" data-toggle="buttons">
                <label class="btn btn-secondary  <?php if($gender!="f")echo"active";?>">
                    <input type="radio" name="gender" id="male" value="m" autocomplete="off" 
                    <?php if($gender!="f")echo"checked";?>
                    > Male
                </label>
                <label class="btn btn-secondary <?php if($gender=="f")echo"active";?>">
                    <input type="radio" name="gender" id="female" value="f" autocomplete="off"
                    <?php if($gender=="f")echo"checked";?>
                    > Female
                </label>
            </div>
            <?php }?>
            <?php if($elements->txtPhone){?>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="text" minlength="10" maxlength="10"  name="txtPhone" class="form-control <?=isValide("txtPhone")?>" placeholder="Your Phone *" value="<?=$txtPhone?>" />
            </div>
            <?php } ?>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password"  class="form-control <?=isValide("password")?>" name="password" placeholder="Password *" value="" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" class="form-control <?=isValide("passconf")?>" name="passconf" placeholder="Confirm Password *" value="" />
            </div>
            <input type="submit" class="btn" value="Sign up" />
            <p class="social-text">Or Sign up with social platforms</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
            <?=form_close();?>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <img src="<?=base_url()?>assets/authentication/logo.png" style="width: 85px;margin-bottom: 10px;" alt="" srcset="">
            <h3>New here ?</h3>
            <p>
            Log in. Get organized. Complete your tasks.
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Sign up
            </button>
          </div>
          <img src="<?=base_url()?>assets/authentication/img/login1.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
             <img src="<?=base_url()?>assets/authentication/logo.png" style="width: 85px;margin-bottom: 10px;" alt="" srcset="">
            <h3>One of us ?</h3>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum
              laboriosam ad deleniti.
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
          </div>
          <img src="<?=base_url()?>assets/authentication/img/sign_in.svg" class="image" alt="" />
        </div>
      </div>
    </div>



<script>
<?php 
    if(!$isValidPage) echo '$.Ggrowl.show("",{type:"Error",message:"Incorrect information","position":"bottom-left",showAnimate:"rubberBand"});';
    if(form_error('username')!="")echo isValide('username',"");
    if(form_error('password')!="")echo isValide('password',"");
    if(form_error('g-recaptcha-response')!="")echo isValide('g-recaptcha-response',"");
?>

</script>
<script>
    <?php 
            if(form_error('username')!="")echo isValide2('username',"");
            if($elements->firstname && form_error('firstname')!="")echo isValide2('firstname',"");
            if($elements->lastname && form_error('lastname')!="")echo isValide2('lastname',"");
            if($elements->txtPhone && form_error('txtPhone')!="")echo isValide2('txtPhone',"");
            if(form_error('password')!="")echo isValide2('password',"");
            if(form_error('passconf')!="")echo isValide2('passconf',"");
            if(form_error('g-recaptcha-response')!="")echo isValide2('g-recaptcha-response',"");
            if(form_error('email')!="")echo isValide2('email',"");
    ?>
</script>
<?php $this->load->view($path_page.'/footer')?>
