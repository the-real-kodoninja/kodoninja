<script>
function wl_glbl() {
    const wl_1 = document.querySelector("#wl_1").value;
    const wl_2 = document.querySelector("#wl_2").value;
    const w1_res = document.querySelector("#w1_res");
    if (wl_1 && wl_2) {
    var ajax = new XMLHttpRequest(); 
        ajax.open("POST", "PRS/wtl/wtl_lgc__x.php", true); 
        ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); 
        ajax.onreadystatechange = function() { 
            if(ajax.readyState == 4 && ajax.status == 200) { 
                var return_data = ajax.responseText; 
                if (return_data) {
                    w1_res.innerHTML = return_data;
                }
            } 
        } 
        ajax.send("wl_1="+wl_1+
                    "&wl_2="+wl_2);
    }
};
</script>