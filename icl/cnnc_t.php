<?php
Class __xX_cnct_x___ {
    // kodoninja
    private $SQL__pdo_1 = "mysql:host=localhost;dbname=u825482285_kodoninja";
    private $SQL__pth_1 = "u825482285_kodoninja";
    private $SQL__pas_1 = "Cmyk.7625.KNkn";
    // kodostore
    private $SQL__pdo_2 = "mysql:host=localhost;dbname=u825482285_kodostore";
    private $SQL__pth_2 = "u825482285_kodoverse";
    private $SQL__pas_2 = "Cmyk.7625.KSks";
    //
    private $SQL__opt_x = 
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,);
    //
    protected $SQL__cnt_1; 
    protected $SQL__cnt_2; 
    public function __xX_cnct_o_1___() {
        try { $this->SQL__cnt_1 = new PDO($this->SQL__pdo_1, $this->SQL__pth_1,$this->SQL__pas_1,$this->SQL__opt_x); return $this->SQL__cnt_1;  } 
        catch (PDOException $newError) { newError($sqlo_____dbx___xX__,0,$_SERVER["SCRIPT_NAME"],$newError); }
    }
    public function __xX_cnct_o_2___() {
        try { $this->SQL__cnt_2 = new PDO($this->SQL__pdo_2, $this->SQL__pth_2,$this->SQL__pas_2,$this->SQL__opt_x); return $this->SQL__cnt_2;  } 
        catch (PDOException $newError) { newError($sqlo_____dbx___xX__,0,$_SERVER["SCRIPT_NAME"],$newError); }
    }
    public function __xX_cnct_c_1___() { $this->SQL__cnt_1 = null; }
    public function __xX_cnct_c_2___() { $this->SQL__cnt_2 = null; }
}

$NEWcnnc_t_1x = new __xX_cnct_x___();
$sql______dbx___xX__ = $NEWcnnc_t_1x->__xX_cnct_o_1___();
$sqlo_____dbx___xX__ = $NEWcnnc_t_1x->__xX_cnct_o_1___(); // new
$sqlc_____dbx___xX__ = $NEWcnnc_t_1x->__xX_cnct_c_1___();

$sqlo_____db2___xX__ = $NEWcnnc_t_1x->__xX_cnct_o_2___(); 
$sqlc_____db2___xX__ = $NEWcnnc_t_1x->__xX_cnct_c_2___();
?>
