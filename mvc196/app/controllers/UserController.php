<?php
class UserController extends BaseController
{
    protected $tableUser = 'users';
    protected $tableRoles = 'roles';
    public function __construct()
    {
        parent::__construct();
    }
    //admin
    public function list()
    {
        //model process
        session::checkLoginSession();
        $userModel = $this->loadModel('User');
		$roleModel = $this->loadModel('roleModel');
        $data['users'] = $userModel->selectUsersAll($this->tableUser, $this->tableRoles);
		$data['roles'] = $roleModel->seletcRoleRecoreds($this->tableRoles);
        //view process
        $this->loadViewAdmin('header');
        $this->loadViewAdmin('dashboardView');
        $this->loadViewAdmin('users/list', $data);
        $this->loadViewAdmin('footer');
    }
    public function create()
    {
        session::checkLoginSession();
        $roleModel = $this->loadModel('roleModel');
        $data['roles'] = $roleModel->seletcRoleRecoreds($this->tableRoles);
        $this->loadViewAdmin('header');
        $this->loadViewAdmin('dashboardView');
        $this->loadViewAdmin('users/create', $data);
        $this->loadViewAdmin('footer');
    }
    public function store()
    {
        session::checkLoginSession();
        $userModel = $this->loadModel('User');
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $address = $this->input->post('address');
        $phoneNumber = $this->input->post('phoneNumber');
        $userName = $this->input->post('username');
        $roleId = $this->input->post('role_id');
        $data = [
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'address' => $address,
            'phone_number' => $phoneNumber,
            'username' => $userName,
            'role_id' => $roleId
        ];
        $isStored = $userModel->insertUser($this->tableUser, $data);
        if ($isStored == true) {
            session::set('message_success', 'Lưu người dùng thành công!');
            header("Location:" . BASE_URL . "user/list");
        } else {
            session::set('message_fail', 'Lưu người dùng không thành công!');
            header("Location:" . BASE_URL . "user/list");
        }
    }
    public function delete($id)
    {
        //model process
        session::checkLoginSession();
        $conditon = "id='$id[0]'";
        $userModel = $this->loadModel('User');
        $isDeleted = $userModel->deleteRecords($this->tableUser, $conditon);
        if ($isDeleted == true) {
            session::set('message_success', 'Xóa người dùng thành công!');
            header("Location:" . BASE_URL . "user/list");
        } else {
            session::set('message_fail', 'Xóa người dùng không thành công!');
            header("Location:" . BASE_URL . "user/list");
        }
    }
    public function edit($id)
    {
        //model process
        session::checkLoginSession();
        $userModel = $this->loadModel('User');
        $roleModel = $this->loadModel('roleModel');
        $conditon = "users.id = $id[0]";
        $data['user'] = $userModel->selectUsersAndRoleCondition($this->tableUser, $this->tableRoles, $conditon);
        $data['roles'] = $roleModel->seletcRoleRecoreds($this->tableRoles);
        //view process
        $this->loadViewAdmin('header');
        $this->loadViewAdmin('dashboardView');
        $this->loadViewAdmin('users/edit', $data);
        $this->loadViewAdmin('footer');
    }
    public function update($id)
    {
        session::checkLoginSession();
        $userModel = $this->loadModel('User');
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $address = $this->input->post('address');
        $phoneNumber = $this->input->post('phoneNumber');
        $userName = $this->input->post('username');
        $roleId = $this->input->post('role_id');
        $data = [
            'name' => $name,
            'email' => $email,
            'address' => $address,
            'phone_number' => $phoneNumber,
            'username' => $userName,
            'role_id' => $roleId
        ];
        $isUpdated = $userModel->updateUser($this->tableUser, $data, "id='$id[0]'");
        if ($isUpdated == true) {
            session::set('message_success', 'Cập nhật người dùng thành công!');
            header("Location:" . BASE_URL . "user/list");
        } else {
            session::set('message_fail', 'Cập nhật người dùng không thành công!');
            header("Location:" . BASE_URL . "user/list");
        }
    }
}
