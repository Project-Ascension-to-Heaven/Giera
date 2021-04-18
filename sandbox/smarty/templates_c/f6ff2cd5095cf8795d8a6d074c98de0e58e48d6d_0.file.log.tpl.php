<?php
/* Smarty version 3.1.39, created on 2021-04-18 15:23:24
  from 'C:\xampp\htdocs\xampp\Giera\sandbox\smarty\templates\log.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_607c32ccb5e5a1_40170294',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f6ff2cd5095cf8795d8a6d074c98de0e58e48d6d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\xampp\\Giera\\sandbox\\smarty\\templates\\log.tpl',
      1 => 1618747022,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_607c32ccb5e5a1_40170294 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\xampp\\Giera\\sandbox\\smarty\\libs\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>
<table class="table table-bordered">
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['logArray']->value, 'logLine');
$_smarty_tpl->tpl_vars['logLine']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['logLine']->value) {
$_smarty_tpl->tpl_vars['logLine']->do_else = false;
?>
        <tr>
            <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['logLine']->value['timestamp'],$_smarty_tpl->tpl_vars['config']->value['datetime']);?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['logLine']->value['sender'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['logLine']->value['message'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['logLine']->value['type'];?>
</td>
        </tr>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    
    </table><?php }
}
