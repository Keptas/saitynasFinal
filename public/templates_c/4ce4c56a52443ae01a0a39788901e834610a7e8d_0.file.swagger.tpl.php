<?php
/* Smarty version 4.1.0, created on 2022-06-06 09:20:45
  from 'C:\xampp\htdocs\restful\app\views\swagger.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_629daacd1e1888_25931822',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4ce4c56a52443ae01a0a39788901e834610a7e8d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\restful\\app\\views\\swagger.tpl',
      1 => 1654499953,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_629daacd1e1888_25931822 (Smarty_Internal_Template $_smarty_tpl) {
?><style>
    <?php echo $_smarty_tpl->tpl_vars['sheet1']->value;?>

    <?php echo $_smarty_tpl->tpl_vars['sheet2']->value;?>

</style>

<head>
    <meta charset="UTF-8">
    <title>Swagger UI</title>
</head>

<body>
    <div id="swagger-ui"></div>
</body>

<?php echo '<script'; ?>
>
    <?php echo $_smarty_tpl->tpl_vars['js1']->value;?>

    <?php echo $_smarty_tpl->tpl_vars['js2']->value;?>

    <?php echo $_smarty_tpl->tpl_vars['js3']->value;?>

<?php echo '</script'; ?>
>
<?php }
}
