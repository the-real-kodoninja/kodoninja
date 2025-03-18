<script>
const editor = document.getElementsByClassName('wysiwyg_wpr')[0];
const toolbar = editor.getElementsByClassName('wysiwyg_Btns')[0];
const buttons = toolbar.querySelectorAll('.editor-btn:not(.has-submenu)');
const contentArea = editor.getElementsByClassName('wysiwyg_ctr')[0];
const visuellView = contentArea.getElementsByClassName('body1_ptX')[0];
const htmlView = contentArea.getElementsByClassName('html-view')[0];
const modal = document.getElementsByClassName('modal')[0];

// add active tag event
document.addEventListener('selectionchange', selectionChange);

// add paste event
visuellView.addEventListener('paste', pasteEvent);

// add paragraph tag on new line
contentArea.addEventListener('keypress', addParagraphTag);

// add toolbar button actions
for(let i = 0; i < buttons.length; i++) {
  let button = buttons[i];
  
  button.addEventListener('click', function(e) {
    let action = this.dataset.action;
    
    switch(action) {
      case 'toggle-view':
        execCodeAction(this, editor);
        break;
      case 'createLink':
        execLinkAction();
        break;
      default:
        execDefaultAction(action);
    }
    
  });
}

// font size
function f1(e) {
    var textarea = document.getElementById("body1_ptX");
    let value = e.value;
    textarea.style.fontSize = value + "px";
}

/** 
 * This function toggles between visual and html view
 */
function execCodeAction(button, editor) {
  if(button.classList.contains('htmlx__')) { // show visuell view
    visuellView.innerHTML = htmlView.value;
    htmlView.classList.toggle("dN");
    visuellView.classList.toggle("dN");
    button.classList.remove('htmlx__');     
  } else {  // show html view
    htmlView.innerText = visuellView.innerHTML;
    htmlView.classList.toggle("dN");
    visuellView.classList.toggle("dN");
    button.classList.add('htmlx__'); 
  }
}

/**
 * This function adds a link to the current selection
 */
function execLinkAction() {  
  modal.style.display = 'block';
  let selection = saveSelection();

  let submit = modal.querySelectorAll('button.done')[0];
  let close = modal.querySelectorAll('.close')[0];
  
  // done button active => add link
  submit.addEventListener('click', function(e) {
    e.preventDefault();
    let newTabCheckbox = modal.querySelectorAll('#new-tab')[0];
    let linkInput = modal.querySelectorAll('#linkValue')[0];
    let linkValue = linkInput.value;
    let newTab = newTabCheckbox.checked;    
    
    restoreSelection(selection);
    
    if(window.getSelection().toString()) {
      let a = document.createElement('a');
      a.href = linkValue;
      if(newTab) a.target = '_blank';
      window.getSelection().getRangeAt(0).surroundContents(a);
    }

    modal.style.display = 'none';
    linkInput.value = '';
    
    // deregister modal events
    submit.removeEventListener('click', arguments.callee);
    close.removeEventListener('click', arguments.callee);
  });  
  
  // close modal on X click
  close.addEventListener('click', function(e) {
    e.preventDefault();
    let linkInput = modal.querySelectorAll('#linkValue')[0];
    
    modal.style.display = 'none';
    linkInput.value = '';
    
    // deregister modal events
    submit.removeEventListener('click', arguments.callee);
    close.removeEventListener('click', arguments.callee);
  });
}

/**
 * This function executes all 'normal' actions
 */
function execDefaultAction(action) {
  document.execCommand(action, false);
}

/**
 * Saves the current selection
 */
function saveSelection() {
    if(window.getSelection) {
        sel = window.getSelection();
        if(sel.getRangeAt && sel.rangeCount) {
            let ranges = [];
            for(var i = 0, len = sel.rangeCount; i < len; ++i) {
                ranges.push(sel.getRangeAt(i));
            }
            return ranges;
        }
    } else if (document.selection && document.selection.createRange) {
        return document.selection.createRange();
    }
    return null;
}

/**
 *  Loads a saved selection
 */
function restoreSelection(savedSel) {
    if(savedSel) {
        if(window.getSelection) {
            sel = window.getSelection();
            sel.removeAllRanges();
            for(var i = 0, len = savedSel.length; i < len; ++i) {
                sel.addRange(savedSel[i]);
            }
        } else if(document.selection && savedSel.select) {
            savedSel.select();
        }
    }
}

/**
 * Sets the current selected format buttons active/inactive
 */ 
function selectionChange(e) {
  
  for(let i = 0; i < buttons.length; i++) {
    let button = buttons[i];
    
    // don't remove active class on code toggle button
    if(button.dataset.action === 'toggle-view') continue;
    
    button.classList.remove('active');
  }
  
// if(!childOf(window.getSelection().anchorNode.parentNode, editor)) return false;
  
  // parentTagActive(window.getSelection().anchorNode.parentNode);
}

/**
 * Handles the paste event and removes all HTML tags
 */
function pasteEvent(e) {
  e.preventDefault();
  
  let text = (e.originalEvent || e).clipboardData.getData('text/plain');
  document.execCommand('insertHTML', false, text);
}

/**
 * This functions adds a paragraph tag when the enter key is pressed
 */
function addParagraphTag(evt) {
  if (evt.keyCode == '13') {
    
    // don't add a p tag on list item
    if(window.getSelection().anchorNode.parentNode.tagName === 'LI') return;
    document.execCommand('formatBlock', false, 'p');
  }
}




















// const catLis = document.querySelectorAll(".__c_rsl li");
// catLis.addEventListener('onclick', function (e) {
// c_lnk.innerText = e.target;
// // console.log(e.target);
// // catLis.forEach (function(catLi) {
// // console.log(catLi);
// // });

// });

// function eat_psy(e) {
// c_lnk.value = e.innerText;
// };











// // bold
// function f2(e) {
//     var textarea = document.getElementById("body1_ptX");
//     if (textarea.style.fontWeight == "bold") {
//         textarea.style.fontWeight = "normal";
//         e.classList.remove("wysiwig_sel");
//     }
//     else {
//         textarea.style.fontWeight = "bold";
//         e.classList.add("wysiwig_sel");
//     }
// }
// // italic
// function f3(e) {
//     var textarea = document.getElementById("body1_ptX");
//     if (textarea.style.fontStyle == "italic") {
//         textarea.style.fontStyle = "normal";
//         e.classList.remove("wysiwig_sel");
//     }
//     else {
//         textarea.style.fontStyle = "italic";
//         e.classList.add("wysiwig_sel");
//     }
// }
// // superscript
// function f4(e) {
//     var textarea = document.getElementById("body1_ptX");
//     if (textarea.style.textDecoration == "superscript") {
//         textarea.style.textDecoration = "none";
//         e.classList.remove("wysiwig_sel");
//     }
//     else {
//         textarea.style.textDecoration = "superscript";
//         e.classList.add("wysiwig_sel");
//     }
// }
// // subscript
// function f5(e) {
//     var textarea = document.getElementById("body1_ptX");
//     if (textarea.style.textDecoration == "subscript") {
//         textarea.style.textDecoration = "none";
//         e.classList.remove("wysiwig_sel");
//     }
//     else {
//         textarea.style.textDecoration = "subscript";
//         e.classList.add("wysiwig_sel");
//     }
// }
// // underline
// function f6(e) {
//     var textarea = document.getElementById("body1_ptX");
//     if (textarea.style.textDecoration == "underline") {
//         textarea.style.textDecoration = "none";
//         e.classList.remove("wysiwig_sel");
//     }
//     else {
//         textarea.style.textDecoration = "underline";
//         e.classList.add("wysiwig_sel");
//     }
// }
// // orderedlist
// function f7(e) {
//     var textarea = document.getElementById("body1_ptX");
//     if (textarea.style.listStyle == "ordered") {
//         textarea.style.listStyle = "none";
//         e.classList.remove("wysiwig_sel");
//     }
//     else {
//         textarea.style.listStyle == "ordered";
//         e.classList.add("wysiwig_sel");
//     }
// }
// // unorderedlist
// function f8(e) {
//     var textarea = document.getElementById("body1_ptX");
//     if (textarea.style.listStyle == "unordered") {
//         textarea.style.listStyle = "none";
//         e.classList.remove("wysiwig_sel");
//     }
//     else {
//         textarea.style.listStyle == "unordered";
//         e.classList.add("wysiwig_sel");
//     }
// }
// // left
// function f9(e) {
//     var textarea = document.getElementById("body1_ptX");
//     textarea.style.textAlign = "left";
// }
// // center
// function f10(e) {
//     var textarea = document.getElementById("body1_ptX");
//     textarea.style.textAlign = "center";
// }
// // right
// function f11(e) {
//     var textarea = document.getElementById("body1_ptX");
//     textarea.style.textAlign = "right";
// }
// // uppercase
// function f12(e) {
//     var textarea = document.getElementById("body1_ptX");
//     if (textarea.style.textTransform == "uppercase") {
//         textarea.style.textTransform = "none";
//         e.classList.remove("wysiwig_sel");
//     }
//     else {
//         textarea.style.textTransform = "uppercase";
//         e.classList.add("wysiwig_sel");
//     }
// }
// //strikethrough
// function f13(e) {
//     var textarea = document.getElementById("body1_ptX");
//     if (textarea.style.textDecoration == "strikethrough") {
//         textarea.style.textDecoration = "none";
//         e.classList.remove("wysiwig_sel");
//     }
//     else {
//         textarea.style.textDecoration = "strikethrough";
//         e.classList.add("wysiwig_sel");
//     }
// }
// // color
// function f14(e) {
//     var textarea = document.getElementById("body1_ptX");
//     let value = e.value;
//     textarea.style.color = value;
// }
// window.addEventListener('load', () => {
//     textarea.value = "";
// });
// // link
// function f15(e) {
//     var textarea = document.getElementById("body1_ptX");
//     var link = prompt("Enter a link", "http://");
//     body1_pt2.document.execCommand('createlink', false, link);
// }
// // unlink
// function f16(e) {
//     var textarea = document.getElementById("body1_ptX");
//     body1_pt2.document.execCommand('unlink', false, null);
// }
// // function f9() {
// //     textarea.style.fontWeight = "normal";
// //     textarea.style.textAlign = "left";
// //     textarea.style.fontStyle = "normal";
// //     textarea.style.textTransform = "capitalize";
// //     textarea.value = "";
// // }

// // function f17a(e) {
</script>