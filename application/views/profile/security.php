<h4 class="mt-4 title-adm">Change The Password</h4>
<div id="general-settings">
    <p class="iconUser"><i class="fa  fa-unlock-alt" aria-hidden="true"></i></p>
    <div class="infoUser hide">
        <div class="row values">
            <?=form_open(base_url().'Profile/updatePassword');?>
                <label for="col-md-12 ">Current password *</label>
                <input type="password" class="form-control" id="currentPassword" name="currentPassword" placeholder="Password *" required="">
                <br>
                <label for="col-md-12 ">New password *</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password *" required="">
                <br>
                <label for="col-md-12 ">Confirm Password *</label>
                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Password *" required="">
                <div class="btn-save">
                    <button class="btn btn-primary" type="submit">Save</button>
                    <button class="btn btn-secondary cancel-change" type="button">Cancel</button>
                </div>
                <?=form_close();?>
        </div>
    </div>
</div>