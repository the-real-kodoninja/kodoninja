<?php
$t = filter_var(isset($_GET ['t']),FILTER_SANITIZE_STRING);
$page = filter_var($page,FILTER_SANITIZE_STRING);
if ($page === "blog") $t = "blog";
if ($page === "forum") $t = "forum";
if ($page === "goal") $t = "goal"; 

$cat_mNu = "";
$catSela = "";
$cat_11a = "";
$cat_l1b = "";
$cLnk = 'category.php?t='.$t.'&c=';
$cat1 = 'Tech';
$cat2 = 'Living';
$cat3 = 'Money';
$cat4 = 'Trading &amp; Investing';
$cat5 = 'Code';
$cat6 = 'Entrepreneurship';
$cat7 = 'Self-Improvement';
$cat8 = 'Minimalism';

if ($path == 'p1') {
    $path3 = '';
    $path1 = '';
} else if ($path == 'p2') {
    $path3 = '';
    $path1 = '../';
} 

if ($page == "blog" || $page == "forum" || $page == "goal" || $page == "category") {
    //
    try {
        if($sqlo_____dbx___xX__->query($sql__1 = "SELECT DISTINCT category FROM $t ORDER BY category")->fetchColumn()) {
		foreach ($sqlo_____dbx___xX__->query($sql__1) as $roo0w____X___xX__) {
            $cat_11a = implode(',',array_unique(str_word_count($roo0w____X___xX__["category"],1)));
            $cat_l1b .= '<a href="'.$path3.''.$cLnk.''.$cat_l1a.'"><li>'.$cat_l1a.'</li></a>';
            $catSela .= '<a href="#'.$cat_11a.'">'.$cat_11a.'</a>';
        }
        $cat_mNu = '
        <ul>
            '.$cat_l1b.'
        </ul>
        ';
        } else { // error pulling load out
            $cat_mNu = '
            <ul>
                <a href="'.$path3.''.$cLnk.''.$cat1.'"><li>'.$cat1.'</li></a>
                <a href="'.$path3.''.$cLnk.''.$cat2.'"><li>'.$cat2.'</li></a>
                <a href="'.$path3.''.$cLnk.''.$cat3.'"><li>'.$cat3.'</li></a>
                <a href="'.$path3.''.$cLnk.''.$cat4.'"><li>'.$cat4.'</li></a>
                <a href="'.$path3.''.$cLnk.''.$cat5.'"><li>'.$cat5.'</li></a>
                <a href="'.$path3.''.$cLnk.''.$cat6.'"><li>'.$cat6.'</li></a>
                <a href="'.$path3.''.$cLnk.''.$cat7.'"><li>'.$cat7.'</li></a>
                <a href="'.$path3.''.$cLnk.''.$cat8.'"><li>'.$cat8.'</li></a>
                '.$cat_l1b.'
            </ul>
            ';
        }
    } catch (PDOException $newError) {
        newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
    } 
}
?>