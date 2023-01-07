<?php
class LoginController extends BaseController
{
    protected $tableStatistic = 'statistic';
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        //show product type 

        $data = $this->headerData;
        $this->loadView('header', $data);
        $this->loadViewAdmin('loginView');
        $this->loadView('footer', $data);
    }
    public function checkLogin()
    {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $logInModel  = $this->loadModel('loginModel');
        $checked = $logInModel->logIn('users', $username, $password);
        if ($checked == 0) {
            session::set('login_status', $password);
            header("Location:" . LOGIN_URL_DEFAULT);
        } else {
            $resultAfterLogin = $logInModel->getLogIn('users', $username, $password);
            session::set('login', true);
            session::set('username', $resultAfterLogin[0]['username']);
            session::set('password', $resultAfterLogin[0]['password']);
            if ($resultAfterLogin[0]['role_id'] == 1) {
                //$this->updateOnlineStatusOfUser($resultAfterLogin[0]['id'], 1);
                session::set('user_id', $resultAfterLogin[0]['id']);
                header("Location:" . BASE_URL . "home/index");
            } else {
                //$this->updateOnlineStatusOfUser($resultAfterLogin[0]['id'], 1);
                session::set('user_id', $resultAfterLogin[0]['id']);
                header("Location:" . BASE_URL . "home/index");
            }
        }
    }
    public function updateOnlineStatusOfUser($userId, $isOnline)
    {
        $userModel = $this->loadModel('User');
        $data = [
            'is_online' => $isOnline,
        ];
        $condition = "id = $userId";
        $userModel->updateOnlineStatus('users', $data, $condition);
    }
    public function logOut()
    {
        session::destroySession();
        header("Location:" . LOGIN_URL_DEFAULT);
    }
    public function register()
    {
        $name = $this->input->post('name');
        $password = md5($this->input->post('password'));
        $email = $this->input->post('email');
        $address = $this->input->post('address');
        $phoneNumber = $this->input->post('phoneNumber');
        $username = $this->input->post('username');
        if (empty($name) || empty($password) || empty($email) || empty($address) ||  empty($phoneNumber) ||  empty($username)) {
            header("Location:" . LOGIN_URL_DEFAULT);
        } else {
            $userModel = $this->loadModel('User');
            $data = [
                'name' => $name,
                'email' => $email,
                'password' => $password,
                'address' => $address,
                'phone_number' => $phoneNumber,
                'username' => $username,
                'role_id' => 2,
            ];
            $isStored = $userModel->insertUser('users', $data);
            if ($isStored == true) {
                session::set('message_success', 'Tạo tài khoản thành công!');
                header("Location:" . LOGIN_URL_DEFAULT);
            } else {
                session::set('message_fail', 'Tạo tài khoản không thành công!');
                header("Location:" . LOGIN_URL_DEFAULT);
            }
        }
    }
}
