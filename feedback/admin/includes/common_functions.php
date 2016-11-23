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
//configuration file
define("dbhost", 'localhost');
define("dbuser", 'root');
define("dbpass", '');
define("dbname", 'feedback');




function branch_name($b_id)
{
	$conn = mysqli_connect(dbhost, dbuser, dbpass,dbname) or die ('Error connecting to mysql');
	$sel_b="select * from branch_master where b_id=".$b_id;
	$res=mysqli_query($conn,$sel_b) or die(mysqli_error($conn)."h");
	$b_name=mysqli_fetch_array($res);
	return $b_name['b_name'];
}

function batch_name($batch_id)
{
	$conn = mysqli_connect(dbhost, dbuser, dbpass,dbname) or die ('Error connecting to mysql');
	$sel_b="select * from batch_master where batch_id=".$batch_id;
	$res=mysqli_query($conn,$sel_b) or die(mysqli_error($conn));
	$b_name=mysqli_fetch_array($res);
	return $b_name['batch_name'];
}


function sem_name($sem_id)
{
	$conn = mysqli_connect(dbhost, dbuser, dbpass,dbname) or die ('Error connecting to mysql');
	$sel_s="select * from semester_master where sem_id=".$sem_id;
	$res=mysqli_query($conn,$sel_s) or die(mysqli_error($conn));
	$s_name=mysqli_fetch_array($res);
	return $s_name['sem_name'];
}

function division_name($division_id)
{
	$conn = mysqli_connect(dbhost, dbuser, dbpass,dbname) or die ('Error connecting to mysql');
	$sel_s="select * from division_master where  id=".$division_id;
	$res=mysqli_query($conn,$sel_s) or die(mysqli_error($conn));
	$s_name=mysqli_fetch_array($res);
	return $s_name['division'];
}

function subject_name($sub_id)
{
	$conn = mysqli_connect(dbhost, dbuser, dbpass,dbname) or die ('Error connecting to mysql');
	$sel_s="select * from subject_master where sub_id=".$sub_id;
	$res=mysqli_query($conn,$sel_s) or die(mysqli_error($conn));
	$s_name=mysqli_fetch_array($res);
	return $s_name['sub_name'];
}

function faculty_name($f_id)
{
	$conn = mysqli_connect(dbhost, dbuser, dbpass,dbname) or die ('Error connecting to mysql');
	$sel_s="select * from faculty_master where f_id=".$f_id;
	$res=mysqli_query($conn,$sel_s) or die(mysqli_error($conn));
	$s_name=mysqli_fetch_array($res);
	return $s_name['f_name'].' '.$s_name['l_name'];
}

function que_one_word($id, $full_question=false)
{
	$conn = mysqli_connect(dbhost, dbuser, dbpass,dbname) or die ('Error connecting to mysql');
	$sel_s="select * from  feedback_ques_master where q_id=".$id;
	$res=mysqli_query($conn,$sel_s) or die(mysqli_error($conn));
	$s_name=mysqli_fetch_array($res);
	if ($full_question)
	{
		return $s_name['ques'];
	}
	else{
		return $s_name['one_word'];
	}
}

?>