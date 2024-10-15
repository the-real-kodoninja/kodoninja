<?php
$crt_rsl = "";
$crt_price = "";
$crt_ttl = "";
$crt_btns = "";
$crtTD = "";
$ttl_qty = "";
$crtAdr = "";
// $crtStp_a = "Step 1";
// $crtStp_b = "Step 2";
// $crtStp_c = "Step 3";
// $crtStp_d = "Step 4";
$crtTax = "";
$crtShp = "";
$ttl_pr1 = 0.00;
$ttl_pr2 = 0.00;
$crt_pr1_b = "";
$crt_pr2_b = "";
$crtTEST = "";
$gstNEW = "";
$tknMSG = "";
$crt_act = "";

// if ($hdxUid____x === $log_id && $hdxVal____x === $log_code) {
    try {
        if($count_prd = $sqlo_____db2___xX__->query(
            $sql____1 = "SELECT c.*,p.*
            FROM cart AS c
            LEFT JOIN products AS p
            ON c.pid = p.id 
            WHERE c.uid = '$log_id'
            ORDER BY c.date DESC LIMIT 5")->fetchColumn()) {
            foreach ($sqlo_____db2___xX__->query($sql____1) as $roo0w____X___xX__) {
                $crt_pid = filter_var($roo0w____X___xX__["pid"],FILTER_SANITIZE_NUMBER_INT);
                $crt_nme = filter_var($roo0w____X___xX__["name"],FILTER_SANITIZE_STRING);
                $crt_qty = filter_var($roo0w____X___xX__["quantity"],FILTER_SANITIZE_NUMBER_INT);
                $crt_pr1 = filter_var($roo0w____X___xX__["price_1"],FILTER_SANITIZE_NUMBER_FLOAT);
                $crt_pr2 = filter_var($roo0w____X___xX__["price_2"],FILTER_SANITIZE_NUMBER_FLOAT);
                $crt_avt = preg_match("/\.(gif|jpg|jpeg|png)$/i", filter_var($roo0w____X___xX__["avatar"],FILTER_DEFAULT));
                $crt_cde = filter_var($roo0w____X___xX__["code"],FILTER_DEFAULT);
                $crt_des = filter_var($roo0w____X___xX__["description"],FILTER_DEFAULT);
                $crt_dte = timeAgo(strtotimefilter_var($roo0w____X___xX__["date"],FILTER_DEFAULT));
                // totsl cart items
                $ttl_pr1 += (float)$crt_pr1*(int)$crt_qty;
                $ttl_pr2 += (float)$crt_pr2*(int)$crt_qty;
                $ttl_qty .= (int)$crt_qty*(int)1;
       
                if ($crt_pr1) {
                    $crt_pr1_b = '
                    <span class="sxPrc_">
                        <span class="ktknCurIcn">k<sup>tkn</sup></span>
                        <span id="crt_tkn_LOAD_'.$crt_pid.'">'.$crt_pr1.'</span>
                    </span>
                    ';
                } if ($crt_pr2) {
                    $crt_pr2_b = '
                    <span class="sxPrc_">
                        <span style="color: green;">$</span>
                        <span id="crt_csh_LOAD_'.$crt_pid.'">'.$crt_pr2.'</span>
                    </span>
                    ';
                } if ($crt_avt) {
                    $crt_avt = '<img class="sch_avt" src="prd/'.$crt_pid.'/'.$crt_avt.'"/>';
                } else if ($crt_des == "tkn") {
                    $crt_avt = '<img class="sch_avt" src="prd/tkn/kodocoin2_v1.svg"/>';
                } else {
                            $crt_avt = '<img class="sch_avt" src="img/temp/user-pic_1.0.png"/>';
                }

                $crt_pFull = "$crt_pr1 $crt_pr2";

                $crtTD .= '
                <tr class="crtItm_chk">
                    <th><a href="product.php?p='.$crt_pid.'">'.$crt_avt.'</a></th>
                    <td><a href="product.php?p='.$crt_pid.'">'.$crt_nme.'</a></td>
                    <td>'.$crt_pr1_b.'</td>
                    <td>'.$crt_pr2_b.'</td>
                    <td><input id="crt_qty_VAL_'.$crt_pid.'" class="crt_qty_VAL" onchange="crtChkTble(\''.$crt_pid.'\')" type="number" value="'.$crt_qty.'"/></td>
                </tr>
                ';

                if ($crt_des == 'tkn' && 
                    $crt_nme == 'kodotoken 250' && $crt_qty >= 12 ||
                    $crt_nme == 'kodotoken 500' && $crt_qty >=  6 ||
                    $crt_nme == 'kodotoken 1,000' && $crt_qty >= 3 ||
                    $crt_nme == 'kodotoken 5,000' && $crt_qty >= 1 ) {
                        $tknMSG = '<p>upon successful completion a promo code will be assigned to this email for $2 off your first month on premium</p>';
                    }

                if ($crt_des == 'tkn' && 
                    $crt_nme == 'kodotoken 250' && $crt_qty >= 40 ||
                    $crt_nme == 'kodotoken 500' && $crt_qty >= 20 ||
                    $crt_nme == 'kodotoken 1,000' && $crt_qty >= 10 ||
                    $crt_nme == 'kodotoken 5,000' && $crt_qty >= 2 || 
                    $crt_nme == 'kodotoken 10,000' && $crt_qty >= 1 ||
                    $crt_nme == 'kodotoken 25,000' && $crt_qty >= 1 ||
                    $crt_nme == 'kodotoken 50,000' && $crt_qty >= 1 ||
                    $crt_nme == 'kodotoken 100,000' && $crt_qty >= 1) {
                        $tknMSG = '<p>upon successful completion you\'ll receive 6 months free of our premium membership and a $5 kodostore credit will be linked to this email.</p>
                        <p>If you join the kodoverse now you\'ll get an extra month free and 500 extra kodotokens.</p>';
                    }

                // $log_id = 1;
                // $log_username = 'kodoninja';
                // $user_ok = true;

                
                if ($log_id == 0 && !$user_ok) {
                    $crtStp_a = 'step 1'; // signup
                    $crtStp_b = 'step 2'; // shopping cart
                    if ($crt_pr1 >= 1) {
                        $crtStp_c = 'step 3'; // shipping
                        $crtStp_d = 'step 4'; // footer
                    } else {
                        $crtStp_c = ''; // shipping
                        $crtStp_d = 'step 4'; // footer
                    }
                } else if ($log_id >= 1 && $user_ok) {
                    $crtStp_a = '';  // signup
                    $crtStp_b = 'step 1'; // shopping cart
                    if ($crt_pr1 >= 1) {
                        $crtStp_c = 'step 2'; // shipping
                        $crtStp_d = 'step 3'; // footer
                    } else {
                        $crtStp_c = '';
                        $crtStp_d = 'step 3'; // footer
                    }
                    
                } 
                
                if ($crt_pr1 >= 1) {
                    $crtAdr = '
                    <div class="prdBdyWpr">
                        <div class="crtHdr">'.$crtStp_c.'</div>
                        Your shipping address will be entered securely on payment checkout method.
                    </div>
                    ';
                    
                    $crtTax = '
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <th>estimated tax</th>
                        <td><span id="crt_tax_LOAD">MEOW</span></td>
                    </tr>
                    ';
                    $crtShp = '
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <th>shipping</th>
                        <td>Calculated at checkout</td>
                    </tr>
                    ';
                }
            }
        }
    } catch (PDOException $newError) {
        newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError);
    }

        

        $idxHdr = '
        <div class="idxHdrWpr">
            <div class="prdBdyWpr">
                <h3>Your shopping cart '.$log_username.'</h3>
            </div>
        </div>
        ';

        
        if ($log_id == 0 && !$user_ok) {
            $gstNEW = '
            <div class="crtHdr">Create a guest account</div>
            <table id="gstNEW_a" class="gstNEW w100">
                <tr>
                    <td>
                        <input id="gstNEW_e1" onkeyup="gstNEW_e()" type="email" placeholder="email" required/>
                    </td>
                    <td>
                        <input id="gstNEW_p1" onkeyup="gstNEW_p()" type="password" placeholder="password" required/>
                    </td>
                </tr>
                <tr>
                    <td</td>
                    <td></td>
                </tr>
                <tr>
                     <td>
                        <input id="gstNEW_e2" onkeyup="gstNEW_e()" class="dN" type="email" placeholder="re-type email" required/>
                    </td>
                    <td>
                        <input id="gstNEW_p2" onkeyup="gstNEW_p()" class="dN" type="password" placeholder="re-type password" required/>
                    </td>
                </tr>
                <tr>
                    <td><span id="gstNEW_r1" alt="username response loads here"></span></td>
                    <td><span id="gstNEW_r2" alt="password response loads here"></span></td>
                </tr>
            </table>
            <div class="gstNEWBdy">
                <p>You ever decide to join the kodoverse just signup using this email</p>
                <!-- new users will get $2 off if they purchase 3000 or more kodotokens -->
                '.$tknMSG.'
            </div>
            <table id="gstNEW_b" class="gstNEW w100">
                <tr>
                    <!-- php response -->
                    <td><span id="gstNEW_res_x"></span></td>
                </tr>
                <tr>
                    <td><button onclick="gstNEW_POST()" id="gstNEW_sgu" class="dN" style="background-color: #3d4347; width: 200px;">create account</button></td>
                    <td>&nbsp;</td>
                </tr>
            </table>';

            $crt_act = '
            <div class="prdBdyWpr crtBtn_chk">
                <div class="crtHdr crtBtn_chk">'.$crtStp_a.'</div>
                <!-- send over cart session -->
                <!-- redirect back to checkout with new account created -->
                <a href="../kodoninja/membership.php?c='.$crt_cde.'"><button style="width: 200px;">Join the kodoverse</button></a>
                <div>or</div>
                '.$gstNEW.'
            </div>
            ';
        } 

        
        $crtBdy = '
         <div class="prdBdyWpr pad-T">
            <div class="crtHdr">'.$crtStp_b.'</div>
            <div class="crtBdy">
                <table>
                    <tr>
                        <th></th>
                        <th>product</th>
                        <th>token price</th>
                        <th>cash price</th>
                        <th>quantity</th>
                    </tr>
                    '.$crtTD.'
                </table>
            </div>
        </div>
        ';
        

        $tblFtr = '
        <div class="tblFtr" style="height: auto; background-color: transparent;">
            <div class="prdBdyWpr pad-T">
                <div class="crtHdr">'.$crtStp_d.'</div>
                <table>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <th>total quantity</th>
                        <td><span id="crt_qty_TOTAL">MEOW</span></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <th>subtotal kodotokens</th>
                        <td>
                            <span>
                                <span class="ktknCurIcn">k<sup>tkn</sup></span>
                                <span id="crt_tkn_TOTAL">'.$ttl_pr1.'</span>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <th>subtotal cash</th>
                        <td>
                            <span>
                                <span style="color: green;">$</span>
                                <span id="crt_csh_TOTAL">'.$ttl_pr2.'</span>
                            </span>
                        </td>
                    </tr>
                    '.$crtTax.'
                    '.$crtShp.'
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <th>promo code</th>
                        <td><input id="crt_pmo_INPUT" type="text" placeholder="enter promo code"/></td>
                    </tr>
                    <tr id="crt_pmo_LOAD_a" class="dN">
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td><span id="crt_pmo_LOAD_b"><span/></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="crtBtn_1"><img src="logo/payment-button_dark_version1_2b"/></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="crtBtn_2"><button>checkout with <b>stripe</b></button></td>
                    </tr>
                </table>
            </div>
        </div>
        ';

        
   
        $cartFULL = '
        '.$idxHdr.'
        '.$crt_act.'
        '.$crtTEST.'
        '.$crtBdy.'
        '.$crtAdr.'
        '.$tblFtr.'
        ';
    
    // else {
    //     echo '<li>No cart session foud</li>';
    //     echo '<li>Try adding something to your cart, or log in</li>';
    // }
// }


?>
<style>
    .dv2 {
        margin: 10px 10px;
    }

    .crtBdy table, .tblFtr table {
        width: 100%;
    }

    .crtBdy table th, .crtBdy table tr td, .tblFtr table th, .tblFtr table tr td {
        text-align: left;
    }

    .crtBdy table tr td, .tblFtr table tr td {
        padding: 10px 0px;
    }

    .tblFtr {
        height: auto;
    }

    input:focus {
        border: 2px solid darkred;
    }

    .crtBdy table input[type="number"] {
        background-color: transparent;
        border: 1px solid #f0f0f0;
    }

    .crtBtn_1 button, .crtBtn_2 button, .crtBtn_3 button, .tblFtr input[type="text"], .gstNEW input {
        height: 100%;
        width: 100%;
        padding: 10px;
        border: none;
    }

    .crtBtn_1 button {
        color: #fff;
        background-color: #6772e5;
        border: none;
    }

    .crtBtn_2 button {
        color: #fff;
        background-color: #6772e5;
        border: none;
    }
    
    .crtBtn_3 button {
        color: #fff;
        background-color: blue;
        border: none;
    }

    .crtBtn button:hover {
        background-color: #3d4347;
        color: #fff;
    }

    .gstNEW input[type="password"], .gstNEWBdy {
        background-color: #fff;
        border: 1px solid #ccc;
    }

    .gstNEWBdy {
        padding: 10px 30px;
        margin: 20px 0px 10px;
    }

    .tblFtr {
        background-color: #e1e1e1;
        padding: 20px;
    }

    .crtHdr {
        margin: 10px 0px;
        font-weight: 600;
    }

    .crtBtn_chk button {
        background-color: darkred;
        color: #fff;
        padding: 10px 20px;
        margin: 10px 0px;
        border: 1px solid #ccc;
        width: 150px;
    }
</style>