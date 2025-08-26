<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="ar">

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

  <script src="<?= base_url() ?>plugins/js/script.js"></script>
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
      width: 128px;
      height: 128px;
      margin: 0 auto;
    }
  </style>

  <div class="container">
    <form action="<?= base_url() ?>home/login" method="post">
      <br><br><br><br>

      <div class="row_box">
        <p
          style="text-align: center;margin-top: 5px;font-size: 24px;color: #98a8ff;margin-top: 2px;margin-bottom: 5px;">
          <span><?= $this->DB->selectSeminar($id)->titre ?></span>
        </p>

        <div class="row">
          <div class="input-field col s12">
            <input required hidden name="idSem" id="idSem" type="text" value="<?= $id ?>">
            <input required style="text-align: center;" name="name" id="name" type="text" class="validate">
            <label class="active" for="name" style="padding-right: 20px;">الاسم</label>
          </div>


          <div class="input-field col s12">

          </div>
          <p style="text-align: center;">
            <button tyle="submit" style="width: 150px;background-color: #6678dc;"
              class="waves-effect waves-light btn">التسجيل</button>
          </p>
        </div>
    </form>
  </div>
  <script>
    <?php
    if ($etat)
      echo "M.toast({html: 'معلومات خاطئة !'})";

    ?>
                        
        </script>
    </body>

    </html>