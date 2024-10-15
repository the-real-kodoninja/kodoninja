<?php
$prdAMnt = "";
$prdBdy = "";
$prd_tknEx = "";
$productFULL = "";
$prd_pr1b = "";
$prd_pr2b = "";
$prd_tknTbl = "";
if (isset($_GET["p"])) {
    $prdId____x = filter_var(preg_replace('#[^0-9]#i', '', $_GET['p']),FILTER_SANITIZE_NUMBER_INT);
    try {
        if($sqlo_____db2___xX__->query(
            $sql____1 = "SELECT *
            FROM products
            WHERE id = '$prdId____x'
            LIMIT 1")->fetchColumn()) {
            foreach ($sqlo_____db2___xX__->query($sql____1) as $roo0w____X___xX__) {
            $prd_pid = filter_var($roo0w____X___xX__["id"],FILTER_SANITIZE_NUMBER_INT);
            $prd_nme = filter_var($roo0w____X___xX__["name"],FILTER_SANITIZE_STRING);
            $prd_pr1 = filter_var($roo0w____X___xX__["price_1"],FILTER_SANITIZE_NUMBER_FLOAT);
            $prd_pr2 = filter_var($roo0w____X___xX__["price_2"],FILTER_SANITIZE_NUMBER_FLOAT);
            $prd_img = preg_match("/\.(gif|jpg|jpeg|png)$/i", filter_var($roo0w____X___xX__["avatar"],FILTER_DEFAULT));
            $prd_des = filter_var($roo0w____X___xX__["description"],FILTER_DEFAULT);
            $prd_dte = timeAgo(strtotime(filter_var($roo0w____X___xX__["date"]),FILTER_DEFAULT));
            $prd_stat = filter_var(preg_replace('#[^apo]#i', '', $roo0w____X___xX__["status"]),FILTER_SANITIZE_STRING);

            if ($prd_pr1) {
            $prd_pr1b = '<span class=""><i class="ktknCurIcn">k<sup>tkn</sup></i>'.$prd_pr1.'</span>';
            } if ($prd_pr2) {
                $prd_pr2b = '<span class="sxPrc_ fR"><i style="color: green;">$</i>'.$prd_pr2.'</span>';
            }

            $prdPr_FULL = "$prd_pr1b $prd_pr2b";

            $prd_avt = '<img src="img/temp/user-pic_1.0.png"/>';
            if ($prd_img) {
                $prd_avt = '<img src="prd/'.$prd_pid.'/'.$prd_img.'"/>';
            }

            if ($prd_stat == 'p') {
                $prd_stat = '<span class="prd_stat">pre-order</span>';
            } if ($prd_stat == 'o') {
                $prd_stat = '<span class="prd_stat">sold out</span>';
                $btn_stat = 'disabled';
            }

        
            //
            $prdMnLft = '
            <div class="prdMnLft">
                <div class="prdImg_x">'.$prd_avt.'</div>
                <div class="prdImg_y">
                    '.$prd_avt.'
                    '.$prd_avt.'
                    '.$prd_avt.'
                    '.$prd_avt.'
                    '.$prd_avt.'
                </div>
            </div>
            ';

            $rStrs = "";
            for ($rStr = 0; $rStr <= 4; $rStr++) {
                $rStrs .= '<i class="fi-star" onchange="prdRtgStar(event)"></i>';
            }

            $qPrds = "";
            $Cnt = 0;
            $max = 9;
            if ($prd_des != 'tkn') {
                for ($qPrd = 0; $qPrd <= $max; $qPrd++) {
                    $Cnt++;
                    $qPrds .= '<option value="'.$Cnt.'">'.$Cnt.'</option>';
                }
                $prdAMnt = '
                <select id="prdSel_x" class="prdSel_x" onchange="amtCalc(\''.$prd_pr2.'\',\'prd\')">
                    '.$qPrds.'
                </select>
                ';
            }

            $prdMnRgt = '
            <div class="prdMnRgt">
                <h3>'.$prd_nme.'</h3>
                <div>'.$prdPr_FULL.'</div>
                <div id="prdrStr" class="prdRtngs">
                    '.$rStrs.'
                </div>
                <div>
                    '.$prd_des.'
                </div>
                '.$prd_tknEx.'
                <div class="prdSelWpr">
                    <span class="prdSelQnty">quantity</span>
                    <span class="fR">
                        '.$prdAMnt.'
                    </span>
                </div>
                <div class="">
                    <span>Total</span>
                    <span id="prdTtl_x" class="fR">'.$prd_pr2b.'</span>
                </div>
                <button id="prdATC_x" class="prdATC_x w100" onclick="a2Crt(\''.$log_id.'\',\''.$log_HshCde.'\',\''.$prd_pid.'\',\''.$prd_pr2.'\')">add to cart</button>
            </div>
            ';

            if ($prd_des == 'tkn') {
                include("tkn_pge.php");
            } else {
                $prdBdy = '
                    <div class="idxHdrWpr dI">
                        <div class="dv1">
                            <h1>'.$prd_nme.'</h1>
                        </div>
                    </div>
                    <div class="prdBdyWpr pad-T">
                        '.$prdMnLft.'
                        '.$prdMnRgt.'
                    </div>
                    ';
                }
            }      
        } else {
            $prdBdy = '<div class="pad-T">This product doesn\'t exist</div>';
        }
    } catch (PDOException $newError) {
        newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
    }
} else {
    $prdBdy = '<div class="pad-T">You have missing componets cannot find product</div>';
}
$productFULL = "$prdBdy";
?>