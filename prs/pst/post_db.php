<?php
$path_1a = '../';
$path_1b = '../../';
include_once(''.$path_1b.'icl/err/err_tkn.php');
include_once(''.$path_1b.'icl/cnnc_t.php');
include_once(''.$path_1b.'icl/c_sts.php');
$__b_Ld2 = "";
$err_1 = "";
$err_2 = "";
$err_3 = "";
$covImg = NULL; // testing temp
$__b_ylnk = "undefined";
$__b_ythb = "undefined";
$body1_pt3 = NULL;
$__p_c = "";
$__p_d2 = "";
$___pth__y = "";
$___mth__x = "";
$___mth__y = "";
//
if ($log_id <= "" || $log_username == "" && !$user_ok) {
    newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],NULL);
} else {
	$_POST = json_decode(file_get_contents('php://input'), JSON_PRETTY_PRINT);

    if (isset($_POST['__b_t1']) && 
        isset($_POST['__b_t2']) &&
        isset($_POST['__b_c']) &&
        isset($_POST['__p_c']) &&
        isset($_POST['__p_d1']) &&
        isset($_POST['__p_d2']) && 
        isset($_POST['body1_ptX']) && 
        isset($_POST['body1_pt3']) &&
        isset($_POST['sid'])) { 
        if ($_POST['mth'] === "b" || $_POST['mth'] === "f" || $_POST['mth'] === "g") {

            $___mth__x = filter_var(preg_replace('#[^mthbfg_]#i', '', urldecode($_POST['mth'])), FILTER_SANITIZE_STRING);
            $___pth__y = filter_var(preg_replace('#[^SAVEPOST_]#i', '', urldecode($_POST['pth'])), FILTER_SANITIZE_STRING);
            
            if ($___mth__x === "b") {
                $___mth__y = "blog";
                $___mth_y1 = "bid";
            } if ($___mth__x === "f") {
                $___mth__y = "forum";
                $___mth_y1 = "fid";
            } if ($___mth__x === "g") {
                $___mth__y = "goal";
                $___mth_y1 = "gid";
            } if ($___pth__y === "SAVE") {
                $___SVE_c1 = 1;
                $___SVE_c2 = 1;
            } if ($___pth__y === "POST") {
                $___SVE_c1 = 0;
                $___SVE_c2 = 0;   
            }
        
            // double checks to see if mal SQL injects made it past JS part 2
            // mandatory logic
            
            // title
            $__b_t1 = filter_var(preg_replace('/[^a-zA-Z0-9 ]/m', '', urldecode($_POST['__b_t1'])),FILTER_DEFAULT);
            if (!$__b_t1) die("Your title is missing.".$sqlc_____dbx___xX__);

            // category
            $__b_c = filter_var(preg_replace('/[^a-zA-Z0-9]/m', '', urldecode($_POST['__b_c'])),FILTER_DEFAULT);
            if (!$__b_c) die("Your category is missing.".$sqlc_____dbx___xX__);

            // hashtags (#)
            $__b_t2 = filter_var(preg_replace('/[^a-zA-Z0-9# ]/m', '', urldecode($_POST['__b_t2'])),FILTER_DEFAULT);
            if(!$__b_t2) die("Sorry your tags must include an # symbol".$sqlc_____dbx___xX__); 

            // enddeate
            if(isset($_POST['__p_d1']) && $_POST['__p_d1'] !== "undefined" && isset($_POST['__p_d2']) && $_POST['__p_d2'] !== "undefined")
                $__p_d1 = filter_var(urldecode($_POST['__p_d1']),FILTER_SANITIZE_NUMBER_INT);
                $__p_d2 = filter_var(urldecode($_POST['__p_d2']),FILTER_SANITIZE_NUMBER_INT);

            // references
            if (isset($_POST['body1_pt3'])) $body1_pt3 = filter_var(urldecode($_POST['body1_pt3']),FILTER_DEFAULT);

            // progress bar
            if(isset($_POST['__p_c'])) $__p_c = filter_var(urldecode($_POST['__p_c']),FILTER_SANITIZE_NUMBER_INT);

            $___sid__y = filter_var(preg_replace('#[^0-9NULL]#i', '', urldecode($_POST['sid'])),FILTER_DEFAULT);

            
            // new post being added to the platform
            // and new cover images being added to the post
            if ($___sid__y === "NULL") {
                // grab total number of rows 
                // add +1 for redirect
                    $ncId = $sqlo_____dbx___xX__->query("SELECT * FROM $___mth__y ORDER BY $___mth_y1 DESC")->fetchColumn();
                    // current row plus 1 for cd logic
                    $__b_rdir = (++$ncId);
                    $__b_ndir = "../../$___mth__y/img/$__b_rdir/";

                
            } else { // already has a folder location
                $__b_ndir = "../../$___mth__y/img/$___sid__y/"; //: goal\img\21
            }
    
            // // mkdir | $cov__2
            !is_dir($__b_ndir) ? mkdir($__b_ndir, 0777, true) : null;

            // cover IMG grab // optional
            if ($cov__2x = base64_decode(filter_var(urldecode($_POST['covImg2']),FILTER_SANITIZE_STRING))) {
                
                $image_parts = explode(";base64,", $cov__2x);
                explode("image/", $image_parts[0])[1];
                file_put_contents($__b_ndir.$cov__2x = "covx_".$___sid__y.'.png', base64_decode($image_parts[1]));
                
                // $cov__2 = '<img class="w100" src="'.$cov__2x.'"';
                // $command = "img_encode.py " . 
                // escapeshellarg($image_base64) . " " . // base64 image
                // escapeshellarg($__b_ndir) . " " . 
                // escapeshellarg($___sid__y);
                // exec($command, $output);

                // // Print the output returned by the Python script
                // $covImg = implode($output);

            }

            
             // body content
            if ($body1_ptX = filter_var(urldecode($_POST['body1_ptX']),FILTER_DEFAULT)) {


                // can you fix this fuunction I am trying to take the b64 images from $body1_ptX convert them to .png then place them into the folder then place the new images back into $body1_ptX with the older location attached to the src

                function get_img_src(string $text): ?string {
                    // Get all the img tags from the text.
                    preg_match_all('/<img[^>]+>/i', $text, $matches);

                    // If no img tags are found, return null.
                    if (empty($matches[0])) {
                        return null;
                    }

                    // Loop through the img tags and convert each image to PNG format.
                    $img_srcs = [];
                    foreach ($matches[0] as $img_tag) {
                        // Get the image source and type.
             
                        $image_src = $img_tag['src'];
                        $image_type = explode('/', 'src')[1];

                        // Decode the image base64 data.
                        $image_base64 = base64_decode(explode(';base64,', $img_tag)[1]);

                        // Generate a unique image name.
                        $image_name = uniqid() . '.' . $image_type;

                        // Save the image to a file.
                        $image_path = __DIR__ . '/images/' . $image_name;
                        file_put_contents($image_path, $image_base64);

                        // Update the image source to the new file path.
                        $img_srcs[] = str_replace($image_src, $image_path, $img_tag);
                    }

                    // Return the updated img srcs.
                    return $img_srcs;
                }
                   

                    $img_srcs = get_img_src($body1_ptX);
                    die("test 1 | ".$img_srcs);
            }

            // for TESTING purposes only may leave un commented | START
            $test_matrix = "";
			// $test_matrix .= '
			// <div>
			// 	<b>JSON array dump</b> <br><hr>
			// 	'.var_dump($_POST).'
			// </div>
			// ';
			$test_matrix .= '<div>';
            $test_matrix .= '<b>turn methods</b> <br><hr>';
            $test_matrix .= '<b>mth:</b> '.$___mth__x.' | '.$___mth__y.' <br>';
            $test_matrix .= '<b>pth:</b> '.$___pth__y.' <br>';
            $test_matrix .= '<b>exl:</b> '.$___sid__y.' <br><br>';
            $test_matrix .= '<b>PHP: Error testing and POST value grab TESTING</b><br><hr>';
            $test_matrix .= '<b>Cover:</b> <img class="w100" src="'.$___mth__y.'/img/'.$___sid__y.'/'.$cov__2x.'"/></div><br>';
            $test_matrix .= '<b>Title:</b> '.$__b_t1.'<br>';
            $test_matrix .= '<b>Tags:</b> '.$__b_t2.'<br> ';
            $test_matrix .= '<b>Category:</b> '.$__b_c.'<br>';
            $test_matrix .= '<b>Content:</b> '.$body1_ptX.'<br>';
            $test_matrix .= '<b>Progress:</b> '.$__p_c.'<br>';
            $test_matrix .= '<b>Progress startdate:</b> '.$__p_d1.'<br>';
            $test_matrix .= '<b>Progress enddate:</b> '.$__p_d2.'<br>';
            $test_matrix .= '<b>YouTube IMG (optional):</b> '.$__b_ythb.'<br>';
            $test_matrix .= '<b>YouTube URL (optional):</b> '.$__b_ylnk.'<br>';
            $test_matrix .= '<b>References:</b> '.$body1_pt3.'<br>';               
            $test_matrix .= '</div>';
            // exit();
            // for TESTING purposes only END
            //    <b>Folder Creation:</b> '.$err_1.'<br>
            //     <b>Cover relocation:</b> '.$err_2.'<br>
            //     <b>body IMG\'s relocation:</b> '.$err_3.'<br>
            // DEVELOPER NOTE -- saved post are just post that aren't visible
            // -- instead of creating a content_save table that mimics post, use the same id mark hidden = 1 OR save = 1, any new updates to blog,goal,forum, will show in former saved post
            // -- in future/ may migrate hidden post to a save table
            // -- user can lookup all "saved post" by uid to continue to edit until posted for visibilty.
            // -- save cloud button just post as normal with (hidden = 1 AND OR save = 1) 
            // -- once posted that cid is now visible (hidden = 0 AND OR save = 0)
            // -- LINKS to post on click post.php?t=EXAMPLE&cid=CONTENTBYID
            // -- if($user_ok && $log_id === $uid || $log_lvl >= 3)
            // -- loads content into all editable fields
            // -- if ($log_lvl >= 3 && $log_id !== $uid) // buttons approve or deny
            // -- can add notes

            // quick notes 
            // insert into notifications if blog // any user level 3 or higher will be notified and can approve post and modify
            // -- insert link in note_app notifications pack to post id 
            // -- if level >= 3 users can approve and modify
            // insert into token_log // award 50 kodotokens  
            // note edit just brings up a list to be edited

//             // Decode the base64 image


// // Save the image to the database
// $sql = "INSERT INTO images (image) VALUES ('$binary_string')";



            //\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//
            // **POST LOGIC** NOTE: new entries if not found in DB or post saved entries ALL TO: (hide='0' AND save='0') //\\
            //\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//
            if ($___sid__y === "NULL" && $___pth__y === "POST") {
                //
                if ($___mth__x === "b") {
                    try { 
                        $__b_ist = $___glbl___sql->prepare("INSERT INTO blog(
                            osid,
                            uid,
                            views,
                            v_count, 
                            type,
                            title, 
                            category, 
                            tags, 
                            cover, 
                            youtube_link,
                            youtube_thumbnail,
                            data, 
                            references,
                            date,
                            remove,
                            hide,
                            save,
                            approved)  
                            VALUES(
                            :____INST____01,
                            :____INST____02,
                            :____INST____03,
                            :____INST____04,
                            :____INST____05,
                            :____INST____06,
                            :____INST____07,
                            :____INST____08,
                            :____INST____09,
                            :____INST____10,
                            :____INST____11,
                            :____INST____12,
                            :____INST____13,
                            :____INST____14,
                            :____INST____15,
                            :____INST____16,
                            :____INST____17,
                            :____INST____18)");
                        $__b_ist->execute([
                            ':____INST____01' => $ncId,
                            ':____INST____02' => $log_id,
                            ':____INST____03' => $uid__x,
                            ':____INST____04' => 0,
                            ':____INST____05' => 0,
                            ':____INST____06' => 'a',
                            ':____INST____07' => $__b_t1,
                            ':____INST____08' => $__b_c,
                            ':____INST____09' => $covImg,
                            ':____INST____10' => $__b_ylnk,
                            ':____INST____11' => $__b_ythb,
                            ':____INST____12' => $body1_ptX,
                            ':____INST____13' => $body1_pt3,
                            ':____INST____14' => date('Y-m-d H:i:s'),
                            ':____INST____15' => 0,
                            ':____INST____16' => $___SVE_c1,
                            ':____INST____17' => $___SVE_c2,
                            ':____INST____18' => 'n']);
                    } catch (PDOException $newError) {
						die("could not post meow".newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError));
                    } if ($__b_ist) { // SINGLE CASE; based on blog approvals
                        die('
                        <div class="__b_ist_1">
                            <h3>Your submission was a success</h3>
                            <p>
                                Your blog <b>'.$__b_t1.'</b> has been submitted for approval. If accepted you may find your blog at the following link. <a href="view.php?t=blog&v='.$__b_rdir.'">https://www.kodoninja.com/view.php?t=blog&v='.$__b_rdir.'</a>. Approval process typically takes a few minutes to hours.<br> <br>
                                Thank You <br>
                                <a>kodoverse</a> team
                            </p>
                        </div>'.$sqlc_____dbx___xX__);
                    } else die($sqlc_____dbx___xX__);
                } if ($___mth__x === "f") {
                    try {
                        $__b_ist = $___glbl___sql->prepare("INSERT INTO forum(
                            osid,
                            uid,
                            views,
                            v_count, 
                            type,
                            title, 
                            category, 
                            tags, 
                            cover, 
                            data, 
                            remove,
                            hide,
                            save,
                            date) 
                            VALUES(
                            :____INST____01,
                            :____INST____02,
                            :____INST____03,
                            :____INST____04,
                            :____INST____05,
                            :____INST____06,
                            :____INST____07,
                            :____INST____08,
                            :____INST____09,
                            :____INST____10,
                            :____INST____11,
                            :____INST____12,
                            :____INST____13,
                            :____INST____14)");
                        $__b_ist->execute([
                            ':____INST____01' => $ncId,
                            ':____INST____02' => $log_id,
                            ':____INST____03' => 0,
                            ':____INST____04' => 0,
                            ':____INST____05' => 'a',
                            ':____INST____06' => $__b_t1,
                            ':____INST____07' => $__b_c,
                            ':____INST____08' => $__b_t2,
                            ':____INST____09' => $covImg,
                            ':____INST____10' => $body1_ptX,
                            ':____INST____11' => 0,
                            ':____INST____12' => $___SVE_c1,
                            ':____INST____13' => $___SVE_c2,
                            ':____INST____14' => date('Y-m-d H:i:s')]);
                    } catch (PDOException $newError) {
						die("could not post meow".newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError));
                    }
                } if ($___mth__x === "g") {
                    try {
                        $__b_ist = $___glbl___sql->prepare("INSERT INTO goal(
                            uid,
                            views,
                            type,
                            v_count,
                            title, 
                            category, 
                            tags, 
                            cover,  
                            data, 
                            progress,
                            remove,
                            hide,
                            save,
                            date,
                            startdate,
                            enddate) 
                            VALUES(
                            :____INST____01,
                            :____INST____02,
                            :____INST____03,
                            :____INST____04,
                            :____INST____05,
                            :____INST____06,
                            :____INST____07,
                            :____INST____08,
                            :____INST____09,
                            :____INST____10,
                            :____INST____11,
                            :____INST____12,
                            :____INST____13,
                            :____INST____14,
                            :____INST____15,
                            :____INST____16)");
                        $__b_ist->execute([
                            ':____INST____01' => $log_id,
                            ':____INST____02' => 0,
                            ':____INST____03' => 'a',
                            ':____INST____04' => 0,
                            ':____INST____05' => $__b_t1,
                            ':____INST____06' => $__b_c,
                            ':____INST____07' => $__b_t2,
                            ':____INST____08' => $covImg,
                            ':____INST____09' => $body1_ptX,
                            ':____INST____10' => $__p_c,
                            ':____INST____11' => 0,
                            ':____INST____12' => $___SVE_c1,
                            ':____INST____13' => $___SVE_c2,
                            ':____INST____14' => date('Y-m-d H:i:s'),
                            ':____INST____15' => $__p_d1,
                            ':____INST____16' => $__p_d2]);
                    } catch (PDOException $newError) {
                        die("could not post meow".newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError));
                    }
                } if ($__b_ist && $___mth__x === "f" || $___mth__x === "g") { // success on forum and goal post / non approval
					die('your '.$___mth__y.' <b>'.$__b_t1.'</b> has been posted @ <a href="view.php?t='.$___mth__y.'&v='.$__b_rdir.'">https://www.kodoninja.com/view.php?t='.$___mth__y.'&v='.$__b_rdir.'</a>'.$sqlc_____dbx___xX__);
                } else die($sqlc_____dbx___xX__);
            }

            //\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//
            //\\// **SAVE LOGIC** NOTE: If found or not found in DB logic just updates/post (hide='1' AND save='1') //\\//\\//
            //\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//
			
            if ((int)$___sid__y !== "NULL" && $___pth__y === "SAVE"){
                // check if in database logic when save button is cliked
                // -- just check if exist and not hidden 
                // -- can be posted or un posted
				die($test_matrix.$sqlc_____dbx___xX__);
                if($sqlo_____dbx___xX__->query("SELECT $___mth_y1 FROM $___mth__y WHERE uid = '$log_id' AND $___mth_y1 = '$___sid__y' AND hide = '0' LIMIT 1")->fetchColumn()) { // post exit time to update
                    try { // success found now time to update SAVE or EDIT
                        if ($___mth__x === "g") {
                            $sql__SAVEX_X1 = $sqlo_____dbx___xX__->prepare(
                                "UPDATE $___mth__y 
                                SET title = ?,
                                tags = ?,
                                category = ?,
                                cover = ?,
                                data = ?,
                                date = ?,
                                progress = ?, 
                                startdate = ?, 
                                enddate = ?
                                WHERE uid = '$log_id' 
                                AND $___mth_y1 = '$___sid__y' 
                                AND hide = '0' 
                                LIMIT 1");
                            $sql__SAVEX_X1->execute([
                                $__b_t1, 
                                $__b_t2,
                                $__b_c,
                                $covImg,
                                $body1_ptX,
                                date('Y-m-d H:i:s'),
                                $__p_c,
                                $__p_d1,
                                $__p_d2]); 
                        }
                        if ($sql__SAVEX_X1) {
                            if ($___mth__x === "b") {
								die("Your blog has been saved pending approval.".$sqlc_____dbx___xX__);
                            } else {
                                // echo "success__true"; ???
								die('your '.$___mth__y.' <b>'.$__b_t1.'</b> has been posted @ <a href="view.php?t='.$___mth__y.'&v='.$__b_rdir.'">https://www.kodoninja.com/view.php?t='.$___mth__y.'&v='.$__b_rdir.'</a>'.$sqlc_____dbx___xX__);
                            }
                        } else {
							die($newError = "Tere was an internal error meow".newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],$newError));
                        }
                    } catch (PDOException $newError) {
                        newError($sqlo_____dbx___xX__,$lgnId__x,$_SERVER["SCRIPT_NAME"],$newError);
                    }
                }
            }
        } else {
            die("error! meow, redirecting you, MOUSE".newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],NULL));
        }
    } else {
        die("error! meow, redirecting you, MOUSE".newError($sqlo_____dbx___xX__,$log_id,$_SERVER["SCRIPT_NAME"],NULL));
    }
}
?>
