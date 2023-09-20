<?php

namespace App\Controllers;
use App\Models\ProductModel;
use App\Services\GroupService;
use App\Services\MenuService;
use App\Services\ProductService;
class Home extends BaseController
{
    private $service;
    private $product;
    private $group;
    public function __construct(){
        $this->service = new MenuService();
        $this->product = new ProductService();
        $this->group = new GroupService();
    }
    public function index(): string
    {
        $data = [];
        $datacss['cssfiles'] = 'custom.css';
        $jsFiles = [
            'assets/js/common.js'

        ];
        $dataMenu['menu_loai1'] = $this -> service -> getAllMenuByLoai(1);
        $dataMenu['menu_loai2'] = $this -> service -> getAllMenuByLoai(2);
        $dataMenu['menu_sidebar'] = $this -> service -> getAllMenuByLoaiAndOffset(1);
        $dataMenu['product_group'] = $this -> product-> getAllProductByGroup(1);
        $dataMenu['group_spmoi'] = $this -> group ->getNameByID(1);
        $dataMenu['group_spnoibat'] = $this -> group ->getNameByID(2);
        $dataMenu['group_spbanchay'] = $this -> group ->getNameByID(3);
        $dataMenu['product_view'] = $this->product->getAllProductByView(10);
        $dataMenu['product_order'] = $this->product->getAllProductByOrder(10);
        
        $dataMenu['sidebar_product_view'] = $this->product->getAllProductByView(5);
        $dataMenu['sidebar_product_order'] = $this->product->getAllProductByOrder(5);
        $data = $this -> loadLayout($data, 'Home/list', $dataMenu,[],$jsFiles);
        return view('Home/index', $data);
    }

    public function cart(): string
    {
        $data = [];
        $datacss['cssfiles'] = 'custom.css';
        $jsFiles = [
            'assets/js/common.js'

        ];
        $dataMenu['menu_loai1'] = $this -> service -> getAllMenuByLoai(1);
        $dataMenu['menu_loai2'] = $this -> service -> getAllMenuByLoai(2);
        $dataMenu['menu_sidebar'] = $this -> service -> getAllMenuByLoaiAndOffset(1);
        $dataMenu['product_group'] = $this -> product-> getAllProductByGroup(1);
        $dataMenu['group_spmoi'] = $this -> group ->getNameByID(1);
        $dataMenu['group_spnoibat'] = $this -> group ->getNameByID(2);
        $dataMenu['group_spbanchay'] = $this -> group ->getNameByID(3);
        $dataMenu['product_view'] = $this->product->getAllProductByView(10);
        $dataMenu['product_order'] = $this->product->getAllProductByOrder(10);
        
        $dataMenu['sidebar_product_view'] = $this->product->getAllProductByView(5);
        $dataMenu['sidebar_product_order'] = $this->product->getAllProductByOrder(5);
        if(session()->has('cart')){
            $dataMenu['cart_list'] = array_values(session('cart'));
            $dataMenu['cart_total'] = $this -> total();
        }else{
            $dataMenu['cart_list'] = [];
            $dataMenu['cart_total'] = 0;
        }
        
        $data = $this -> loadLayout($data, 'Home/carts/cart_list', $dataMenu,[],$jsFiles);
        return view('Home/carts/cart', $data);
    }

    public function addcart(){
        $id = $this -> request ->getPost()['id'];
        $row = $this ->product -> getByID($id);
        if($row){
            $new_product = array(
                'ten_san_pham' => $row['ten_san_pham'],
                'id' => $id,
                'soluong' => 1,
                'price' => $row['price'], 
                'image' => $row['image'],
                'total' => $row['price']
            );
            $session = session();
            if($session -> has('cart')){
                $index = $this -> exist($id);
                $cart = array_values(session('cart'));
                if($index == -1){
                    array_push($cart,$new_product);
                }else{
                    $cart[$index]['soluong']++;
                    $cart[$index]['total'] = $cart[$index]['soluong'] * $cart[$index]['price'];
                }
                $session ->set('cart', $cart);
            }else{
                $cart = array($new_product);
                $session -> set('cart',$cart);
            }
            return $this->response ->redirect("cart");
        }else{
            return $this -> response -> redirect(site_url("Home/index"));
        }
    }

    public function exist($id){
        $items = array_values(session('cart'));
        for($i = 0; $i < count($items); $i++){
            if($items[$i]['id'] == $id){
                return $i;
            }
        }
        return -1;
    }

    public function total(){
        $sum = 0;
        $items = array_values(session('cart'));
        foreach($items as $item){
            $sum += $item['total'];
        }
        return $sum;
    }

    public function remove($id){
        $index = $this -> exist($id);
        $cart = array_values(session('cart'));
        unset($cart[$index]);
        $session = session();
        $session -> set('cart',$cart);
        return $this->response->redirect(site_url('cart'));
    }

    public function removeall(){
        $session = session();
        $session -> remove("cart");
        return $this->response->redirect(site_url('cart'));
    }

    public function cart_update(){
        //dd($this->request->getPost());
        $cart = array_values(session('cart'));
        for($i = 0; $i < count($cart); $i ++){
            $cart[$i]['soluong'] = $_POST['soluong'][$i];
            $cart[$i]['total'] = $cart[$i]['soluong'] * $cart[$i]['price'];
        }
        $session = session();
        $session -> set('cart',$cart);
        return $this->response->redirect(site_url('cart'));
    }

    public function ajaxAction()
    {
        
        // Get the AJAX data
        $id = $this->request->getPost('id');
        $soluong = $this->request->getPost('soluong');

        $index = $this ->exist($id);
        //Kiem tra id co tồn tại trong session Cart hay không?

        $cart = array_values(session('cart'));//Danh sách cart trong session
        $cart[$index]['soluong'] = $soluong;//cart[index] = vị trí item sửa số lương trong danh sach cart
        $cart[$index]['total'] = $soluong * $cart[$index]['price'];
        $session = session();
        $session -> set('cart',$cart);
        // Perform some operations with the data
        $result = ['result' => 'Data received: ' . $id . ', ' . $soluong];
        // Load the view and return its content
        $data = [];
        $datacss['cssfiles'] = 'custom.css';
        $jsFiles = [
            'assets/js/common.js'

        ];
        $dataMenu['menu_loai1'] = $this -> service -> getAllMenuByLoai(1);
        $dataMenu['menu_loai2'] = $this -> service -> getAllMenuByLoai(2);
        $dataMenu['menu_sidebar'] = $this -> service -> getAllMenuByLoaiAndOffset(1);
        $dataMenu['product_group'] = $this -> product-> getAllProductByGroup(1);
        $dataMenu['group_spmoi'] = $this -> group ->getNameByID(1);
        $dataMenu['group_spnoibat'] = $this -> group ->getNameByID(2);
        $dataMenu['group_spbanchay'] = $this -> group ->getNameByID(3);
        $dataMenu['product_view'] = $this->product->getAllProductByView(10);
        $dataMenu['product_order'] = $this->product->getAllProductByOrder(10);
        
        $dataMenu['sidebar_product_view'] = $this->product->getAllProductByView(5);
        $dataMenu['sidebar_product_order'] = $this->product->getAllProductByOrder(5);
        if(session()->has('cart')){
            $dataMenu['cart_list'] = array_values(session('cart'));
            $dataMenu['cart_total'] = $this -> total();
        }else{
            $dataMenu['cart_list'] = [];
            $dataMenu['cart_total'] = 0;
        }        
        //return view('Home/carts/cart', $data);
        $viewContent = view('Home/carts/cart_list', $dataMenu); // Replace 'my_view' with the name of your view file
        return $this->response->setJSON(['cart_list' => $viewContent]);
        // Return a JSON response
        return $this->response->setJSON($result);
    }
}
