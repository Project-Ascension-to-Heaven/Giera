<?php
/* Smarty version 3.1.39, created on 2021-04-17 19:36:21
  from 'D:\xampp\htdocs\Giera\sandbox\smarty\templates\log.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_607b1c95b61599_80633039',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8dc8b189ce8463c48856f511b20340c8f6b47b18' => 
    array (
      0 => 'D:\\xampp\\htdocs\\Giera\\sandbox\\smarty\\templates\\log.tpl',
      1 => 1618680978,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_607b1c95b61599_80633039 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'D:\\xampp\\htdocs\\Giera\\sandbox\\smarty\\libs\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
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
