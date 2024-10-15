<?php

$sub = "";
$sel1 = '';
$sel2 = '';
$si_list1 = '';
$si_list2 = '';
$l_view = '';

$sub = preg_replace('#[^a-z0-9.@]#i', '', $_GET ['sub']);
if ($sub == TRUE) {
    if ($sub == 'Fundamentals') {
        $sel1 = '2';
        $sel2 = '';
        $sel3 = '';
    } else if ($sub == 'Jquery') {
        $sel1 = '';
        $sel2 = '2';
        $sel3 = '';
    } else if ($sub == 'Node.js') {
        $sel1 = '';
        $sel2 = '';
        $sel3 = '2';
    } else {
        $sel1 = '';
        $sel2 = '';
        $sel3 = '';
    }
}


$langX = ['JavaScript'];

$sub = ['Fundamentals','Jquery','Node.js'];

$s_list .= '
<!-- -------- -->
<a href="class.php?course='.$course.'&lang='.$langX[0].'&sub='.$sub[0].'">
    <div class="sqrMd-Wpr dI">
    <div class="sqrMd-Ovly'.$sel1.' pa">
        <span>'.$sub[0].'</span>    
    </div>
        <img src="courses/img/1f7fded7b33f8472e590ccd85f34-1432231.jpg!d.jfif"/>
    </div>
</a>
';
$s_list .= '
<!-- -------- -->
<a href="class.php?course='.$course.'&lang='.$langX[0].'&sub='.$sub[1].'">
    <div class="sqrMd-Wpr dI">
    <div class="sqrMd-Ovly'.$sel2.' pa">
        <span>'.$sub[1].'</span>    
    </div>
        <img src="courses/img/1f7fded7b33f8472e590ccd85f34-1432231.jpg!d.jfif"/>
    </div>
</a>
';
$s_list .= '
<!-- -------- -->
    <a href="class.php?course='.$course.'&lang='.$langX[0].'&sub='.$sub[2].'">
    <div class="sqrMd-Wpr dI">
    <div class="sqrMd-Ovly'.$sel3.' pa">
        <span>'.$sub[2].'</span>    
    </div>
        <img src="courses/img/1f7fded7b33f8472e590ccd85f34-1432231.jpg!d.jfif"/>
    </div>
</a>
';

$sub = preg_replace('#[^a-z0-9.@]#i', '', $_GET ['sub']);
$lib = preg_replace('#[^a-z0-9.@]#i', '', $_GET ['lib']);
if ($lib == TRUE) {
    $class_itm .= '<a href="class.php?course='.$course.'&lang='.$lang.'&sub='.$sub.'"><i>&nbsp;'.$sub.'</i></a>';
    $class_itm .= '<a href="class.php?course='.$course.'&lang='.$lang.'&sub='.$sub.'&lib='.$lib.'"><i>&nbsp;'.$lib.'</i></a>';
    $s_list = '';
    $si_list = '';
    $load = include_once("class\coding\lib\JavaScript/library.php");
} else {
    if ($sub == TRUE) {
        $class_itm .= '<a href="class.php?course='.$course.'&lang='.$lang.'&sub='.$sub.'"><i>&nbsp;'.$sub.'</i></a>';
    } if ($sub == 'Fundamentals') {
        include_once("list/JavaScript/Fundamentals.php");
    } else if ($sub == 'Jquery') {
        include_once("list/JavaScript/Jquery.php");
    } else if ($sub == 'Node.js') {
        include_once("list/JavaScript/Node.js.php");
    } else {
    }
}



$c_list = '
'.$s_list.'
'.$si_list.'
'.$k_view.'
';

?>