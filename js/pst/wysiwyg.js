// // https://friendlycoding.net/text-editor-html-css-javascript/?i=1

// // textarea WYSIWYG
// const textarea = document.getElementById("body1_ptX");
// // font size
// function f1(e) {
//     let value = e.value;
//     textarea.style.fontSize = value + "px";
// }
// // bold
// function f2(e) {
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
//     textarea.style.textAlign = "left";
// }
// // center
// function f10(e) {
//     textarea.style.textAlign = "center";
// }
// // right
// function f11(e) {
//     textarea.style.textAlign = "right";
// }
// // uppercase
// function f12(e) {
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
//     let value = e.value;
//     textarea.style.color = value;
// }
// window.addEventListener('load', () => {
//     textarea.value = "";
// });
// // link
// function f15(e) {
//     var link = prompt("Enter a link", "http://");
//     body1_pt2.document.execCommand('createlink', false, link);
// }
// // unlink
// function f16(e) {
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