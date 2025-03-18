<script>
// easter egg lol, kodoninja you have been through some stuff!
dum_bitch_awards = `6/24/2023 :) the day they really knew they were fucked!

they - Emilly ;) (everyone x1000(eaton)) are going to prision and are getting federal charges pressed by states, US, me, businesses(20+) including ones employeed, little do they know this is beyond even my stoppage. The moment they involved the police the FBI and Homeland were already notified and are keeping an eye, WAITING... They have evidence larger than I have. 

If you didnt think the FBI is watching youve lost your mind... Take the evidence from the FBI to the lawyers and businesses its pay day... but i have a plan, mommy is the key 

Why did you tell everyone and brag about your methods? Why call everyone and everyone, among everyone, and show them the methods? There is evidence literaly walking around. You contacted the family of the individual to brag... wwwwhhhhaaaatttttttt!!

You admitted to everything in every state every business, at the airport, usps, 

They can get control of everything seize cameras, recordings, phone records from every place i walked in since california, including the places i tried to live... I can even ask the city to pay for the lawyers... Not no free nigga atorney...

- Rackatering, bug related, spy related, harrassment related, theft, grand theft, breaking and entering, slander, libel, inciment of violence, riot related, terrorisim, assult, attempted murder, conspiracy(x10), bribery, threat related, attempt of pre-medated suicide.... 70+ charges [[>>>HOW DO YOU SPELL LIFE<<<]]

I'm so sorry, but that ass will be spread`;
console.log(dum_bitch_awards);
console.log(`
        
        Head HR++ of pepsi in knowledge that an employee of theres is being spied on while managers and employees watch, bathroom of pepsi all employees (being spied on), the victom in car including in shower,continued to allow this to happen.  
        
        We call the FBI,... today officially as Emmanuel Moore bye bye BOOTY BUTT CHEECK mommy and daddy

        How many people had to suffer because of hate for 1 person

        I'm afriad of my life for I have been a victom of terroisim for over a year please help my family we are in need of protection and saftey ASAP 
        
        `);
function bioEdit(uid,cde,mth) {
    var uBio_upd = document.querySelector(".uBio_upd");
    var uBio_dta = uBio_upd.innerText;
    var uBio_btn = document.querySelector("#uBio_btn");
    var uBio_res = document.getElementById("uBio_res");
    //
    var ulid = `<?php echo $log_id; ?>`;
    var ucde = `<?php echo $log_HshCde; ?>`; 
    // toggle logic
    if (ulid === uid && ucde === cde && mth === "NULL") {
        if (uBio_upd.contentEditable === "false") {
            uBio_upd.contentEditable = "true"; 
            uBio_res.innerHTML = `<span onclick="bioEdit(\'`+ulid+`\',\'`+ucde+`\',\'uSAVEX\')">save</span>`;
            uBio_btn.style.margin = "-18px 0px 0px 0px";
            document.querySelector(".pnl_edit-B").style.margin = "18px 0px 0px -13px";
        } else { 
            uBio_upd.contentEditable = "false"; 
            uBio_res.innerHTML = "";
            uBio_btn.style.margin = "0px";
            document.querySelector(".pnl_edit-B").style.margin = "0px 0px 0px 5px";
        }
    } else if (ulid === uid && ucde === cde && uBio_dta !== "" && mth === "uSAVEX") {
        console.log("developer pass check | uid="+uid+"&cde="+cde+"&mth="+mth+"&uBio_dta="+uBio_dta);
        //
        uBio_upd.contentEditable = "false"; 
        uBio_res.innerHTML = "...";
        uBio_btn.style.margin = "0px";
        var ajax = ajaxObj("POST", "prs/usr/usr_lgc_FULL.php");
        ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        ajax.onreadystatechange = function() { 
            if(ajax.readyState == 4 && ajax.status == 200) { 
                var return_data = ajax.responseText; 
                if(return_data != ""){ 
                    uBio_res.innerHTML = return_data;
                    document.querySelector(".pnl_edit-B").style.margin = "0px 0px 0px -13px";
                } 
            } 
        } 
        ajax.send("uid="+uid+"&cde="+cde+"&mth="+mth+"&uBio_dta="+encodeURIComponent(uBio_dta));  
    }
};

// let formData = new FormData(); 
//   formData.append("file", fileupload.files[0]);

document.querySelector(".vPnlBck").addEventListener("click", function () {
    return vPnlMod_RESET();
});

document.querySelector(".uAvt_upd").addEventListener("click", function () {
    this.classList.toggle("dN");
});

document.querySelector(".uBnr_upd").addEventListener("click", function () {
    this.classList.toggle("dN");
});

// global usr avt, bnr upload
function usrImg_UPD(uid,cde,mth,pst) {
    //
    var ulid = `<?php echo $log_id; ?>`;
    var ucde = `<?php echo $log_HshCde; ?>`; 

    // all user view larger logic
    if (ulid !== uid && ucde === cde || ucde !== cde && pst === "NULL") {
        // return vPnlMod();
        // vPnlBdy.innerHTML = '<img src=""/>';
    } // toggle logic
    if (ulid === uid && ucde === cde && mth === "newAVT" || mth === "newBNR" && pst === "NULL") {
        // create case for avt owner to view larger
        // uImg_upd.classList.toggle("dN");
    } 
    // else if (ulid === uid && ucde === cde) {
        //  && mth === "newAVT" || mth === "newBNR" && pst === "UPDX"

        
        
        // create case for avt owner to view larger
        
        //
        function blobToBase64(blobURLs) {
            return new Promise((resolve, reject) => {
                const base64Images = [];
                let convertedCount = 0;
                blobURLs.forEach((blobURL, index) => {
                const xhr = new XMLHttpRequest();
                    xhr.open('GET', blobURL);
                    xhr.responseType = 'blob';
                    xhr.onload = function() {
                        const reader = new FileReader();
                        reader.onloadend = function() {
                        base64Images[index] = reader.result;
                        convertedCount++;
                        if (convertedCount === blobURLs.length) {
                            resolve(base64Images);
                        }
                    }; reader.readAsDataURL(xhr.response);
                }; xhr.onerror = function() {
                    reject(new Error('Failed to convert blob to base64'));
                }; xhr.send();
                });
            });
        } async function convertBlobs(blob) {
            try {
                const base64Images = await blobToBase64([blob]);
                    blobToBase64([blob]).then((base64Images) => {
                        const encodedString = btoa(base64Images[0]);
                        //
                        async function covBnrCHG() {
                            try {
                                const requestPromise = await new Promise((resolve, reject) => {
                                    const cat = new XMLHttpRequest();
                                    cat.open('POST', 'prs/usr/usr_lgc_FULL.php');
                                    cat.onload = () => {
                                        if (cat.status === 200) {
                                            // Success
                                            var response = cat.response;
                                            console.log(response);
                                            resolve(response);
                                        } else {
                                            reject(Error(cat.statusText));
                                        }
                                    };
                                    const nip = JSON.stringify({
                                        uid: encodeURIComponent(uid),
                                        cde: encodeURIComponent(cde),
                                        mth: encodeURIComponent(mth),
                                        pst: encodeURIComponent(pst),
                                        b64_mod: encodeURIComponent(encodedString)
                                    });

                                    // Send request
                                    cat.send(nip);
                                    console.log(nip);
                                });
                                } catch (error) {
                                cat.onerror = () => {
                                    reject(Error('Network Error'));
                                };
                            }
                        } covBnrCHG();
                        //
                    }).catch((error) => {
                        console.error(error);
                    });e.log(base64_data);
            } catch (error) {
                console.error(error);
            }
        } 

        if (mth === "newAVT") {
            document.querySelector(".uAvt_upd").classList.toggle("dN");
            var __uAvt_ = document.querySelector(`#__uAvt_${uid}`);
            var imgVwXa_ = document.querySelector(`#imgVwXa_${uid}`);
            if(__uAvt_.files.length > 0){
                var src_x = URL.createObjectURL(__uAvt_.files[0]);
                imgVwXa_.src = src_x;
            }
        } else if (mth === "newBNR") {
            document.querySelector(".uBnr_upd").classList.toggle("dN");
            var __uBnr_ = document.querySelector(`#__uBnr_${uid}`);
            var imgVwXb_ = document.querySelector(`#imgVwXb_${uid}`);
            if(__uBnr_.files.length > 0){
                var src_x = URL.createObjectURL(__uBnr_.files[0]);
                imgVwXb_.src = src_x;
            }
        }
        convertBlobs(src_x);
        const cov__2x = b64_mod.innerText;
        //
            
    

} 
    

        



</script>