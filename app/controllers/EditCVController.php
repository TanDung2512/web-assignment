<?php
    require_once __DIR__."/Controller.php";
    require_once __DIR__."/../services/cvService.php";
    require_once __DIR__."/../classes/cv.php";

    class EditCVController extends Controller{

        private $cvService;
        public function __construct(){
            parent::__construct();
            $this->cvService = new cvService();
        }


        public function createRawInfo($param){
            $data = "";
            foreach($param as $key => $value){
                if(is_array($value)) 
                    $data = $data." ".$this->createRawInfo($value);
                else 
                    $data = $data." ".$value;
            }
            return $data;
        }

        public function submitCV(){
            $raw_info = $this->createRawInfo($_POST);

            $experiences = [];
            foreach($_POST["experiences"] as $ex ){
                $CV_section = new CV_Section(
                    null,
                    null,
                    $info_flag = "0",
                    $start_date = $ex["start_date"],
                    $end_date = $ex["end_date"],
                    $title = $ex["title"],
                    $description = $ex["description"]
                );

                array_push($experiences, $CV_section);
            }
 
            $education = [];
            
            foreach($_POST["education"] as $edu ){
                $CV_section = new CV_Section(
                    null,
                    null,
                    $info_flag = "1",
                    $start_date = $edu["start_date"],
                    $end_date = $edu["end_date"],
                    $title = $edu["title"],
                    $description = $edu["description"]
                );
                array_push($education, $CV_section);
            }

            return $this->cvService->insertCV(
                $user_id = intval($_SESSION["user_ID"]),
                $avatar = $_POST["avatar"],
                $fullname = $_POST["fullname"],
                $professional = $_POST["professional"],
                $about_me = $_POST["about_me"],
                $date_created = time(),
                $category = "IT",
                $address = $_POST["address"],
                $phone = intval($_POST["phone"]),
                $email = $_POST["email"],
                $template_ID = intval($_POST["template_ID"]),
                $raw_info = $raw_info,
                $education = $education,
                $experiences = $experiences
            );
        }


        public function editCV(){
            $raw_info = $this->createRawInfo($_POST);

            $experiences = [];
            if(isset($_POST["experiences"])) foreach($_POST["experiences"] as $ex ){
                $ex_ID = NULL;
                if(isset($ex["ID"])) {
                    $ex_ID = intval($ex["ID"]);
                }
                $CV_section = new CV_Section(
                    $ex_ID,
                    NULL,
                    $info_flag = "0",
                    $start_date = $ex["start_date"],
                    $end_date = $ex["end_date"],
                    $title = $ex["title"],
                    $description = $ex["description"]
                );
                array_push($experiences, $CV_section);
            }
 
            $education = [];
            
            if(isset($_POST["education"])) foreach($_POST["education"] as $edu ){
                $edu_ID = NULL;
                if(isset($edu["ID"])) {
                    $edu_ID = intval($edu["ID"]);
                }

                $CV_section = new CV_Section(
                    $edu_ID ,
                    null,
                    $info_flag = "1",
                    $start_date = $edu["start_date"],
                    $end_date = $edu["end_date"],
                    $title = $edu["title"],
                    $description = $edu["description"]
                );
                array_push($education, $CV_section);
            }

            return $this->cvService->editCVByIDCols(
                $CV_ID = intval($_POST["CV_ID"]),
                $avatar = $_POST["avatar"],
                $fullname = $_POST["fullname"],
                $professional = $_POST["professional"],
                $about_me = $_POST["about_me"],
                $address = $_POST["address"],
                $phone = $_POST["phone"],
                $email = $_POST["email"],
                $template_ID = intval($_POST["template_ID"]),
                $raw_info = $raw_info,
                $experiences = $experiences,
                $education = $education
            );
        }
        public function render(){
            parent::getView("editCV");
        }

    }
?>