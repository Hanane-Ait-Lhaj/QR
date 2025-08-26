<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('DB');
    $this->load->library('session');
    $this->load->helper(array('form', 'url'));

    //redirect if not logged in
    if ($this->session->username == null && $this->router->fetch_method() != "logout" && $this->router->fetch_method() != "login") {

      $this->session->set_flashdata('errLogin', 'يرجى تسجيل الدخول أولا');
      redirect(base_url('admin/login'));
    }

    //if the user is not an admin then he can't enter these pages
    if (
      $this->session->userdata('admin') == false && ($this->router->fetch_method() == "tableUser" || $this->router->fetch_method() == "config")
    ) {
      show_404();
    }
  }

  /************************* Manage Sessions************************ */

  public function changeTheme()
  {
    if ($this->session->theme == 'light') {
      $this->session->set_userdata('theme', 'dark');
    } else {
      $this->session->set_userdata('theme', 'light');
    }
  }

  public function index($etat = false)
  {
    if ($this->session->username != null) {
      $this->load->view('admin');
    } else {
      $data['etat'] = $etat;
      $this->load->view('admin/login', $data);
    }
  }

  public function login()
  {
    if ($this->session->username != null) {
      $this->index();
    } else {
      $username = $this->input->post('username');
      $password = $this->input->post('password');
      if (!isset($password) || !isset($username)) {
        $this->index();
        return;
      } else {
        $data = $this->DB->authentifier($username, $password);

        if (is_null($data)) {
          $this->index('معلومات خاطئة !');
        } else {
          //in sql 1 is true
          $adm = $data->admin == 1;
          $act = $data->active == 1;
          $newdata = array(
            'id' => $data->id,
            'username' => $data->username,
            'password' => $data->password,
            'admin' => $adm,
            'active' => $act
          );
          $this->session->set_userdata($newdata);
          $this->session->set_flashdata('message', 'تم تسجيل الدخول ');

          $this->index();

        }
      }


    }

  }

  public function logout()
  {
    $newdata = array(
      'id' => null,
      'username' => null,
      'password' => null,
      'admin' => null,
      'active' => null
    );
    $this->session->set_userdata($newdata);
    redirect('admin/login');
  }


  /************************* Manage SEMINAR************************ */

  public function tableSeminar($idSem = false)
  {
    $data['seminars'] = $this->DB->selectSeminar();
    $imgs = array();

    $directory = "plugins/img/";

    // Check if the directory exists
    if (is_dir($directory)) {
      // Get all files in the directory
      $files = scandir($directory);

      // Loop through each file and display its name
      foreach ($files as $file) {
        if ($file != "." && $file != "..") {

          $imgs[] = $directory . $file;
        }
      }
    } else {
      echo ("directory not found");
    }
    $data['imgs'] = $imgs;
    $this->load->view('admin/header');
    $this->load->view('admin/tableSeminar', $data);
    $this->load->view('admin/footer');
  }
  public function addSeminar()
  {

    $data['titre'] = $this->input->post('titre');
    $data['type'] = $this->input->post('type');
    $data['personCertifie'] = $this->input->post('personCertifie');
    $data['organisateur'] = $this->input->post('organisateur');
    $data['personSign'] = $this->input->post('personSign');
    $url = $this->input->post('imageUrl');
    $data['date'] = $this->input->post('date');
    
    if ($url=='') {
      $config['upload_path'] = 'plugins/img/';
      $config['allowed_types'] = 'png';
      $config['max_size'] = 100; // Maximum file size in KB

      $this->load->library('upload', $config);
      

      if (!$this->upload->do_upload('newImage')) {
        $error = array('error' => $this->upload->display_errors());
        // $this->load->view('upload_form', $error);
        echo var_dump($error);
      } else {
        $file = $this->upload->data();
        $data['imageUrl'] = $config['upload_path'].$file['file_name'];
        
      }
    } else {
      $data['imageUrl'] = $url;
    }
    
    if (isset($data)) {
      $r = $this->DB->insertSeminar($data);

      if ($r == true) {
        $message = 'تم التسجيل بنجاح';
        $this->session->set_flashdata('semMsg', $message);
        redirect(base_url() . 'admin/tableSeminar');
      } else {
        $message = 'حدث خطأ المرجو اعادة المحاولة .';
        $this->session->set_flashdata('semMsg', $message);
        redirect(base_url() . 'admin/tableSeminar');

      }
    } else {
      $message = 'خطأ في المعلومات';
      $this->session->set_flashdata('semMsg', $message);
      redirect(base_url() . 'admin/tableSeminar');
    }
  }

  public function removeSeminar($ID)
  {
    $this->DB->deleteSeminar($ID);
    redirect('admin/tableSeminar');
  }
  public function editSeminar($idSem)
  {

    $data['titre'] = $this->input->post('titre');
    $data['type'] = $this->input->post('type');
    $data['personCertifie'] = $this->input->post('personCertifie');
    $data['organisateur'] = $this->input->post('organisateur');
    $data['personSign'] = $this->input->post('personSign');
    $data['imageUrl'] = $this->input->post('imageUrl');
    $data['date'] = $this->input->post('date');


    if (isset($data)) {
      $r = $this->DB->updateSeminar($idSem, $data);
      if ($r == true) {
        $message = 'تم التعديل بنجاح';
        $this->session->set_flashdata('semMsg', $message);
        redirect(base_url() . 'admin/tableSeminar');
        $this->session->set_flashdata('semMsg', $message);
      } else {

        $message = 'حدث خطأ المرجو اعادة المحاولة .';
        $this->session->set_flashdata('semMsg', $message);
        redirect(base_url() . 'admin/tableSeminar');
      }

    } else {
      $message = 'خطأ في التعديل';
      $this->session->set_flashdata('semMsg', $message);
      redirect(base_url() . 'admin/tableSeminar');
    }

  }


  /***************************Manage Users************************** */


  // redirect to user's table
  public function tableUser()
  {
    $data['users'] = $this->DB->selectUser();

    $this->load->view('admin/header');
    $this->load->view('admin/tableUser', $data);
    $this->load->view('admin/footer');

  }

  //activer ou désactiver un utilisateur
  public function changeUserStatus()
  {
    $usrId = $this->input->post('userId');
    $userChecked = $this->input->post('userChecked');

    if (isset($usrId)) {
      if ($userChecked === "true") {
        $this->DB->enableUser($usrId);
      } else {
        $this->DB->disableUser($usrId);
      }
    }
  }

  /***************************Manage Inscrits************************** */

  public function tableInscrit($idSem = false)
  {
    if ($idSem) {
      // $data['inscrits'] = $this->DB->selectInscrit();
      $data['inscrits'] = $this->DB->selectInscritBySeminar($idSem);

      $data['seminar'] = $this->DB->selectSeminar();

      $this->load->view('admin/header');
      $this->load->view('admin/tableInscrit', $data);
      $this->load->view('admin/footer');

    } else {
      $this->index();

    }

  }

  public function addInscrit()
  {

    $data['name'] = $this->input->post('name');
    $data['idSeminar'] = $this->input->post('idSem');
    if (isset($data)) {
      $r = $this->DB->insertInscrit($data);

      if ($r === true) {
        $this->session->set_flashdata('added', 'تم التسجيل بنجاح');
        $this->tableInscrit();
        // redirect(base_url() . 'admin/tableInscrit');
      } else {
        $this->session->set_flashdata('errmsg', 'حدث خطأ المرجو اعادة المحاولة .');
        // redirect(base_url() . 'admin/tableInscrit');
        $this->tableInscrit();

      }
    } else {

      $this->session->set_flashdata('errmsg', 'خطأ في المعلومات');
      // redirect(base_url() . 'admin/tableInscrit');
      $this->tableInscrit();

    }
  }

  /*******************Current User********************* */

  public function adminProfile()
  {
    $this->load->view('admin/header');
    $this->load->view('admin/adminProfile');
    $this->load->view('admin/footer');
  }
  public function editPassword()
  {
    $newPassword = $this->input->post('newPassword');
    $userId = $this->session->id;
    $this->DB->editPass($userId, $newPassword);
    $this->session->set_userdata('password', $newPassword);
  }


  /***********************Other Functions****************************** */

  //remplire le formulaire pour modifier les donnees
  public function formUpdate($inscritID, $seminarID = false)
  {
    if ($seminarID) {
      $userData = $this->DB->selectSeminar($seminarID);
      $date = new DateTime($userData->date);
      $userData->date = $date->format('Y-m-d H:i');

    } else {
      $userData = $this->DB->selectInscrit($inscritID);
    }
    echo json_encode($userData);
  }

}