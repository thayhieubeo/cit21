<?php

namespace App\Services;
use App\Models\ProductModel;
use Exception;
class ProductService extends BaseService
{
    private $product;
    function __construct(){
        parent::__construct();
        $this -> product = new ProductModel();
        $this -> product -> protect(false);
    }
    public function getAllProduct(){
        return $this->product->findAll();
    }

    public function getAllProductByGroup($id){
        return $this->product->where('groups',$id)->findAll();
    }
    public function getAllProductByView($limit){
        return $this->product->orderBy('view','DESC')->findAll($limit);
        //"SELECT * FROM `product` ORDER BY `product`.`view` DESC limit 10"
    }
    public function getAllProductByOrder($limit){
        return $this->product->orderBy('oder','DESC')->findAll($limit);
        //"SELECT * FROM `product` ORDER BY `product`.`order` DESC limit 10";
    }

    public function getByID($id){
        return $this->product->find($id);
    }
}
