<?php

namespace App\Services;
use App\Models\MenuModel;
use Exception;
class MenuService extends BaseService
{
    private $menus;
    function __construct(){
        parent::__construct();
        $this -> menus = new MenuModel();
        $this -> menus -> protect(false);
    }
    public function getAllMenus(){
        return $this->menus->findAll();
    }
    public function getAllMenuByLoai($loai){
        if($loai == 1){
            return $this->menus->where('loai',$loai)->findAll(4,0);
        }
        return $this->menus->where('loai',$loai)->findAll();
    }
    public function getAllMenuByLoaiAndOffset($loai){
        if($loai == 1){
            return $this->menus->where('loai',$loai)->findAll(5,1);
        }
        return $this->menus->where('loai',$loai)->findAll();
    }

    
    public function getAllMenuByPartner($id){
        return $this->menus->where('partner',$id)->findAll();
    }
}
