<script>
    function cnt_UPD_PAS_x(uid,hid,sid,nme,fld) {
        var inp_PAS_x = "" ;
        if (fld === "fld_3a") {
            var inp_PAS_x = document.querySelector("#inp_PAS_3a").checked;
        } else if (fld === "fld_3b") {
             var inp_PAS_x = document.querySelector("#inp_PAS_3b").checked;
        } else if (fld === "fld_3c") {
            var inp_PAS_x = document.querySelector("#inp_PAS_3c").checked;
        } else if (fld === "fld_3d") {
            var inp_PAS_x = document.querySelector("#inp_PAS_3d").checked;
        }
        //
        // document.getElementById("test_3a").innerHTML = "(uid: "+uid+") (hid: "+hid+") (sid: "+sid+") (nme: "+nme+") (fld: "+fld+") (inp_PAS_x: "+inp_PAS_x+")";
        // console.log("(uid: "+uid+") (hid: "+hid+") (sid: "+sid+") (nme: "+nme+") (fld: "+fld+") (inp_PAS_x: "+inp_PAS_x+")");
        //
        if(uid !== "" && hid !== "" && sid !== "" && nme !== "" && inp_PAS_x !== "") {
            //
            var ajax = ajaxObj("POST", `${m_path}prs/set/pas/pcy-sft.php`); 
            ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            ajax.onreadystatechange = function() { 
            if(ajax.readyState == 4 && ajax.status == 200) { 
                var return_data = ajax.responseText; 
                if(return_data != ""){ 
                    // no visible output just change
                    // document.getElementById("test_3a").innerHTML = return_data;
                    console.log(return_data);
                } 
            } 
        } 
        ajax.send("fld="+fld+
                    "&uid="+uid+
                    "&hid="+hid+
                    "&sid="+sid+
                    "&nme="+nme+
                    "&inp_PAS_x="+inp_PAS_x); 
        }
    }
</script>