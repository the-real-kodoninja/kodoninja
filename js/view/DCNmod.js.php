<script>
const DCNtgl_1 = document.querySelector('#DCNtgl_1');
const DCNtgl_2 = document.querySelector('#DCNtgl_2');
const DCNifm = document.querySelector('#DCNifm');

DCNtgl_1.addEventListener('click', function(event){ 
    DCNtgl_1.style.cssText = `
        background-color: rgba(176, 74, 74, 0.9);
        color: rgba(255, 255, 255, 0.9);
    `;
    DCNifm.src = `<?php echo $m_path; ?>blog/img/41/This_is_a_summary_of_the_report_dubbed_Follow_gate.pdf`;
    DCNtgl_2.style.cssText = `
        background-color: rgba(255, 255, 255, 0.9);
        color: rgba(0, 0, 0, 0.9);
    `;
});

DCNtgl_2.addEventListener('click', function(event){ 
    DCNtgl_2.style.cssText = `
        background-color: rgba(176, 74, 74, 0.9);
        color: rgba(255, 255, 255, 0.9);
    `;
    DCNtgl_1.style.cssText = `
        background-color: rgba(255, 255, 255, 0.9);
        color: rgba(0, 0, 0, 0.9);
    `;
    DCNifm.src = `<?php echo $m_path; ?>blog/img/41/Terrorism_and_conspiracy_of__homeless_developer_(follow_gate).pdf`;
});
</script>