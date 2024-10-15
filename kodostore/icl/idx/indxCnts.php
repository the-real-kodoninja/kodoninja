<?php
$prdItm_View = "";
$prdItm = "";
$btn_stat = "";
$prd_opt = 'a';
$prd_txt = 'Add to favorites'; 
$fltrModX = "";
try {
    if($count_prd = $sqlo_____db2___xX__->query(
        $sql____1 = "SELECT *
        FROM products
        ORDER BY date DESC LIMIT 30")->fetchColumn()) {
        foreach ($sqlo_____db2___xX__->query($sql____1) as $roo0w____X___xX__) {
        $prd_pid = filter_var($roo0w____X___xX__["id"],FILTER_SANITIZE_NUMBER_INT);
        $prd_nme = filter_var($roo0w____X___xX__["name"],FILTER_SANITIZE_STRING);
        $prd_pr1 = filter_var($roo0w____X___xX__["price_1"],FILTER_SANITIZE_NUMBER_FLOAT);
        $prd_pr2 = filter_var($roo0w____X___xX__["price_2"],FILTER_SANITIZE_NUMBER_FLOAT);
        $prd_pr3 = filter_var($roo0w____X___xX__["price_3"],FILTER_SANITIZE_NUMBER_FLOAT);
        $prd_avt = filter_var($roo0w____X___xX__["avatar"],FILTER_DEFAULT);
        $prd_des = filter_var($roo0w____X___xX__["description"],FILTER_DEFAULT);
        $prd_stat = filter_var($roo0w____X___xX__["status"],FILTER_DEFAULT);
        $prd_dte = timeAgo(strtotime($roo0w____X___xX__["date"]));

        if ($prd_pr1) {
        $prd_pr1 = '<span class=""><i class="ktknCurIcn">k<sup>tkn</sup></i>'.$prd_pr1.'</span>';
        } if ($prd_pr2) {
            $prd_pr2 = '<span class="sxPrc_ fR"><i style="color: green;">$</i>'.$prd_pr2.'</span>';
        }

        if ($prd_avt) {
            $prd_avt = '<img class="prdItm_img" src="prd/'.$prd_pid.'/'.$prd_avt.'"/>';
        } else if ($prd_des == "tkn") {
            $prd_avt = '<img class="prdItm_img" src="prd/tkn/kodocoin2_v1.svg"/>';
        } else {
            $prd_avt = '<img class="prdItm_img" src="img/temp/user-pic_1.0.png"/>';
        }

        if ($prd_stat == 'a') {
            $prd_stat = '<span class="prd_stat_a">available</span>';
        } if ($prd_stat == 'p') {
            $prd_stat = '<span class="prd_stat">pre-order</span>';
        } if ($prd_stat == 'o') {
            $prd_stat = '<span class="prd_stat">sold out</span>';
            $btn_stat = 'disabled';
        }

        $log_ip = preg_replace('#[^0-9.]#', '', getenv('REMOTE_ADDR'));
        if ($sqlo_____db2___xX__->query("SELECT *
        FROM favorites WHERE uid = '$log_id' AND code = '$log_HshCde' OR ip = '$log_ip' AND pid = '$prd_pid'
        ORDER BY date DESC LIMIT 1")->fetchColumn()) { 
            $prd_opt = 'r';
            $prd_txt = 'added to favorites'; 
        } else {
            $prd_opt = 'a';
            $prd_txt = 'Add to favorites';
        }

        if ($prd_des == 'tkn') {
            include("icl/prd/tkn_pge.php");
            if(strlen($tkn_Bio_1) > $max_des = 90) {
                $offset = ($max_des - 3) - strlen($tkn_Bio_1);
                $tkn_Bio_1 = substr($tkn_Bio_1, 0, strrpos($tkn_Bio_1, ' ', $offset)) . '...';
            }
            $prd_des = $tkn_Bio_1;
        }
            
        $prdItm .= '
        <div class="prdItmWpr">
            '.$prd_stat.'
            <a href="product.php?p='.$prd_pid.'">'.$prd_avt.'</a>
            <div class="prdItmNme">
                <a href="product.php?p='.$prd_pid.'">'.$prd_nme.'</a>
            </div>
            <div class="prdDesc">
                <a href="product.php?p='.$prd_pid.'">'.$prd_des.'</a>
            </div>
            <div class="prdPrWpr">
                '.$prd_pr1.'
                '.$prd_pr2.'
            </div>
            <div class="prdItmBtn">
                <button onclick="addTFav(\''.$log_id.'\',\''.$prd_pid.'\',\''.$prd_opt.'\',\''.$log_HshCde.'\')"><i class="fi-heart dN"></i><span id="atf_btn_'.$prd_pid.'">'.$prd_txt.'</span></button>
                <button '.$btn_stat.'><i class="fi-shopping-cart dN"></i>Add to cart</button>
            </div>
        </div>
        ';
    }
} else {
    die('Error!');
}
} catch (PDOException $newError) {
    newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
}


$idxHdr = '
<div class="idxHdrWpr">
    <div class="dv1">
        <h1>the <div class="dI"></div><img src="https://www.kodoninja.com/u/2/6378853_cat_emoji_expression_pout_pouting_icon.svg"/>meow store</h1>
    </div>
</div>
';

$prdItm_View = '
<div class="prdVwCnt">featured <sup>('.$count_prd.' results)</sup></div>
<div class="prdVwWpr pad-T">
    '.$prdItm.'
</div>
';

$indexFULL = "$idxHdr $fltrModX $prdItm_View";
?>

<style>

.dv1 h1 div {
    margin: 0px 6px 0px 46px;
}

.dv1 h1 img {
    width: 40px;
    height: auto;
    position: absolute;
    margin: -7px 0px 0px -50px;
}

/* temp delete */
.prdVwWpr {

}

.prdVwWpr .prdItmWpr {
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 6px;
    padding: 10px;
    height: auto;
    width: 200px;
    display:inline-block;
}

.prdItm_img {
    width: 100%;
    height: auto;
    background-size: cover;
    border-radius: 6px;
    margin: 0px 0px 10px 0px;
}

.prdVwCnt {
    margin: 15px 0px 0px 10px;
}

.prd_stat {
    background-color: #f1f1f1;
}

.prd_stat_a {
    background-color: #e8ffdb;
}

.prd_stat, .prd_stat_a {
    border-radius: 6px;
    border: 1px solid #ccc;
    padding: 3px 6px;
    position: absolute;
    margin: 6px 0px 0px 5px;
}

.prdDesc {
    height: 75px;
    overflow: hidden;
    margin: 10px 0px;
}

.prdPrWpr {

}

.prdItmBtn button {
    padding: 8px 6px;
    width: 100%;
    margin: 5px 0px;
    background-color: #e9e9ed;
    border: 1px solid #ccc;
}

.prdItmNme a, .prdDesc a {
    color: #333;
}

.prdItmBtn button i {
    margin: 0px 7px 0px 0px;
    color: darkred;
    font-size: 17px;
}

/* keep in production */
.prdDesc p {
    padding: 0px;
    margin: 0px;
} 

</style>