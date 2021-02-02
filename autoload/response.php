<?php
    class Response{
        public function json($data){
            header('Content-Type: application/json;');
            return json_encode($data);
        }

        public function view($file, $params = []){
            $root = "{$_SERVER['DOCUMENT_ROOT']}/weiphp/";
            $viewsPath = array_map(function($d){
                return $d;
            },glob("{$root}/app/views/*"));
            $input = preg_quote("{$file}.wei.php", '~');
            $result = preg_grep("~{$input}$~", $viewsPath);
            
            header('Content-Type: text/html;charset=UTF-8');

            if(count($result) > 0){
                $viewPath = "{$root}/app/views/{$file}.wei.php";
                $this->htmlPreProcessing($viewPath, $params);
            }else{
                echo "<pre style='background-color: #ddd;font-size: 28px;'>";
                throw new Exception('Undefind Template: ' . $file);
                echo "</pre>";
            }
        }

        public function htmlPreProcessing($filename, $params){
            $htmlArray = [];
            $htmlFile = fopen($filename, 'r');

            while (($line = fgets($htmlFile)) !== false)
                array_push($htmlArray, $line);

            fclose($htmlFile);

            $htmlText = implode('', $htmlArray);

            preg_match_all('/{{(\s*[^}]*\s)}}/', $htmlText, $output);

            foreach ($output[1] as $v) {
                $variable = str_replace(' ', '', $v);

                if(!array_key_exists($variable, $params)){
                    echo "<pre style='background-color: #ddd;font-size: 28px;'>";
                    throw new Exception('Undefind Variable:$' . $variable);
                    echo "</pre>";
                }else
                    echo $params[$variable];
            }
        }
    }
