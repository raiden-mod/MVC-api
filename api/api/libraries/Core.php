<?php
// core app class
class Core
{
 protected $currentController = 'Home';
 protected $currentMethod = 'index';
 protected $params = [];

 public function __construct()
 {
  // print_r($this->getUrl());
  $url = $this->getUrl();
  // we wil look into our controllers and ucword will capitalize our first letters.
  if (isset($url[0])) {
   if (file_exists(filename: '../api/controllers/' . ucwords(string: $url[0]) . '.php')) {
    // this will set a new controller
    $this->currentController = ucwords(string: $url[0]);
    unset($url[0]);
   }
  }
  // require the controller
  require_once '../api/controllers/'  . $this->currentController . '.php';
  // now we extanciate
  $this->currentController = new $this->currentController;

  // this will check for the second parameters
  if (isset($url[1])) {
   if (method_exists(object_or_class: $this->currentController, method: $url[1])) {
    $this->currentMethod = $url[1];
    unset($url[1]);
   }
  }
  // this will get the parameters
  $this->params = $url ? array_values(array: $url) : [];

  // call a callback parameters with arrays of param
  call_user_func_array(callback: [$this->currentController, $this->currentMethod], args: $this->params);
 }
 public function getUrl()
 {
  if (isset($_GET['url'])) {
   // this will get the url and trim out the slashes 
   $url = rtrim(string: $_GET['url'], characters: '/');
   // this will allow you to filter variable as a string slash number
   $url = filter_var(value: $url, filter: FILTER_SANITIZE_URL);
   // this will explode the url and break it into an array
   $url = explode(separator: '/', string: $url);
   return $url;
  }
 }
}
