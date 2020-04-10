<?php
class BobDemo {
	/* 
	$conexion_tabla = new mysqli("localhost","arc38mix74_archivoMixtli","Pr3s3rv4d1g1t4l","arc38mix74_preservacion");
	new mysqli("localhost", "usuario", "contrase�a", "basedatos");
	$conexion_tabla -> set_charset("utf8");
	*/

    const DB_HOST = 'localhost';
    const DB_NAME = 'arc38mix74_preservacion';
    const DB_USER = 'arc38mix74_archivoMixtli';
    const DB_PASSWORD = 'Pr3s3rv4d1g1t4l';

    /**
     * PDO instance
     * @var PDO 
     */
    private $pdo = null;

    /**
     * Open the database connection
     */
    public function __construct() {
        // open database connection
        $conStr = sprintf("mysql:host=%s;dbname=%s;charset=utf8", self::DB_HOST, self::DB_NAME);

        try {
            $this->pdo = new PDO($conStr, self::DB_USER, self::DB_PASSWORD);
            //for prior PHP 5.3.6
            //$conn->exec("set names utf8");
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * insert blob into the files table
     * @param string $filePath
     * @param string $mime mimetype
     * @return bool
     */
    public function insertBlob($fileName, $filePath, $mime) {
        $blob = fopen($filePath, 'rb');

        $sql = "INSERT INTO files(name, mime,data) VALUES(:name, :mime,:data)";
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(':name', $fileName);
        $stmt->bindParam(':mime', $mime);
        $stmt->bindParam(':data', $blob, PDO::PARAM_LOB);

        return $stmt->execute();
    }

    /**
     * update the files table with the new blob from the file specified
     * by the filepath
     * @param int $id
     * @param string $filePath
     * @param string $mime
     * @return bool
     */
    function updateBlob($id, $filePath, $mime) {

        $blob = fopen($filePath, 'rb');

        $sql = "UPDATE files
                SET mime = :mime,
                    data = :data
                WHERE id = :id;";

        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(':mime', $mime);
        $stmt->bindParam(':data', $blob, PDO::PARAM_LOB);
        $stmt->bindParam(':id', $id);

        return $stmt->execute();
    }

    /**
     * select data from the the files
     * @param int $id
     * @return array contains mime type and BLOB data
     */
    public function selectBlob($id) {

        $sql = "SELECT mime,
                        data
                   FROM files
                  WHERE id = :id;";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array(":id" => $id));
        $stmt->bindColumn(1, $mime);
        $stmt->bindColumn(2, $data, PDO::PARAM_LOB);

        $stmt->fetch(PDO::FETCH_BOUND);

        return array("mime" => $mime,
            "data" => $data);
    }

    public function selectAllBlob() {
        $sql = "SELECT id, mime, data FROM files;";
		$stmt = $this->pdo->query($sql);

		while ($row = $stmt->fetch()) {
            echo "<p> ID: ".$row['id']." type: ".$row['mime']."</p>\n";
            echo "<img src='data:image/jpg;base64,".base64_encode($row['data'])." ' alt=''> <br />\n";
		}
    }

    public function showAllColecciones2() {
        $sql = "SELECT id, id_origen, id_asignado, coleccion, autor, usuario, grupo,serie, fecha, lugar, 
                       descripcion_serie, descriptores, personajes, descripcion_img, publicacion, img 
                FROM items2;";
		$stmt = $this->pdo->query($sql);

		while ($row = $stmt->fetch()) {
            echo "<p> ID: ".$row['id']."</p>\n";
            echo "<p> id_origen: ".$row['id_origen']."</p>\n";
            echo "<p> id_asignado: ".$row['id_asignado']."</p>\n";
            echo "<p> colección: ".$row['coleccion']."</p>\n";
            echo "<p> Autor: ".$row['autor']."</p>\n";
            echo "<p> Usuario: ".$row['usuario']."</p>\n";
            echo "<p> Grupo: ".$row['grupo']."</p>\n";
            echo "<p> Serie: ".$row['serie']."</p>\n";
            echo "<p> Fecha: ".$row['fecha']."</p>\n";
            echo "<p> Lugar: ".$row['lugar']."</p>\n";
            echo "<p> Descripción de la serie: ".$row['descripcion_serie']."</p>\n";
            echo "<p> Descriptores: ".$row['descriptores']."</p>\n";
            echo "<p> Personajes: ".$row['personales']."</p>\n";
            echo "<p> Descripción de la imágen: ".$row['descripcion_img']."</p>\n";
            echo "<p> Fecha de publicación: ".$row['publicacion']."</p>\n";
            echo "<img src='data:image/jpg;base64,".base64_encode($row['img'])." ' alt=''> <br />\n";
		}
    }



    /**
     * close the database connection
     */
    public function __destruct() {
        // close the database connection
        $this->pdo = null;
    }

}


function listarArchivos( $path ){
    // Abrimos la carpeta que nos pasan como par�metro
    $dir = opendir($path);
    // Leo todos los ficheros de la carpeta
    while ($elemento = readdir($dir)){
        // Tratamos los elementos . y .. que tienen todas las carpetas
        if( $elemento != "." && $elemento != ".."){
            // Si es una carpeta
            if( is_dir($path.$elemento) ){
                // Muestro la carpeta
                echo "<p><strong>CARPETA: ". $elemento ."</strong></p>";
            // Si es un fichero
            } else {
                // Muestro el fichero
                echo "<br />". $elemento . " type: ".mime_content_type($path.$elemento);
            }
        }
    }
}
// Llamamos a la función para que nos muestre el contenido de la carpeta gallery
// listarArchivos("imagenes/");


function agregarArchivos( $path ){
	$blobObj = new BobDemo();
    // Abrimos la carpeta que nos pasan como par�metro
    $dir = opendir($path);
    // Leo todos los ficheros de la carpeta
    while ($elemento = readdir($dir)){
        // Tratamos los elementos . y .. que tienen todas las carpetas
        if( $elemento != "." && $elemento != ".."){
            // Si es una carpeta
            if( is_dir($path.$elemento) ){
                // Muestro la carpeta
                echo "<p><strong>CARPETA: ". $elemento ."</strong></p>";
            // Si es un fichero
            } else {
                // Muestro el fichero
                echo "<br />". $elemento . " type: ".mime_content_type($path.$elemento);
				// Agrego el fichero
				$archivo = $path.$elemento;
				$blobObj->insertBlob($elemento,$archivo,mime_content_type($archivo));
            }
        }
    }
}

//agregarArchivos("imagenes/");


$blobObj = new BobDemo();
$blobObj->showAllColecciones2();


// test insert gif image
//$archivo = $path.$elemento;
// $blobObj->insertBlob($archivo,mime_content_type());
// $a = $blobObj->selectBlob(1);
// header("Content-Type:" . $a['mime']);
// echo $a['data'];
// test insert pdf
//$blobObj->insertBlob('pdf/php-mysql-blob.pdf',"application/pdf");
//$a = $blobObj->selectBlob(2);
// save it to the pdf file
//file_put_contents("pdf/output.pdf", $a['data']);
// $a = $blobObj->selectBlob(2);
// header("Content-Type:" . $a['mime']);
// echo $a['data'];
// replace the PDF by gif file
//$blobObj->updateBlob(2, 'images/php-mysql-blob.gif', "image/gif");

//$a = $blobObj->selectBlob(2);
//header("Content-Type:" . $a['mime']);
//echo $a['data'];