<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    body {
      background-color: #eee;
    }

    .card {
      background-color: #fff;
      width: 280px;
      border-radius: 33px;
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
      padding: 2rem !important;
    }

    .top-container {
      display: flex;
      align-items: center;
    }

    .profile-image {
      border-radius: 10px;
      border: 2px solid #5957f9;
    }

    .name {
      font-size: 15px;
      font-weight: bold;
      color: #272727;
      position: relative;
      top: 8px;
    }

    .pass {
      font-size: 14px;
      color: grey;
      position: relative;
      top: 2px;
    }

    .editPass {
      font-size: 15px;
      font-weight: bold;
      cursor: pointer;
    }
  </style>
</head>

<body>
  <div class="container d-flex justify-content-center mt-5 mt-4 mb-4 p-3 d-flex justify-content-center">

    <div class="card">

      <div class="top-container">
        <img src="<?= base_url() ?>plugins/img/profil.png" class="img-fluid profile-image" width="70">

      </div>

      <div class="ml-3">
        <h5 class="name">اسم المستعمل : <?= $this->session->userdata('username'); ?></h5>
        <p class="pass">كلمة المرور :
          <span id="passwordDisplay">
            <?= $this->session->userdata('password'); ?>
          </span>
        </p>
        <?php $a = $this->session->userdata('admin');
        if ($a) { ?>
          <h4>admin <i class="ri-checkbox-circle-fill"></i></h4>
        <?php } ?>
        <?php $act = $this->session->userdata('active');
        if ($act) { ?>
          <h4>مفعل <i class="ri-checkbox-circle-fill"></i></h4>
        <?php }else{
          ?>
          <h4>غير مفعل<i class="ri-checkbox-circle-fill">/i></h4>
          <?php
        } ?>
      </div>


      <button id="editBtn" type="button" onclick="editPassword()"
        class="btn btn-primary btn-label waves-effect waves-light rounded-pill editPass"><i
          class="ri-pencil-line label-icon align-middle rounded-pill fs-16 me-2"></i>تعديل كلمة المرور
      </button>

    </div>

  </div>
  <script>

    function editPassword() {
      const passwordDisplay = document.getElementById('passwordDisplay');
      const passwordInput = document.createElement('input');
      passwordInput.classList.add('form-control');
      passwordInput.type = 'password';
      passwordInput.value = passwordDisplay.innerText;
      var btn = document.getElementById("editBtn");
      $('#editBtn').attr('onclick', 'saveEditedPassword();');
      btn.innerText = 'حفظ'; // Change button text to "حفظ"
      

      passwordDisplay.replaceWith(passwordInput);
      passwordInput.focus();
    }

    function saveEditedPassword() {
      const inputElement = document.querySelector('input[type="password"]'); // Select the existing <input>
      const newPassword = inputElement.value;

      // Send the updated password to the server (e.g., via AJAX request)
      var data = { newPassword: newPassword }; // Include the newPassword in the data object
      $.post("<?= base_url() ?>admin/editPassword", data);
      
      // For demonstration purposes, we'll just update the display:
      const newPasswordSpan = document.createElement('span');
      newPasswordSpan.id = 'passwordDisplay';
      newPasswordSpan.textContent = '<?= $this->session->userdata('password'); ?>';

      const parentElement = inputElement.parentElement; // Get the parent element

      parentElement.replaceChild(newPasswordSpan, inputElement); // Replace <input> with <span>

      document.getElementById('passwordDisplay').innerText = newPassword;

      var btn = document.getElementById("editBtn");
      $('#editBtn').attr('onclick', 'editPassword();');
      btn.innerText = 'تعديل كلمة المرور'; // Change button text to original text

    }

  </script>
</body>

</html>