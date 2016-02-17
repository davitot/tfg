<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">

    <!--<head> -->
    <head>
        <meta charset="utf-8" />
        <title>{$titulo|default:"Sin titulo"}</title>       
        <meta content="{$_layoutParams.configs.app_name}" name="author" />
        <meta content="TFG _ UCAVILA" name="description" />
        <meta content="migracion, proyecto, gestion" name="keywords" />
        <link href="{$_layoutParams.ruta_css}reset.css" rel="stylesheet" type="text/css" />              
        <link href="{$_layoutParams.ruta_css}estilos.css" rel="stylesheet" type="text/css" />  
        <script type="text/javascript">
            var _root_ = '{$_layoutParams.root}';
        </script>
        <script src="{$_layoutParams.ruta_js}jquery-1.7.2.min.js" type="text/javascript"></script>                 
        <script src="{$_layoutParams.ruta_js}bootstrap.min.js" type="text/javascript"></script>                          
    </head>   
    <!--</head> -->

    <!--<body> -->
    <body>
        <!--<header> -->
        <header>                       
            <div id="tituloIndex">
                {if Session::get('autenticado')}                                                            
                    <h1>{$_layoutParams.configs.app_name}</h1>  
                    <p>Gestión de Proyecto</p>
                {else}
                    <h1>Inicie sesión</h1>
                {/if}                 
            </div>

            {if !Session::get('autenticado')}                        
                <div id="menuLogin">
                    <form name="form1" method="post" action="{$_layoutParams.root}login">           
                        <input type="hidden" value="1" name="enviar" />       
                        <table>
                            <tr>           
                                <td>                
                                    <input type="text" name="usuario" id="campoLogin" value="{$datos.usuario|default:""}" placeholder="Usuario"/>                        
                                    <img id="imgLogin_user" src="{$_layoutParams.ruta_img}menu/mailicon.png" alt="Usuario"/>
                                </td>
                                <td>                
                                    <input type="password" id="campoLogin" name="pass" placeholder="Password"/>
                                    <img id="imgLogin_password" src="{$_layoutParams.ruta_img}menu/passicon.png" alt="Password"/>
                                </td>
                                <td>&nbsp;</td>
                                <td>
                                    <input type="submit" value="Entrar" id="botonLogin"/>
                                </td>                                
                        </table>
                    </form>           
                </div>
            {else}     
                <div id="menuUp">
                    <table align="center">
                        {if isset($_layoutParams.menu)}
                            <tr>
                                {foreach item=it from=$_layoutParams.menu}
                                    {if isset($_layoutParams.item) && $_layoutParams.item == $it.id}
                                        {assign var="_item_style" value='current'}
                                    {else}
                                        {assign var="_item_style" value=''}
                                    {/if}
                                    <td><a class="{$_item_style}" href="{$it.enlace}"><img id='imgMenu' src="{$_layoutParams.ruta_img}menu/{$it.imagen}.png" alt="{$it.titulo}" /></a></td>                                                       
                                    {/foreach}
                                <td>                            
                                    <img src="{$_layoutParams.root}modules/personal/views/index/img/personal/{Session::get('imagen')}" alt="Foto"/>
                                </td>
                            </tr>
                            <tr>
                                {foreach item=it from=$_layoutParams.menu}
                                    <td>{$it.titulo}</td>                                                       
                                {/foreach}
                                <td><i class="usuario" id="usuario">{Session::get('usuario')}</i></td>
                            </tr>
                        {/if}
                    </table>
                {/if}  
            </div>
        </header>
        <!--</header> -->                                            
        <!--<main> -->
        <article>            
            <noscript><p>Para el correcto funcionamiento debe tener el soporte de javascript habilitado</p></noscript>
            <!-- Muestra mensaje de error si existe -->
            {if isset($_error)}
                    <div id="_errl" class="alert alert-error">
                        <a class="close" data-dismiss="alert">x</a>
                        {$_error}
                    </div>
                {/if}

                {if isset($_mensaje)}
                    <div id="_msgl" class="alert alert-success">
                        <a class="close" data-dismiss="alert">x</a>
                        {$_mensaje}
                    </div>
                {/if}

            <!-- Muestra la parte de contenido segun la seccion llamada -->
            {include file=$_contenido}
            <!-- parte de contenido -->
        </article>
        <!--</main> -->       
        {if isset($_layoutParams.js_plugin) && count($_layoutParams.js_plugin)}
            {foreach item=plg from=$_layoutParams.js_plugin}
                <script src="{$plg}" type="text/javascript"></script>
            {/foreach}
        {/if}

        {if isset($_layoutParams.js) && count($_layoutParams.js)}
            {foreach item=js from=$_layoutParams.js}
                <script src="{$js}" type="text/javascript"></script>
            {/foreach}
        {/if}                    
    </body>
    <!--</body> -->
    <!--</footer> -->
    <footer>
        {$_layoutParams.configs.app_company} ~ {$_layoutParams.configs.app_slogan} ~ Copyright &copy; 2015 
    </footer>
    <!--</footer> -->
</html>