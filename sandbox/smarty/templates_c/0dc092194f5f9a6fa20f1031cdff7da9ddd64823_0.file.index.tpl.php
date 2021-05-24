<?php
/* Smarty version 3.1.39, created on 2021-05-24 17:42:39
  from 'D:\xampp\htdocs\Giera\sandbox\smarty\templates\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_60abc96fd4cea7_96391337',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0dc092194f5f9a6fa20f1031cdff7da9ddd64823' => 
    array (
      0 => 'D:\\xampp\\htdocs\\Giera\\sandbox\\smarty\\templates\\index.tpl',
      1 => 1621870926,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:log.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_60abc96fd4cea7_96391337 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

        <div class="container-fluid">
            <div class="row" id="top">
                <div class="col-2">
                    Nick: <?php echo (($tmp = @$_smarty_tpl->tpl_vars['playerLogin']->value)===null||$tmp==='' ? "Anonim" : $tmp);?>

                </div>
                <div class="col-2">
                    Gildia: brak
                </div>
                <div class="col-1">
                    Jedzenie: <?php echo $_smarty_tpl->tpl_vars['jedzenie']->value;?>

                </div>
                <div class="col-1">
                    Drewno: <?php echo $_smarty_tpl->tpl_vars['drewno']->value;?>

                </div>
                <div class="col-1">
                    Metale: <?php echo $_smarty_tpl->tpl_vars['metale']->value;?>

                </div>
                <div class="col-1">
                    Monety: <?php echo $_smarty_tpl->tpl_vars['monety']->value;?>

                </div>
                <div class="col-1">
                    Kryształy: 21 <!-- nie oszukujmy się, nie potrzebna jest nam waluta premium -->
                </div>              <!-- no chyba że ma ktoś zamiar implementować sklep który działa, ja z chęcią popatrzę -->
                                     <!-- Prawda, jak ktoś ma duże cohones to niech to zrobi tak o --> 
            </div>
            <div class="row">
                <div class="col-10" id="lewo">
                    <img src="projekt.png" id="obrazTlo">
                </div>
                <div class="col-2">
                    <h2>Budynki:</h2> <br>
                    Farmy poziom: <?php echo $_smarty_tpl->tpl_vars['farmyLvl']->value;?>
 <br>
                    Jedzenie zysk/h: <?php echo $_smarty_tpl->tpl_vars['jedzenieGain']->value;?>
 <br>
                    <a href="/upgrade/farmy/">
                        <button>Rozbuduj Farmy</button>
                    </a><br><br>
                    Tartak poziom: <?php echo $_smarty_tpl->tpl_vars['tartakLvl']->value;?>
 <br>
                    Drewno, zysk/h: <?php echo $_smarty_tpl->tpl_vars['drewnoGain']->value;?>
 <br>
                    <a href="/upgrade/tartak/">
                        <button>Rozbuduj Tartak</button>
                    </a><br><br>
                    Kopalnie metali poziom: <?php echo $_smarty_tpl->tpl_vars['kopalniaLvl']->value;?>
 <br>
                    Metale, zysk/h: <?php echo $_smarty_tpl->tpl_vars['metaleGain']->value;?>
 <br>
                    <a href="/upgrade/kopalnia/">
                        <button>Rozbuduj Kopalnie</button>
                    </a><br><br>
                    Skarbówka poziom: <?php echo $_smarty_tpl->tpl_vars['skarbowkaLvl']->value;?>
 <br>
                    Monety, zysk/h: <?php echo $_smarty_tpl->tpl_vars['monetyGain']->value;?>
 <br>
                    <a href="/upgrade/skarbowka/">
                        <button>Rozbuduj Skarbówkę</button>
                    </a><br><br>
                </div>
            </div>
        
    <footer class="row mt-3">
        <div class="col-12">
            <?php $_smarty_tpl->_subTemplateRender("file:log.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        </div>
    </footer>
    </div><!-- /container-fluid -->

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
