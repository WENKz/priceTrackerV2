<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('pre_work_catalogue')){
    function pre_work_catalogue($catalogue)
    {
        $store =array();
        $productColl = array();
        $beforeSku = false;


        foreach ($catalogue["enterprise"] as $value){
            $store[$value["nom_boutique"]] = array();
        }

        foreach ($catalogue["catalogue"] as $line){
            if($beforeSku != $line["ref"]){
                $productColl["product"][$line["ref"]]= array();
            }
            if(count($productColl["product"][$line["ref"]]) == 0 ){
                $productColl["product"][$line["ref"]] = $store;
            }
            $productColl["product"][$line["ref"]][$line["nom_boutique"]] = $line;

        }
        $productColl["store"] = $store;

        return $productColl;
    }
}

