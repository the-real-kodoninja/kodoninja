function pst_lgc_1(){ 
    // cover 
    var imgVwYb = document.getElementById("imgVwYb").value;
    // file insert into <img> tag
    var imgVwYb = "<img style=\"height: auto; width: 100%; display: block;\" src=\"blog/img/id/"+imgVwYb+"\">";
    // title
    var __b_t1 = document.getElementById("__b_t1").value;
    // tags
    var __b_t2 = document.getElementById("__b_t2").value;
    // youtube thumbnail (optional)
    var __b_ythb = document.getElementById("__b_ythb").value;
    // youtube URL (optional)
    var __b_ylnk = document.getElementById("__b_ylnk").value;
    // category
    var __b_c = document.getElementById("__b_c").value;
    // content from ckeditor
    const domEditableElement = document.querySelector( '.ck-editor__editable' );
    const editorInstance = domEditableElement.ckeditorInstance;
    var ck_editor = editorInstance.getData();
    //
    // references
    var body1_pt3 = document.getElementById("body1_pt3").value;
    // page load logic main
    var __b_Ld1 = document.getElementById("__b_Ld1");
    // page load logic response (empty)
    var __b_Ld2 = document.getElementById("__b_Ld2");
    // validation checks (5)
    if (imgVwYb == "") {
        __b_Ld2.innerHTML = 'Your cover is missing.';
        if (__b_t1 == "") {
            __b_Ld2.innerHTML = 'Your title is missing.';
            if (__b_t2 == "") {
                __b_Ld2.innerHTML = 'Your tags is missing.';
                if (__b_c == "") {
                    __b_Ld2.innerHTML = 'Your category is missing.';
                    if (ck_content == "") {
                        __b_Ld2.innerHTML = 'Your content is missing.';
                    }
                }
            }
        }
    } else {
        __b_Ld2.innerHTML = 'posting in 3.. 2.. 1..';
        __b_Ld1.style.display = "none";
        var ajax = new XMLHttpRequest(); 
        ajax.open("POST", "icl/post/post_db.php", true); 
        ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); 
        ajax.onreadystatechange = function() { 
            if(ajax.readyState == 4 && ajax.status == 200) { 
                var return_data = ajax.responseText; 
                if(return_data != ""){ 
                    __b_Ld2.innerHTML = return_data; 
                } else {
                    __b_Ld2.innerHTML = 'Something went wrong let\'s try again';
                    __b_Ld1.style.display = "block";
                }
            } 
        } 
        //
        // for TESTING purposes only START
        // __b_Ld2.innerHTML = "<b>Error testing and POST value grab test for JS</b><br><hr>"+
        //                     "<b>Cover:</b> "+imgVwYb+"<br>"+
        //                     "<b>Title:</b> "+__b_t1+"<br>"+
        //                     "<b>Tags:</b> "+__b_t2+"<br>"+
        //                     "<b>Category:</b> "+__b_c+"<br>"+
        //                     "<b>Content:</b> "+ck_editor+"<br>"+
        //                     "<b>YouTube thumbnail (optional):</b> "+__b_ythb+"<br>"+
        //                     "<b>YouTube URL (optional):</b> "+__b_ylnk+"<br>"+
        //                     "<b>References:</b> "+body1_pt3+"<br>";
        // __b_Ld1.style.display = "block";
        // for TESTING purposes only END
        //
        // 8 ajax calls passed ajax filter
        ajax.send("imgVwYb="+imgVwYb+"&__b_t1="+__b_t1+"&__b_t2="+__b_t2+"&__b_c="+__b_c+"&ck_editor="+ck_editor+"&__b_ythb="+__b_ythb+"&__b_ylnk="+__b_ylnk+"&body1_pt3="+body1_pt3);
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



        // var pgr_Num_1 = document.getElementById("pgr_Num_1"); // input value
        // var pgr_Num_2 = document.querySelector(".glPgBr_1 div val"); // progress bar
        // var glPgBr_1 = document.getElementById("glPgBr_1"); // progress bar
        // //
        // function getValue (value) {
        //     pgr_Num_2.style.width = `$(value)%`;
        //     glPgBr_1.value = value;
        // }

        // setValue 
        // //
        // pgr_Num_1.addEventListener('input', function (event) {
            
        // });




// Create a classic editor instance
    const editor = await ClassicEditor.create(
      document.getElementById("body1_ptX")
    );

    // Configure the Grammarly Text Editor SDK
    Grammarly.init().then((grammarly) => {
      grammarly.addPlugin(editor.ui.getEditableElement(), {
        autocomplete: "on",
        documentDialect: "british"
      });
    });