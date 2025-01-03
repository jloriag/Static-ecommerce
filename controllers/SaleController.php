<?php
require_once __DIR__ . '/../models/Sale.php';

use App\Services\Email\SaleEmailService;

class SaleController {

    private $emailService;
    
    private $saleModel;
    
    public function __construct() {
        $this->emailService=new SaleEmailService($_POST['product_id'],1,"jloriag@hotmail.com","Josue",$_POST['tel'],$_POST['name'],$_POST['address']);
        $this->saleModel=new Sale();
    }
    
    // Method to save a sale
    public function save(){
        $this->emailService->sendEmail();
        return $this->saleModel->create($_POST['paid_method'], $_POST['state']);
    }
}