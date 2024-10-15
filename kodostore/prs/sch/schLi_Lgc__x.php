<?php
include('../../icl/cnnc_t.php');	
include('../../prs/time_system.php');	

$sch_rsl = "";
$sch_price = "";

if (isset($_POST["hdxVal"])) {
    $hdxVal____x = preg_replace('#[^a-z0-9.@_]#i', '', $_POST['hdxVal']);
    $sql____1 = mysqli_query($cnnc_t2, "SELECT *
			FROM products
	        WHERE name LIKE '$hdxVal____x%' OR description LIKE '$hdxVal____x%' ORDER BY date DESC LIMIT 15");
    $num____1 = mysqli_num_rows($sql____1);
    if ($num____1 > 0) {
        while ($row = mysqli_fetch_array($sql____1, MYSQLI_ASSOC)){ 
            $sch_pid = $row["id"];
            $sch_nme = $row["name"];
            $sch_pr1 = $row["price_1"];
            $sch_pr2 = $row["price_2"];
            $sch_pr3 = $row["price_3"];
            $sch_avt = $row["avatar"];
            $sch_des = $row["description"];
            $sch_dte = timeAgo(strtotime($row["date"])); 

            if ($sch_pr1) {
                $sch_pr1 = '<span class="sxPrc_ fR"><i class="ktknCurIcn">k<sup>tkn</sup></i>'.$sch_pr1.'</span>';
            } if ($sch_pr2) {
                $sch_pr2 = '<span class="sxPrc_ fR"><i style="color: green;">$</i>'.$sch_pr2.'</span>';
            } if ($sch_avt) {
                $sch_avt = '<img class="sch_avt" src="prd/'.$sch_pid.'/'.$sch_avt.'" alt="'.$sch_nme.'"/>';
            } else if ($sch_des == "tkn") {
                $sch_avt = '<img class="sch_avt" class="prdItm_img" src="prd/tkn/kodocoin2_v1.svg" alt="'.$sch_nme.'"/>';
            }else {
                $sch_avt = '<img class="sch_avt" src="img/temp/user-pic_1.0.png" alt="'.$sch_nme.'"/>';
            }

            $sch_pFull = "$sch_pr1 $sch_pr2";
            $sch_rsl .= '<a href="product?p='.$sch_pid.'"><li>'.$sch_avt.''.$sch_nme.''.$sch_pFull.'</li></a>';

        }
    } else {
        $sch_rsl .= '<li>Sorry there are no results matching '.$hdxVal____x.'</li>';
    }
    echo $sch_rsl;

}
?>