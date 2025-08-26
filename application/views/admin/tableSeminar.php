<!DOCTYPE html>
<html lang="en">
<?php //$adm = $this->session->userdata('admin'); 
// if ($adm == 1) { ?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>liste</title>

</head>
<style>
  tbody tr {
    cursor: pointer;
  }

  .imageDisplay {
    border: 1px solid black;
    width: 100%;
   height: auto;
  }

  #imagesContainer {
    width: 100%;
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(100px, 1fr));
    gap: 5px;
  }

  #selectedImage {
    width: 100%;
  }
</style>

<body>

  <?php $message = $this->session->flashdata('semMsg');
  ?>
  <!-- Bootstrap Toast -->
  <?php if (isset($message)): ?>
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
              <h6 class="mb-0"><?= $message ?></h6>
            </div>
          </div>
        </div>
      </div>
    </div>


  <?php endif; ?>


  <div class="card">

    <div class="card-header align-items-center d-flex">

      <h4 class="card-title mb-0 flex-grow-1">لائحة الندوات</h4>

      <div class="flex-shrink-0">
        <a class="btn btn-primary" id="semModalBtn" type="button" data-bs-toggle="modal" data-bs-target="#semModal">
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
                <th scope="col"> موضوع الندوة </th>
                <th scope="col"> نوع الشهادة </th>
                <th scope="col"> الشاهد على الشهادة</th>
                <th scope="col"> منظم الندوة</th>
                <th scope="col"> موقع الشهادة </th>
                <th scope="col"> صورة </th>
                <th scope="col"> تاريخ الندوة </th>
                <th scope="col"></th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              <?php

              if (isset($seminars)) {

                foreach ($seminars as $sem) {
                  // $sem = json_decode(json_encode($sem), true);
                  ?>
                  <tr>

                    <th scope="row" onclick="window.location='<?= base_url() ?>admin/tableInscrit/<?= $sem->idSeminar ?>'">
                      <?= $sem->titre ?>
                    </th>

                    <td onclick="window.location='<?= base_url() ?>admin/tableInscrit/<?= $sem->idSeminar ?>'">
                      <?= $sem->type ?>
                    </td>

                    <td onclick="window.location='<?= base_url() ?>admin/tableInscrit/<?= $sem->idSeminar ?>'">
                      <?= $sem->personCertifie ?>
                    </td>

                    <td onclick="window.location='<?= base_url() ?>admin/tableInscrit/<?= $sem->idSeminar ?>'">
                      <?= $sem->organisateur ?>
                    </td>

                    <td onclick="window.location='<?= base_url() ?>admin/tableInscrit/<?= $sem->idSeminar ?>'">
                      <?= $sem->personSign ?>
                    </td>

                    <td onclick="window.location='<?= base_url() ?>admin/tableInscrit/<?= $sem->idSeminar ?>'">
                      <img with="100" height="30" src="<?= base_url() . $sem->imageUrl ?>">
                    </td>

                    <td>
                      <?= $sem->date ?>
                    </td>

                    <td>
                      <a type="button" class="btn btn-sm btn-soft-info edit-sem" data-bs-toggle="modal"
                        data-bs-target="#semModal" data-edit-id="<?= $sem->idSeminar ?>">
                        <i class="ri-pencil-fill align-bottom"></i>
                      </a>
                    </td>

                    <td><a type="button" class="btn btn-danger btn-icon waves-effect waves-light"
                        onClick="javascript: return confirm('هل تريد ازالة هذه الندوة؟');"
                        href=<?= base_url('admin/removeSeminar/' . $sem->idSeminar) ?>> <i
                          class="ri-delete-bin-5-line"></i></a>
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
  <div class="modal fade" id="semModal" tabindex="-1" aria-labelledby="semModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content border-0">

        <div class="modal-header p-3 bg-success-subtle">
          <h5 class="modal-title" id="semModalLabel">معلومات الندوة </h5>
          <button type="button" style="test" class="btn-close" data-bs-dismiss="modal" id="semModalBtn-close"
            aria-label="Close"></button>
        </div>

        <div class="modal-body">
          <div id="task-error-msg" class="alert alert-danger py-2"></div>
          <form method="POST" id="formSem" action="" enctype="multipart/form-data">

            <div class="row g-4 mb-3">
              <div class="col-lg-6">
                <div class="mb-3">
                  <label for="titre" class="form-label"> موضوع الندوة </label>
                  <input type="text" id="titre" name="titre" class="form-control" placeholder="موضوع الندوة " required>

                </div>
              </div>
              <div class="col-lg-6">
                <div class="mb-3">
                  <label for="type" class="form-label"> نوع الشهادة</label>
                  <input type="text" name="type" id="type" class="form-control" placeholder="تقديرية ..." required>
                </div>
              </div>
            </div>

            <div class="mb-4">
              <label for="personCertifie" class="form-label"> الشاهد على الشهادة</label>
              <input type="text" id="personCertifie" name="personCertifie" class="form-control" placeholder="اسم"
                required>
            </div>

            <div class="row g-4 mb-3">
              <div class="col-lg-6">
                <div class="mb-3">
                  <label for="organisateur" class="form-label"> منظم الندوة</label>
                  <input type="text" name="organisateur" id="organisateur" class="form-control" placeholder="اسم المنظم"
                    required>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="mb-3">
                  <label for="personSign" class="form-label"> موقع الشهادة </label>
                  <input type="text" name="personSign" id="personSign" class="form-control" placeholder="اسم الموقع"
                    required>
                </div>
              </div>
            </div>

            <div class="mb-4">
              <label for="date" class="form-label">تاريخ و وقت الندوة</label>
              <input type="datetime-local" id="date" name="date" class="form-control" placeholder="DD/MM/YYYY" required>
            </div>
            <div class="mb-4">
              <label for="date" class="form-label"> أدخل صورة جديدة أو اختر صورة</label>
              <input accept=".png" type="file" id="newImage" class="form-control" name="newImage" onclick="this.value=null;">
            </div>

            <div class="mb-4">
              <img src="<?= base_url() ?>plugins/img/sign.png" id="selectedImage" alt="selectedImage" height="150">
            </div>

            <div class="mb-4">
              <input type="text" id="imageUrl" name="imageUrl" class="form-control" required value="plugins/img/sign.png" hidden>
              
              <div id="imagesContainer">
                <?php
                // Loop through each file and display its name
                foreach ($imgs as $img) { ?>
                  <button type="button" value="<?= $img ?>" onclick="selectImage(this.value)">
                    <img class="imageDisplay" src="<?= base_url() . $img ?>" height="50">
                  </button>
                <?php } ?>
              </div>

            </div>

            <div class="hstack gap-2 justify-content-end">
              <button type="button" class="btn btn-ghost-success" data-bs-dismiss="modal" id="closeBtn"><i
                  class="ri-close-fill align-bottom"></i> اغلاق</button>
              <button type="submit" id="addSem-submit" class="btn btn-primary">اضافة</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!--end create taks-->

</body>

</html>