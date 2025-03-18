function glbl_rply_tGl (rplyId) {
    var rplyArea = document.getElementById("rply_1_Area_"+rplyId);
    rplyArea.classList.toggle("dN");
};


// GLOBAL post logic
// what is not needed for individual post is disregarded
function rplyGlbl (cid,aid1,aid2,aid3,type) {
    //
    var rthrd_b_opx = document.getElementById("rthrd_b_opx_"+cid);
    var rthrd_c_opx = document.getElementById("rthrd_c_opx_"+cid);
    //
    if (type == "b") {
        // post data entry
        rthrd_b_opx.value;
        // original post output to original thread type b
        var rthd_b_opt = document.getElementById("rthd_b_opt_"+cid);
        // data set
        var data = rthrd_b_opx;
    } if (type == "c") {
        // post data entry
        rthrd_c_opx.value;
        // original post output to original thread type b
        var rthd_c_opt = document.getElementById("rthd_c_opt_"+cid);
        // data set
        var data = rthrd_c_opx;
    }
    
    // developer only can remain uncommented
    console.log("Vanilla Js: test grab | "+cid+" | "+aid1+" | "+aid2+" | "+aid3+" | "+type+" | "+data);

    if (data != "") {
        rthrd_b_opx.innerHTML.value = "";
        rthrd_c_opx.innerHTML.value = "";
        var ajax = ajaxObj("POST", "prs/pst/pst_Lgc__x.php");
        ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        ajax.onreadystatechange = function() { 
            if(ajax.readyState == 4 && ajax.status == 200) { 
                var return_data = ajax.responseText; 
                if(return_data != ""){ 
                    // add append method IMPORTANT
                    if (type == "a" || type == "b") {
                        rthd_b_opt.innerHTML = return_data + rthd_b_opt.innerHTML;
                    } if (type == "a" || type == "c") {
                        rthd_c_opt.innerHTML = return_data + rthd_c_opt.innerHTML;
                    }
                    console.log(return_data);
                } else {
                    console.log(return_data);
                }
            } 
        } 
        ajax.send("cid="+cid+
                    "&aid1="+aid1+
                    "&aid2="+aid2+
                    "&aid3="+aid3+
                    "&type="+type+
                    "&data="+data);

    } // else do nothing
    
};
