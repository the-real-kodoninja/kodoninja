//****************************************** */ main
// global toggle
function upTglx(pid,cid) {
    document.querySelector("#"+pid+cid).classList.toggle("dN");
} 
//
function avtVIEW(id) {
    // create view height for e/
    var imgVwXa = document.querySelector("#imgVwXa_"+).src;
    vPnlBdy.innerHTML = `<img src="`+imgVwXa+`" style="width: 100%; height: auto;"/>`;
    document.querySelector("#vPnlHdr").classList.remove("vPnlHdr");
    document.querySelector("#vPnlHdr").classList.remove("pad-T");
    document.querySelector(".vPnlCtr").style.cssText = `
        width: 100%;
        max-width: 1000px;
        height: auto;
    `;
    document.querySelector(".vPnlWpr").style.cssText = `
        width: 100%;
        max-width: 1000px;
        height: auto;
        margin: -150px 0px 0px 0px;
    `;
    console.log(imgVwXa);
    return vPnlMod();
};