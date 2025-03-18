// note rename all .php to js
const page = 'test';
// all page globals
require('./js/ajax.js');
require('./js/main.js');
require('./js/post_mNu_x.js');
// require('./js/dbSm1.js');
require('./js/li_pge.js');
require('./js/li_usr.js');
require('./js/su_usr.js');
require('./js/fgFrm_1.js');
require('./js/mNws.js');
require('./js/tgLgc.js');
//
require('./js/upst.js');
require('./js/upst2.js');
require('./js/cnt_sym2U.js');

// temp load
if (page) {
    require('./js/pst/load_lgc_x.js');
    require('./js/glbl/glbl_cnct_mod.js');
    require('./js/mnu/mnu_Lgc__s.js');
    require('./js/nws/mNws_mod.js');
    require('./js/dbSm1.js.js');
    require('./js/pnl/glbl_pnl_lgc.js');
    require('./js/blog/blgLd_2_li.js');
    require('./js/uvt/glbl_uvote.js');
    require('./js/pst/glbl_cmmnt.js');
} if (page === 'home') {
    require('./js/tgl.js');
} if (page === 'membership')
    require('js/mem/lgn_Lgc__x.js');
    require('js/mem/sgu_Lgc__x.js');
    require('js/mem/fgt_Lgc__x.js');
if (page === 'post') {
    require('js/pst/wysiwyg.js');
    require('js/pst/pst_lgc_1.js');
} if (page === 'settings') {
    require('js/set/set_mjs.js');
    // your account
    require('js/set/yoa/acc-inf.js');
    require('js/set/yoa/chg-pwd.js');
    require('js/set/yoa/acc-dya.js');
    // privacy & safety
    require('js/set/pas/pcy-sft.js');
//  if (page === 'user') -- possible global
    require('js/usr/usr_lgc_FULL.js');
} if (page === 'kodospace') {
    require('js/wtl/wtl_lgc_FULL.js');
} if (page === 'contact') {
    require('js/cnt/contact.js.js');
} if (page === 'downloads') {
    require('js/dwnld/dwLd_1_li.js');
    require('js/dwnld/dwLd_2_li.js');
}








