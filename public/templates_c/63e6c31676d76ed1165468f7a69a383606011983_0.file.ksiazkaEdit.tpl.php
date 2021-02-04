<?php
/* Smarty version 3.1.34-dev-7, created on 2021-02-04 15:41:33
  from 'C:\XAMPP\htdocs\biblioteka\app\views\ksiazkaEdit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_601c079d9568a7_78742542',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '63e6c31676d76ed1165468f7a69a383606011983' => 
    array (
      0 => 'C:\\XAMPP\\htdocs\\biblioteka\\app\\views\\ksiazkaEdit.tpl',
      1 => 1612445202,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_601c079d9568a7_78742542 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2067182870601c079d94f2e9_71899045', 'edycja');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'edycja'} */
class Block_2067182870601c079d94f2e9_71899045 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'edycja' => 
  array (
    0 => 'Block_2067182870601c079d94f2e9_71899045',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="bottom-margin">
    <h2>Specyfikacja książki</h2>
    <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
zapiszKsiazka" method="post" class="row uniform 100%">
        <fieldset>
            <div class="6u 12u">
                <label for="kategoria">Kategoria</label>
                <input id="kategoria" type="text" placeholder=" KATEGORIA" name="kategoria" value=" <?php echo $_smarty_tpl->tpl_vars['form']->value->kategoria;?>
">
            </div>
            <div class="6u 12u">
                <label for="tytul">Tytuł</label>
                <input id="tytul" type="text" placeholder=" TYTUŁ" name="tytul" value=" <?php echo $_smarty_tpl->tpl_vars['form']->value->tytul;?>
">
            </div>
            <div class="6u 12u">
                <label for="nazwisko_autora">Nazwisko Autora</label>
                <input id="nazwisko_autora" type="text" placeholder=" NAZWISKO AUTORA" name="nazwisko_autora" value=" <?php echo $_smarty_tpl->tpl_vars['form']->value->nazwisko_autora;?>
">
            </div>
            <div class="6u 12u">
                <label for="imie_autora">Imię Autora</label>
                <input id="imie_autora" type="text" placeholder=" IMIĘ AUTORA" name="imie_autora" value=" <?php echo $_smarty_tpl->tpl_vars['form']->value->imie_autora;?>
">
            </div>
            <div class="6u 12u">
                <label for="czy_dostepna">Czy dostępna [T/N]</label>
                <input id="czy_dostepna" type="text" name="czy_dostepna" value=" <?php echo $_smarty_tpl->tpl_vars['form']->value->czy_dostepna;?>
">
            </div>
            <div class="actions">
          	<input type="submit" class="special small" value="Zapisz"/>
		<a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
listaKsiazka" class="button small">Powrót</a>
            </div>
	</fieldset>
        <input type="hidden" name="id_ksiazki" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->id_ksiazki;?>
">
    </form>	
</div>

<?php
}
}
/* {/block 'edycja'} */
}
