<?php
$f_bge = '<span class="f_bge">FREE';
$p_bge = '<span class="p_bge">PAID';
$userBadge = "";
//
if ($ulv) {
    if ($ulv == '1') {
        $userBadge = "
        <div class='tooltip'>$f_bge: Basic</span>
            <ol class='tooltiptext'>
                <li>basic level, for anyone</li>
            </ol>
        </div>
        ";
    } else if ($ulv == '2') {
        $userBadge = "
        <div class='tooltip'>$p_bge: Premium</span>
            <ol class='tooltiptext'>
                <li>Premium member upgrade</li>
                <li>premium features upgrade</li>
            </ol>
        </div>
        ";
    } else if ($ulv == '3') {
        $userBadge = "
        <div class='tooltip'>$p_bge: Moderator</span>
            <ol class='tooltiptext'>
                <li>Write edit capabilities</li>
                <li>employee of the platform</li>
                <li>premium features upgrade</li>
            </ol>
        </div>
        ";
    } else if ($ulv == '4') {
        $userBadge = "
        <div class='tooltip'>$p_bge: Administrator</span>
            <ol class='tooltiptext'>
                <li>god key, can edit platform(s) entirely</li>
                <li>employee of the platform</li>
                <li>premium features upgrade</li>
            </ol>
        </div>
        ";
    }  if ($ulv == '4' && $uid == '2') {
        $li_irt = "";
        if ($uid == '2') {
            $li_irt = '
            <li>Controller of the kodotokens
                <ul>
                    <li>Meowth has nothing on me</li>
                </ul>
            </li>
            <li>Easter egg hunter</li>
            <li>Master of easter clues</li>
            ';
        }
        $userBadge = "
        <div class='tooltip'>$p_bge: Master of the kodoverse</span>
            <ol class='tooltiptext'>
                $li_irt
                <li>god key, can edit platform(s) entirely</li>
                <li>employee of the platform</li>
                <li>premium features upgrade</li>
            </ol>
        </div>
        ";
    } else if ($ulv == '5') {
        $userBadge = "
        <div class='tooltip'>$p_bge: Freelancer Level 1</span>
            <ol class='tooltiptext'>
                <li>premium features upgrade</li>
                <li>(1099- employee) paid by the platform to post and fill platform</li>
                <li>Level 1 functions like a premium user (person who post: floods platform)</li>
            </ol>
        </div>
        ";
    } else if ($ulv == '6') {
        $userBadge = "
        <div class='tooltip'>$p_bge: Freelancer Level 2</span>
            <ol class='tooltiptext'>
                <li>premium features upgrade</li>
                <li>(1099  employee) paid by the platform to post and fill platform</li>
                <li>Level 2 functions like an Administrator (person who codes for the platform)</li>
            </ol>
        </div>
        ";
    } 
}
?>
<style>
.tooltip {
  position: relative;
  display: inline-block;
}

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