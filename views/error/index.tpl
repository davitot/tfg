<header
    <div id="mensaje">     
        <h2>{if isset($mensaje)} {$mensaje}{/if}</h2>
    </div> 
</header>

<div id="imgWarnign"> 

    {if (!Session::get('autenticado'))}
        <br>
        <br>        
        <h2>
            Intente iniciar sesion antes de continuar
        </h2>
        <br>
        <br>        
    {/if}
    <a href="{$_layoutParams.root}"><img src="{$_layoutParams.root}views/acl/img/warning.png" alt="Advertencia"></a>
</div>    
