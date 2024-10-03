<?php
class Json extends Controller
{
 public function index(): void
 {
  $this->view(view: "json/index");
 }
 // this is forthe jsn data 
 public function json(): void
 {
  $this->view(view: "json/json");
 }
}