<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('pre_work_catalogue')){
    function pre_work_catalogue($catalogue)
    {
        $store =array();
        $productColl = array();
        $beforeSku = false;
        $tabfi = array();
        $ar = array();
        $i = 0;

        foreach ($catalogue["enterprise"] as $value){
            $store["price_".$value["nom_boutique"]] = " ";
            $store2[]= array("text" => $value["nom_boutique"],"value"=> "price_".$value["nom_boutique"],"link"=> "link_".$value["nom_boutique"]);
            $store["link_".$value["nom_boutique"]] = " ";
        }

        foreach ($catalogue["catalogue"] as $line){
//            if($beforeSku != $line["ref"]){
            //              $productColl["product"][$line["ref"]]= array();
            //            $ar = array();
            //          $ar["ref"]= $line["ref"];
            //    }

            //  if(count($productColl["product"][$line["ref"]]) == 0 ){
            //    $productColl["product"][$line["ref"]] = $store;
            //}
            //$productColl["product"][$line["ref"]][$line["nom_boutique"]] = $line;

            //var_dump($line);
            if($beforeSku != $line["ref"]){
                if($i > 0) {
                    $tabfi[] = $ar;
                }
                $ar = array();
                $ar["ref"] = $line["ref"];
                $ar  =  array_merge($store,$ar);
                $beforeSku = $line["ref"];
            }

            $ar["price_".$line["nom_boutique"]] = $line["prix"];
            $ar["link_".$line["nom_boutique"]] = $line["url"];

            $i++;
        }
        $tabfi[]=$ar;
        $productColl["catalogue"]=$tabfi;
        $productColl["store2"] = $store2;
        $productColl["store"] = $store;

        return $productColl;
    }
}

