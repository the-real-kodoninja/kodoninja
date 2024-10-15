<style>
/* @import url('../hdr/header.css'); */


/* to be modded out */
/* ******************************** global start | main.css ******************************** */
*, *::before, *::after {
    box-sizing: border-box;
}

body {
    margin: 0px;
    background-color: #f0f0f0;
}

@font-face{
  font-family: "njnaruto";
  src: url('../kodoninja/css/font/ninja_naruto/njnaruto.ttf') format('truetype'),
  url('../kodoninja/css/font/ninja_naruto/njnaruto.ttf'); /* IE */
}

::selection, ::-moz-selection {
  background: #880000;
    color: #fff;
}

html {
 font-family: Lato,Helvetica Neue,Helvetica,Arial,sans-serif;
  text-rendering: optimizeLegibility;
  color: #333;
}

a {
    color: darkred;
    text-decoration: none;
}

.dI {
    display: inline-block;
}

.dB {
    display: block;
}

.dN {
    display: none;
}

.pA, i.hdxCrt var {
    position: absolute;
}

.pR, ul#hdxSrlt {
    position: relative;
}

.pF {
    position: fixed;
}

.fR {
    float: right;
}

.fL, #usrFavLoad {
    float: left;
}

.cP, button {
    cursor: pointer;
}

.pad-T {
    padding: 10px;
}

.pad-T2 {
    padding: 20px;
}

.w100, .hdxMnu1 span, #hdxLiBtn_1, #hdxLiBtn_2 {
    width: 100%;
}

.gblWth, .hdxInr {
   margin: 3px auto;
}
/* ******************************** global end | main.css ******************************** */

/* ******************************** header start | hdr/header.css ******************************** */
.hdxWpr {
    height: 50px;
    background-color: #3d4347;
    color: #fff;
    top: 0;
    left: 0;
    right: 0;
    z-index: 7;
}

.hdxInr {
}

.hdxMnu1 {
    width: 30px;
    height: 40px;
    color: #fff;
    margin: 2px 0px 0px 8px;
}

.hdxMnu1 span {
    height: 3px;
    padding: 1px 0px;
    background: #fff;
    margin: 6px 0px;
    display: block;
}

.kodoIcn {
    background-image: url(logo/logo_2.svg);
    height: 28px;
    width: 28px;
    background-size: 22px auto;
    background-repeat: no-repeat;
    float: left;
    margin: 0px 1px 0px -4px;
}

.hdxLogo {
    color: #333;
    margin: 0px 11px 0px;
    font-size: 20px;
    font-weight: 600;
}

.hdxLogo a {
    text-decoration: none;
    color: #333;
}

.hdxLogo a:hover {
    color: darkred;
}

.hdxFull {
    margin: -37px 50px 0px 47px;
}

input[type="search"].hdxSch {|
    border-radius: 6px;
    height:34px;
    margin: -4px 0px 0px;
    text-indent: 115px;
}

input[type="search"].hdxSch:focus {
    outline: 2px solid darkred;
}

.hdxRgt {
    margin: -3px 0px 0px 8px;
}

.hdxRgt i {
    font-size: 35px;
}

img.glbl_uAHdr, img.sch_avt {
    height: 30px;
    width: 30px;
    background-repeat: no-repeat;
    background-size: cover;
}

img.glbl_uAHdr, i.hdxCrt var {
    border-radius: 50%;
}

img.glbl_uAHdr {
    border-radius: 50%;
    border: 2px solid #fff;
    margin: 0px 0px 0px 40px;  
}

ul#hdxSrlt {
    background-color: #fff;
    color: #333;
    padding: 0px;
    margin: 0px;
    z-index: 3;
    text-decoration: none;
    list-style: none;
    border-left: 1px solid #ccc;
    border-right: 1px solid #ccc;
    border-bottom: 1px solid #ccc;
}

ul#hdxSrlt a {
    text-decoration: none;
    color: #333;
}

ul#hdxSrlt li {
    padding: 10px 10px;
    height: 50px;
}

ul#hdxSrlt li:hover, ul.hdxList li:hover {
    background-color: #f1f1f1;
}

.sxPrc_ {
    margin: 0px 0px 0px 15px;
}

.ktknCurIcn {
    margin: 0px 5px 0px 0px;
    color: darkred;
}

img.sch_avt {
    border-radius: 6px;
    border: 1px solid #ccc;
    margin: 0px 10px 0px 0px;
    float: left;
}

i.hdxCrt var {
    border: 1px solid #fff;
    background-color: #c52d25;
    font-size: 14px;
    height: 15px;
    width: 15px;
    margin: 2px 0px 0px -13px;
    text-indent: 4px;
    line-height: 16px;
}

/* panel left */
.mNu-my {
    width: 250px;
    height: 100%;
    bottom: 0;
    left: 0;
    background-color: rgba(0, 0, 0, 0.9);
    position: fixed;
    z-index: 5;
    color: #fff;
}

.mNu-my ul.lftPnl-Ul1, ul.dl_nav {
    margin: 0px;
    padding: 0px;
    background: #3d4347;
}

.mNu-my ul.lftPnl-Ul1 a li {
    display: inline-block;
    color: #fff;
    padding: 10px 0px;
    width: 100%;
    text-indent: 15px;
}

.lftPnl-Wpr ul, ul.pnlNav2, #usrFavLoad ul {
    list-style: none;
    text-decoration: none;
    margin: 0px;
    padding: 0px;
} 

.lftPnl-Wpr ul {
    overflow-y: scroll;
    overflow-x: hidden;
    height: 650px;
}

.lftPnl-Wpr ul li {
    background: none;
    display: block;
    line-height: 25px;
    margin: 0px 0px 0px 20px;
    max-height: 700px;
}

/* right panel */

.usr_lgn {
    right: 0;
    bottom: 0;
    height: 100%;
    background: rgba(61, 67, 71, 0.9);
    max-width: 258PX;
    color: #fff;
    z-index: 6;
    padding: 60px 0px 10px 10px;
}

/* panel.css */
/* ***************** */
/* ** user panel *** */
/* ***************** */
.usr_PnlX {
    max-width: 300px;
    height: auto;
    margin: 2px 10px 0px 0px;
}

.di, .usr_PnlX, .usr_PnlY, .usr_PnlZ, .usr_PnlW, .Zview-Inr, .Zb-Inr, .Zview img, .Z_rgtA, .Z_rgtA-B, .mNu-mU, i.arrow, .usr_Ftr ul a li, .notiPnl_Pst img {
    display: inline-block;
}

.usr_PnlY, .usr_PnlZ, .usr_PnlW, .Zview-Inr, .Zb-Inr, .Pad1 {
    padding: 10px;
}

.notiPnl_Wpr, .usr_PnlY, .usr_PnlZ, .usr_PnlW, .notiPnl_Pst img  {
    float: left;
}

.notiPnl_Wpr, .usr_PnlY, .usr_PnlZ, .usr_PnlW  {
    width: 500px;
}

.notiPnl_Wpr, .usr_PnlY, .usr_PnlW, .Zview {
    background: #fff;
    border: 1px solid #ccc;
    border-radius: 6px;
    margin: 0px 10px 0px 0px;
}

input.Pnl-Ttl[type="text"], input.Pnl-Tgs[type="text"] {
    color: darkred;
}

input.Pnl-Ttl[type="text"] {
    font-weight: bold;
    font-size: 22px;
    margin: 0px 0px 5px 0px;
    padding: 0px;
}

input.Pnl-Tgs[type="text"] {
    font-size: 13px;
    margin: 0px;
}

input.Pnl-Ttl[type="text"], input.Pnl-Tgs[type="text"], .usr_PnlY textarea, .usr_PnlW input {
    border: none;
}

input.Pnl-Ttl[type="text"], input.Pnl-Tgs[type="text"], .usr_PnlY textarea {
    background: transparent;
}

.usr_PnlY textarea, .usr_PnlW, input.Pnl-Btn[type="submit"], input.Pnl-BtnB[type="submit"], select.Pnl-Cat, select.Pnl-Cat, .Zview, .notiPnl_Hdr, .notiPnl_Pst {
    color: #333;
}

.usr_PnlY textarea {
    width: 500px;
    min-width: 500px;
    max-width: 500px;
    height: 300px;
    min-height: 300px;
    max-height: 500px;
}

select::-ms-expand {
    display: none;
}

select.Pnl-Cat:after {
    content: '\f078';
    font: normal normal normal 17px/1 FontAwesome;
    color: #0ebeff;
    right: 11px;
    top: 6px;
    height: 34px;
    padding: 15px 0px 0px 8px;
    border-left: 1px solid #0ebeff;
    position: absolute;
    pointer-events: none;
}

select.Pnl-Cat {
    border: none;
    width: 100%;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    background: transparent;
    background-image: none;
    -ms-word-break: normal;
    word-break: normal;
}

input.Pnl-Btn[type="submit"], input.Pnl-BtnB[type="submit"] {
    width: 100%;
    margin: 15px 0px 0px;
    border: none;
    cursor: pointer;
    padding: 20px;
    border-radius: 6px;
}

input.Pnl-Btn[type="submit"]:hover, input.Pnl-BtnB[type="submit"], li.btn-Rd:hover, .Z_rgtB-Inr li:hover {
    background: darkred;
    color: #fff;
}

input.Pnl-BtnB[type="submit"]:hover {
    background: #fff;
}

/* panel item view */
.usr_PnlZ {
    height: 114px;
}

.usr_PnlW {
    height: 100%;
}

.usr_PnlW input {
    padding: 5px;
    margin: 0px 0px 5px;
}

.usr_PnlW input[type="file"] {
    width: auto;
}

.usr_SetA div {
    margin: 0px 5px 0px;
}

.PnlZ-Hdr {
    margin-bottom: 10px;
}

.PnlZ-Hdr select {
    width: auto;
}

.Zview {
    width: 525px;
    margin: 0px 0px 20px;
}

.Zview-Inr {
    width: 470px;
}

.Zview-Ttl {
    margin:  0px 0px 8px;
}

.Zview-Ttl b, .Zview-Tt small {
    margin:  0px 0px 5px;
}

.Zview img {
    height: 60px;
    width: 100px;
}

.Z_rgtA, .Z_rgtA-B {
    margin: 0px 0px 0px 10px;
    height: 60px;
    overflow: hidden;
}

.Z_rgtA {
    width: 372px;
}

.Z_rgtB-Inr {
    width: 35px;
    height: 112px;
    text-align: center;
}

.Z_rgtB-Inr li {
    padding: 8px 5px 7px 4px;
    cursor: pointer;
}

.Z_rgtB-Inr i, i.pnl_edit-B, .Z_rgtB-Inr li, ul.usr_list li, .Zview, .usr_PnlW input {
    display: block;
}

.closeDiv {
    position: absolute;
    width: 20px;
    height: 21px;
    background-color: rgb(35, 179, 119);
    float: right;
    cursor: pointer;
    color: white;
    box-shadow: 2px 2px 7px rgb(74, 72, 72);
    text-align: center;
    margin: 5px;
    right:0px;
}

.wysiwyg_Btns input[type="button"], .wysiwyg_Btns button, .wysiwyg_Btns input[type="image"]  {
    background: transparent;
    border: 1px solid #ccc;
    border-radius: 4px;
    padding: 3px 6px;
    margin: 0px 0px 0px 0px;
    cursor: pointer;
}

.wysiwyg_Btns input[type="button"]:hover, .wysiwyg_Btns button:hover, .wysiwyg_Btns input[type="image"]:hover {
    background: rgba(135, 30, 31, 0.8);
    color: #fff;
}

.wysiwyg_Btns input[type="image"] {
    height: 15px;
    width: auto;
    vertical-align: top;
    margin: 4px 4px 0px;
}

iframe {
    width: 502px;
    height: 300px;
    border: none;
}
input[type="color"] {
    border: none;
    outline: none;
    background-color: transparent;
}

form span, #status_f {
    color: #333;
}

/* *** notifications *** */
.notiPnl_Pst {
    margin-bottom: 10px;
    border-bottom: 1px solid #ccc;
}

.notiPnl_Pst img {
    border: 1px solid #ccc;
}

.notiPnl_Rgt , b.notiPnl_Ttl {
    width: 420px;
}

b.notiPnl_Ttl {
    color: darkred;
}

hr.Pnl_Sep {
    border: 2px solid darkred;
    border-radius: 6px;
    width: 100%;
    margin: 20px 0px 30px;
}

a {
    text-decoration: none;
}

ul.usr_list, ul.Z_rgtB-Inr {
    margin: -1px 0px 0px;
    padding: 0px;
}

ul.usr_list ul, ul.Z_rgtB-Inr, .usr_PnlW input {
    width: 100%;
}

ul.usr_list li {
    border-radius: 6px;
    margin-bottom: 20px;
    padding: 10px;
    background: rgba(255,255,255,0.9);
    color: #333;
    cursor: pointer;
}

ul.usr_list li:hover, .usrBck-Wpr {
    background: rgba(255,255,255,0.8);
}

ul.usr_list li ul {
    margin: 0px 0px 0px 5px;
    padding: 0px;
}

ul.usr_list li ul li, ul.usrTgl li {
    margin: 0px;
}

ul.usr_list li ul li:hover, .Zview-Ttl b, input.Pnl-BtnB[type="submit"]:hover {
    color: darkred;
}

ul.usr_list li ul li, ul.usr_list li ul li:hover, .usr_PnlW input {
    background: transparent;
}

  .glPgBr_1 {
    background-color: #f0f0f0;
    margin: 5px auto;
    border-radius: 6px;
    border: 1px solid #dbd9d9;
  }

  .glPgBr_1 > div {
    background-color: #C2B280;
    text-align: center;
    height: 20px;
    border-radius: 6px;
  }

  /* ***** panel global image header *****/
  .glbl_uAHdr {
    border-radius: 50%;
    height: 30px;
    width: 30px;
    background-repeat: none;
    border: 2px solid #fff;
    margin: 0px 10px 0px 0px;  
  }

/* arrow */
i.arrow {
    border: solid black;
    border-width: 0 3px 3px 0;
    padding: 3px;
    float: right;
}

.up {
    transform: rotate(-135deg);
    -webkit-transform: rotate(-135deg);
}

.down {
    transform: rotate(45deg);
    -webkit-transform: rotate(45deg);
}

/* user */
.usr_Avtr, .Z_rgtB-Inr i, i.pnl_edit-B, .bnrCnt img, .usrConts_Inr img, .notiPnl_Pst img {
    background-repeat: no-repeat;
    background-size: cover;
    cursor: pointer;
}

.notiPnl_Pst img {
    height: 35px;
    width: 35px;
}

.usr_Avtr {
    height: 25px;
    width: 25px;
    background-image: url("../../css/img/40998510_10217136889244411_4302251977145843712_n.jpg");
    margin: -3px 5px 0px -3px;
}

.usr-Hdr {
    height: 50px;
    width: 300px;
    margin-bottom: 20px;
}

.usr-Hdr div:first-child {
    margin: 2px 0px 0px -2px;
    width: 238px;
}

.usr-Hdr div .usr-stat {
    width: 190px;
}

.usr_Ftr {
    bottom: 25px;
    position: fixed;
}

.usr_Ftr ul {
    margin: 20px 0px 0px;
    padding: 0px;
}

.usr_Ftr ul a li, .PnlZ-Hdr select {
    color: #fff;
}

.usr_Ftr ul a li:hover {
    color: #fff;
    text-decoration: underline;
}



/* ***************** */
/* ** left panel *** */
/* ***************** */

.lftPnl-Wpr {
    margin: 8px 0px 0px 0px;
    padding: 10px;
    color: #fff;
}

.lftPnl-Wpr h4 {
    padding: 0px;
    margin: 20px auto;
}

ul.pnlNav2 {
    background-color: #3d4347;
}

ul.pnlNav2 li {
    display: inline-block;
    color: #fff;
    padding: 10px 13px;
}

.selX {
    background-color: rgba(135, 30, 31, 0.8);
}

.lftPnl-Wpr ul, ul.pnlNav2 {
    list-style: none;
    text-decoration: none;
    margin: 0px;
    padding: 0px;
}

.lftPnl-Wpr ul {
    overflow-y: scroll;
    overflow-x: hidden;
    height: 650px;
}

.lftPnl-Wpr ul li {
    background: none;
    display: block;
    line-height: 25px;
    margin: 0px 0px 0px 20px;
    max-height: 700px;
}

/* watchlist */
#watAddIcn i {
    border-radius: 50%;
    border: 1px solid #3d4347;
    color: #3d4347;
    height: 25px;
    width: 25px;
    display: inline-block;
    text-align: center;
    line-height: 25px;
    margin: 0px 5px 0px 0px;
    font-weight: 600;
}

#watAddIcn i:hover {
    background-color: #3d3d3d;
    color: #fff;
}

/* cart */
.bck-w, ul.hdxList {
    background-color: #fff;
    border: 1px solid #ccc;
}

ul.hdxList {
    margin: 0px 0px 0px -227px;
    height: auto;
    width: 260px;
    color: #333;
    font-size: 13px;
    list-style: none;
    padding: 0px;
    z-index: 1;
}

ul.hdxList li {
    padding: 7px 14px;
    color: #333;
    height: 50px;
}

.hdxCrtDta {
    width: 190px;
}

#hdxLiBtn_1, #hdxLiBtn_2 {
    padding: 10px 5px;
    border: 1px solid #ccc;
}

#hdxLiBtn_1 {
    background-color: #3d4347;
    color: #fff;
}

#hdxLiBtn_2:hover {
    background-color: #fff;
    color: #c52d25;
    margin: 0px 0px 10px 0px;
}

#hdxLiBtn_2, #hdxLiBtn_1:hover {
    background-color: rgb(134, 116, 118);
    color: #fff;
}

/* ******************************** header end | hdr/header.css ********************************* */

/* *********************************** index body start *********************************** */

.idxHdrWpr {
  background-color: #E1E1E1;
  width: 100%;
  height: 100px;
  margin: 50px 0px 5px 0px;
  left: 0;
  right: 0;
  top: 0;
  padding: 5px 0px 0px;
}

.idxHdrWpr h1 {
  color: #444;
   font-family: njnaruto;
   text-align: center;
}

.idxHdrWpr .dv1 {
  padding: 10px 0px 10px;
}


/* ********************************** index body end *************************************** */

/* schFltr_x1.css */


ul.bHdr-Nav, .bFltr-Wpr {
    width: 100%;
}

ul.bHdr-Nav li span {
    width: 102px;
}

/* ************************************* footer ********************************************** */
footer {
    padding: 10px;
    margin: 0px 0px 10px 0px;
}
/* news letter index */
.mNws-Wpr {
    background: lightgray;
    padding: 50px 0px 60px;
}

.mNws-Inr {
    text-align: center;
}

.mNws-Inr h2 {
    margin: 0px 0px 20px;
}

.mNws-Inr input[type="email"], .mNws-Inr button {
    border-radius: 3px;
}

.mNws-Inr input[type="email"] {
    border: 1px solid #ccc;
    width: 300px;
    padding: 15px;
}

.mNws-Inr button {
    background: darkred;
    color: #fff;
    border: none;
    padding: 14px 18px;
}

/* user panel */
#usrFavLoad {
    margin: 0px 10px 0px 0px;
    border-radius: 6px;
}

#usrFavLoad li {
    margin: 10px;
    height: 32px;
    color: #333;
}

.usrPnl_Load {
    margin: 0px 0px 0px 0px;
    width: 340px;
    height: auto;
    float: left;
}

.usrWltWpr {
    padding: 0px;
}

.usrWlthdr {
    background-color: #c8c8c8;
}

.crtItm_chk a {
    color: #333;
}
/* *************************** product page ************************************************************ */

.prdBdyWpr {
    margin: 40px auto 0px;
    width: 1000px;
}

.prdMnLft, .prdMnRgt, .rdRtngs i {
    display: inline-block;
}

.prdImg_x {
    margin: 0px 0px 10px;
}

.prdImg_x img {
    width: 100%;
    height: auto;
}

.prdImg_y {
    margin: 10px 0px;
}

.prdImg_y img {
    max-width: 60px;
    max-height: 60px;
    margin: 0px 10px 0px 0px;
}

.prdMnLft {
    width: 100%;
    max-width: 500px;
    height: auto;
    float: left;
}

.prdMnRgt {
    width: 400px;
    margin: 0px 0px 0px 15px;
}

.prdMnRgt div {
    margin: 0px 0px 15px;
}

.rdRtngs i {
    margin: 0px 5px 0px 0px;
}

.prdMnRgt h3 {
    margin: 0px;
    padding: 0px;
}

/* .prdSelWpr {
    height: 40px;
} */

.prdSel_x {
    background-color: transparent;
    border: none;
}

/* .prdSelQnty {
    margin: 10px 0px 0px;
    position: absolute;
} */

input[type="button"].prdSelChrt, .prdATC_x {
    padding: 12px 15px;
    border: 1px solid #ccc;
}

input[type="button"].prdSelChrt {
    background-color: #c2b280;
    color: #333;
}

.prdATC_x {
    background-color: #3d4347;
    color: #fff;
}

.prdATC_x:hover {
    background-color: #3d4347;
    color: #fff;
}

.prd_tknEx {
    background-color: #fafafa;
    color: #333;
    text-align: left;
    margin: 0px 0px 40px;
}

.prdTblHdr {
    background-color: #f7e6d2;
    padding: 20px;
    color: #333;
    font-weight: 600;
}

.prdTblBdy {
    margin: 0px 0px 40px 0px;
}

.prdTblBdy table {
    padding: 20px;
    text-align: left;
}

.prdTblBdy table th {
    padding: 7px 0px;
    text-align: left;
}

.prd_tknEx blockquote {
    margin: 0px 15px 0px;
    padding: 0px 10px 0px;
    border-left: 1px solid darkgreen;
}

.prd_tknEx blockquote div {
    margin: 7px 0px;
}

/* ******************************************************************produsct page scroll elements *************************************** */

.scrEfct {
    /* opacity: 0; */
    transition: opacity 500ms;
}

.scrEfct .scrolled {
    opacity: 1;
}

.scrolled.fade-in {
    animation: fade-in 1s ease-in-out both;
}

.scrolled.fade-in-bottom {
    animation: fade-in-bottom 1s ease-in-out both;
}

.scrolled.slide-in-left {
    animation: slide-in-lef 1s ease-in-out both;
}

.scrolled.slide-in-right {
    animation: slide-in-right 1s ease-in-out both;
}

@keyframes slide-in-left {
    0% {
        -webkit-transform: translate(-100px);
        transform: translateX(-100px);
        opacity: 0;
    }
    100% {
        -webkit-transform: translate(0);
        transform: translateX(0);
        opacity: 1;
    }
}
@keyframes slide-in-right {
    0% {
        -webkit-transform: translate(-100px);
        transform: translateX(-100px);
        opacity: 0;
    }
    100% {
        -webkit-transform: translate(0);
        transform: translateX(0);
        opacity: 1;
    }
}
@keyframes slide-in-bottom {
    0% {
        -webkit-transform: translate(-100px);
        transform: translateX(-100px);
        opacity: 0;
    }
    100% {
        -webkit-transform: translate(0);
        transform: translateX(0);
        opacity: 1;
    }
}
@keyframes fade-in {
    0% {
        opacity: 0;
    }
    100% {
        opacity: 1;
    }
}
</style>