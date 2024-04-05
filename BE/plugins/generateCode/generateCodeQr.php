<?php
include('./phpqrcode/qrlib.php');
// $id = "12345";
// $email = "usuario@example.com";
// $codesDir = "../plugins/generateCode/codes/"; 

// // Llama a la función y guarda el resultado
// $qrFilePath = generateQRCode($id, $email, $codesDir);

// echo "El código QR se ha generado exitosamente: " . $qrFilePath;

function generarNombreArchivoQR($id) {
    $inicialesNombres = '';
    // $partesNombres = explode(' ', $nombres);
    // foreach ($partesNombres as $nombre) {
    //     $inicialesNombres .= $nombre[0];
    // }

    $nombreArchivo = $id.'.png';

    return $nombreArchivo;
}

function generateQrCode($id, $content){
    // $id = $_POST["id"];
    // $nombre = $_POST["nombre"];
    // $apellidoP = $_POST["apellidoP"];
    // $apellidoM = $_POST["apellidoM"];
    // $email = $_POST["email"];
    // $option = $_POST["option"];
    // $codesDir = "../path/to/qr/codes/"; // Ajusta la ruta según sea necesario.
    // $nombreArchivo = generarNombreArchivoQR($id, $nombre, $apellidoP, $apellidoM, $option);
    // $qrFilePath = $codesDir . $nombreArchivo;
    // QRcode::png($id, $qrFilePath, QR_ECLEVEL_L, 10, 2);
    // return $qrFilePath;

  
    $codesDir = "codes/";

    if (!file_exists($codesDir)) {
        mkdir($codesDir, 0777, true);
    }

    // Generar el nombre del archivo QR
    // $nombreArchivoQR = generarNombreArchivoQR($id);

    // Generar el código QR
    QRcode::png($content, $codesDir . $id.'.png', 'M', 5); // ECC = 'M', Tamaño = 5 //Tamano predeterminado para el QR

    // // Enviar el correo con el código QR
    if(file_exists($codesDir . $id.'.png')) {
        echo'Se generó el código QR exitosamente.';
    } else {
        echo 'Error al generar el código QR.';
    }
}


?>
