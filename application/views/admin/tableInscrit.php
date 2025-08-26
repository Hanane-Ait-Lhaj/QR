<!DOCTYPE html>
<html lang="en">
<?php //$adm = $this->session->userdata('admin'); 
// if ($adm == 1) { ?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>liste</title>

</head>

<body>

  <!-- Bootstrap Toast -->
  <?php //$message = $this->session->flashdata('added');
  // if (isset($message)) {
    ?>
    <!-- Toast -->
    <div style="z-index: 11">
      <div id="borderedToast1" class="toast toast-border-primary overflow-hidden mt-3" role="alert" aria-live="assertive"
        aria-atomic="true">
        <div class="toast-body">
          <div class="d-flex align-items-center">
            <div class="flex-shrink-0 me-2">
              <i class=" ri-notification-3-line align-middle"></i>
            </div>
            <div class="flex-grow-1">
              <h6 class="mb-0"><?= '$message' ?>.</h6>
            </div>
          </div>
        </div>
      </div>
    </div>

  <!-- <?php //} ?> -->


  <div class="card">
    <div class="card-header align-items-center d-flex">

      <h4 class="card-title mb-0 flex-grow-1">لائحة الطلبة</h4>

      <div class="flex-shrink-0">
        <a class="btn btn-primary" id="showInscritModalBtn" type="button" data-bs-toggle="modal" data-bs-target="#inscritModal">
          <b><i class="ri-add-fill align-bottom"></i></b>
        </a>
      </div>
    </div>

    <div class="card-body">
      <div class="table-responsive table-card">
        <table id="myTable" class="table table-hover table-striped align-middle table-nowrap mb-0 datatable"
          style="width: 100%;text-align:center;">
          <div style="font-size:15px;">
            <thead>
              <tr>
                <th scope="col"> الاسم </th>
                <th scope="col"> تاريخ و وقت التسجيل </th>
                <th scope="col"> موضوع الندوة </th>
                <th scope="col"></th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              <?php

              if (isset($inscrits)) {

                foreach ($inscrits as $inscr) {
                  ?>
                  <tr>
                    <th scope="row">
                      <?= $inscr->name ?>
                    </th>
                    <td>
                      <?= $inscr->date ?>
                    </td>
                    <td>
                      <?= $this->DB->selectSeminar($inscr->idSeminar)->titre; ?>
                    </td>

                    <td>
                      <a type="button" class="btn btn-sm btn-soft-info edit-inscrit" data-bs-toggle="modal"
                        data-bs-target="#inscritModal" data-edit-id="<?= $inscr->id ?>">
                        <i class="ri-pencil-fill align-bottom"></i>
                      </a>
                    </td>

                    <td><a type="button" class="btn btn-success btn-icon waves-effect waves-light"
                        href=<?= base_url('home/printCertificat/' . $inscr->id) ?>> <i class="ri-download-2-line"></i></a>
                    </td>
                  </tr>
                  <?php
                }
              } else {
                echo "لا توجد بيانات في اللائحة .";
              } ?>
            </tbody>
        </table>
      </div>

    </div>
  </div>


  <!-- create task Modal -->
  <div class="modal fade" id="inscritModal" tabindex="-1" aria-labelledby="inscritModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content border-0">

        <div class="modal-header p-3 bg-success-subtle">
          <h5 class="modal-title" id="inscritModalLabel">معلومات الطالب </h5>
          <button type="button" style="test" class="btn-close" data-bs-dismiss="modal" id="inscritModalBtn-close"
            aria-label="Close"></button>
        </div>

        <div class="modal-body">
          <div id="task-error-msg" class="alert alert-danger py-2"></div>
          <form method="POST" id="formInscrit" action="">

            <div class="mb-4">
              <label for="name" class="form-label"> الاسم </label>
              <input type="text" id="name" name="name" class="form-control" placeholder="الاسم" required>
            </div>


            <div class="mb-4">
              <label for="idSem" class="form-label">اختر ندوة</label>
              <select name="idSem" id="idSem" class="form-select form-select-lg" aria-label=".form-select-lg example">
                <?php
                foreach ($seminar as $s) {
                  ?>
                  <option value="<?= $s->idSeminar ?>"><?= $s->titre ?></option>
                  <?php
                }
                ?>
              </select>
            </div>

            <div class="hstack gap-2 justify-content-end">
              <button type="button" class="btn btn-ghost-success" data-bs-dismiss="modal" id="closeBtn"><i
                  class="ri-close-fill align-bottom"></i> اغلاق</button>
              <button type="submit" id="addInsc-submit" class="btn btn-primary">اضافة</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!--end create taks-->

</body>

</html>