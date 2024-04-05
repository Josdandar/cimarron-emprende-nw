<?php
include("../conection.php");

include("../plugins/generateCode/generateCodeQr.php"); // Incluye el archivo que contiene la función para generar el código QR
// require_once '../plugins/generateCode/phpqrcode'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["id"], $_POST["nombre"], $_POST["apellidoP"], $_POST["apellidoM"], $_POST["email"], $_POST["option"])) {
        $id = $_POST["id"];
        $nombre = $_POST["nombre"];
        $apellidoP = $_POST["apellidoP"];
        $apellidoM = $_POST["apellidoM"];
        $email = $_POST["email"];
        $option = $_POST["option"];
        
        $stmt = $conn->prepare("INSERT INTO usuarios (iduabc, name, lastname, middlename, email,type) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $id, $nombre, $apellidoP, $apellidoM, $email, $option);
        generateQRCode($id, $email);

        if ($stmt->execute() === TRUE) {
            // Una vez insertados los datos correctamente, genera el código QR
            // Define el directorio donde se guardarán los códigos QR. Asegúrate de que este directorio exista y tenga permisos de escritura.
            // $codesDir = "../path/to/qr/codes/"; // Ajusta la ruta según sea necesario.
            // Llama a la función para generar el código QR
            // $qrFilePath = 
            // Asumiendo que deseas enviar la ruta del archivo QR generado en la respuesta
            echo json_encode(array("success" => true));
        } else {
            echo json_encode(array("success" => false, "error" => "Error al insertar los datos en la base de datos."));
        }
        
        $stmt->close();
        $conn->close();
        
        exit();
    }
}
?>
