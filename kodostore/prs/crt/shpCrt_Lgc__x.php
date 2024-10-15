<?php
include('../../icl/cnnc_t.php');	
include('../../icl/c_sts.php');
include('../../prs/time_system.php');	

$crt_rsl = "";
$crt_price = "";
$crt_ttl = "";
$crt_btns = "";
$ttl_pr1 = 0.00;
$ttl_pr2 = 0.00;

if (isset($_POST["uid"]) && isset($_POST["hex"])) {
    $hdxUid____x = filter_var(preg_replace('#[^0-9]#i', '', $_GET['uid']),FILTER_SANITIZE_NUMBER_INT);
    $hdxVal____x = filter_var(preg_replace('#[^a-z0-9.@_]#i', '', $_GET['hex']),FILTER_DEFAULT);
    try {
        if($sqlo_____db2___xX__->query(
            $sql____1 = "SELECT *
            FROM products
            WHERE id = '$prdId____x'
            LIMIT 1")->fetchColumn()) {
            foreach ($sqlo_____db2___xX__->query($sql____1) as $roo0w____X___xX__) {
            $crt_pid = filter_var($roo0w____X___xX__["id"],FILTER_SANITIZE_NUMBER_INT);
            $crt_nme = filter_var($roo0w____X___xX__["name"],FILTER_SANITIZE_STRING);
            $crt_qty = filter_var($roo0w____X___xX__["quantity"],FILTER_SANITIZE_NUMBER_INT);
            $crt_pr1 = filter_var($roo0w____X___xX__["price_1"],FILTER_SANITIZE_NUMBER_FLOAT);
            $crt_pr2 = filter_var($roo0w____X___xX__["price_2"],FILTER_SANITIZE_NUMBER_FLOAT);
            $crt_avt = preg_match("/\.(gif|jpg|jpeg|png)$/i", filter_var($roo0w____X___xX__["avatar"],FILTER_DEFAULT));
            $crt_des = filter_var($roo0w____X___xX__["description"],FILTER_DEFAULT);
            $crt_dte = timeAgo(strtotime(filter_var($roo0w____X___xX__["date"]),FILTER_DEFAULT));
            $crt_stat = filter_var(preg_replace('#[^apo]#i', '', $roo0w____X___xX__["status"]),FILTER_SANITIZE_STRING);

                // totsl cart items
                $ttl_pr1 += (float)$crt_pr1*(int)$crt_qty;
                $ttl_pr2 += (float)$crt_pr2*(int)$crt_qty;
       
                if ($crt_pr1) {
                    $crt_pr1 = '<span class="sxPrc_ fR"><span class="ktknCurIcn">k<sup>tkn</sup></span>'.$crt_pr1.'</span>';
                } if ($crt_pr2) {
                    $crt_pr2 = '<span class="sxPrc_ fR"><span style="color: green;">$</span>'.$crt_pr2.'</span>';
                } if ($crt_avt) {
                    $crt_avt = '<img class="sch_avt" src="prd/'.$crt_pid.'/'.$crt_avt.'"/>';
                } else if ($crt_des == "tkn") {
                    $crt_avt = '<img class="sch_avt" src="prd/tkn/kodocoin2_v1.svg"/>';
                }else {
                    $crt_avt = '<img class="sch_avt" src="img/temp/user-pic_1.0.png"/>';
                }

                $crt_pFull = "$crt_pr1 $crt_pr2";
                $crt_rsl .= '
                <a href="product?p='.$crt_pid.'">
                    <li>
                        '.$crt_avt.'
                        <div class="hdxCrtDta dI">
                            <div>'.$crt_nme.'</div>
                            <div>
                                <span>qty:'.$crt_qty.'</span>
                                <span class="fR">'.$crt_pFull.'</span>
                            </div>
                        </div>
                    </li>
                </a>
                ';           
            }
            

            $crt_btns = '
            <div class="pad-T">
                <a href="cart.php">
                    <button id="hdxLiBtn_1">view cart</button>
                </a>
            </div>
            ';

        
            $crt_ttl = '
            <strong class="pad-T dB">
                <span>total:</span>
                <div class="fR">
                    <!-- total kodotokens -->
                    <span>
                        <span class="ktknCurIcn">k<sup>tkn</sup></span>
                        '.$ttl_pr1.'
                    </span>
                    <!-- total cash -->
                    <span>
                        <span style="color: green;">$</span>
                        '.$ttl_pr2.'
                    </span>
                </div>
            </strong>
            ';

            
        } else {
            $crt_rsl .= '<li>You have nothing in your cart</li>';
        }

    
        echo $crt_drp = '
            '.$crt_rsl.'
            '.$crt_ttl.'
            '.$crt_btns.'
        ';
        } catch (PDOException $newError) {
            newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
        }

    } 
    // else {
    //     echo '<li>No cart session foud</li>';
    //     echo '<li>Try adding something to your cart, or log in</li>';
    // }
// }

// add to cart logic
if (isset($_POST["uid"]) && isset($_POST["cde"]) && isset($_POST["pid"]) && isset($_POST["qty"])) {
    $crtUid____x = preg_replace('#[^0-9]#i', '', $_POST['uid']);
    $crtUid____x = mysqli_real_escape_string($cnnc_t, $crtUid____x);
    // check if keys changes
    $crtCde____x = mysqli_real_escape_string($cnnc_t2, $_POST["cde"]);
    // also pushed into session
    $crtPid____x = preg_replace('#[^0-9]#i', '', $_POST['pid']);
    $crtPid____x = mysqli_real_escape_string($cnnc_t2, $crtPid____x);
    $crtQty____x = preg_replace('#[^0-9]#i', '', $_POST['qty']);
    $crtQty____x = mysqli_real_escape_string($cnnc_t2, $crtQty____x);
    // developer checks
    // echo 'added to cart | '.$crtUid____x.' | '.$crtCde____x.' | '.$crtPid____x.' | '.$crtQty____x.'';
    //
    // checks if rabbed input is actually a real item
    // if ($crtUid____x === $log_id && $crtCde____x === $log_code) {
        $sql____1 = mysqli_query($cnnc_t2, "SELECT id FROM products WHERE id = '$crtPid____x' LIMIT 1");
        $num____1 = mysqli_num_rows($sql____1);
        if ($num____1 > 0) {
            // check if product is already added to cart
            $sql____2 = mysqli_query($cnnc_t2, "SELECT pid FROM cart WHERE uid = '$log_id' AND pid = '$crtPid____x' LIMIT 1");
            $num____2 = mysqli_num_rows($sql____2);
            // checks if item already exist in array 
            if ($sql____2 
            // && in_array($crtPid____x,$crtQty____x,$_SESSION['cart'])
            ) {
                // if added increase quantity in cart
                $sql____2_a1 = array_push($_SESSION['cart'],$crtPid____x,$crtQty____x);
                //
                $sql____2_a2 = mysqli_query($cnnc_t2, "UPDATE cart SET quantity = quantity + '$crtQty____x' WHERE uid = '$log_id' AND pid = '$crtPid____x' LIMIT 1");
                if ($sql____2_a2) {
                    $crt_rsl = '+'.$crtQty____x.' added to cart';
                }
            } else {
                // new entry to cart
                $sql____2_b1 = array_push($_SESSION['cart'],$crtPid____x,$crtQty____x);
                //
                // 1st item to cart creates a session
                session_start();
                setcookie("crt_log_cde", $crtCde____x, strtotime( '+3 hours' ), "/", "", "", TRUE); 
                $_SESSION['crt_log_cde'] = preg_replace('#[^a-z0-9.@_]#i', '', $_COOKIE['crt_log_cde']);
                $crt_log_cde = preg_replace('#[^a-z0-9.@_]#i', '', $_SESSION['crt_log_cde']);
                //
                $sql____2_b2 = mysqli_query($cnnc_t2, "INSERT INTO `cart`(`pid`,
                            `quantity`,
                            `uid`,
                            `email`,
                            `code`,
                            `ip`,
                            `date`) 
                VALUES('".$crtPid____x."',
                        '".$crtQty____x."',
                        '".$log_id."',
                        '',
                        '".$crtCde____x."',
                        '".$log_ip."',
                        now())");
                if ($sql____2_b2) {
                    $crt_rsl = ''.$crtQty____x.' added to cart';
                }        
            }
        }
        echo $crt_rsl;
    // }
}
?>