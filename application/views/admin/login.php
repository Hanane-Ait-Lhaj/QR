<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

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


  <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a81368914c.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    

    .container {
      display: flex;
      justify-content: center;
      align-items: center;
      width: 80%;
      height: 60%;
      border: 1px solid #CCC;
      background-color: #FFF;
      margin: 30px auto;
      border-radius: 20px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .body {
      display: flex;
      justify-content: center;
      align-items: center;
      width: 100%;
      padding: 20px;
      border-radius: 20px;
      box-sizing: border-box;

      margin: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      font-family: 'Poppins', sans-serif;
    }

    .container {
      display: flex;
      justify-content: space-between;
      align-items: center;
      width: 100%;
      max-width: 1200px;
      padding: 20px;
      box-sizing: border-box;
    }

    .img {
      flex: 1;
      display: flex;
      justify-content: center;
      align-items: center;
      margin-right: 20px;
    }

    .img img {
      max-width: 60%;
      height: auto;
    }

    .login-content {
      flex: 1;
      display: flex;
      flex-direction: column;
      align-items: center;
      text-align: center;
    }

    form {
      width: 100%;
      max-width: 360px;
    }

    .login-content h2 {
      margin: 15px 0;
      color: #333;
      text-transform: uppercase;
      font-size: 2.4rem;
    }

    .input-div {
      position: relative;
      display: flex;
      align-items: center;
      margin: 25px 0;
      padding: 5px 0;
      border-bottom: 2px solid #d9d9d9;
    }

    .i {
      color: #d9d9d9;
      display: flex;
      justify-content: center;
      align-items: center;
      margin-right: 10px;
    }

    .input-div>div {
      position: relative;
      height: 45px;
      flex: 1;
    }

    .input-div>div>h5 {
      position: absolute;
      left: 10px;
      top: 50%;
      transform: translateY(-50%);
      color: #999;
      font-size: 18px;
      transition: .3s;
    }

    .input-div:before,
    .input-div:after {
      content: '';
      position: absolute;
      bottom: -2px;
      width: 0%;
      height: 2px;
      background-color: #38d39f;
      transition: .4s;
    }

    .input-div:before {
      right: 50%;
    }

    .input-div:after {
      left: 50%;
    }

    .input-div.focus:before,
    .input-div.focus:after {
      width: 50%;
    }

    .input-div.focus>div>h5 {
      top: -5px;
      font-size: 15px;
    }

    .input-div.focus>.i>i {
      color: #38d39f;
    }

    .input-div>div>input {
      position: absolute;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      border: none;
      outline: none;
      background: none;
      padding: 0.5rem 0.7rem;
      font-size: 1.2rem;
      color: #555;
      font-family: 'Poppins', sans-serif;
    }

    .input-div.pass {
      margin-bottom: 4px;
    }

    .submit {
      display: block;
      width: 100%;
      height: 50px;
      border-radius: 25px;
      outline: none;
      border: none;
      background-image: linear-gradient(to right, #8ca6c3, #ff8282, #8ca6c3);
      background-size: 200%;
      color: #444;
      font-size: 15px;
      margin-top: 40px;
      font-weight: bold;
      text-transform: uppercase;
      margin: 1rem 0;
      cursor: pointer;
      transition: .5s;
    }

    .submit:hover {
      background-position: right;
    }

    @media screen and (max-width: 1050px) {
      .container {
        flex-direction: column;
      }

      .img {
        margin: 0 0 20px;
      }

      .login-content h2 {
        font-size: 1em;
        margin: 10px 0;
      }

      form {
        width: 100%;
        max-width: 290px;
      }

      .img img {
        width: 100%;
        height: auto;
      }
    }

    @media screen and (max-width: 950px) {
      .container {
        flex-direction: column;
      }

      .img {
        display: none;
      }

      .login-content {
        justify-content: center;
      }
    }
  </style>
</head>

<body>
  <nav>
    <div class="nav-wrapper"></div>
    <p class="logo">
      <a href="<?= base_url() ?>admin" class="brand-logo center" style="
    width: 410px;
    border-radius: 10px;">
        <img src="<?= base_url() ?>plugins/img/logo.png" alt="">
      </a>
    </p>
  </nav>
<br><br>
  <div class="body-container">
    <div class="body">
      <div class="container">
        <div class="img">
          <img src="<?= base_url() ?>plugins/img/logo1.png">
        </div>

        <div class="login-content">
          <form method="post" action="<?= base_url() ?>admin/login">
            <h2>لوحة التحكم منصة تحميل الشواهد كلية الشريعة بفاس</h2>

            <div class='row'>
              <div class='input-field col s9'>
                <i class="material-icons prefix">account_circle</i>
                <input class='validate' type="text" name="username" id='username' required>
                <label for='username'>اسم المستخدم</label>
              </div>
            </div>
            <div class='row'>
              <div class='input-field col s9'>
                <i class="material-icons prefix">lock_outline</i>
                <input class='validate' type="password" name="password" id="password" required>
                <label for='password'>كلمة المرور</label>
              </div>
            </div>
            <input type="submit" value="تسجيل الدخول" class="submit">
          </form>
        </div>
      </div>
    </div>
  </div>

  <script>
    <?php
    if ($etat != false)
      echo "M.toast({html: '" . $etat . "'})";
    ?>
  </script>
</body>

</html>
