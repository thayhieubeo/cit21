<?php

namespace App\Services;
use App\Models\GroupModel;
use Exception;
class GroupService extends BaseService
{
    private $group;
    function __construct(){
        parent::__construct();
        $this -> group = new GroupModel();
        $this -> group -> protect(false);
    }
    public function getAllGroup(){
        return $this->group->findAll();
    }    
    public function getNameByID($id){
        return $this->group->where('id',$id)->first();
    }
}
