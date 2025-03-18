
<script>
const nmeRSL = document.querySelector(`#nmeRSL`);
const nmeRSV_inp = document.querySelector(`.nmeRSV_inp`);
const nmeRSV_iNp = document.querySelector(`.nmeRSV [type="text"]`);
const nmeRSV_btn = document.querySelector(`.nmeRSV button`);

nmeRSV_iNp.addEventListener('keyup', function(event){ 
    sv = nmeRSV_iNp.value;
    // check if kodotag is taken
    var ajax = ajaxObj("POST", `${m_path}prs/mem/sgu_Lgc__x.php`, true);
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajax.onreadystatechange = function() { 
        if(ajax.readyState == 4 && ajax.status == 200) { 
            var return_data = ajax.responseText; 
            if(return_data != ""){ 
                console.log(return_data);
                if (return_data.includes('gd__')) {
                    let gd__ = return_data.split('gd__');
                    let gd_x = gd__.pop(','); // needed creates a , on random
                    nmeRSL.innerHTML = gd_x; 
                    nmeRSV_inp.style.cssText = `border: 1px solid rgba(131, 217, 46, 0.9);`;
                } else if (return_data.includes('bd__')) {
                    let gd__ = return_data.split('bd__');
                    let gd_x = gd__.pop(','); // needed creates a , on random
                    nmeRSL.innerHTML = gd_x;
                    nmeRSV_inp.style.cssText = `border: 1px solid rgba(176, 74, 74, 0.9);`;
                }
                nmeRSL.style.cssText = `
                    padding: 10px 10px 0px 10px;
                    margin: 0px 0px -16px;
                `;
            } 
        } 
    } 
    ajax.send("usrNme="+sv+"&idxCHK=idxCHK");
});

// redirect logic
nmeRSV_btn.addEventListener('click', function(event){
    sv = nmeRSV_iNp.value;
    if (nmeRSV_inp.style.cssText == `border: 1px solid rgba(131, 217, 46, 0.9);`) {
        document.querySelector(`.nmeRSV button`).innerText = 'redirecting';
        setInterval( function() {
            url = document.location = `membership.php?nRS=${sv}`;
            window.location.href(url);
        }, 2000 );
    } else {
        document.querySelector(`.nmeRSV button`).innerText = 'invalid';
        setInterval( function() {
            document.querySelector(`.nmeRSV button`).innerText = 'claim';
        }, 2000 );
    }
});

nmeRSV_inp.addEventListener('click', function(event){ 
    nmeRSV_inp.style.cssText = `border: 1px solid rgba(176, 74, 74, 0.9);`;
});
</script>
