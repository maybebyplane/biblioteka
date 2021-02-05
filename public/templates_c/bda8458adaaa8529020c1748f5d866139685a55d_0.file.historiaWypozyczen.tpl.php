<?php
/* Smarty version 3.1.34-dev-7, created on 2021-02-05 19:57:08
  from 'C:\XAMPP\htdocs\biblioteka\app\views\historiaWypozyczen.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_601d95048e6a78_07752616',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bda8458adaaa8529020c1748f5d866139685a55d' => 
    array (
      0 => 'C:\\XAMPP\\htdocs\\biblioteka\\app\\views\\historiaWypozyczen.tpl',
      1 => 1612551290,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_601d95048e6a78_07752616 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1045184269601d95048d8a03_26416036', 'top');
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1642882148601d95048dc4d4_95736675', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'top'} */
class Block_1045184269601d95048d8a03_26416036 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_1045184269601d95048d8a03_26416036',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    
    <h2>Historia wypożyczeń</h2>
    <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
listaWypozyczen" method="post">
        <div class="row uniform 50%">
            <div class="6u 12u">
                <input type="text" name="id_ksiazki" value="<?php echo $_smarty_tpl->tpl_vars['searchForm']->value->id_ksiazki;?>
" placeholder=" Wpisz ID książki, której szukasz:" /><br />
            </div>
            <div class="12u">
                <ul class="actions">
                    <li><input type="submit" value="Szukaj" class="special small" /></li>
                </ul>
            </div>
        </div>
    </form>	

<?php
}
}
/* {/block 'top'} */
/* {block 'content'} */
class Block_1642882148601d95048dc4d4_95736675 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1642882148601d95048dc4d4_95736675',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 
    
    <div id="w" name='w' class="table-wrapper">
        <table class="alt">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Data wypożyczenia</th>
                    <th>Data zwrotu</th>
                    <th>ID Książki</th>
                    <th>ID Czytelnika</th>
                    <th>ID Pracownika</th>
                    <th>Opcje</th>
                </tr>   
            </thead>

            <tbody>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['wypozyczenie']->value, 'w');
$_smarty_tpl->tpl_vars['w']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['w']->value) {
$_smarty_tpl->tpl_vars['w']->do_else = false;
?>
                    <tr><td><?php echo $_smarty_tpl->tpl_vars['w']->value["ID_wypozyczenia"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['w']->value["data_wypozyczenia"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['w']->value["data_oddania"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['w']->value["ID_ksiazki"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['w']->value["ID_czytelnika"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['w']->value["ID_pracownika"];?>
</td><td><?php if ($_smarty_tpl->tpl_vars['w']->value["data_oddania"] == '') {?><ul class="actions small"><li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
zwrocKsiazka?id_wypozyczenia=<?php echo $_smarty_tpl->tpl_vars['w']->value["ID_wypozyczenia"];?>
" class="button alt small">ZWRÓĆ</a></li></ul><?php }?></td></tr>
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
