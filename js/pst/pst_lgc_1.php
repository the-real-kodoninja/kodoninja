<!-- <script src="js/pyodide_fallback.js"></script> -->
<script>
    
 // page load logic main
const __b_Ld1 = document.getElementById("__b_Ld1");
// page load logic response (empty)
const __b_Ld2 = document.getElementById("__b_Ld2");

function upTglx(pid,cid) {
    document.getElementById(pid+cid).classList.toggle("dN");
}

function __bckBtn() {
    __b_Ld1.classList.add("dB");
    __b_Ld1.classList.remove("dN");
    __b_Ld2.classList.add("dN");
    __b_Ld2.classList.remove("dB");
} 

function pstMNU_1(pid,cid) {
    sub = document.querySelector("#"+pid+cid).classList.toggle("dN");
    sub.addEventListener('click', function(event){ 
        document.querySelector("#"+pid+cid).classList.toggle("dN");
    }); 
} 

//async function main(){
//let pyodide = await loadPyodide();
//console.log(pyodide.runPython("1 + 2"));
//}
//main();


// https://dev.to/shantanu_jana/how-to-preview-image-before-uploading-in-javascript-1f6g
function showPreview(event){
    if(event.target.files.length > 0){
        var src = URL.createObjectURL(event.target.files[0]);
        var preview = document.getElementById("file-preview");
        preview.src = src;
        preview.classList.add("dB");
    }
}

function UPDX_XX(mth,cnt,tpe) {
    mediaUPDX(document.querySelector("#urlUPDX").value,cnt,tpe);
    return vPnlMod_RESET();
}

const mediaList = document.querySelector('#body1_ptX');

// imge load in file
function mediaUPDX(mth,cnt,tpe) {
    let mth_1, mth_2, msg;
    function mediaLOAD(mediaList, cntElement, mth_3) {
        if (cnt === "VID") {
            const cntElement = document.createElement('iframe');
            const attributes = [
                {name: "width", value: "100%"},
                {name: "height", value: "auto"},
                {name: "src", value: mth_3},
                {name: "title", value: "YouTubevideoplayer"},
                {name: "frameborder", value: "0"},
                {name: "allow", value: "accelerometer;autoplay;clipboard-write;encrypted-media;gyroscope;picture-in-picture;web-share"},
                {name: "allowfullscreen", value: ""}
            ]; for (const attribute of attributes) {
                cntElement.setAttribute(attribute.name, attribute.value);
            }
        } if (cnt === "IMG") {
            cntElement.src = mth_3;
            cntElement.classList.add('w100');
            cntElement.addEventListener('click', (event) => {
                mediaList.removeChild(cntElement);
            });
        }; mediaList.appendChild(cntElement);
        console.log(mediaList,cntElement+` | iframe point | ${mth_3}`);
    } if (cnt === "IMG") {
        mth_1 = new Image();
        const mth_2 = [{1: "image", 2: "image"}];
    } else if (cnt === "VID") {
        mth_1 = document.createElement('iframe');
        const mth_2 = [{1: "video", 2: "youtube"}];
    } if (mth === "NEW" && tpe === "URL") {
        const mth_2 = [{1: "image", 2: "image"}];
        function url_mod(mtx,msg) { 
            document.querySelector(".vPnlWpr").style.height = '130px';
            vPnlHdr.innerHTML = `${mtx} url insert`;
            vPnlBdy.innerHTML = `${msg}<input type="text" id="urlUPDX" placeholder="Enter a ${mtx}* URL meow:">`;
            vPnlFtr.innerHTML = `
            <button onclick="UPDX_XX(\'${mth}\',\'${cnt}\',\'${tpe}\')" class="w100 pad-T iB" style="background-color: darkred; color: #fff; border: none; margin-right: 5px;">add ${mtx}</button>`;
            vPnlMod();
        } return url_mod(mtx = mth_2[0][1], msg = `<p>Feel free to insert a ${mth_2[0][2]} url <?php echo $log_username; ?></P>`);
    } if (mth !== "NEW" && cnt === "VID" && tpe === "URL") {
        function getVideoId(url) {
            const videoId = '';
            if (url.includes('watch?v=')) {
                if (!url.includes('&list=')) {
                    if (url.includes('&t=')) {
                        return url.split('?v=')[1].split('&t=')[0];
                    } return url.split('?v=')[1];
                } if (url.includes('&list=')) {
                    return url.split('?v=')[1].split('&list=')[0];
                } 
            } if (url.includes('.be/')) {
                url.split('.be/').shift() === "https://youtu";
                const [, videoId] = url.split('youtu.be/'); return videoId;
            } if(url.includes('/embed/')) {
                const [, videoId] = url.split('/embed/'); return videoId;
            } vPnlMod();
        } const videoId = getVideoId(mth);
        mediaLOAD(mediaList, mth_1, `https://www.youtube.com/embed/${videoId}`);
    } if (mth && cnt && tpe) {
        if (tpe === "INP") {
            const cntElement = event.target.files;
            for (const media of cntElement) {
                mediaLOAD(mediaList, mth_1, URL.createObjectURL(media));
            }
        } else {
            mediaLOAD(mediaList, mth_1, mth);
        }
    }
};


// <iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/hbIjeT5wqLY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>

function clrPST__() {
    const selection = window.getSelection();
    const selectedText = selection.toString();
    const color = document.querySelector("#clrPST__").value;
    if (selectedText) {
        // Wrap selection in a span to apply color
        selection.getRangeAt(0).surroundContents(
        document.createElement('span')
    );
    // Get the newly wrapped text
    const highlightedText = selection.getRangeAt(0)
    .commonAncestorContainer.children[0];
    // Apply the color 
    highlightedText.style.color = color;
    }
}

function aPSTlnk__(mth) {
    if (mth === "NULL") {
        vPnlHdr.innerHTML = "Link creator";
        vPnlBdy.innerHTML = `
        <div>Ill need the LINK and the text of how you ant it to look like</div>
        <input type="text" id="a1__lnk" placeholder="Enter URL">
        <input type="text" id="a2__lnk" placeholder="Enter text">
        <div id="ax__res"></div>
        `;
        vPnlFtr.innerHTML = `
        <button onclick="aPSTlnk__(\'CREATE\')">create</button>
        `;
        return vPnlMod();
    } if (mth === "CREATE") {
        const a1 = document.querySelector('#a1__lnk').value;
        const a2 = document.querySelector('#a2__lnk').value;
        const ax = document.querySelector('#ax__res');
        if (a1 && a2) {
            const a = document.createElement('a');
            a.href = a1;
            a.textContent = " "+a2;
            mediaList.appendChild(a);
            return vPnlMod_RESET();
        } else {
            ax.innerHTML = 'Please enter a URL and text';
            ax.classList.add('pad-T');
            ax.style.margin = '0px 0px 20px';
        } 
    } else if (mth === "REMOVE") {
        const selection = window.getSelection();
        const selectedText = selection.toString();  
        const links = document.querySelectorAll(`a[href="${selectedText}"]`);
        links.forEach(link => {
            link.outerHTML = link.innerHTML; 
        }); selection.empty();
    }
}
    


function pst_lgc_1(uid,cde,mth,sid,pth) {
    var cov__1 = "NULL";
    var cov__2 = "NULL";
    var __pst_sbmt = true;
    var body1_pt3 = "NULL";
    var __p_c = "NULL";
    var __p_d1 = "NULL";
    var __p_d2 = "NULL";
    //
    var __bckBtn = `
    <div style="margin: 10px 0px 0px;">
        <button onclick="__bckBtn()">
            <i class="fa-sharp fa-solid fa-arrow-rotate-left" title="back"></i>
        </button>
    </div>`;
    // if load on edit check if image is already cover image
    // checks on both cases to see if equal 
    if (newCov = document.querySelector("#file-preview").src) { // 
        // var reader = new FileReader();
        // reader.onload = function() {
        //     cov__2 = btoa(reader.result);
        // };
        // reader.readAsArrayBuffer(new Blob([newCov]));
        var cov__2 = newCov;
    }
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
                };
                reader.readAsDataURL(xhr.response);
            };
            xhr.onerror = function() {
                reject(new Error('Failed to convert blob to base64'));
            };
            xhr.send();
            });
        });
    }

 
// const base64Images = await blobToBase64([cov__2]);
// console.log("am i b64 data | "+base64Images[0]);

async function convertBlobs(blob) {
  try {
    const base64Images = await blobToBase64([blob]);
        blobToBase64([blob])
        .then((base64Images) => {
            const encodedString = btoa(base64Images[0]);
            document.querySelector("#b64_mod1").innerHTML = encodedString;
            
        })
        .catch((error) => {
            console.error(error);
        });e.log(base64_data);
  } catch (error) {
    console.error(error);
  }
}

convertBlobs(cov__2);
const cov__2x = document.querySelector("#b64_mod1").innerText;


// // Compress using gzip
// const compressed = pako.gzip(base64, {to: 'string'}) 

// // Compress using deflate
// const compressed = pako.deflate(base64, {to: 'string'})

// // Decompress gzipped base64
// const decompressed = pako.ungzip(compressed, {to: 'string'})  

// // Decompress deflated base64
// const decompressed = pako.inflate(compressed, {to: 'string'})

    

    // console.log(base64Images[0]);


    // 
    var __b_t1 = document.getElementById("__b_t1").value; // title
    var __b_t2 = document.getElementById("__b_t2").value; // tags
    // save options
    if (pth === "SAVE") {
        var ___cld_1 = document.getElementById("___cld_1"); // save
        var ___cld_2 = document.getElementById("___cld_2"); // load
        var ___cld_3 = document.getElementById("___cld_3"); // edit
    }
    
    if (mth === "b") {
        var mth_r = "blog";
        var body1_pt3 = document.getElementById("body1_pt3").innerHTML; // references
        // var __b_ythb = document.getElementById("__b_thmb").value; // youtube IMG (optional)
        // var __b_ylnk = document.getElementById("__b_ylnk").value; // youtube URL (optional)
    }
    var __b_c = document.getElementById("__b_c").value; // category

    function error___1() {
        __mod_Ld2();
        __b_Ld2.innerHTML = `
        <div>detecting a glitch in the matrix, meow.</div>
        `+__bckBtn+``;
        console.log("error");
    };

    if (mth === "g") {
        var mth_r = "goal";
        var __p_c = document.getElementById("__p_c").value; // progress
        var __p_d1 = document.getElementById("__p_d1").value; // progress
        var __p_d2 = document.getElementById("__p_d2").value; // progress
    }
    
    var body1_ptX = document.getElementById("body1_ptX").innerHTML;
    // Extract blob image URLs using match() method
    if (blobImageURLs = body1_ptX.match(/blob:(.*?)(?=")/g)) {
        // Output the blob image URLs
        const base64Promise2 = blobToBase64(blobImageURLs);
        base64Promise2.then(base64Images => {
            // Iterate over each blob image URL
            blobImageURLs.forEach((blobURL, index) => {
                // Replace the blob image URL with its corresponding base64 image
                body1_ptX = body1_ptX.replace(blobURL, base64Images[index]);
            });
            // Now, body1_ptX contains the HTML with base64 images
            document.querySelector("#b64_mod2").innerHTML = body1_ptX;
        });
    } else {
        var body1_ptX = document.getElementById("body1_ptX").innerHTML;
    }
   

    var body1_ptY = document.querySelector("#b64_mod2").innerHTML;

    
    var log_uid = `<?php echo $log_id; ?>`;
    var log_cde = `<?php echo $log_HshCde; ?>`;
    var log_cde_x = `<?php echo $log_HshCde_x; ?>`; 
    var log_cde_y = `<?php echo $log_HshCde_y; ?>`;
    
    if (uid == log_uid && log_cde_x === log_cde_y) {
        // validation checks (5)
        if (!__b_t1) {
            __b_Ld2.classList.add("dB");
            __b_Ld2.innerHTML = 'Your title is missing.';
            __pst_sbmt = false;
            if (!__b_t2) {
                __b_Ld2.innerHTML = 'Your tags is missing.';
                __pst_sbmt = false;
                if (!__b_c) {
                    __b_Ld2.innerHTML = 'Your category is missing.';
                    __pst_sbmt = false;
                    if (!body1_ptX) {
                        __b_Ld2.innerHTML = 'Your content is missing.';
                        __pst_sbmt = false;
                    }
                }
            }
        } if (mth === "g") {
            if (!__p_c) {
                __b_Ld2.innerHTML = 'Your progress % is missing.';
                __pst_sbmt = false;
                if (!__p_d1) {
                    __b_Ld2.innerHTML = 'Your start date is missing.';
                    __pst_sbmt = false;
                    if (!__p_d2) {
                        __b_Ld2.innerHTML = 'Your end date is missing.';
                        __pst_sbmt = false;
                    }
                }
            }
        } if (__pst_sbmt) {
            function __mod_Ld2() {
                __b_Ld1.classList.add("dN");
                __b_Ld1.classList.remove("dB");
                __b_Ld2.classList.add("dB");
            }
            
            if (pth === "POST") {
                __mod_Ld2();
                __b_Ld2.innerHTML = 'posting in 3.. 2.. 1..';
            }
            //
            async function fetchData() {
                try {             
                    const requestPromise = await new Promise((resolve, reject) => {
                        const cat = new XMLHttpRequest();
                        cat.open('POST', `${m_path}prs/pst/post_db.php`);
                        cat.onload = () => {
                            if(cat.status === 200) {
                                // Success
                                var response = cat.response;  
                                // On post logic
                                if (pth === "POST") {
                                    __b_Ld2.innerHTML = `${response}${__bckBtn}`;
                                // On save logic
                                } if (pth === "SAVE") {
                                    var pst__SAVE_ste = String(response.split("__").shift());
                                    var val_chk_1 = String(response.split("__").pop());
                                    if (val_chk_1 === "true") {
                                        __b_Ld2.classList.add("dB");
                                        ___cld_1.innerHTML = pst__SAVE_ste; // saved
                                        __b_Ld2.innerHTML = pst__SAVE_ste; // saved
                                        setInterval( function() {
                                            ___cld_1.innerHTML = "save";
                                        }, 3000 );
                                    } else {
                                        __b_Ld2.classList.add("dB");
                                        __b_Ld2.innerHTML = `${pst__SAVE_ste}${+__bckBtn}`;
                                    }
                                }
                                resolve(cat.response);           
                            } else {
                            reject(Error(cat.statusText));
                            }
                        }

                        // const cov__1 = btoa(reader.result);
                        // const cov__2 = btoa(newCov); 
                        const nip = JSON.stringify({
                            mth: encodeURIComponent(mth),
                            sid: encodeURIComponent(sid),
                            pth: encodeURIComponent(pth),
                            covImg2: encodeURIComponent(cov__2x),
                            __b_t1: encodeURIComponent(__b_t1),
                            __b_t2: encodeURIComponent(__b_t2),
                            __b_c: encodeURIComponent(__b_c),
                            __p_c: encodeURIComponent(__p_c),
                            __p_d1: encodeURIComponent(__p_d1),
                            __p_d2: encodeURIComponent(__p_d2),
                            body1_ptX: encodeURIComponent(body1_ptY),
                            body1_pt3: encodeURIComponent(body1_pt3)
                        });

                        

                        // Send request
                        cat.send(nip);
                        console.log(nip);
                    });
                } catch (error) {
                    cat.onerror = () => {
                        reject(Error('Network Error'));
                    }
                }
            }

            fetchData();

            //
            // for TESTING purposes only START
            // dev_test = `
            // <div style="margin: 0px 0px 10px;">
            //     <b>Vanilla JS checks</b> <hr>
            //     <b>Turn checks<b>
            //     <b>mth</b> `+mth+`<br>
            //     <b>sid<b> `+sid+`<br>
            //     <b>pth</b> `+pth+`<br>
            //     <b>Error testing and POST value grab test for JS</b><br><hr>
            //     <b>Cover:</b> `+imgVwYb+`<br>
            //     <b>Title:</b> `+__b_t1+`<br>
            //     <b>Tags:</b> `+__b_t2+`<br>
            //     <b>Category:</b> `+__b_c+`<br>
            //     <b>Progress:</b> `+__p_c+`<br>
            //     <b>Progress startdate:</b> `+__p_d1+`<br>
            //     <b>Progress enddate:</b> `+__p_d2+`<br>
            //     <b>YouTube IMG (optional):</b> `+__b_ythb+`<br>
            //     <b>YouTube URL (optional):</b> `+__b_ylnk+`<br>
            //     <b>Content:</b> `+body1_ptX+`<br>
            //     <b>References:</b> `+body1_pt3+`<br>
            // </div>
            // `+__bckBtn+``;
            // console.log(dev_test);
            // for TESTING purposes only END
            // 
        } 
    } else {
        error___1();
    }
}


const input = document.getElementById('pgr_Num_1');
const progressValue = document.querySelector('.prg_amt');
const progress = document.querySelector('progress');

function setValue(value) {
    progressValue.style.width = `${value}%`;
    progress.value = value;
}

setValue(input.value);
input.addEventListener('change', e => {
    const value = e.target.value;
    setValue(value);
});

const __b_c = document.getElementById("__b_c").value;
const __b_x = document.getElementById("__b_c");
const __c_rsl = document.getElementById("__c_rsl");

function catCall(mth) {
    if (__b_c && mth === "___b" || mth === "___f" || mth === "___g") {
        var ajax = new XMLHttpRequest(); 
        ajax.open("POST", `${m_path}prs/pst/catCall.php`, true); 
        ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); 
        ajax.onreadystatechange = function() { 
            if(ajax.readyState == 4 && ajax.status == 200) { 
                var return_data = ajax.responseText; 
                if(return_data){ 
                    __c_rsl.innerHTML = return_data;
                } 
            } 
        } 
        ajax.send("__b_c="+__b_c+"&mth="+mth); 
    }
};

__b_c.addEventListener('focus', function(event){ 
    if (!__b_c.focus) {
        __c_rsl.innerHTML = "";
    }
});

function smBootyCall(trm) {
    document.getElementById("__b_c").value = trm;
    document.getElementById("__c_rsl").innerHTML = "";
};

window.addEventListener('onmouseup', function(event){ 
    document.getElementById("__c_rsl").innerHTML = "";
}); 

window.addEventListener('onscroll', function(event){ 
    document.getElementById("__c_rsl").innerHTML = "";
}); 

// Configure the Grammarly Text Editor SDK
Grammarly.init().then((grammarly) => {
    grammarly.addPlugin(editor.ui.getEditableElement(), {
    autocomplete: "on",
    documentDialect: "british"
    });
});

</script>