<div id="divForm">

    <h3>Digite seu código de confirmação</h3>
    <p style="width: 350px; margin: 5px 0 21px; align-items: center;">Enviamos o código de verificação, por favor, acesse seu email e o digite a baixo:</p>
    <form method="POST" action="../controller/confirmarCodigo.php" id="form">
        <div class="divInput">
            <label for="codigoConfirmacao">Código</label>
            <input name="codigoConfirmacao" id="codigoConfirmacao" class="inputForm" type="text" placeholder="Digite seu código de confirmação...">
        </div>

        <input type="submit" value="Enviar" id="enviar" name="enviar">
    </form>
</div>