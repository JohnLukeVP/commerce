<?php
namespace Hcode;
use Rain\Tpl;

class Page{
         private $tpl;
         private $options = [];
         private $defaults = [
         "data"=> []
         ];
         public function __construct ($opts = array()){

                    $this->options = array_merge($this->defaults, $opts);

                    $config = array(
                        "tpl_dir"       => $_SERVER["DOCUMENT_ROOT"]."/views/",
                        "cache_dir" => $_SERVER["DOCUMENT_ROOT"]."/views-cache/",
                        "debug"       => false
                     );

                    Tpl::configure( $config );
                $this->tpl = new Tpl;
                $this->setData($this->options["data"]);
                $this->tpl->draw("header");

        }//fim construct
        public function setData($data = array()){
                    foreach ($data as $key => $value) {
                          $this->tpl->assign($key, $value);
                    }//foreach
        }
        public function setTpl($name, $data = array(), $returnHTLM = false)
        {
                   $this->setData($data);
                   return $this->tpl->draw($name, $returnHTLM);
        }

        public function __destruct (){
                   $this->tpl->draw("footer");
       }//fim destruct

}//fim page

?>