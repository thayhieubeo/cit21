<?php

namespace App\Services;
use App\Models\LoaiSPModel;
use Exception;
class LoaiSPService extends BaseService
{
    private $loaisp;
    function __construct(){
        parent::__construct();
        $this -> loaisp = new LoaiSPModel();
        $this -> loaisp -> protect(false);
    }
    public function getAllLoaiSP(){
        return $this->loaisp->findAll();
    }    
}
