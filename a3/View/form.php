<h1>Cadastro de produto</h1>


<p> Inclua as informações do produto abaixo</p>
<form method="post" action="#">
    <label for="nomeProduto">Nome do produto: </label>


    <input type="text" id="nomeProduto" name="nomeProduto" placeholder="Insira o nome do produto."
           maxlength="100"
           <?php
           if (isset($_POST["nomeProduto"])) {
               echo  'value="';
               echo  $processamentoFormulario->sanitize($_POST["nomeProduto"]);
               echo  '"';
           }
           ?>>
    <span class="mensagemDeErro" id="erro_nomeProduto">
<?php
if (isset($processamentoFormulario->erro_nomeProduto)) {
    $processamentoFormulario->mensagemDeErro($processamentoFormulario->erro_nomeProduto);
}
?>
</span>
    <br>


    <label for="descricao">Descrição do produto: </label>


    <input type="text" id="descricao" name="descricao" placeholder="Insira a descrição do produto"
           maxlength="255"
           <?php
           if (isset($_POST["descricao"])) {
               echo  'value="';
               echo $processamentoFormulario->sanitize($_POST["descricao"]);
               echo  '"';
           }
           ?>> <br>
    <span class="mensagemDeErro" id="erro_descricao">
<?php
if (isset($processamentoFormulario->erro_descricao)) {
    $processamentoFormulario->mensagemDeErro($processamentoFormulario->erro_descricao);
}
?>
</span>


    <label for="valor" name="valor">Valor do produto: </label>


    <input type="text" id="valor" name="valor" placeholder="Insira o valor do produto em R$"
           <?php
           if (isset($_POST["valor"])) {
               echo  'value="';
               echo $processamentoFormulario->sanitize($_POST["valor"]);
               echo  '"';
           }
           ?>> <br>
    <span class="mensagemDeErro" id="erro_valor">
<?php
if (isset($processamentoFormulario->erro_valor)) {
    $processamentoFormulario->mensagemDeErro($processamentoFormulario->erro_valor);
}
?>
</span>


    <label for="fornecedor">Fornecedor:</label>


    <input type="text" id="fornecedor" name="fornecedor" placeholder="Insira o nome do fornecedor"
           maxlength="100"
          <?php
           if (isset($_POST["fornecedor"])) {
               echo  'value="';
               echo  $processamentoFormulario->sanitize($_POST["fornecedor"]);
               echo '"';
           }
           ?>> <br>
    <span class="mensagemDeErro" id="erro_fornecedor">
<?php
if (isset($processamentoFormulario->erro_fornecedor)) {
    $processamentoFormulario->mensagemDeErro($processamentoFormulario->erro_fornecedor);
}
?>
    </span>


    <input type="submit" name="submit" value="Cadastrar" id="submit">
</form>