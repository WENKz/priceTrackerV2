<?php


class Api_model extends  CI_Model
{
    function __construct() {
        parent::__construct();
    }

     public function getEnterprise($clauses= false)
     {
         if($clauses === false  || !is_array($clauses)){
             return $this->db->get('boutique')->result_array();
         }
         return $this->db->get_where('boutique',$clauses)->row_array();
     }


     public function getProduct($clauses=false){
        if($clauses === false  || !is_array($clauses)){
            return $this->db->get('produit')->result_array();
        }
         return $this->db->get_where('produit',$clauses)->result_array();

     }


     public function getTrackerProduct($clauses = false){
        if($clauses === false || !is_array($clauses)){
            return $this->db->get("catalogue")->result_array();
        }
        return $this->db->get_where("catalogue",$clauses);
     }

     public function getEnterpriseInCat(){
         return $this->db->query("SELECT c.id_boutique,b.nom_boutique,b.id_boutique FROM catalogue c 
INNER JOIN  boutique b ON c.id_boutique = b.id_boutique 
  GROUP BY b.id_boutique ORDER BY b.id_boutique ASC
")->result_array();
     }
     public function getCatalogue(){
         return $this->db->query("SELECT c.*,b.nom_boutique,b.id_boutique, p.* FROM catalogue c 
INNER JOIN  boutique b ON c.id_boutique = b.id_boutique 
INNER JOIN produit p ON c.id_produit = p.id_produit  ORDER BY p.ref ASC
")->result_array();

     }
}