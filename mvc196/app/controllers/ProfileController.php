<?php


class ProfileController extends BaseController
{
  protected $tableUSer = 'users';
  public function __construct()
  {
    parent::__construct();
  }
  public function index()
  {
    $data = $this->headerData;
    $this->loadView('header', $data);
    $userModel = $this->loadModel('User');
    $data['user'] = $userModel->selectSpecifyUser($this->tableUSer, $this->session->get('user_id'));
    $this->loadView('profileView', $data);
    $this->loadView('footer', $data);
  }
  public function updateUser()
  {
    if (isset($_POST['btnSubmit'])) {
      $userModel = $this->loadModel('User');
      $userId = $this->input->post('id');
      $dataUpdate = [
        'name' => $this->input->post('name'),
        'email' => $this->input->post('email'),
        'address' => $this->input->post('address'),
        'phone_number' => $this->input->post('phoneNumber'),
        'username' => $this->input->post('username'),
      ];
      $condition = "id = '$userId'";
      $isUpdated = $userModel->updateUser('users', $dataUpdate, $condition);
      if ($isUpdated == true) {
        session::set('message_success', 'Cập nhật thông tin cá nhân thành công!');
        header("Location:" . BASE_URL . "profile/index");
      } else {
        session::set('message_fail', 'Cập nhật thông tin cá nhân không thành công!');
        header("Location:" . BASE_URL . "profile/index");
      }
    }
  }
}
