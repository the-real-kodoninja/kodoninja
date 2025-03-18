//
// menu filter
//
const dwnLd_x = document.getElementById("dwnLd_x"); // UL grab
const sch_dn1 = document.getElementById("sch_dn1"); // UL expand
const sch_dn2 = document.getElementById("sch_dn2"); // UL collapse
//
// const dwLdli_1 = document.getElementById("dwLd_1a"); // formet
// dwLdli_1.addEventListener("change", functionname, false);
// const dwLdli_2 = document.getElementById("dwLd_2a"); // c_type
// dwLdli_2.addEventListener("change", functionname, false);
// const dwLdli_3 = document.getElementById("dwLd_3a"); // price
//
// const dwnld_vTxt = document.getElementById("dwnld_vTxt"); // btn var
// //
// // download output
// //
// const dlFtr_3c = document.getElementById("dlFtr_3c");

// simple collapse/exspand
// exspand
function schLg1() {
    dwnLd_x.style.display= 'block';
    sch_dn1.style.display= 'none';
    sch_dn2.style.display= 'inline-block';
}
// collapse
function schLg2() {
    dwnLd_x.style.display= 'none';
    sch_dn1.style.display= 'inline-block';
    sch_dn2.style.display= 'none';
}
sch_dn1.addEventListener('click', function (event) {
    schLg1();
});
sch_dn2.addEventListener('click', function (event) {
    schLg2();
});
//

// // format checkbox logic
// function functionname(){
//     var test_1 = ".pdf";
//   var isChecked = dwLdli_1.checked;
//   if(isChecked) { 
//     dlFtr_3c
//   } else { 

//   }
// }

// var checkbox = document.querySelector("input[name=checkbox]");

// checkbox.addEventListener('change', function() {
//   if (this.checked) {
//     console.log("Checkbox is checked..");
//   } else {
//     console.log("Checkbox is not checked..");
//   }
// });