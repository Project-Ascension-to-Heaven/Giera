<?php
/* Smarty version 3.1.39, created on 2021-04-19 18:14:32
  from 'D:\xampp\htdocs\Giera\sandbox\smarty\templates\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_607dac681761d0_57466720',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a246e31763cd1dce1574747c6311a492122a7f8f' => 
    array (
      0 => 'D:\\xampp\\htdocs\\Giera\\sandbox\\smarty\\templates\\login.tpl',
      1 => 1618758538,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_607dac681761d0_57466720 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-6 offset-md-3 text-center">
                <h1>Zaloguj się</h1>
                <form action="Interface.php" method="post">
                    <input type="hidden" name="action" value="register">
                    <div class="form-group">
                        <label for="login">Adres e-mail:</label>
                        <input class="form-control" type="email" name="login" id="login">
                    </div>
                    <div class="form-group">
                        <label for="password">Hasło:</label>
                        <input class="form-control" type="password" name="password" id="password">  
                    </div>
                    <button class="btn btn-primary" type="submit">Zaloguj się</button>
                </form>
            </div>
        </div>
    </div>
<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
