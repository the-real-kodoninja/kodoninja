<?php
$path_1a = '../../';
$path_1b = '../../../';
$m_path = ""; // for -- u_rgts.php
include_once(''.$path_1b.'icl/cnnc_t.php');
include_once(''.$path_1b.'icl/c_sts.php');
include_once(''.$path_1b.'prs/glbl/u_full.php');
include_once(''.$path_1b.'prs/time_system.php');
include_once(''.$path_1b.'icl/kodocrypt_vx.php');

// 1 universal file
if (!$log_id && !$log_username && !$user_ok && isset($_GET["ghCdx"]) && 
    isset($_GET["exp"])) {
    newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],NULL);
} else {
// pass all security checks
// add all
    //
    $st_exp_ghCdx__x = preg_replace('#[^a-z0-9.@_$]#i', '', $_GET['ghCdx']);
    $st_exp_ghCdx__x = mysqli_real_escape_string($cnnc_t, $st_exp_ghCdx__x);
    $st_exp_expxx__x = preg_replace('#[^csvzipxl]#i', '', $_GET['exp']);
    $st_exp_expxx__x = mysqli_real_escape_string($cnnc_t, $st_exp_expxx__x);
    $st_exp_sid__x = $_GET['sid'];
    //
    $st_users_x = "";
    //
    if ($st_exp_sid__x === $log_sHshCde && $st_exp_ghCdx__x === $log_HshCde && $st_exp_expxx__x !== "") { // re-checks
        //
        // NOTE NO restrictions give user everything
        // Fetch records from database 

        $st__usr_dwn_1 = mysqli_query($cnnc_t, "SELECT * FROM users WHERE id = '$log_id' AND code = '$log_HshCde' LIMIT 1");
        $st__usr_dwn_2 = mysqli_query($cnnc_t, "SELECT * FROM user_post WHERE aid1 = '$log_id'
        OR aid2 = '$log_id' OR aid3 = '$log_id' ORDER BY postdate");


        $st_usr_dwn_1_chk = mysqli_num_rows($st__usr_dwn_1);
        $st_usr_dwn_2_chk = mysqli_num_rows($st__usr_dwn_2);
        if($st_usr_dwn_1_chk) {                
            while ($row1 = mysqli_fetch_array($st__usr_dwn_1, MYSQLI_ASSOC)) {
                $st_exp_1_uidx = $row1['id']; 
                $st_exp_1_unme = $row1['username']; 
                $st_exp_1_fnme = $row1['fname']; 
                $st_exp_1_lnme = $row1['lname']; 
                $st_exp_1_ueml = $row1['email'];
                $st_exp_1_upwd = $row1['password']; 
                $st_exp_1_uvws = $row1['views']; 
                $st_exp_1_uweb = $row1['website']; 
                $st_exp_1_upne = $row1['phone']; 
                $st_exp_1_ulvl = $row1['userlevel']; 
                $st_exp_1_unws = $row1['news_list'];
                $st_exp_1_uavt = $row1['avatar'];
                $st_exp_1_uipx = $row1['ip'];
                $st_exp_1_usgn = $row1['signup'];
                $st_exp_1_ulgn = $row1['lastlogin'];
                $st_exp_1_uact = $row1['activated'];
                $st_exp_1_udct = $row1['deactivated'];
                $st_exp_1_uvrf = $row1['verified'];
                $st_exp_1_ubio = $row1['bio'];
                $st_exp_1_utkn = $row1['token'];
                $st_exp_1_ucde = $row1['code'];

                // just shows 1
                $st_users_x = array(
                    // users
                    "your information" => array(
                        // 'id' => $row['id'],
                        "your user information",
                        "username: $st_exp_1_unme", 
                        "first name: $st_exp_1_fnme", 
                        "last name: $st_exp_1_lnme", 
                        "email: $st_exp_1_ueml", 
                        "password: $st_exp_1_upwd", 
                        "views: $st_exp_1_uvws", 
                        "website: $st_exp_1_uweb", 
                        "phone: $st_exp_1_upne", 
                        "userlevel: $st_exp_1_ulvl", 
                        "news_list: $st_exp_1_unws",
                        "avatar: $st_exp_1_uavt",
                        "ip: $st_exp_1_uipx",
                        "signup: $st_exp_1_usgn",
                        "lastlogin: $st_exp_1_ulgn",
                        "activated: $st_exp_1_uact",
                        "deactivated: $st_exp_1_udct",
                        "verified: $st_exp_1_uvrf",
                        "bio: $st_exp_1_ubio",
                        "token: $st_exp_1_utkn",
                        "code: $st_exp_1_ucde",
                    ),
                );
            }
        } if($st_usr_dwn_2_chk) {                
            while ($row2 = mysqli_fetch_array($st__usr_dwn_2, MYSQLI_ASSOC)) {
                $st_exp_2_upid = $row2['pid']; 
                $st_exp_2_uvws = $row2['views']; 
                $st_exp_2_aid1 = $row2['aid1']; 
                $st_exp_2_aid2 = $row2['aid2']; 
                $st_exp_2_aid3 = $row2['aid3'];
                $st_exp_2_vcnt = $row2['v_count']; 
                $st_exp_2_type = $row2['type']; 
                $st_exp_2_data = $row2['data']; 
                $st_exp_2_hide = $row2['hide']; 
                $st_exp_2_rmve = $row2['remove']; 
                $st_exp_2_date = $row2['postdate'];
            
                if ($st_exp_expxx__x === "csv") {
                    // just shows 1
                    $st_users_x .= array(
                        // user post
                        "your post" => array(
                            "your post data for $st_exp_2_upid on $st_exp_2_date",
                            // 'pid' => $row['pid'],
                            "views: $st_exp_2_uvws",
                            // 'original post id' => $row['opid'],
                            // give back author name
                            "author 1: $st_exp_2_aid1",
                            "author 2: $st_exp_2_aid2",
                            "author 3: $st_exp_2_aid3",
                            "view count: $st_exp_2_vcnt",
                            // if a give b ack post
                            // if b give back reply
                            // if c give back reply
                            "post type: $st_exp_2_type",
                            "content: $st_exp_2_data",
                            // if 0 give back visible
                            // if 1 give back hidden
                            "visibility status: $st_exp_2_hide",
                            // if 0 give back active
                            // if 1 give back deleted
                            "delete status: $st_exp_2_rmve",
                            "date posted: $st_exp_2_date",
                        ),
                    );
                    }
                    //  else if ($st_exp_expxx__x === "xls") {
                    //     $st_users_x = array(
                    //     //     // users
                    //         "your information" => array(
                    //             // 'id' => $row['id'],
                    //             'username' => $row['username'], 
                    //             'first name' => $row['fname'], 
                    //             'last name' => $row['lname'], 
                    //             'email' => $row['email'], 
                    //             // hash password agian
                    //             // 'password' => $row['password'], 
                    //             'views' => $row['views'], 
                    //             'website' => $row['website'], 
                    //             'phone' => $row['phone'], 
                    //             'userlevel' => $row['userlevel'], 
                    //             'news_list' => $row['news_list'],
                    //             'avatar' => $row['avatar'],
                    //             'ip' => $row['ip'],
                    //             'signup' => $row['signup'],
                    //             'lastlogin' => $row['lastlogin'],
                    //             'activated' => $row['activated'],
                    //             'deactivated' => $row['deactivated'],
                    //             'verified' => $row['verified'],
                    //             'bio' => $row['bio'],
                    //             'token' => $row['token'],
                    //             'code' => $row['code'],
                    //         ),
                    //     //     // user post
                    //     //     // "your post" => array(
                    //     //     //     // 'pid' => $row['pid'],
                    //     //     //     'views' => $row['views'],
                    //     //     //     // 'original post id' => $row['opid'],
                    //     //     //     // give back author name
                    //     //     //     'author 1' => $row['aid1'],
                    //     //     //     'author 2' => $row['aid2'],
                    //     //     //     'author 3' => $row['aid3'],
                    //     //     //     'view count' => $row['v_count'],
                    //     //     //     // if a give b ack post
                    //     //     //     // if b give back reply
                    //     //     //     // if c give back reply
                    //     //     //     'post type' => $row['type'],
                    //     //     //     'content' => $row['data'],
                    //     //     //     // if 0 give back visible
                    //     //     //     // if 1 give back hidden
                    //     //     //     'visibility status' => $row['hide'],
                    //     //     //     // if 0 give back active
                    //     //     //     // if 1 give back deleted
                    //     //     //     'delete status' => $row['remove'],
                    //     //     //     'date posted' => $row['postdate'],
                    //     //     // ),
                    //     );
                    // }

                    }
                }
                $filename = "kodoverse_$log_username-data_".date('Y-m-d').".$st_exp_expxx__x";

                if ($st_exp_expxx__x === "csv") {
                    $f = fopen('php://memory', 'w'); 
                    $st_exp_ext = 'text/'.$st_exp_expxx__x.'';
                    foreach ($st_users_x as $key) {
                        // fputcsv($f, $key, ",", "\n");
                        fputcsv($f, $key, "\t", "\n"); 
                    }
                    fseek($f, 0); 
                    fpassthru($f); 
                } else if ($st_exp_expxx__x === "xls") {
                    $f = fopen("xlsfile://tmp/test.xls", "wb");
                    $st_exp_ext = "application/vnd.ms-excel";
                    fwrite($f, serialize($st_exp_expxx__x)); 
                }
            
            
            header('Content-Type: '.$st_exp_ext.''); 
            header('Content-Disposition: attachment; filename="'.$filename.'";'); 
            fclose($f);

            
    } else {
        echo "you timed out meow, try refreshing.";
    }
} 
?>