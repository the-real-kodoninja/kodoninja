<?php
if ($p_load == 'm') {
  include_once("css/m/TEMP_cache_css.php");
}
?>
<style>
body .hdxFull {
  margin: -37px 95px 0px 48px;
}

body .hdxCrt {
  position: absolute;
  margin: 0px 0px 0px -69px;
}

@media only screen and (max-width: 720px), only screen and (max-device-width: 720px) {
  body .prdVwWpr .prdItmWpr {
      width: 100%;
  }

  body .prdBdyWpr {
    margin: auto 0px;
    width: 100%;
  }

  body .tknBdyHdr1 {
    margin: 35px 0px auto;
  }

  body .tknLdRgt {
    margin: 0px;
  }

  body .tknLd_SVG img {
    height: 80px;
    margin: 50px 0px 0px 0px;
    display: none;
  }

  body .tknBUY_wpr {
    margin: 10px 0px 30px;
  }

  body ul.tkn_nav_1 {
    margin: 0px 0px 30px;
  }

  body .prdMnRgt {
    width: 100%;
    margin: 5px 0px 0px;
  }
}

/* right panel */
.usr_lgn {
    background: rgba(61, 67, 71, 0.9);
    max-width: 258PX;
    min-width: 258PX;
}

.usr_list {
    width: 239px;
}

/* tooltip */

.tooltip .tooltiptext {
  visibility: hidden;
  width: 300px;
  background-color: black;
  color: #fff;
  text-align: left;
  border-radius: 6px;
  padding: 10px;

  /* Position the tooltip */
  position: absolute;
  z-index: 1;
}

.tooltip:hover .tooltiptext {
  visibility: visible;
}

.tooltiptext li {
  margin: 0px 0px 0px 18px;
  font-size: 12px;
}
.schDrp-Rsl {
    margin: 0px;
}
</style>