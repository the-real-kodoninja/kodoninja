<?php
$wysiwyg_Btns_PT = '
<div class="wysiwyg_Btns">
    <!--
    <input id="font-size" class="editor-btn" type="number" value="16" min="1" max="100" onchange="f1(this)">
    -->
    <button id="b_Btn1_PT" class="editor-btn" type="button" data-action="bold" data-tag-name="b" title="Bold" alt="bold">
        <i class="fa-solid fa-bold"></i>
    </button>
    <button id="i_Btn1_PT" class="editor-btn" type="button" data-action="italic" data-tag-name="i" title="Italic" alt="Italic">
        <i class="fa-solid fa-italic"></i>
    </button>
    <button class="editor-btn" type="button" data-action="superScript" data-tag-name="superscript" title="SuperScript" alt="SuperScript">
        <i class="fa-solid fa-superscript"></i>
    </button>
    <button  class="editor-btn" type="button" data-action="subScript" data-tag-name="subscript" title="subScript" alt="subScript">
        <i class="fa-solid fa-subscript"></i>
    </button>
    <button class="editor-btn" type="button" data-action="underline" data-tag-name="u" title="Underline" alt="Underline">
        <i class="fa-solid fa-underline"></i>
    </button>
    <button class="editor-btn" type="button" data-action="strikeThrough" data-tag-name="strike" title="Strike through" alt="Strike through">
        <i class="fa-solid fa-strikethrough"></i>
    </button>
    <button type="button" class="editor-btn" data-action="justifyLeft" data-style="textAlign:left" title="Justify left" alt="Justify left">
        <i class="fa-solid fa-align-left"></i>
    </button>
    <button type="button" class="editor-btn" data-action="justifyCenter" data-style="textAlign:center" title="Justify center" alt="Justify center">
        <i class="fa-solid fa-align-center"></i>
    </button>
    <button type="button" class="editor-btn" data-action="justifyRight" data-style="textAlign:right" title="Justify right" alt="Justify right">
        <i class="fa-solid fa-align-right"></i>
    </button>
    <!--
    <button type="button" class="editor-btn" data-action="formatBlock" data-style="textAlign:justify" title="Justify block" alt="Justify block">
        <i class="fa-solid fa-align-block"></i>
    </button>
    -->
    <button type="button" class="editor-btn" data-action="undo" title="Undo" alt="Undo">
        <i class="fa-sharp fa-solid fa-arrow-rotate-left"></i>
    </button>
     <button type="button" class="editor-btn" data-action="redo" title="Redo" alt="Redo">
        <i class="fa-sharp fa-solid fa-arrow-rotate-right"></i>
    </button>
    <button type="button" class="editor-btn" data-action="removeFormat" title="Remove format" alt="Remove format">
        <i class="fa-solid fa-eraser"></i>
    </button>
    <button type="button" class="editor-btn" data-action="insertOrderedList" data-tag-name="ol" title="Insert ordered list" alt="Insert ordered list">
        <i class="fa-solid fa-list-ol"></i>
    </button>
    <button type="button" class="editor-btn" data-action="insertUnorderedList" data-tag-name="ul" title="Insert unordered list" alt="Insert unordered list">
        <i class="fa-solid fa-list"></i>
    </button>
    <button type="button" class="editor-btn" data-action="outdent" title="Outdent" data-required-tag="li" alt="Outdent">
        <i class="fa-solid fa-outdent"></i>
    </button>
    <button type="button" class="editor-btn" data-action="indent" title="Indent" alt="Indent">
        <i class="fa-solid fa-indent"></i>
    </button>
    <button type="button" class="editor-btn" data-action="insertHorizontalRule" title="Insert horizontal rule" alt="Insert horizontal rule">
        <i class="fa-solid fa-horizontal-rule">__</i>
    </button>
    <button type="button" class="editor-btn" data-action="toggle-view" title="Show HTML-Code" alt="Show HTML-Code">
        <i class="fa-solid fa-code"></i>
    </button>
    <input id="clrPST__" class="editor-btn editor-btn" type="color" title="text color" onchange="clrPST__()" alt="text color">
    <span class="editor-btn img-ins_wpr dI">
        <button type="button" class="editor-btn" onclick="pstMNU_1(\'pst_mnux_\',\''.$log_HshCde.'\')" alt="sub menu">
            <i class="fa-solid fa-bars"></i>
            <ul id="pst_mnux_'.$log_HshCde.'" class="kedt-drp pA dN">
                <li onclick="upTglx(\'pst_lnkX_\',\''.$log_HshCde.'\')">
                    <i class="fa-solid fa-link"></i>
                    <ul id="pst_lnkX_'.$log_HshCde.'" class="kedt-drp pA dN">
                        <li data-action="CreateLink" data-tag-name="a" title="add alink" onclick="aPSTlnk__(\'NULL\')">Link</li>
                        <span class="tooltip">
                            <li onclick="aPSTlnk__(\'REMOVE\')">unLink</li>
                            <span class="tooltiptext" style="font-size: 14px;">highlight desired link to remove</span>
                        </span>
                    </ul>
                </li>
                <li onclick="upTglx(\'pst_imgx_\',\''.$log_HshCde.'\')">
                    <i class="fa-solid fa-image"></i>
                    <ul id="pst_imgx_'.$log_HshCde.'" class="kedt-drp pA dN">
                        <li>
                            <label for="imgVwY">
                                <span aria-hidden="true">upload</span>
                                <input type="file" id="imgVwY" class="editor-btn" accept="image/*" style="display:none" onclick="mediaUPDX(\'NEW\',\'IMG\',\'INP\')" multiple>
                            </label>
                        </li>
                        <li onclick="mediaUPDX(\'NEW\',\'IMG\',\'URL\')" class="cP">url</li>
                    </ul>
                </li>
                <li onclick="upTglx(\'pst_vidX_\',\''.$log_HshCde.'\')">
                    <i class="fa-solid fa-video"></i>
                    <ul id="pst_vidX_'.$log_HshCde.'" class="kedt-drp pA dN">
                        <li>
                            <label for="vidVwY">
                                <span aria-hidden="true">upload</span>
                                <input type="file" id="vidVwY" accept="video/*" style="display:none" onclick="mediaUPDX(\'NEW\',\'VID\',\'INP\')" multiple>
                            </label>
                        </li>
                        <li onclick="mediaUPDX(\'NEW\',\'VID\',\'URL\')">url</li>
                    </ul>
                </li>
                <li onclick="upTglx(\'pst_savex_\',\''.$log_HshCde.'\')">
                    <i class="fa-solid fa-cloud"></i>
                    <ul id="pst_savex_'.$log_HshCde.'" class="kedt-drp pA dN">
                        <li id="___cld_1" onclick="pst_lgc_1(\''.$log_id.'\',\''.$log_HshCde.'\',\''.$__v_mth.'\',\''.$load__sid__y.'\',\'SAVE\')">save</li>
                        <li id="___cld_2" onclick="load_lgc_1(\''.$log_id.'\',\''.$log_HshCde.'\',\''.$__v_mth.'\',\'NULL\',\'___LOAD\')">load</li>
                        <li id="___cld_3" onclick="load_lgc_1(\''.$log_id.'\',\''.$log_HshCde.'\',\''.$__v_mth.'\',\'NULL\',\'___EDIT\')">edit</li>
                    </ul>
                </li>
            </ul>
        </button>
    </span>
    <button onclick="pst_lgc_1(\''.$log_id.'\',\''.$log_HshCde.'\',\''.$__v_mth.'\',\''.$load__sid__y.'\',\'SAVE\')">
        <i class="fa-solid fa-floppy-disk"></i>
    </button>
</div>
';

// CLOUD SAVE
// -- click dropdown
// -- -- save
// -- -- -- post with (hidden = 1 AND save = 1)
// -- -- lookup
// -- -- -- all post under log_id w/ (hidden = 1 AND save = 1)
// -- -- edit
// -- -- -- all post under log_id w/ (hidden = 0 AND save = 0) // approved 0 OR 1
// -- -- -- any post that is under blog post must be re-approved if updated

// ADD sytax highlighter like vc code to html mode
// ADD grammerly plugin
// kodoeditor just adds tags and adjust properties
// create a css for add classes for each case in v4 updates..
// only inline style css and raw element change ir <b><i><s><blockquote><var><i>...
// image is inserted into temp folder then moved into bid folder
// -- images are kept full width inserts on cusor last line
// -- image size adjustments reserved for v4 updates
// -- auto beautify syntax (linter) to keep within kodo approval avoids kodoninja approval process. also add a keyword delete, and structure delete to remove phrases words etc  
// <!-- kodoeditor just adds tags and adjust properties inline meow -->

$bdy_LOAD = 'Your awesome <b>blog</b> post <span style="color:darkred;">goes</span> here <i>meow</i>';
if ($d_vc) {
    $bdy_LOAD = $d_vc;
}

$wysiwyg_FULL = '
<div class="wysiwyg_wpr">
    '.$wysiwyg_Btns_PT.'
    <div class="wysiwyg_ctr">
        <div id="body1_ptX" class="body1_ptX" contenteditable="true" spellcheck="true" onchange="pst_save()">'.$bdy_LOAD.'</div>
        <textarea id="html-view" class="html-view dN"></textarea>
    </div>
    <!-- load b64 conversion here to grab -->
    <div class="dN">
        <div id="b64_mod1"></div>
        <div id="b64_mod2"></div>
    </div>
</div>
';

$wysiwyg_BdyX = '
'.$wysiwyg_FULL.'
';
?>








