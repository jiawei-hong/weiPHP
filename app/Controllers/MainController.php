<?php
    namespace App\Controllers;

    use Response;

    class MainController{
        public Response $response;

        public function __construct(){
            $this->response = (new Response());
        }

        public function home(){
            return $this->response->view('home', [
                'home' => 'Wei Framework'
            ]);
        }

        public function index(){
            return $this->response->json([
                'code' => 200,
                'msg' => 'Index Msg'
            ]);
        }
    }
