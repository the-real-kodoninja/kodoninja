<?php
$t = "";
$s = "";
$se = "";
$view_uc = "";
$view_bc = "";
$view_fc = "";
$view_gc = "";
$view_upc = "";
$output_vc = ""; 
$output_uc = "There are no results for $se";
$output_bc = "There are no results for $se";
$output_fc = "There are no results for $se";
$output_gc = "There are no results for $se";
$output_upc = "There are no results for $se";
$sx = explode (" ", filter_var(isset($_GET ['s']),FILTER_SANITIZE_STRING));
$x = "";
$sqry_trm = ""; 
    
foreach($sx as $se) 
  $x++;
  if($x==1)
  $sqry_trm1 = "username LIKE '$s%' OR fname LIKE '$s%' OR lname LIKE '$s%' OR email LIKE '$s%'";
  $sqry_trm2 = "title LIKE '%$se%' OR tags LIKE '%$se%' OR category LIKE '%$se%' OR data LIKE '%$se%'";    
  $sqry_trm3 = "data LIKE '%$se%'";   

if ($count_uc = $sql______dbx___xX__->query("SELECT COUNT(id) FROM users WHERE $sqry_trm1")->fetchColumn()) 
  include("".$m_path."icl/glbl/usr_LOAD_view.php");
  $view_uc = $output_uc;
if ($count_bc = $sql______dbx___xX__->query("SELECT COUNT(bid) FROM blog WHERE $sqry_trm2")->fetchColumn())
  include("".$m_path."icl/glbl/blg-pst_LOAD_view.php");
  $output_bc = $output_bc;
if ($count_fc = $sql______dbx___xX__->query("SELECT COUNT(fid) FROM forum WHERE $sqry_trm2")->fetchColumn())
  include("".$m_path."icl/glbl/frm-pst_LOAD_view.php");
  $output_fc = $output_fc;
if ($count_gc = $sql______dbx___xX__->query("SELECT COUNT(gid) FROM goal WHERE $sqry_trm2")->fetchColumn())
  include("".$m_path."icl/glbl/gol-pst_LOAD_view.php");
  $output_gc = $output_vc;
if ($count_upc = $sql______dbx___xX__->query("SELECT COUNT(pid) FROM user_post WHERE $sqry_trm3")->fetchColumn())
  include("".$m_path."icl/glbl/usr-pst_LOAD_view.php");
  $output_upc = $output_v1_upc;

$sum_total = $count_uc + $count_bc + $count_fc + $count_fc + $count_upc;

?>