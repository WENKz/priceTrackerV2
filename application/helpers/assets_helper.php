<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('css_url')){
  function css_url($nom){
  	return base_url() . 'assets/css/' . $nom ;
  }
}
if ( ! function_exists('js_url')){
  function js_url($nom){
  	return base_url() . 'assets/javascript/' . $nom ;
  }
}
if ( ! function_exists('img_url')){
  function img_url($nom){
  	return base_url() . 'assets/images/' . $nom;
  }
}
if ( ! function_exists('font_url')){
  function font_url($nom){
  	return base_url() . 'assets/fonts/' . $nom;
  }
}
if ( ! function_exists('debug')){
  function debug($value, $exit = false){
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    if ($exit === true){
      exit();
    }

  }
}
