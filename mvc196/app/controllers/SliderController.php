<?php
class SliderController extends BaseController
{
    protected $tableSlider = 'slider';
    public function __construct()
    {
        parent::__construct();
    }
    //admin modul
    public function create()
    {

        session::checkLoginSession();
        $this->loadViewAdmin('header');
        $this->loadViewAdmin('dashboardView');
        $this->loadViewAdmin('sliders/add_slider');
        $this->loadViewAdmin('footer');
    }
    public function store()
    {
        session::checkLoginSession();
        $SliderImg =  $_FILES["hinhanh"]['name'];
        $sliderTitle = $_POST['tieude'];
        $Img_Format = explode(".", $SliderImg);
        $img_filter = strtolower(end($Img_Format));
        $img_output = $Img_Format[0] . time() . "." . $img_filter;
        $path_upload  = 'public/imgs/' . $img_output;

        $data  = [
            'image' => $img_output,
            'title' =>  $sliderTitle,
            'status' => $this->input->post('trangthai'),
        ];

        $getSliderModel = $this->loadModel('sliderModel');
        $isStored = $getSliderModel->insertSlider($this->tableSlider, $data);
        if ($isStored == true) {
            move_uploaded_file($_FILES['hinhanh']["tmp_name"], $path_upload);
            session::set('message_success', 'Lưu slider thành công!');
            header("Location:" . BASE_URL . "slider/list");
        } else {
            session::set('message_fail', 'Lưu slider không thành công!');
            header("Location:" . BASE_URL . "slider/list");
        }
    }
    public function list()
    {
        //model process
        session::checkLoginSession();
        $getSliderModel = $this->loadModel('sliderModel');
        $sliders = $getSliderModel->selectSliderAll($this->tableSlider);
        $number_row = count($sliders);
        if (isset($pagination[0]) && isset($pagination[1])) {
            $numberProductOnPage = $pagination[0];
            $currentPage  = $pagination[1];
        }
        if (!isset($pagination[1]) && !isset($pagination[0]) || isset($pagination[1]) && !isset($pagination[0]) || !isset($pagination[1]) && isset($pagination[0])) {
            $currentPage = 1;
            $numberProductOnPage = 8;
        }
        $number_page = ceil($number_row / $numberProductOnPage);
        $data['number_page']  = [];
        array_push($data['number_page'], $number_page, $numberProductOnPage, $currentPage);
        $offset = ($currentPage - 1) * $numberProductOnPage;
        $data['list_News'] = $getSliderModel->selectSliderByAll($this->tableSlider, $numberProductOnPage, $offset);

        //view process
        $this->loadViewAdmin('header');
        $this->loadViewAdmin('dashboardView');
        $this->loadViewAdmin('sliders/list_sliderView', $data);
        $this->loadViewAdmin('footer');
    }
    public function delete($id)
    {
        //model process
        session::checkLoginSession();
        $conditon = "id='$id[0]'";
        $deleteSli = $this->loadModel('sliderModel');
        $isDeleted = $deleteSli->deleteSlider($this->tableSlider, $conditon);
        if ($isDeleted == true) {
            session::set('message_success', 'Xóa slider thành công!');
            header("Location:" . BASE_URL . "slider/list");
        } else {
            session::set('message_fail', 'Xóa slider không thành công!');
            header("Location:" . BASE_URL . "slider/list");
        }
    }
    public function edit($id)
    {

        //model process
        session::checkLoginSession();
        $conditon = "id = '$id[0]'";
        $list_Sli = $this->loadModel('sliderModel');
        $data['list_NewsById'] = $list_Sli->selectSliderWithConditon($this->tableSlider, $conditon);

        //view process
        $this->loadViewAdmin('header');
        $this->loadViewAdmin('dashboardView');
        $this->loadViewAdmin('sliders/editslider', $data);
        $this->loadViewAdmin('footer');
    }
    public function update($id)
    {
        session::checkLoginSession();

        $newImg =  $_FILES["hinhanh"]['name'];
        $tmp_img =  $_FILES["hinhanh"]['tmp_name'];
        $sliderTitle = $_POST['tieude'];
        $sliderStatus = $_POST['trangthai'];
        $Img_Format = explode(".", $newImg);
        $img_filter = strtolower(end($Img_Format));
        $img_output = $Img_Format[0] . time() . "." . $img_filter;
        $path_upload  = 'public/imgs/' . $img_output;
        $conditon = "id = '$id[0]'";
        if ($newImg) {
            $list_News = $this->loadModel('sliderModel');
            $data['list_NewsById'] = $list_News->selectSliderWithConditon($this->tableSlider, $conditon);

            foreach ($data as $value) {
                if ($value['image']) {
                    unlink('public/imgs/' . $value['image']);
                }
            }

            $data  = [
                'image' => $img_output,
                'title' =>  $sliderTitle,
                'status' =>  $sliderStatus,
            ];

        } else {
            $data  = [
                'title' =>  $sliderTitle,
                'status' =>  $sliderStatus,
            ];
        }
        $updateNew = $this->loadModel('sliderModel');
        $isUpdated = $updateNew->updateSlider($this->tableSlider, $data, $conditon);

        if ($isUpdated == true) {
            move_uploaded_file($tmp_img, $path_upload);
            session::set('message_success', 'Cập nhật slider thành công!');
            header("Location:" . BASE_URL . "slider/list");
        } else {
            session::set('message_fail', 'Cập nhật slider không thành công!');
            header("Location:" . BASE_URL . "slider/list");
        }
    }
}
