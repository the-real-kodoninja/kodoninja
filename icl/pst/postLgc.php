<?php 
include_once(''.$m_path.'icl/err/err_tkn.php');
include_once(''.$m_path.'icl/cnnc_t.php');
include_once(''.$m_path.'icl/c_sts.php');


if ($log_id <= "" || $log_username == "" && !$user_ok) {
    newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],NULL);
}
// NOTE
// switch overlay method on load
$cov_vc = '    
<form id="__pLoadX1" class="IMG_BlgS IMG_diag cP __pLg2X1" method="post">
    <label for="imgVwYb">
        <span aria-hidden="true" class="__pL_icn _ic1 cP"><img src="css/svg/pst/fi-photo.svg"</span>
        <input type="file" accept="image/png, image/jpeg" id="imgVwYb" class="__pLg2a dN" onchange="showPreview(event)">
    </label>
    <img src="#" class="preview__load_1" alt="Preview Uploaded Image" id="file-preview" alt="I show in this one">
</form>
';
$pT_btn = "";
$cln = "'";
$refLgc = "";
$wysiwyg_BdyX = "";
$t = filter_var($_GET ['t'],FILTER_SANITIZE_STRING);
$refLgc = "";
$catSel = "";
$yt_inst = "";
$load__sid__y = "";
$pgr_bar = "";
$id_vc = "";
$t_vc = "";
$cat_vc = "";
$tag_vc = "";
$d_vc = "";
$prg1_vc = 0;
$date_vc = "";
$date2_vc = "";
$refLgc = "";
$y_thumb = "";
$y_link = "";
$y_vid = "";

if ($t == 'blog' || $t == 'forum' || $t == 'goal') {
    if ($t === 'blog') {
        $__v_mth = "b";
        $___mth_y1 = "bid";
    } if ($t === 'forum') {
        $__v_mth = "f";
        $___mth_y1 = "fid";
    } if ($t === 'goal') {
        $__v_mth = "g";
        $___mth_y1 = "gid";
    }

    // post and load logic
    if (isset($_GET["sid"]) && isset($_GET["eCde"])) {
        $load__sid__y = filter_var($_GET['sid'],FILTER_VALIDATE_INT);
        $load__eCde__y = filter_var($_GET['eCde'],FILTER_SANITIZE_STRING);
    } 


        $nwBDe_cke = "";
        if (isset($_SESSION["eCde"])) {
            $nwBDe_cke = $_SESSION["eCde"];
        } 

        // echo "1st GRAB TEST $load__sid__y | $load__eCde__y SESSION: ".$nwBDe_cke."";
        // if ($nwBDe_cke === $load__eCde__y) {
            // grab content to load

            // $___LOAD__trm = "";
            // if ($___LOAD__y === "___LOAD") {
            //     $___LOAD__trm = "
            //     AND hide = '1'
            //     AND save = '1'
            //     "; 
            // } if ($___LOAD__y === "___EDIT") {
            //     $___LOAD__trm = "
            //     AND hide = '0'
            //     AND save = '0'
            //     "; 
            // }
            try {
                if($count_bc = $sqlo_____dbx___xX__->query(
                    $load_sql__1 = "SELECT * 
                    FROM $t
                    WHERE uid = '$log_id'
                    AND $___mth_y1 = '$load__sid__y'
                    AND remove = '0' LIMIT 1")->fetchColumn()) {
                    foreach ($sqlo_____dbx___xX__->query($load_sql__1) as $roo0w____X___xX__) {
                        $uid_vc = $roo0w____X___xX__["uid"];
                        $id_vc = $roo0w____X___xX__[$___mth_y1];
                        $t_vc = $roo0w____X___xX__["title"];
                        $tag_vc = strip_tags($roo0w____X___xX__["tags"]);
                        $cat_vc = $roo0w____X___xX__["category"];
                        $d_vc = $roo0w____X___xX__["data"];
                        $date_vc = timeAgo(strtotime($roo0w____X___xX__["date"]));
                        if($cov1_vc = $roo0w____X___xX__["cover"]) { 
                            $avOPT = 'onclick="avtUPD(\''.$log_id.'\',\''.$log_HshCde.'\',\'NULL\')"';
                            $cov_vc = '<img id="imgVwXa_'.$id_vc.'" style="width: 92px" '.$avOPT.' class="IMG_BlgS" src="'.$m_path.'img/temp/no_imgLnk.svg" alt="'.$t_vc.'">';
                            $img_p = 'src="'.$m_path.'blog/img/'.$id_vc .'/'.$cov1_vc.'"';
                            $cov_vc = '<img id="imgVwXa_'.$id_vc.'" '.$avOPT.' class="IMG_BlgS cP" '.$img_p.' style="width: 92px"/>';
                        }  if($t === "blog") {
                            $y_thumb = isset($roo0w____X___xX__["youtube_thumbnail"]);
                            if (isset($roo0w____X___xX__["references"])) {
                                $refLgc = '<div id="body1_pt3" name="body1_pt3" class="RefPst_frame">References::<br>'.nl2br($roo0w____X___xX__["references"]).'</div>';
                            } if ($y_link = isset($roo0w____X___xX__["youtube_link"])) {
                                $y_vid = '
                                <iframe src="'.$y_link.'" title="'.$t.'" style="width: 100%;" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                '; 
                                $cov_vc2 = $y_vid;
                            }
                        } if ($t === "goal") {
                        if ($prg1_vc = isset($roo0w____X___xX__["progress"])) {
                            $date_vc = date("Y-m-d", strtotime($roo0w____X___xX__["startdate"]));
                            $date2_vc = date("Y-m-d", strtotime($roo0w____X___xX__["enddate"]));
                        }
                    }
                }
            }
        } catch (PDOException $newError) {
            newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
        }
}
// onchange="avtUPD(\''.$log_id.'\',\''.$log_HshCde.'\',\'newAVTR\')"

    $cov_lay = '
    <form id="upVeil_1" class="pA cP uAvt_upd IMG_BlgS dN" enctype="multipart/form-data" method="post">
        
        <label for="imgVwYb">
            <span aria-hidden="true" class="__pL_icn _ic1 cP">
                <img src="css/svg/pst/fi-photo.svg" style="margin: 25px 0px 0px 24px; opacity: 0.3;"/>
            </span>
            <input type="file" name="files[]" accept="image/png, image/jpeg" id="imgVwYb" class="__pLg2a" style="display:none" onchange="showPreview(event);">
        </label>
        <div> 
            <span onclick="avtVIEW('.$id_vc.')"><img src="css/svg/pst/fi-magnifying-glass.svg" class="i_zoom"/></span>
            <span id="upv_x2" class="upd_u1 pA" onclick="avtUPD(\''.$log_id.'\',\''.$log_HshCde.'\',\'NULL\')" style="margin: 5px 0px 0px 0px; border: 2px solid #333; opacity: 0.4;">X</span>
        </div>

    </form>
    ';

    $catSel = '
    <div>
        <input id="__b_c" name="__b_c" type="text" placeholder="What is your category?" value="'.$cat_vc.'" autocomplete="on" onkeyup="catCall(\''.$__v_mth.'\')">
        <ul id="__c_rsl" class="__c_rsl"></ul>
    </div>
    ';

if ($t == 'blog') {
    $__v_mth = "b";
    $refLgc = '
    <div class="refLgc">
        <div>References</div>
        <div id="body1_pt3" name="body1_pt3" contenteditable="true" spellcheck="true">'.$refLgc.'</div>
    </div>
    ';
} else if ($t == 'forum') {
    $__v_mth = "f";
    
} else if ($t == 'goal') {
    $__v_mth = "g";
    $pgr_bar = '
    <div class="pgr_bar">
        <div class="pgr_Inr">
            <div>
                <span<
                    <label for="pgr_Num_1">completion %</label>
                    <input type="number" id="pgr_Num_1" max="100" min="0" value="'.$prg1_vc.'" />
                </span>
                <span>
                    <label for="__p_d1">startdate</label>
                    <input type="date" id="__p_d1" name="__p_d1" value="'.$date_vc.'" />
                </span>
                    <label for="__p_d2">enddate</label>
                    <input type="date" id="__p_d2" name="__p_d2" value="'.$date2_vc.'" />
                </span>
            </div>
            <div class="glPgBr_1">
                <div class="prg_amt"></div>
                <progress id="__p_c" name="__p_c" value="" max="100" class="dN"></progress>
            </div>
        </div>
    </div>
    ';
}
//

$__b_PstBtn = '
<input id="blgPstBtn" class="Pnl-Btn" onclick="pst_lgc_1(\''.$log_id.'\',\''.$log_HshCde.'\',\''.$__v_mth.'\',\'NULL\',\'___POST\')" type="submit" value="Post to '.$t.'"/>
';
?>