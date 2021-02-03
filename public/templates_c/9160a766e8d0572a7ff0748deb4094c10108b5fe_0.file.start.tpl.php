<?php
/* Smarty version 3.1.34-dev-7, created on 2021-01-25 23:18:24
  from 'C:\XAMPP\htdocs\biblioteka\app\views\templates\start.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_600f43b073bac3_23708448',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9160a766e8d0572a7ff0748deb4094c10108b5fe' => 
    array (
      0 => 'C:\\XAMPP\\htdocs\\biblioteka\\app\\views\\templates\\start.tpl',
      1 => 1611612746,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_600f43b073bac3_23708448 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">

<head>
	<title>Witajcie w świecie książek!</title>
        <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	 <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/assets/css/main.css">
</head>

<body class="landing">
    
    <header id="header" class="alt">
        <h1><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
panel">Przejdź do panelu zarządzania</a></h1>
    
        <nav id="nav">
            <ul>
		<li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_root;?>
">Strona główna</a></li>
		<li><a href="#book">Wyszukaj</a></li>
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
    
<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1437042373600f43b0730133_19347791', 'top');
?>

                
<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1131937921600f43b07308c3_83534823', 'messages');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1717994870600f43b073aef9_95096342', 'bottom');
?>

                
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

</body>

</html><?php }
/* {block 'top'} */
class Block_1437042373600f43b0730133_19347791 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'top' => 
  array (
    0 => 'Block_1437042373600f43b0730133_19347791',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 <?php
}
}
/* {/block 'top'} */
/* {block 'messages'} */
class Block_1131937921600f43b07308c3_83534823 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'messages' => 
  array (
    0 => 'Block_1131937921600f43b07308c3_83534823',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<?php if ($_smarty_tpl->tpl_vars['msgs']->value->isError()) {?>
<div class="messages error bottom-margin">
	<ul>
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getErrors(), 'msg');
$_smarty_tpl->tpl_vars['msg']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
$_smarty_tpl->tpl_vars['msg']->do_else = false;
?>
	<li><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</li>
	<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	</ul>
</div>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['msgs']->value->isInfo()) {?>
<div class="messages info bottom-margin">
	<ul>
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getInfos(), 'msg');
$_smarty_tpl->tpl_vars['msg']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
$_smarty_tpl->tpl_vars['msg']->do_else = false;
?>
	<li><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</li>
	<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	</ul>
</div>
<?php }?>

<?php
}
}
/* {/block 'messages'} */
/* {block 'bottom'} */
class Block_1717994870600f43b073aef9_95096342 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'bottom' => 
  array (
    0 => 'Block_1717994870600f43b073aef9_95096342',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 <?php
}
}
/* {/block 'bottom'} */
}
