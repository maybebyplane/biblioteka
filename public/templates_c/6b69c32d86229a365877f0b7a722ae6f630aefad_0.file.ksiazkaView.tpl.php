<?php
/* Smarty version 3.1.34-dev-7, created on 2021-02-04 17:05:22
  from 'C:\XAMPP\htdocs\biblioteka\app\views\ksiazkaView.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_601c1b42196606_58676689',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6b69c32d86229a365877f0b7a722ae6f630aefad' => 
    array (
      0 => 'C:\\XAMPP\\htdocs\\biblioteka\\app\\views\\ksiazkaView.tpl',
      1 => 1612454720,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_601c1b42196606_58676689 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1506845653601c1b4217d366_84112388', 'top');
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1045489244601c1b42187f53_14971417', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'top'} */
class Block_1506845653601c1b4217d366_84112388 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_1506845653601c1b4217d366_84112388',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<h2>Wyszukiwanie książek</h2>
<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
listaKsiazka" method="post">
    <div class="row uniform 50%">
        	<div class="6u 12u">
            <input type="text" name="tytul" value="<?php echo $_smarty_tpl->tpl_vars['searchForm']->value->tytul;?>
" placeholder=" Podaj tytuł książki" /><br />
        </div>
        <div class="12u">
            <ul class="actions">
		<li><input type="submit" value="Szukaj" class="special small" /></li>
                &nbsp;
                <?php if (count($_smarty_tpl->tpl_vars['conf']->value->roles) > 0) {?>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
dodajKsiazka" class="button small">Dodaj książkę do zasobów</a></li>
                <?php }?>
            </ul>
        </div>
    </div>
    
</form>	
</div>
<?php
}
}
/* {/block 'top'} */
/* {block 'content'} */
class Block_1045489244601c1b42187f53_14971417 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1045489244601c1b42187f53_14971417',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
   
<div id="k" name='k' class="table-wrapper">
    <table class="alt">
        <thead>
            <tr>
                <?php if (count($_smarty_tpl->tpl_vars['conf']->value->roles) > 0) {?>
                <th>ID</th>
                <?php }?>
                <th>Tytuł</th>
                <th>Nazwisko Autora</th>
                <th>Imię Autora</th>
                <th>Kategoria</th>
                <th>Dostepna</th>
                <?php if (count($_smarty_tpl->tpl_vars['conf']->value->roles) > 0) {?>
                    <th>Opcje</th>
                <?php }?>
            </tr>   
        </thead>

        <tbody>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ksiazka']->value, 'k');
$_smarty_tpl->tpl_vars['k']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['k']->value) {
$_smarty_tpl->tpl_vars['k']->do_else = false;
?>
        <tr><?php if (count($_smarty_tpl->tpl_vars['conf']->value->roles) > 0) {?><td><?php echo $_smarty_tpl->tpl_vars['k']->value["ID_ksiazki"];?>
</td><?php }?><td><?php echo $_smarty_tpl->tpl_vars['k']->value["tytul"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['k']->value["nazwisko_autora"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['k']->value["imie_autora"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['k']->value["kategoria"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['k']->value["czy_dostepna"];?>
</td><?php if (count($_smarty_tpl->tpl_vars['conf']->value->roles) > 0) {?><td><ul class="actions small"><li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
edytujKsiazka?id_ksiazki=<?php echo $_smarty_tpl->tpl_vars['k']->value["ID_ksiazki"];?>
" class="button special small">Edytuj</a></li>&nbsp;<li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
usunKsiazka?id_ksiazki=<?php echo $_smarty_tpl->tpl_vars['k']->value["ID_ksiazki"];?>
" class="button small">Usuń</a></li>&nbsp;<?php if ($_smarty_tpl->tpl_vars['k']->value["czy_dostepna"] == 'T') {?>                             <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
wypozyczKsiazka?id_ksiazki=<?php echo $_smarty_tpl->tpl_vars['k']->value["ID_ksiazki"];?>
" class="button alt small">Wypożycz</a></li><?php }?></ul></td><?php }?></tr>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </tbody>           
    </table>
</div>
<?php
}
}
/* {/block 'content'} */
}
