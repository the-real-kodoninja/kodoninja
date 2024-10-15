<?php	
include_once('../../icl/cnnc_t.php');	
include_once('../../icl/c_sts.php');
include_once("../../prs/time_system.php");
$fav_pid = "";
$num____1 = 0;
$fav_lix = "";
$usrFavLi = "";
$usrFavLst = "";
$prdLstFULL = "";

// if ($user_ok == true && $log_id >= 1 && $log_HshCde == $_SESSION["globlCode"]) {

    // panel toggle load in
    if (isset($_POST["uid"]) && isset($_POST["pid"]) && isset($_POST["opt"]) && isset($_POST["cde"])) {
        // require('../../cnnc_t.php');
        
        $favUid____x = preg_replace('#[^0-9]#i', '', $_POST['uid']);
        $favUid____x = mysqli_real_escape_string($cnnc_t2, $favUid____x);
        $favPid____x = preg_replace('#[^0-9]#i', '', $_POST['pid']);
        $favPid____x = mysqli_real_escape_string($cnnc_t2, $favPid____x);
        $favOpt____x = preg_replace('#[^ar]#i', '', $_POST['opt']);
        $favOpt____x = mysqli_real_escape_string($cnnc_t2, $_POST["opt"]);
        $favCde____x = mysqli_real_escape_string($cnnc_t2, $_POST["cde"]);

        // checks if rabbed input is actually a real item
        $sql____2 = mysqli_query($cnnc_t2, "SELECT p.*,f.uid,f.pid 
        FROM products AS p 
        LEFT JOIN favorites AS f 
        ON p.id = f.pid
        WHERE f.uid = '$log_id'
        ORDER BY f.date DESC LIMIT 15");
        $num____2 = mysqli_num_rows($sql____2);
        if ($num____2 > 0) {
            while ($row = mysqli_fetch_array($sql____2, MYSQLI_ASSOC)){ 
                $usrFav_pid = $row["id"];
                $usrFav_nme = $row["name"];
                $usrFav_pr1 = $row["price_1"];
                $usrFav_pr2 = $row["price_2"];
                $usrFav_pr3 = $row["price_3"];
                $usrFav_avt = $row["avatar"];
                $usrFav_des = $row["description"];
                $usrFav_dte = timeAgo(strtotime($row["date"])); 

                if ($usrFav_pr1) {
                    $usrFav_pr1 = '<span class="sxPrc_ fR"><i class="ktknCurIcn">k<sup>tkn</sup></i>'.$usrFav_pr1.'</span>';
                } if ($usrFav_pr2) {
                    $usrFav_pr2 = '<span class="sxPrc_ fR"><i style="color: green;">$</i>'.$usrFav_pr2.'</span>';
                } if ($usrFav_avt) {
                    $usrFav_avt = '<img class="sch_avt" src="prd/'.$usrFav_pid.'/'.$usrFav_avt.'"/>';
                } else {
                    $usrFav_avt = '<img class="sch_avt" src="img/temp/user-pic_1.0.png"/>';
                }

                $usrFav_pFull = "$usrFav_pr1 $usrFav_pr2";
                $usrFavLi .= '<a href="product?p='.$usrFav_pid.'"><li>'.$usrFav_avt.''.$usrFav_nme.''.$usrFav_pFull.'</li></a>';
                
            }
            echo '
            <ul class="usrPnl_Load bck-w pad-T">
                '.$usrFavLi.'
            </ul>';
        } else {
            $prd_rsl .= 'error meow';
        }
    }
// }

?>