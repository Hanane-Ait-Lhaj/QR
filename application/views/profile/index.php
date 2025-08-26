
<?php $this->load->view($path_page.'/head')?>
<?php 
    if($user->active == 0 && $this->config->item('emailConfig')){
        echo '<div id="user-deactivate"><i class="fa fa-envelope" aria-hidden="true"></i> Please check your email
            <a href="'.base_url()."Register/validEmail/1".'" style="position: absolute;top: 21px;left: 17px;background-color: #fff;padding: 6px;font-size: 13px;border-radius: 11px;">Resend</a>
        </div>';
    }
?>
<?php $this->load->view($path_page.'/sidebar')?>
<!-- Page Content -->
    <div id="page-content-wrapper">
        <?php $this->load->view($path_page.'/navbar',$this->_ci_cached_vars)?>
        <div class="container-fluid">
            <?php $this->load->view($path_page.'/'.$page_content,$this->_ci_cached_vars)?>
        </div>
    </div>
<?php $this->load->view($path_page.'/footer',$this->_ci_cached_vars)?>
