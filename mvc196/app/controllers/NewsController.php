<?php
class NewsController extends BaseController
{
    private $tableNews = null;
    public function __construct()
    {
        parent::__construct();
        $this->tableNews = 'news';
    }
    //user 
    public function index()
    {
        $data = $this->headerData;
        $getNewModel = $this->loadModel('newModel');
        $data['New_array_data'] = $getNewModel->selectNewByAll($this->tableNews);
        $this->loadView('header', $data);
        $this->loadView('newsView', $data);
        $this->loadView('footer',$data);
    }
    //admin
    public function create()
    {

        session::checkLoginSession();
        $this->loadViewAdmin('header');
        $this->loadViewAdmin('dashboardView');
        $this->loadViewAdmin('new/add_news');
        $this->loadViewAdmin('footer');
    }
    public function store()
    {
        session::checkLoginSession();
        $newName = $this->input->post('tentintuc');
        $newCode = $this->input->post('matin');
        $newImg =  $_FILES["hinhanh"]['name'];
        $newCont = $this->input->post('noidung');
        $newStatus = $this->input->post('tinhtrang');
        $Img_Format = explode(".", $newImg);
        $img_filter = strtolower(end($Img_Format));
        $img_output = $Img_Format[0] . time() . "." . $img_filter;
        $path_upload  = 'public/imgs/' . $img_output;
        $data  = [
            'name' => $newName,
            'code' => $newCode,
            'image' => $img_output,
            'content' => $newCont,
            'status' => $newStatus
        ];
        $getNewModel = $this->loadModel('newModel');
        $reult2 = $getNewModel->insertNew($this->tableNews, $data);
        if ($reult2 == 1) {
            move_uploaded_file($_FILES['hinhanh']["tmp_name"], $path_upload);
			session::set('message_success', 'Tạo tin tức thành công!');
            header("Location:" . BASE_URL . "news/list");
        } else {
			session::set('message_success', 'Tạo tin tức không thành công!');
            header("Location:" . BASE_URL . "news/list");
		}
    }
    public function list($pagination)
    {

        //model process
        session::checkLoginSession();
        $getNewModel = $this->loadModel('newModel');
        $data = $this->processPaginationProduct($getNewModel, $this->tableNews, $pagination, 'list_News', 'id');

        //view process
        $this->loadViewAdmin('header');
        $this->loadViewAdmin('dashboardView');
        $this->loadViewAdmin('new/list_NewsView', $data);
        $this->loadViewAdmin('footer');
    }
    public function delete($id)
    {
        //model process
        session::checkLoginSession();
        $conditon = "id='$id[0]'";
        $getNewModel = $this->loadModel('newModel');
        $isDeleted = $getNewModel->deleteNew($this->tableNews, $conditon);
		if ($isDeleted == true) {
            session::set('message_success', 'Xóa tin tức thành công!');
            header("Location:" . BASE_URL . "news/list");
        } else {
            session::set('message_fail', 'Xóa tin tức không thành công!');
            header("Location:" . BASE_URL . "news/list");
        }
    }
    public function edit($id)
    {

        //model process
        session::checkLoginSession();
        $conditon = "id = '$id[0]'";
        $getNewModel = $this->loadModel('newModel');
        $data['list_NewsById'] = $getNewModel->selectNewById($this->tableNews, $conditon);

        //view process
        $this->loadViewAdmin('header');
        $this->loadViewAdmin('dashboardView');
        $this->loadViewAdmin('new/editViews', $data);
        $this->loadViewAdmin('footer');
    }
    public function update($id)
    {
        session::checkLoginSession();

        $newName = $this->input->post('tentintuc');
        $newCont = $this->input->post('noidung');
        $newStatus = $this->input->post('tinhtrang');

        $newImg =  $_FILES["hinhanh"]['name'];
        $tmp_img =  $_FILES["hinhanh"]['tmp_name'];

        $Img_Format = explode(".", $newImg);
        $img_filter = strtolower(end($Img_Format));
        $img_output = $Img_Format[0] . time() . "." . $img_filter;


        $conditon = "id = '$id[0]'";

        if ($newImg) {
            $getNewModel = $this->loadModel('newModel');
            $data['list_NewsById'] = $getNewModel->selectNewById($this->tableNews, $conditon);

            foreach ($data as $key => $value) {
                if ($value['image']) {
                    unlink('public/imgs/' . $value['image']);
                }
            }

            $path_upload  = 'public/imgs/' . $img_output;

            $data  = [
                'name' => $newName,
                'image' => $img_output,
                'content' => $newCont,
                'status' => $newStatus
            ];

            move_uploaded_file($tmp_img, $path_upload);
        } else {
            $data  = [
                'name' => $newName,
                'content' => $newCont,
                'status' => $newStatus
            ];
        }
        $updateNew = $this->loadModel('newModel');
        $isUpdated = $updateNew->updateNew($this->tableNews, $data, $conditon);
		if ($isUpdated == true) {
            move_uploaded_file($tmp_img, $path_upload);
            session::set('message_success', 'Cập nhật tin tức thành công!');
            header("Location:" . BASE_URL . "news/list");
        } else {
            session::set('message_fail', 'Cập nhật tin tức không thành công!');
            header("Location:" . BASE_URL . "news/list");
        }
    }
}
