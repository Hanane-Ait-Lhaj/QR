<div class="register">
    <div class="row">
        <div class="col-md-3 register-left">
            <img src="<?=base_url()?>/packages/img/logo.png" alt="" />
            <h3>Welcome</h3>
            <p>if you have already registered, please click here to login</p>
            <a href="<?=base_url()?>Login" >Login</a><br/>
        </div>
        <div class="col-md-9 register-right has-danger">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <h3 class="register-heading">Register</h3>
                    <?php 
                        echo form_open(base_url().'Register/validation'); 
                        function isValide($inputName,$get="style"){
                            if(form_error($inputName)!="" && $get=="style"){
                                return " input-error";
                            }
                            if(form_error($inputName)!=""){
                                return '$.Ggrowl.show("'.$inputName.'",{type:"Error",message:"'.form_error($inputName).'","position":"bottom-left",showAnimate:"rubberBand"});';
                            }
                        }
                    ?>
                    <div class="row register-form">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control <?=isValide("username")?>" name="username" value="<?=$username?>" placeholder="User Name *" />
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control <?=isValide("firstname")?>" name="firstname" value="<?=$firstname?>" placeholder="First Name *" />
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control <?=isValide("lastname")?>" name="lastname" value="<?=$lastname?>"  placeholder="Last Name *"  />
                            </div>

                            <div class="form-group">
                                <input type="email" class="form-control <?=isValide("email")?>" name="email"  placeholder="Your Email *" value="<?=$email?>" />
                            </div>
                            <!-- Google reCAPTCHA widget -->
                            <?php $this->load->view('authentication/reCaptcha');?>
                        </div>
                        <div class="col-md-6">
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
                            <?php if($elements['txtPhone']==false){?>
                                <div class="form-group">
                                    <input type="text" minlength="10" maxlength="10"  name="txtPhone" class="form-control <?=isValide("txtPhone")?>" placeholder="Your Phone *" value="<?=$txtPhone?>" />
                                </div>
                            <?php } ?>
                            <div class="form-group">
                                <input type="password"  class="form-control <?=isValide("password")?>" name="password" placeholder="Password *" value="" />
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control <?=isValide("passconf")?>" name="passconf" placeholder="Confirm Password *" value="" />
                            </div>
                            <input type="submit" class="btnRegister" value="Register" />
                        </div>
                    </div>
                    <?=form_close();?>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    <?php
            if(form_error('username')!="")echo isValide('username',"");
            if($elements->firstname && form_error('firstname')!="")echo isValide('firstname',"");
            if($elements->lastname && form_error('lastname')!="")echo isValide('lastname',"");
            if($elements->txtPhone && form_error('txtPhone')!="")echo isValide('txtPhone',"");
            if(form_error('password')!="")echo isValide('password',"");
            if(form_error('passconf')!="")echo isValide('passconf',"");
            if(form_error('g-recaptcha-response')!="")echo isValide('g-recaptcha-response',"");
            if(form_error('email')!="")echo isValide('email',"");
    ?>
</script>