<?php
class Home extends controller
{
 private $homeModel;
 public function __construct()
 {
  $this->homeModel = $this->model(model: "HomeModel");
 }
 public function index(): void
 {
  $data = [
   'home' => 'Hello World !!!'
  ];
  $this->view(view: "index", data: $data);
 }
}
