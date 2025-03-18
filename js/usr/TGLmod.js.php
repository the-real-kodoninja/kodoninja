<script>
// to-do-list
// toggle
// post page
// settings

const usrCNT_TGL = document.querySelector("#usrCNT_TGL");
const usrCNT_divs = document.querySelectorAll(".usrCNT-div");
const usrCNT_XX = document.querySelector("#usrCNT_XX");

function toggleDiv(targetDivId) {
  const targetDiv = document.getElementById(targetDivId);
  usrCNT_divs.forEach((div) => (div.style.display = "none")); // Hide all divs initially
  targetDiv.style.display = targetDiv.style.display === "none" ? "block" : "none"; // Toggle the target div
}

function addTGLsel(li) {
    li.classList.style.cssText = `color: darkred;`;
}

// Add event listeners to list items
usrCNT_TGL.addEventListener("click", (event) => {
    var selfLi = event.target.tagName;
  if (selfLi === "LI") {
    const targetDivId = event.target.dataset.target;
    toggleDiv(targetDivId);
    addTGLsel(selfLi);
  }
});

// Add event listener to the show all button
usrCNT_XX.addEventListener("click", () => {
  usrCNT_divs.forEach((div) => (div.style.display = "block")); // Show all divs
});


</script>
