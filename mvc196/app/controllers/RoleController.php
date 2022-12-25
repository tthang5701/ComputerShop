<?php
class RoleController extends BaseController
{
  protected $tableRoles = 'roles';
  public function __construct()
  {
    parent::__construct();
  }
  //user modul 
  public function create()
  {
    session::checkLoginSession();
    $this->loadViewAdmin('header');
    $this->loadViewAdmin('dashboardView');
    $this->loadViewAdmin('role/create');
    $this->loadViewAdmin('footer');
  }
  public function store()
  {
    session::checkLoginSession();
    $roleModel = $this->loadModel('roleModel');
    $roleName = $this->input->post('name');
    $roleDescription = $this->input->post('description');
    $isStored = $roleModel->insertToRoleTable($this->tableRoles, ['name' => $roleName, 'description' => $roleDescription]);
    if ($isStored == true) {
      session::set('message_success', 'Lưu vai trò thành công!');
      header("Location:" . BASE_URL . "role/list");
    } else {
      session::set('message_fail', 'Lưu vai trò  không thành công!');
      header("Location:" . BASE_URL . "role/list");
    }
  }
  public function edit($id)
  {
    //model process
    session::checkLoginSession();
    $roleModel = $this->loadModel('roleModel');
    $data['role'] = $roleModel->selectWithCondition($this->tableRoles, 'id', $id[0]);
    //view process
    $this->loadViewAdmin('header');
    $this->loadViewAdmin('dashboardView');
    $this->loadViewAdmin('role/edit', $data);
    $this->loadViewAdmin('footer');
  }
  public function list()
  {
    //model process
    session::checkLoginSession();
    $roleModel = $this->loadModel('roleModel');
    $data['roles'] = $roleModel->seletcRoleRecoreds($this->tableRoles);
    //view 
    $this->loadViewAdmin('header');
    $this->loadViewAdmin('dashboardView');
    $this->loadViewAdmin('role/list', $data);
    $this->loadViewAdmin('footer');
  }
  public function delete($id)
  {
    session::checkLoginSession();
    //model process
    $conditon = "id='$id[0]'";
    $roleModel = $this->loadModel('roleModel');
    $isDeleted = $roleModel->deleteRoleRecords($this->tableRoles, $conditon);
    if ($isDeleted == true) {
      session::set('message_success', 'Xóa vai trò thành công!');
      header("Location:" . BASE_URL . "role/list");
    } else {
      session::set('message_fail', 'Xóa vai trò không thành công!');
      header("Location:" . BASE_URL . "role/list");
    }
  }
  public function update($id)
  {
    session::checkLoginSession();
    $roleModel = $this->loadModel('roleModel');
    $data = [
      'name' => $this->input->post('name'),
      'description' => $this->input->post('description'),
    ];
    $isUpdated = $roleModel->updateRoleTable($this->tableRoles, $data, "id = '$id[0]'");
    if ($isUpdated == true) {
      session::set('message_success', 'Cập nhật vai trò thành công!');
      header("Location:" . BASE_URL . "role/list");
    } else {
      session::set('message_fail', 'Cập nhật vai trò không thành công!');
      header("Location:" . BASE_URL . "role/list");
    }
  }
}
