<?php
// log redirect
// log no redirect
// 5th term error level if 2 redirect
// NO ERROR LOGGING THE ERROR LOG// loop melt
//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\
//\\//\\// global error logic \\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\
//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\
function newError($___glbl___sql,$___glbl___uid,$___glbl___loc,$___glbl___err) {
    if (filter_var($___glbl___sql,FILTER_DEFAULT) && 
        filter_var($___glbl___uid,FILTER_VALIDATE_INT) && 
        filter_var($___glbl___loc,FILTER_SANITIZE_URL) && 
        filter_var($___glbl___err,FILTER_SANITIZE_STRING)) {
        $___glbl___err = $___glbl___err->getMessage();
        $kvse_uChk = false;
        if ($___glbl___uid > 1) {
            if($___glbl___uid = $___glbl___sql->query("SELECT id FROM users WHERE id ='$___glbl___uid' LIMIT 1")->fetchColumn()) {
                $kvse_uChk = true;
            } else die($sqlc_____dbx___xX__);
        } else die($sqlc_____dbx___xX__);
        //\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\// everyone
        $___glbl___sql______x___xX__1 = $___glbl___sql->prepare("INSERT INTO error_log(
                uid,
                location,
                msg_code,
                date) 
            VALUES(:id,
                :local,
                :err,
                :date)");
        $___glbl___sql______x___xX__1->execute([
                ':id' => $___glbl___uid,
                ':local' => $___glbl___loc,
                ':err' => $___glbl___err,
                ':date' => date('Y-m-d H:i:s')]); 
        //\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\//\\// kodoverse fediverse
        if ($kvse_uChk) {
            $___glbl___errMsg_1 = "";
            $___glbl___errAmnt = 100; 
            $___glbl___errMsg_1 .= "That darn mouse, ";
            //
            if($___glbl___sql______x___xX__2 = "SELECT method FROM token_log WHERE uid = '$___glbl___uid' LIMIT 1") {
                foreach ($___glbl___sql->query($___glbl___sql______x___xX__2) as $roo0w____X___xX__1) {
                    $tknMthd = filter_var($roo0w____X___xX__1["method"],FILTER_SANITIZE_STRING);
                }
            } if($___glbl___sql______x___xX__3 = "SELECT token FROM users WHERE id = '$___glbl___uid' LIMIT 1") {
                foreach ($___glbl___sql->query($___glbl___sql______x___xX__3) as $roo0w____X___xX__2) {
                    $curTknCnt = filter_var($roo0w____X___xX__2["token"],FILTER_VALIDATE_INT);
                }
            } if($___glbl___sql______x___xX__4 = "UPDATE users SET token = $newTknCnt WHERE id = '$___glbl___uid' LIMIT 1") {
                $affectedrows = $___glbl___sql->exec($___glbl___sql______x___xX__4);
            } 
            $newTknCnt = (int)$curTknCnt + (int)$___glbl___errAmnt;
            $___glbl___sql______x___xX__5 = $___glbl___sql->prepare("INSERT INTO token_log(
                    uid,
                    amount,
                    old_total,
                    new_total,
                    math,
                    method,
                    date,) 
                VALUES(:id,
                    :amount,
                    :o_total,
                    :n_notal,
                    :math,
                    :method,
                    :date)");
            $___glbl___sql______x___xX__5->execute([
                    ':id' => $___glbl___uid,
                    ':amount' => $___glbl___errAmnt,
                    ':o_total' => $curTknCnt,
                    ':n_total' => $newTknCnt,
                    ':math' => '+',
                    ':method' -> $___glbl___err,
                    ':date' => date('Y-m-d H:i:s')]);
        }
        // TBA 404 header
        // header("location: 404.php?msg=mouse detected, meeeooowwww, wooohhpsieee.")
        die($sqlc_____dbx___xX__);
    } 
    // else die($sqlc_____dbx___xX__);
}
?>