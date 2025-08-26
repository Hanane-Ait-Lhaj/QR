<?php $this->load->view($path_page.'/head')?>
<style>
.g-recaptcha>div{
    margin: auto;
}
</style>
<div class=" register">
    <div class="row">
        <div class="col-md-3 register-left">
            <img src="<?=base_url()?>/packages/img/logo.png" alt="" />
            <h3>Welcome</h3>
            <p>if you are not already registered, please click here to Register</p>
            <a href="<?=base_url()?>forgotVer" >Register</a><br/>
        </div>
        <div class="col-md-9 register-right has-danger">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <h3 class="register-heading">Password Recovery</h3>
                    <div class="row register-form">
                        <div class="col-md-12" style="text-align: center;font-size: 22px;color: #0ab71d;font-weight: bold;" >
                            The verification code has been sent to the email !!
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view($path_page.'/footer')?>
