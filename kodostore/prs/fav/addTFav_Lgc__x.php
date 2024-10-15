<?php
include('../../icl/cnnc_t.php');	
include('../../icl/c_sts.php');
$prd_rsl = "";
if (isset($_POST["uid"]) && isset($_POST["pid"]) && isset($_POST["opt"]) && isset($_POST["cde"])) {
    $favUid____x = preg_replace('#[^0-9]#i', '', $_POST['uid']);
    $favUid____x = mysqli_real_escape_string($cnnc_t2, $favUid____x);
    $favPid____x = preg_replace('#[^0-9]#i', '', $_POST['pid']);
    $favPid____x = mysqli_real_escape_string($cnnc_t2, $favPid____x);
    $favOpt____x = preg_replace('#[^ar]#i', '', $_POST['opt']);
    $favOpt____x = mysqli_real_escape_string($cnnc_t2, $_POST["opt"]);
    $favCde____x = mysqli_real_escape_string($cnnc_t2, $_POST["cde"]);

    // echo "PHP POST TEST: ".$favUid____x." | ".$log_id." | ".$favPid____x." | ".$favOpt____x." | ".$favCde____x." | ".$log_ip;
    if ($favUid____x == $log_id 
    // && $favCde____x === $log_HshCde
    ) {
        // checks if rabbed input is actually a real item
        $sql____1 = mysqli_query($cnnc_t2, "SELECT id FROM products WHERE id = '$favPid____x' LIMIT 1");
        $num____1 = mysqli_num_rows($sql____1);
        if ($num____1 > 0) {
            $sql____2 = mysqli_query($cnnc_t2, "SELECT uid,pid FROM favorites WHERE uid = '$log_id' AND pid = '$favPid____x' LIMIT 1");
            $num____2 = mysqli_num_rows($sql____2);
            if ($num____2 > 0) {
                if ($favOpt____x === 'a') {
                    // add to favorites
                    $sql____2_a = mysqli_query($cnnc_t2, "INSERT INTO `favorites`(`pid`,
                                `uid`,
                                `ip`,
                                `code`,
                                `date`) 
                    VALUES('".$favPid____x."',
                            '".$log_id."',
                            '".$log_ip."',
                            '".$favCde____x."',
                            now())");
                    if ($sql____2_a) {
                        $prd_rsl .= 'added to favorites';
                    }
                } else if ($favOpt____x === 'r') {
                    // remove from favorites
                    // all non users wil have a log_id of 0, go by code as well 
                    $sql____2_b = mysqli_query($cnnc_t2, "DELETE FROM favorites WHERE uid = '$log_id' AND pid = '$favPid____x' LIMIT 1"); 
                    if ($sql____2_b) {
                        $prd_rsl .= 'add to favorites';
                    }
                }
            } else {
                // add new item to favorites
                $sql____2_c = mysqli_query($cnnc_t2, "INSERT INTO `favorites`(`pid`,
                            `uid`,
                            `ip`,
                            `code`,
                            `date`) 
                VALUES('".$favPid____x."',
                        '".$log_id."',
                        '".$log_ip."',
                        '".$favCde____x."',
                        now())");
                if ($sql____2_c) {
                    $prd_rsl .= 'added to favorites';
                }
            }
        } else {
            $prd_rsl .= 'error meow';
        }
    } else {
        $prd_rsl .= 'error meow';
    }
} echo $prd_rsl;
?>