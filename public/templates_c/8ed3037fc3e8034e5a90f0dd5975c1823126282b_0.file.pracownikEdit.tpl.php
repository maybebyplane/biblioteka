<?php
/* Smarty version 3.1.34-dev-7, created on 2021-02-04 23:15:20
  from 'C:\XAMPP\htdocs\biblioteka\app\views\pracownikEdit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_601c71f86b7776_05462828',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8ed3037fc3e8034e5a90f0dd5975c1823126282b' => 
    array (
      0 => 'C:\\XAMPP\\htdocs\\biblioteka\\app\\views\\pracownikEdit.tpl',
      1 => 1612476917,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_601c71f86b7776_05462828 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1375398735601c71f86b1a07_45776930', 'edycja');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'edycja'} */
class Block_1375398735601c71f86b1a07_45776930 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'edycja' => 
  array (
    0 => 'Block_1375398735601c71f86b1a07_45776930',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="bottom-margin">
    <h2>Specyfikacja książki</h2>
    <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
zapiszPracownik" method="post" class="row uniform 100%">
        <fieldset>
            <div class="6u 12u">
                <label for="nazwisko">Nazwisko</label>
                <input id="nazwisko" type="text" placeholder="NAZWISKO" name="nazwisko" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->nazwisko;?>
">
            </div>
            <div class="6u 12u">
                <label for="imie">Imię</label>
                <input id="imie" type="text" placeholder="IMIĘ" name="imie" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->imie;?>
">
            </div>
            <div class="6u 12u">
                <label for="login">LOGIN</label>
                <input id="login" type="text" placeholder="LOGIN" name="login" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->login;?>
">
            </div>
            <div class="6u 12u">
                <label for="pass">Hasło</label>
                <input id="pass" type="password" placeholder="HASŁO" name="pass" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->pass;?>
">
            </div>
            <div class="actions">
          	<input type="submit" class="special small" value="Zapisz"/>
		<a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
listaPracownik" class="button small">Powrót</a>
            </div>
	</fieldset>
        <input  type="hidden" name="id_pracownika" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->id_pracownika;?>
">
    </form>	
</div>

<?php
}
}
/* {/block 'edycja'} */
}
