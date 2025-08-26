<h4 class="title-adm mt-4">General Account Settings</h4>
<div id="general-settings" >
    <p class="iconUser"><i class="fa fa-user" aria-hidden="true"></i></p>
    <div class="infoUser ">
        <div class="row poster">
            <div class="col-md-3">Username</div>
            <div class="value col-md-9"><?=$user->username?></div>
        </div>
        <div class="row values">
            <?=form_open(base_url().'Profile/updateUsername');?>
            <label for="col-md-12">Username</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Username"  value='<?=$user->username?>' required="">            
            <div class="btn-save">
                <button class="btn btn-primary" type="submit">Save</button>
                <button class="btn btn-secondary cancel-change" type="button">Cancel</button>
            </div>
            <?=form_close();?>
        </div>
    </div>
    <div class="infoUser ">
        <div class="row poster">
            <div class="col-md-3">Firstname</div>
            <div class="value col-md-9"><?=$user->firstname?></div>
        </div>
        <div class="row values">
            <?=form_open(base_url().'Profile/updateFirstname');?>
            <label for="col-md-12 ">Firstname</label>
            <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Firstname"  value='<?=$user->firstname?>' required="">
            <div class="btn-save">
                <button class="btn btn-primary" type="submit">Save</button>
                <button class="btn btn-secondary cancel-change" type="button">Cancel</button>
            </div>
            <?=form_close();?>
        </div>
    </div>
    <div class="infoUser ">
        <div class="row poster">
            <div class="col-md-3">Lastname</div>
            <div class="value col-md-9"><?=$user->lastname?></div>
        </div>
        <div class="row values">
            <?=form_open(base_url().'Profile/updateLastname');?>
            <label for="col-md-12 ">Lastname</label>
            <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Lastname"  value='<?=$user->lastname?>' required="">
            <div class="btn-save">
                <button class="btn btn-primary" type="submit">Save</button>
                <button class="btn btn-secondary cancel-change" type="button">Cancel</button>
            </div>
            <?=form_close();?>
        </div>
    </div>
    <div class="infoUser ">
        <div class="row poster">
            <div class="col-md-3">Email</div>
            <div class="value col-md-9"><?=$user->email?></div>
        </div>
        <div class="row values">
            <?=form_open(base_url().'Profile/updateEmail');?>
            <label for="col-md-12 ">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email"  value='<?=$user->email?>' required="">
            <div class="btn-save">
                <button class="btn btn-primary" type="submit">Save</button>
                <button class="btn btn-secondary cancel-change" type="button">Cancel</button>
            </div>
            <?=form_close();?>
        </div>
    </div>
    <div class="infoUser ">
        <div class="row poster">
            <div class="col-md-3">Phone</div>
            <div class="value col-md-9"><?=$user->txtPhone?></div>
        </div>
        <div class="row values">
            <?=form_open(base_url().'Profile/updatePhone');?>
            <label for="col-md-12 ">Phone</label>
            <input type="text" minlength="10" maxlength="10" class="form-control" id="txtPhone" name="txtPhone" placeholder="Phone"  value='<?=$user->txtPhone?>' required="">
            <div class="btn-save">
                <button class="btn btn-primary" type="submit">Save</button>
                <button class="btn btn-secondary cancel-change" type="button">Cancel</button>
            </div>
            <?=form_close();?>
        </div>
    </div>
    <div class="infoUser ">
        <div class="row poster">
            <div class="col-md-3">Gender</div>
            <div class="value col-md-9">
                <?php
                    if($user->gender=='m')
                        echo 'Male';
                    else
                        echo 'Female';
                ?>
            </div>
        </div>
        <div class="row values">
            <?=form_open(base_url().'Profile/updateGender');?>
            <label for="col-md-12 ">Gender</label>
            <br>
            <div class="btn-group btn-group-toggle mgi-bottom" data-toggle="buttons">
                <label class="btn btn-secondary <?php if($user->gender=='m')echo'active' ?>">
                    <input type="radio" name="gender" id="male" value="m" autocomplete="off" <?php if($user->gender=='m') echo 'checked=""'?> >Male
                </label>
                <label class="btn btn-secondary <?php if($user->gender=='f')echo'active' ?>">
                    <input type="radio" name="gender" id="female" value="f" autocomplete="off" <?php if($user->gender=='f') echo 'checked=""'?>> Female
                </label>
            </div>
            <div class="btn-save">
                <button class="btn btn-primary" type="submit">Save</button>
                <button class="btn btn-secondary cancel-change" type="button">Cancel</button>
            </div>
            <?=form_close();?>
        </div>
    </div>
</div>
