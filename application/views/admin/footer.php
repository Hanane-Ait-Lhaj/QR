<!-- End Page-content -->
</div>
<!-- end main content-->
</div>
<!-- END layout-wrapper -->

<!--start back-to-top-->
<button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
  <i class="ri-arrow-up-line"></i>
</button>
<!--end back-to-top-->

<!-- JAVASCRIPT -->
<script src="<?= base_url() ?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>assets/libs/simplebar/simplebar.min.js"></script>
<script src="<?= base_url() ?>assets/libs/node-waves/waves.min.js"></script>
<script src="<?= base_url() ?>assets/libs/feather-icons/feather.min.js"></script>
<script src="<?= base_url() ?>assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
<script src="<?= base_url() ?>assets/js/plugins.js"></script>

<!-- apexcharts -->
<script src="<?= base_url() ?>assets/libs/apexcharts/apexcharts.min.js"></script>


<!-- Vector map-->
<script src="<?= base_url() ?>assets/libs/jsvectormap/js/jsvectormap.min.js"></script>
<script src="<?= base_url() ?>assets/libs/jsvectormap/maps/world-merc.js"></script>

<!--Swiper slider js-->
<script src="<?= base_url() ?>assets/libs/swiper/swiper-bundle.min.js"></script>

<!-- Dashboard init -->
<script src="<?= base_url() ?>assets/js/pages/dashboard-ecommerce.init.js"></script>

<!-- App js -->
<script src="<?= base_url() ?>assets/js/app.js"></script>

<script src="<?= base_url() ?>assets/js/pages/notifications.init.js"></script>

<script>
  $(document).ready(function () {

    /********************* theme user ****************** */
    $('#theme').click(function () {
      $.post("<?= base_url() ?>admin/changeTheme");
    });
  });

  /********************* dataTable ****************** */

  var table = $(document).ready(function () {
    $('.datatable').DataTable({
      "processing": true,
      "language": {
        "sProcessing": "جارٍ التحميل...",
        "sLengthMenu": "أظهر _MENU_ مدخلات",
        "sZeroRecords": "لم يعثر على أية سجلات",
        "sInfo": "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
        "sInfoEmpty": "يعرض 0 إلى 0 من أصل 0 سجل",
        "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
        "sInfoPostFix": "",
        "sSearch": "_INPUT_",
        "sSearchPlaceholder": "ابحث ...",
        "sUrl": "",
        "oPaginate": {
          "sFirst": "الأول",
          "sPrevious": "السابق",
          "sNext": "التالي",
          "sLast": "الأخير"
        }
      },

    });
  });

  /********************* activer ou desactiver user ****************** */
  $(document).ready(function () {

    $('#myTable').on('change', '.usrCheck', function () {
      var userId = $(this).attr('data-edit-id');
      var checked = $(this).prop('checked'); //is(':checked')){
      var data = { "userId": userId, "userChecked": checked }
      $.ajax({
        url: "<?php echo base_url('Admin/changeUserStatus'); ?>",
        type: "POST",
        data: data,
        dataType: "json"
      });

    });
  });

  $(document).ready(function () {
    $('#newImage').change(function () {
      imgInp = document.getElementById("newImage");
      if (imgInp.files.length == 0) {
        console.log("no files selected");
      } else {
        const [file] = imgInp.files
        if (file) {
          // var elem = document.createElement("img");
          // elem.setAttribute("src", URL.createObjectURL(file));
          // elem.setAttribute("height", "50");
          // elem.setAttribute("class", "imageDisplay");
          // document.getElementById("imagesContainer").appendChild(elem);
          // console.log(URL.createObjectURL(file));

          // show selected image
          selectedImage.src = URL.createObjectURL(file);

          //change sent data from the hidden input to the upload input
          $('#imageUrl').val(null);
          $('#newImage').attr("required","");
          $('#imageUrl').removeAttr("required");

        }
      }
    });
  });
  function selectImage(imgUrl) {
    // show selected image
    $('#selectedImage').attr('src', '<?= base_url() ?>'+imgUrl);
    
    //
    $('#imageUrl').val(imgUrl);
    $('#imageUrl').attr("required","");
    $('#newImage').removeAttr("required");

  }

  /********************* ajouter inscrit ****************** */

  $(document).ready(function () {

    $('#showInscritModalBtn').on('click', function () {
      document.getElementById("inscritModalLabel").innerHTML = "ادخال المعلومات";
      document.getElementById('addInsc-submit').innerHTML = 'اضافة';

      $('#formInscrit').attr('action', '<?= base_url() ?>admin/addInscrit');

    });

    //empty the inputs when the modal is closed(hidden)
    $('#inscritModal').on('hidden.bs.modal', function () {
      $('#name').val("");
      // $('#idSem').val([]);
    });
  });

  /********************* add seminar ****************** */

  $(document).ready(function () {

    $('#semModalBtn').on('click', function () {
      document.getElementById("semModalLabel").innerHTML = "ادخال المعلومات";
      document.getElementById('addSem-submit').innerHTML = 'اضافة';

      $('#formSem').attr('action', '<?= base_url() ?>admin/addSeminar');

    });

    //empty the inputs when the modal is closed(hidden)
    $('#semModal').on('hidden.bs.modal', function () {
      $('#titre').val("");
      $('#type').val("");
      $('#personCertifie').val("");
      $('#organisateur').val("");
      $('#personSign').val("");
      $('#date').val("");

      // $('#imageUrl').val([]);
    });
  });

  /********************* modifier inscrit ****************** */
  //load data into edit inscrit modal
  $(document).ready(function () {
    $('.datatable').on('click', '.edit-inscrit', function () {
      document.getElementById("inscritModalLabel").innerHTML = "تعديل المعلومات";
      document.getElementById('addInsc-submit').innerHTML = 'تعديل';
      var inscId = $(this).attr('data-edit-id');
      $.ajax({
        url: "<?php echo base_url('Admin/formUpdate/'); ?>" + inscId,
        type: "GET",
        dataType: "json",
        success: function (response) {
          // Populate form inputs with the retrieved values
          $('#name').val(response.name);
          $('#idSem option[value="' + response.idSeminar + '"]').prop('selected', true);

        },
        error: function (xhr, status, error) {
          console.log(xhr.responseText); // Display any errors
        }
      });

      $('#formInscrit').attr('action', '<?= base_url() ?>admin/editInscrit/' + $(this).attr('data-edit-id'));
    });
  });
  /********************* edit seminar ****************** */
  //load data into edit seminar modal
  $(document).ready(function () {
    $('.datatable').on('click', '.edit-sem', function () {
      document.getElementById("semModalLabel").innerHTML = "تعديل المعلومات";
      document.getElementById('addSem-submit').innerHTML = 'تعديل';
      var semId = $(this).attr('data-edit-id');
      $.ajax({
        url: "<?php echo base_url('Admin/formUpdate/0/'); ?>" + semId,
        type: "GET",
        dataType: "json",
        success: function (response) {
          // Populate form inputs with the retrieved values
          $('#titre').val(response.titre);
          $('#type').val(response.type);
          $('#personCertifie').val(response.personCertifie);
          $('#organisateur').val(response.organisateur);
          $('#personSign').val(response.personSign);
          $('#date').val(response.date);
          selectImage(response.imageUrl);
          console.log(response);

        },
        error: function (xhr, status, error) {
          console.log(xhr.responseText); // Display any errors
        }
      });

      $('#formSem').attr('action', '<?= base_url() ?>admin/editSeminar/' + $(this).attr('data-edit-id'));
    });
  });

  /********************* delay until the javascript is loaded ****************** */

  // Simulate a delay to demonstrate loading
  setTimeout(function () {
    // Hide the loading indicator
    document.getElementById('loading-indicator').style.display = 'none';
    document.querySelector('.main-content').style.display = 'block';
    // Show the content once the JavaScript code has finished loading
  }, 2000); // Change the delay time as needed


</script>
</body>

</html>