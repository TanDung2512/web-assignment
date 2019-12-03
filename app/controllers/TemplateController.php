<?php
require_once __DIR__ . "/Controller.php";

class TemplateController extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }
    public function render()
    {
        parent::getView("template");
    }
}
