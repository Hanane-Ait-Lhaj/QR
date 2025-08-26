<?php $this->load->view($path_page.'/head')?>
<style>
.g-recaptcha>div{
    margin: auto;
}
</style>
<div class=" register">
    <div class="row center_box">
        <div class="col-md-3 register-left">
            <img src="<?=base_url()?>/packages/img/logo.png" alt="" />
            <h3>Welcome</h3>
            <p>if you are not already registered, please click here to Register</p>
            <a href="<?=base_url()?>forgotVer" >Register</a><br/>
        </div>
        <div class="col-md-9 register-right has-danger">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <h3 class="register-heading">Request a password reset </h3>
                    <?php 
                        echo form_open(base_url().'Login/forgot_validation');
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
                        <div class="col-md-3">
                        </div>
                        <div class="col-md-6" >
                        <div class="form-group" style="margin: 0;">
                            <input type="text" class="form-control <?=isValide("username")?>" name="username"  value="<?=$username?>" placeholder="Username *" />
                        </div>
                            <!-- Google reCAPTCHA widget -->
                            <?php $this->load->view('authentication/reCaptcha');?>
                            <input type="submit" class="btnRegister" value="Reset password" style="margin-left: 50%;transform: translateX(-50%);" />
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
    if(!$isValidPage) echo '$.Ggrowl.show("",{type:"Error",message:"Incorrect information","position":"bottom-left",showAnimate:"rubberBand"});';
    if(form_error('username')!="")echo isValide('username',"");
    if(form_error('password')!="")echo isValide('password',"");
    if(form_error('g-recaptcha-response')!="")echo isValide('g-recaptcha-response',"");
?>
</script>
<?php $this->load->view($path_page.'/footer')?>
