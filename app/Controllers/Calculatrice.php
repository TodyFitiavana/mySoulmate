<?php
    namespace App\Controllers;
    class Calculatrice extends BaseController{
        public function index():string{
            return view('Calculatrice');
        }

        public function calcule(){
        $num1 = $this->request->getPost('num1');
        $num2 = $this->request->getPost('num2');
        $operation = $this->request->getPost('operation');

        $result = NULL;

        switch ($operation){
            case 'add':
                $result = $num1 + $num2;
                break;
            case 'neg':
                $result = $num1 - $num2;
                break;
            case 'mult':
                $result = $num1 * $num2;
                break;
            case 'div':
                $result = $num2 != 0 ? $num1 / $num2 : 'erreur de calcule';
                break;
        }

        return view('Calculatrice',['result' => $result]);
    }

}