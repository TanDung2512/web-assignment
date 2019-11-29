<?php
    require_once __DIR__."/Controller.php";
    require_once __DIR__."/../services/cvService.php";
    require_once __DIR__."/../services/userService.php";
    class TestdbController extends Controller{

        public function __construct(){
            parent::__construct();
        }

        public function render(){


        }
    }
?>

<!--        $cvService = new CVService();
            var_dump($cvService->getTemplateCVByID(1));

            $tmp = new UserService();
            // var_dump($tmp);
            $res = $tmp->getUserByID(1);
            var_dump($res->get("user_mail"));
    
    $sub_section = [new CV_Section(
                1,
                2,
                1,
                "11",
                "22",
                "titlt",
                "description"
            )];

            $sub_section_2 = [new CV_Section(
                1,
                2,
                1,
                "11",
                "22",
                "titlt",
                "description"
            )];

            $testCV = new CV(
                1, 
                "avatar", 
                "fullname", 
                "carrer",
                "aboutme",
                "date_created",
                "addres",
                "phone",
                "email",
                1,
                2,
                "category",
                $sub_section,
                $sub_section_2
            );

            var_dump($testCV->get_json()); -->


<!-- 
            public function render(){
            $sub_section = [new CV_Section(
                NULL,
                2,
                "1",
                "22",
                "NULL",
                "titlt",
                "description"
            )];

            $sub_section_2 = [new CV_Section(
                NULL,
                2,       
                "2",
                "2017-1-2",
                "NULL",
                "titlt",
                "description"
            )];
            $cvService = new CVService();

            var_dump($cvService->insertCV(1, "asd", "asd", "aaa", "aa", "2017-1-2", "aaa", "aaa",0123123123, "tandung@gmailc.om", 1, $sub_section, $sub_section_2));
        -->