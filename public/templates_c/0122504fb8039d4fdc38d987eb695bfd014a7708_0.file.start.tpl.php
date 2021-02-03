<?php
/* Smarty version 3.1.34-dev-7, created on 2021-01-27 01:56:59
  from 'C:\XAMPP\htdocs\biblioteka\app\views\start.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_6010ba5b494581_98845845',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0122504fb8039d4fdc38d987eb695bfd014a7708' => 
    array (
      0 => 'C:\\XAMPP\\htdocs\\biblioteka\\app\\views\\start.tpl',
      1 => 1611709016,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6010ba5b494581_98845845 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">

<head>
	<title>Witajcie w świecie książek!</title>
        <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/css/main.css" /> 
</head>

<body class="landing">
    
    <header id="header" class="alt">
        <?php if ((isset($_smarty_tpl->tpl_vars['conf']->value->roles['0']))) {?>
        <h1><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
panel">Przejdź do panelu zarządzania</a></h1>
        <?php }?>
        <nav id="nav">
            <ul>
		<li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_root;?>
">Strona główna</a></li>
		<li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
wyszukajKsiazke">Wyszukaj</a></li>
                <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
login">Zaloguj</a></li>
                
            </ul>
	</nav>
    </header>
    
    <section id="banner" class="hidden">
	<h2>Dzień dobry!</h2>
            <p>Przenieś się razem z nami <br /> w bezkresny świat książek.</p>
		<ul class="actions">
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
wyszukajKsiazke" class="button special icon fa-arrow-down">Wyszukaj książkę</a></li>
		</ul>
    </section>
<div id="log">
   <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6310047316010ba5b487270_56616677', 'top');
?>
 
</div>
                
                
<div id="szukaj" class="wrapper style3 special">
<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10098540956010ba5b487c12_74478360', 'szukaj');
?>
  
</div>




<div class="container" style="margin-top: 3em;">         
<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17177542776010ba5b4882a5_18646249', 'messages');
?>

</div>
 
    
<!-- Footer -->
<footer id="footer">
    <div class="container">
        <ul class="copyright">
            <li>&copy; Untitled</li>
            <li>Design: <a href="http://templated.co">TEMPLATED</a></li>
            <li>Images: <a href="http://www.canva.com">Canva</a></li>
            <li>Made by: Dominika Pałyz</li>
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
start">Strona główna</a></li>
        </ul>
    </div>
</footer>
        
<!-- Scripts -->
<?php echo '<script'; ?>
 src="assets/js/jquery.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="assets/js/skel.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="assets/js/util.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="assets/js/main.js"><?php echo '</script'; ?>
>   

</body>

</html><?php }
/* {block 'top'} */
class Block_6310047316010ba5b487270_56616677 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_6310047316010ba5b487270_56616677',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 <?php
}
}
/* {/block 'top'} */
/* {block 'szukaj'} */
class Block_10098540956010ba5b487c12_74478360 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'szukaj' => 
  array (
    0 => 'Block_10098540956010ba5b487c12_74478360',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 <?php
}
}
/* {/block 'szukaj'} */
/* {block 'messages'} */
class Block_17177542776010ba5b4882a5_18646249 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'messages' => 
  array (
    0 => 'Block_17177542776010ba5b4882a5_18646249',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php if ($_smarty_tpl->tpl_vars['msgs']->value->isError()) {?>
<div>
	<ul>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getMessages(), 'msg');
$_smarty_tpl->tpl_vars['msg']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
$_smarty_tpl->tpl_vars['msg']->do_else = false;
?>
                <li><?php echo $_smarty_tpl->tpl_vars['msg']->value->text;?>
</li>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	</ul>
</div>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['msgs']->value->isInfo()) {?>
<div>
	<ul>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getMessages(), 'msg');
$_smarty_tpl->tpl_vars['msg']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
$_smarty_tpl->tpl_vars['msg']->do_else = false;
?>
                <li><?php echo $_smarty_tpl->tpl_vars['msg']->value->text;?>
</li>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	</ul>
</div>
<?php }
}
}
/* {/block 'messages'} */
}
