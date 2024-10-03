<?php
// load the module and the view 
class Controller
{
    // ############  This is for the database model for each page ############
    // ###### it requires each  model for each pages #######
    public function model($model): object
    {
        // this will require module file
        require_once '../api/models/' . $model . '.php';

        return new $model();
    }
    // this will load the views and check for the views files 
    public function view($view, $data = []): void
    {
        if (file_exists(filename: '../api/views/' . $view . '.php')) {
            require_once '../api/views/' . $view . '.php';
        } else {
            // die('view unavailable');
            header(header: "location:" . URLROOT . "/errors/e404");
        }
    }
    
    // this  will get the ajaxresult  and send it to  the user instead of echoing it out
    public function ajaxResult($message, $validation, $data): void
    {
        $data = $data ? $data : [];
        $result = [
            "message" => $message,
            "validation" => $validation,
            "result" => $data
        ];
        $this->view(view: "json/json", data: $result);
    }
    // this will send mail to users when eing called upon  
}
