<?php
$ld__c1a = "";
$ld__c1b = "";
$ld__c2a = "";
// database fail falbacks
$output_uc = "There are no users";
$output_bc = "There are no blogs";
$output_fc = "There are no forums";
$output_gc = "There are no goals";
$output_upc = "There are no user post";
$output_vc = "";
$output_v1_upc = "";
//
if ($user_ok == true) {
    $hello = $log_username;
} else if($user_ok != true) {
    $hello = 'Welcome';
}

if($count_uc = $sql______dbx___xX__->query("SELECT COUNT(id) FROM users WHERE activated='0' or activated='1' AND deactivated = '0'")->fetchColumn()) {
  include("".$m_path."icl/glbl/usr_LOAD_view.php");
  $view_uc = $output_uc;
} if($count_bc = $sql______dbx___xX__->query("SELECT COUNT(bid) FROM blog WHERE approved = 'y'")->fetchColumn()) {
  include("".$m_path."icl/glbl/blg-pst_LOAD_view.php");
  $output_bc = $output_bc;
} if($count_fc = $sql______dbx___xX__->query("SELECT COUNT(fid) FROM forum")->fetchColumn()) {
  include("".$m_path."icl/glbl/frm-pst_LOAD_view.php");
  $output_fc = $output_fc;
} if($count_gc = $sql______dbx___xX__->query("SELECT COUNT(gid) FROM goal")->fetchColumn()) {
  include("".$m_path."icl/glbl/gol-pst_LOAD_view.php");
  $output_gc = $output_vc;
} if($count_upc = $sql______dbx___xX__->query("SELECT COUNT(pid) FROM user_post WHERE hide = '0' AND remove = '0'")->fetchColumn()) {
  include("".$m_path."icl/glbl/usr-pst_LOAD_view.php");
  $output_upc = $output_v1_upc;
} 

$sum_total = $count_uc + $count_gc + $count_bc + $count_fc + $count_upc;

$tglImg = "";
$dirname = "img/tgl/";
$images = glob($dirname."*.jpg");

foreach($images as $image) {
    $tglImg .= '<img src="'.$image.'" />';
}

if ($path == "p1") {
    $ld__c1b = ''.$u.'';
    $ld__c2a = $scl_sub;
} if ($path == "p2") {
    $ld__c1a = 'style="margin: 0px 0px 20px 0px;"';
}
?>