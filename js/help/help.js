const schTrm = document.getElementById("schHLp");
const hlpRs = document.getElementById("hlpRes");
const fAqLi = document.querySelectorAll(".fAqLi");

schTrm.addEventListener('keyup', function() {
    schQry = schTrm.value;
    for(var i = 0; i < fAqLi.length; i++) {
        schQry = schTrm.value;
        if(fAqLi[i].textContent.toLowerCase().includes(schQry.toLowerCase())) {
            console.log(schQry);
            fAqLi[i].style.display = "block";
        } else {
            fAqLi[i].style.display = "none";
        }
    }
});