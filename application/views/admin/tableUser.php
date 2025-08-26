<!DOCTYPE html>
<html lang="en">
<?php //$adm = $this->session->userdata('admin'); 
// if ($adm == 1) { ?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>liste des profs</title>

</head>

<body>

  <div class="card">

    <div class="card-header align-items-center d-flex">
      <h4 class="card-title mb-0 flex-grow-1">لائحة المستعملين</h4>
    </div>
    <div class="card-body">
      <div class="table-responsive table-card">
        <table id="myTable" dir="rtl" class="table table-hover table-striped align-middle table-nowrap mb-0 datatable"
          style="width: 100%;">
          <thead>
            <tr>
              <th scope="col">id</th>
              <th scope="col"> اسم المستعمل</th>
              <th scope="col"> كلمة المرور</th>
              <th scope="col">مفعل</th>
            </tr>
          </thead>
          <tbody>

            <?php
            foreach ($users as $usr) {
              // foreach ($l as $ligne) {
              ?>
              <tr>
                <th scope="row">
                  <?= $usr->id ?>
                </th>
                <td>
                  <?= $usr->username ?>
                </td>
                <td>
                  <?= $usr->password ?>
                </td>
                

                <td>
                  <div class="form-check form-switch">
                    
                    <?php if($usr->active == 1){?>
                    <input class="form-check-input usrCheck" type="checkbox" role="switch" id="SwitchCheck" checked="" data-edit-id="<?=$usr->id?>">
                    <?php }else{?>
                    <input class="form-check-input usrCheck" type="checkbox" role="switch" id="SwitchCheck" data-edit-id="<?=$usr->id?>">
                    <?php }?>
                    <label class="form-check-label" for="SwitchCheck">نعم/لا</label>
                  </div>
                </td>

              </tr>
              <?php
            } ?>

          </tbody>
        </table>
      </div>
    </div>
  </div>

</body>

</html>