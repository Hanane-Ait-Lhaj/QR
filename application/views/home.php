<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title> كلية الشريعة بفاس</title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.8/angular.min.js"></script>
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

  <link rel="stylesheet" href="<?= base_url() ?>plugins/css/style.css">
  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.css">
  <script src="https://www.google.com/recaptcha/api.js"></script>
  <script src="<?= base_url() ?>plugins/js/script.js"></script>


  <script src=" https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js "
    intégrité="sha512-CNgIRecGo7nphbeZ04Sc13ka07paqdeTu0WR1IM4kNcpmBAUSHSQX0FslNhTDadL4O5SAGapGt4FodqL8My0mA=="
    crossorigin="anonyme" referrerpolicy="no-référent"></script>
</head>

<body>
  <nav>
    <div class="nav-wrapper"></div>
    <p class="logo">
      <a href="<?= base_url() ?>" class="brand-logo center" style="
    width: 410px;
    border-radius: 10px;
">
        <img src="<?= base_url() ?>plugins/img/logo.png" alt="" srcset="">
      </a>
    </p>
  </nav>
  <div id="progress" class="progress hide">
    <div class="indeterminate"></div>
  </div>
  <style>
    body {
      direction: rtl;
    }

    .container {
      width: 100%;
      margin: 0;
      max-width: 100%;
    }

    .row .cont {
      height: calc(100vh - 64px);
      margin: 0;
      display: flex;
    }

    .row_box {
      width: 400px;
      background-color: white;
      box-shadow: 0 0 4px #d3d2d2;
      margin: auto;
      border-radius: 3px;
      padding: 25px;
    }

    .qrcode-container {
      text-align: center;
      width: 228px;
      height: 228px;
      margin: 0 auto;
    }
  </style>

  <div class="container">
    <br><br><br><br>

    <div class="row_box">
      <div class="row">
        <div class="mb-3">
          <div class="input-field col s12">

          </div>

          <div class="input-field col s12">
            <select class="browser-default" onchange="sendAjaxRequest(this.value)" name="idSem" id="idSem">
              <option value="" disabled selected>اختر ندوة</option>
              <?php
              foreach ($seminar as $s) {
                ?>
                <option value="<?= $s->idSeminar ?>"><?= $s->titre ?></option>
                <?php
              }
              ?>
            </select>
          </div>

          <div class="input-field col s12">
            <div>

              <span id="text" class="text-bg-info" style="display: none;overflow: hidden;"></span>
              <div class="qrcode-container">
                <div id="qrcode" style="margin-top:15px;"></div>
              </div>

            </div>
          </div>
          <a id="linkRedirect" href="javascript: void(0)">التسجيل</a>
        </div>
      </div>


      <script type="text/javascript">
        var qrcode = new QRCode(document.getElementById("qrcode"), {
          width: 200,
          height: 200
        });

        function makeCode(link) {
          var elText = document.getElementById("text");
          elText.innerText = link;

          qrcode.makeCode(link);
        }

        // 


        function sendAjaxRequest(idSem) {
          idSem = document.getElementById('idSem').value;
          if (idSem == "") {
            M.toast({ html: ' اختر ندوة !' });
            $('#linkRedirect').attr('href', "javascript: void(0)");
          } else {

            $.ajax({
              url: '<?= base_url() ?>home/get_qr_code',
              type: "POST",
              data: { "idSem": idSem },
              dataType: "json",
              success: function (response) {

                // get the link
                makeCode(response);
                $('#linkRedirect').attr('href', response);
              }
            });
          }

        }

        // Call the function immediately when the page loads
        $(document).ready(function () {
          idSem = document.getElementById('idSem').value;

          if (idSem != "") {
            sendAjaxRequest(idSem);

          }
          // Resend the AJAX request every 10 seconds
          setInterval(function () { sendAjaxRequest(idSem); }, 10000); // 10000 milliseconds = 10 seconds

        });


        <?php
        if ($etat)
          echo "M.toast({html: 'معلومات خاطئة !'})";
        ?>
        
    </script>
</body>

</html>