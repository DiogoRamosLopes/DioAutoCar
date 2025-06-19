<form method="POST" enctype="multipart/form-data">
  <input type="file" name="arquivo">
  <button type="submit">Enviar</button>
</form>

<?php
if ($_FILES) {
  if (move_uploaded_file($_FILES['arquivo']['tmp_name'], 'img/' . $_FILES['arquivo']['name'])) {
    echo "Upload feito com sucesso!";
  } else {
    echo "Erro no upload.";
  }
}
?>
