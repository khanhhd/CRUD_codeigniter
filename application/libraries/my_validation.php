<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_validation extends CI_Form_validation {
  public function __construct(){
    parent::__construct();
  }

  function valid_date( $str )
  {
    $stamp = strtotime( $str );

  if (!is_numeric($stamp))
  {
      return FALSE;
  }

   $month = date( 'm', $stamp );
   $day   = date( 'd', $stamp );
   $year  = date( 'Y', $stamp );

   if (checkdate($month, $day, $year))
   {
      return $year.'-'.$month.'-'.$day;
   }


     return FALSE;
  }

}