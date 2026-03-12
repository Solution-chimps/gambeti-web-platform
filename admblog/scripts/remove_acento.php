<?php

// Função para tirar os acentos de uma string! pode ser adaptadas para outras coisas

function RemoveAcentos($Msg)
{

return strtr($Msg, "áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ","aaaaeeiooouucAAAAEEIOOOUUC");

}
// como usar
?>
