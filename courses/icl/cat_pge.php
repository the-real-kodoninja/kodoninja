<?php 

$cat1 = 'Tech';
$cat2 = 'Living';
$cat3 = 'Money';
$cat4 = 'Trading &amp; Investing';
$cat5 = 'Code';
$cat6 = 'Diet';
$cat7 = 'Health &amp; Fitness';

if ($path == 'p1') {
    $path3 = '';
    $path1 = '';
} else if ($path == 'p2') {
    $path3 = '';
    $path1 = '../';
} 

if ($page == "blog" || $page == "forum") {
    $t = $page;
}
$cLnk = 'category.php?t='.$t.'&c=';
include_once(''.$path1.'icl/cnnc_t.php');
$sql = "SELECT * FROM $t";
$query = mysqli_query($cnnc_t, $sql);
	$numrows = mysqli_num_rows($query);
	if($numrows > 0){
		while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){ 
        $cat_l1a = $row["category"];
        $cat_l1b .= '<a href="'.$path3.''.$cLnk.''.$cat_l1a.'"><li>'.$cat_l1a.'</li></a>';
    }
}
$cat_mNu = '
<ul>
    <a href="'.$path3.''.$cLnk.''.$cat1.'"><li>'.$cat1.'</li></a>
    <a href="'.$path3.''.$cLnk.''.$cat2.'"><li>'.$cat2.'</li></a>
    <a href="'.$path3.''.$cLnk.''.$cat3.'"><li>'.$cat3.'</li></a>
    <a href="'.$path3.''.$cLnk.''.$cat4.'"><li>'.$cat4.'</li></a>
    <a href="'.$path3.''.$cLnk.''.$cat5.'"><li>'.$cat5.'</li></a>
    <a href="'.$path3.''.$cLnk.''.$cat6.'"><li>'.$cat6.'</li></a>
    <a href="'.$path3.''.$cLnk.''.$cat7.'"><li>'.$cat7.'</li></a>
    '.$cat_l1b.'
</ul>
';

?>