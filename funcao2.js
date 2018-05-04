// Fun��o que verifica se o navegador tem suporte AJAX 
function AjaxF()
{
    var ajax;
    
    try
    {
        ajax = new XMLHttpRequest();
    } 
    catch(e) 
    {
        try
        {
            ajax = new ActiveXObject("Msxml2.XMLHTTP");
        }
        catch(e) 
        {
            try 
            {
                ajax = new ActiveXObject("Microsoft.XMLHTTP");
            }
            catch(e) 
            {
                alert("Seu browser não da suporte à AJAX!");
                return false;
            }
        }
    }
    return ajax;
}

// Fun��o que faz as requisi��o Ajax ao arquivo PHP
function AlteraConteudo2(ID, horario, total, lotacao, total2, entidade, data, sala, assunto, conciliador, intervalo_ini, intervalo_fim)
{
    var ajax = AjaxF();    
    
    ajax.onreadystatechange = function(){
        if(ajax.readyState === 4)
        {
            document.getElementById('conteudo').innerHTML = ajax.responseText;
        }
    };
    
    var dados="id=" + ID + "&horario=" + horario + "&total=" + total + "&total_disponivel=" + total2 + "&entidade=" + entidade +  "&data=" + data + "&sala=" + sala + "&assunto=" + assunto + "&conciliador=" + conciliador + "&intervalo_ini=" + intervalo_ini + "&intervalo_fim=" + intervalo_fim;    
    ajax.open("GET", "listar.php?"+dados, false);
    ajax.setRequestHeader("Content-Type", "text/html");
    ajax.send();
}

function iFrame(ID, horario, total, lotacao, total2, entidade, data, sala, assunto, conciliador, intervalo_ini, intervalo_fim)
{
    var ajax = AjaxF();    
    
    ajax.onreadystatechange = function(){
        if(ajax.readyState === 4)
        {
            document.getElementById('conteudo').innerHTML = ajax.responseText;
        }
    };
    
    var dados="id=" + ID + "&horario=" + horario + "&total=" + total + "&total_disponivel=" + total2 + "&entidade=" + entidade +  "&data=" + data + "&sala=" + sala + "&assunto=" + assunto + "&conciliador=" + conciliador + "&intervalo_ini=" + intervalo_ini + "&intervalo_fim=" + intervalo_fim;    
    ajax.open("GET", "iframe_listar.php?"+dados, false);
    ajax.setRequestHeader("Content-Type", "text/html");
    ajax.send();
}


function Editar(ID, horario,duracao, total, lotacao, total_disponivel, entidade, data, sala, assunto, conciliador)
{
    var ajax = AjaxF();    
    
    ajax.onreadystatechange = function(){
        if(ajax.readyState === 4)
        {
            document.getElementById('conteudo').innerHTML = ajax.responseText;
        }
    };
    
    var dados="id=" + ID + "&horario=" + horario + "&duracao=" + duracao + "&total=" + total + "&lotacao=" + lotacao + "&total_disponivel=" + total_disponivel + "&entidade=" + entidade + "&data=" + data + "&sala=" + sala + "&assunto=" + assunto + "&conciliador=" + conciliador;   
    ajax.open("GET", "editar_pauta.php?"+dados, false);
    ajax.setRequestHeader("Content-Type", "text/html");
    ajax.send();
}