<?php
/* Smarty version 3.1.34-dev-7, created on 2021-02-03 20:03:37
  from 'C:\XAMPP\htdocs\biblioteka\app\views\LoginView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_601af3899c3941_67412414',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f1db590a9fb2df6acc439fddf891a8275f2ad101' => 
    array (
      0 => 'C:\\XAMPP\\htdocs\\biblioteka\\app\\views\\LoginView.tpl',
      1 => 1612379016,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_601af3899c3941_67412414 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1798943253601af3899bfa89_64642248', 'logowanie');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'logowanie'} */
class Block_1798943253601af3899bfa89_64642248 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'logowanie' => 
  array (
    0 => 'Block_1798943253601af3899bfa89_64642248',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<h2>Logowanie do systemu</h2>
<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
login" method="post" class="row uniform">
    <div class="container">
        <fieldset class="row uniform 100%">
            
            <div class="12u">
                Login: <br /><input id="id_login" type="text" name="login" placeholder=" Login" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->login;?>
" /><br />
            </div>
            <div class="12u">
                Hasło: <br /><input id="id_pass" type="password" name="pass" placeholder=" Hasło"/><br />
            </div>
            <div class="12u">
                <ul class="actions">
                    <li><input type="submit" value="Zaloguj" class="special" style="padding-bottom: 1.5em;"/></li>
                </ul>
            </div>
        </fieldset>
    </div>
</form>
<?php
}
}
/* {/block 'logowanie'} */
}
