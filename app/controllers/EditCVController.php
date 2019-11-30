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

        
        public function submitCV(){
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
                    $start_date = $ex["start_date"],
                    $end_date = $ex["end_date"],
                    $title = $ex["title"],
                    $description = $ex["description"]
                );
                array_push($education, $CV_section);
            }

            return $this->cvService->insertCV(
                $user_id = 1,
                $avatar = $_POST["avatar"],
                $fullname = $_POST["fullname"],
                $professional = $_POST["professional"],
                $about_me = $_POST["about_me"],
                $date_created = time(),
                $category = "IT",
                $address = $_POST["address"],
                $phone = $_POST["phone"],
                $email = $_POST["email"],
                $template_ID = 1,
                $education = $education,
                $experiences = $experiences
            );

        }

        public function render(){
            parent::getView("editCV");
        }

    }
?>