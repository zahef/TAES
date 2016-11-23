<?php
//////////////////////////////////////////////////////////////////*****/////////////////////////////////////////////////////////////////////////////////////
  //                                                             Feedback Pro v1																			 //
  //														Faculty Evaluation System																		 //
  //														Developed By Shrenik Patel																		 //			
  //															 July 27, 2009																				 //
  //																																						 //		
  //  Tis program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by 				 //
  //  the Free Software  Foundation; either version 2 of the License, or (at your option) any later version.												 //
  //																																						 //
  //  This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or      //
  //  FITNESS FOR A PARTICULAR PURPOSE.  See the GNU General Public License for more details.																 //
  //																																						 //
  //////////////////////////////////////////////////////////////////*****//////////////////////////////////////////////////////////////////////////////////////
// Database configuration file  
include("includes/common_functions.php");

function tep_draw_pull_down_menu($name, $values, $default = 1, $parameters = '', $required = false) {


    $field = '<select name="' . $name . '"';

    if ($parameters!='') $field .= ' ' . $parameters;

    $field .= ' >';

	$field .='<option value=0></option>';
    for ($i=0, $j=0,$n=sizeof($values); $i<$n; $i++) {
      $field .= '<option value="' . $values[$i]['id'] . '"';
	  if ($default == $values[$i]['id']) {
      //if ($default[$j] == $values[$i]['id']) {
	  	$j++;
        $field .= ' SELECTED';
      }

      $field .= ' $str >' .$values[$i]['text'] . '</option>';
    }
    $field .= '</select>';

    //if ($required == true) $field .= TEXT_FIELD_REQUIRED;

    return $field;
  }
  
  
function tep_draw_pull_down_menu_sub($name, $values, $default = '10', $parameters = '', $required = false) {


    $field = '<select name="' . $name . '"';

    if ($parameters!='') $field .= ' ' . $parameters;

    $field .= ' >';

	$field .='<option value=0></option>';
    for ($i=0, $j=0,$n=sizeof($values); $i<$n; $i++) {
      $field .= '<option value="' . $values[$i]['id'] . '"';
      if ($default == $values[$i]['id']) {
	    $j++;
        $field .= ' SELECTED';
      }

      $field .= ' $str >' .$values[$i]['text'] . '</option>';
    }
    $field .= '</select>';

    //if ($required == true) $field .= TEXT_FIELD_REQUIRED;

    return $field;
  }  
?>