<?php
$mhdr1 = "";
$kVal = "0"; 

if (isset($p_load)) {
    if ($page == "blog") {
        $kVal = "s3";
    }
}
if ($p_load === "f") {
    // full web load out
    echo $mhdr1 = '
    <div class="header-Wpr">
        <div class="header">
            <a href="index.php">
                <div class="logoX di"></div>
            </a>
            <div class="sch-Wpr di">
                <div class="sch-Bdy">
                    <div id="mNu_m_x1" class="mNu-mx mNu-xx cP">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
                <form action="search.php" method="get" style="margin: 0px;">
                    <input id="dbS" name="s" class="sch m_search di" type="search" autocomplete="off" onKeyUp="dSchMn(this.value,\''.$kVal.'\',\''.$p_load.'\')" placeholder="'.$plcHldr_1.'" style="max-width: 905px;"/>
                    <input type="hidden" name="p" id="p" value="'.$path.'"/>
                    <input type="submit" class="schGo dI pA" style="visibility: hidden;" onclick="Pnl_VwX()" value="&#10151;">
                </form>

                <div class="schDrp-Wpr pA" style="max-width: 905px;">
                    <div class="schDrp-Wpr2 di">
                        <ul class="schDrp-Rsl">
                            <div id="dbSr"></div>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="cP fr di" >
                '.$glbl_uAHdr.'
            </div>
        </div>
    </div>
    ';
} else if ($p_load === "m") {
    // mobile load out
    echo $mhdr2 = '
    <div class="header-Wpr pR">
        <div class="header">
            <a class="logoXA" href="index.php">
                <div class="logoX di fL pA"></div>
            </a>
            <div class="sch-Wpr di pA">
                <div class="sch-Bdy">
                    <div id="mNu_m_x1" class="mNu-mx mNu-xx cP">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
                <form action="search.php" method="get" class="sch-Wpr2">
                    <input id="dbS" name="s" class="sch m_search" type="search" autocomplete="off" onKeyUp="dSchMn(this.value,\''.$kVal.'\',\''.$p_load.'\')" placeholder="Search kodoninja"/>
                    <input type="hidden" name="p" id="p" value="'.$path.'"/>
                </form>
                <div class="schDrp-Wpr pA">
                    <div class="schDrp-Wpr2 di">
                    <ul id="schDrp-Rsl" class="schDrp-Rsl">
                        <div id="dbSr" class="dN pad-T"></div>
                    </ul>
                    </div>
                </div>
            </div>
            <div class="glbl_uAWpr cP fr di">
                '.$glbl_uAHdr.'
            </div>
        </div>
    </div>
    <!-- post load out -->
    <div class="pstModxBACK dN"></div>
    <div id="pstModxLOAD_'.$log_id.'"></div>
    ';
}
?> 