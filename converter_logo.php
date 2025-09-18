<?php
// Caminho da imagem original
$origem = __DIR__ . "/bsa_logo.png";  

// Caminho do arquivo convertido
$destino = __DIR__ . "/bsa_logo_rgb.png";  

// Tenta criar a imagem a partir do arquivo (funciona para PNG e JPG)
$img = @imagecreatefrompng($origem);
if (!$img) {
    $img = @imagecreatefromjpeg($origem);
}
if (!$img) {
    exit("Não foi possível abrir a imagem original.");
}

// Cria uma nova imagem em true color (força RGB)
$largura = imagesx($img);
$altura  = imagesy($img);
$nova = imagecreatetruecolor($largura, $altura);

// Mantém transparência se for PNG
imagealphablending($nova, false);
imagesavealpha($nova, true);

// Copia a imagem para o novo canvas RGB
imagecopy($nova, $img, 0, 0, 0, 0, $largura, $altura);

// Salva como PNG RGB
if (imagepng($nova, $destino)) {
    echo "Imagem convertida com sucesso: $destino";
} else {
    echo "Erro ao salvar a imagem convertida.";
}

// Libera memória
imagedestroy($img);
imagedestroy($nova);
?>
