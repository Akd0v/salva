<?php

class usuarios
{
    private $xmlPath;
    private $domDocument;

    public function __construct($xmlPath){
        // Instancia de DOMDocument
        // Cargar el documento
        $doc = new DOMDocument;
        $doc->load($xmlPath);
        // Comprobar si es un xml usuarios:
        if($doc->doctype->name != "usuarios" ||
            $doc->doctype->systemId != "usuarios.dtd"){
            throw new Exception("Tipo de documento incorrecto");
        }
        // Comprobar si es válido y well formed
        if($doc->validate()){
            $this->domDocument = $doc;
            $this->xmlPath = $xmlPath;
        } else {
            throw new Exception("El documento no es válido");
        }
    }

    public function __destruct() {
        // Librará la memoria del DOMDocument
        unset($this->domDocument);
    }

    public function getUserById($id){
        // Devuelve un array con los datos de usuario
        $usuario = $this->domDocument->getElementById($id);
        if (!$usuario)
        {
            throw new Exception ("No existe el usuario");
        }
        $arrayUsuario = array();
        $arrayUsuario["id"] = $id;
        // Nombre
        $arrayUsuario["nombre"] = $usuario->getElementsByTagName("nombre")->item(0)->nodeValue;
        // Apellido
        $arrayUsuario["apellido"] = $usuario->getElementsByTagName("apellido")->item(0)->nodeValue;
        // Ciudad
        $arrayUsuario["ciudad"] = $usuario->getElementsByTagName("ciudad")->item(0)->nodeValue;
        // Pais
        $arrayUsuario["pais"] = $usuario->getElementsByTagName("pais")->item(0)->nodeValue;
        // Contacto
        $contacto = $usuario->getElementsByTagName("contacto");
        $arrayContacto = array();
        // Iterar sobre los elementos de contacto
        foreach($contacto as $contact){
            // Telefono
            $telefono = $contact->getElementsByTagName("telefono")->item(0)->nodeValue;
            // Email
            $email = $contact->getElementsByTagName("email")->item(0)->nodeValue;
            // Creamos un array con los valores de las formas de contacto
            $arrayC["telefono"] = $telefono;
            $arrayC["email"] = $email;
            // Asignamos el array al array que pasaremos finalmente a arrayUsuario
            $arrayContacto[] = $arrayC;
        }
        $arrayUsuario["contacto"] = $arrayContacto;
        return $arrayUsuario;
    }

    public function addUser($id, $nombre, $apellido, $ciudad, $pais, $telefono, $email){
        // Crear un nuevo elemento que representa el nuevo usuario
        $nuevoUsuario = $this->domDocument->createElement("usuario");
        // Añadir el nuevo elemento creado
        $this->domDocument->documentElement->appendChild($nuevoUsuario);
        /*
         * Establecer el atributo id se puede hacer de dos formas:
         * 1. $nuevoUsuario->setAttribute("id", $id);
         * 2. Se expone a continuación:
         */
        $atributoId = new DOMAttr("id", $id);
        $nuevoUsuario->setAttributeNode($atributoId);
        //Nombre
        $nombre = $this->domDocument->createElement("nombre", $nombre);
        $this->domDocument->documentElement->appendChild($nombre);
        //Apellido
        $apellido = $this->domDocument->createElement("apellido", $apellido);
        $this->domDocument->appendChild($apellido);
        //Ciudad
        $ciudad = $this->domDocument->createElement("ciudad", $ciudad);
        $this->domDocument->appendChild($ciudad);
        //Pais
        $pais = $this->domDocument->createElement("pais", $pais);
        $this->domDocument->appendChild($pais);
        //Telefono
        $telefono = $this->domDocument->createElement("telefono", $telefono);
        $this->domDocument->appendChild($telefono);
        //Email
        $email = $this->domDocument->createElement("email", $email);
        $this-$this->domDocument->appendChild($email);
        // Guardar todos lo anterior
        $this->domDocument->save($this->xmlPath);
    }

    public function deleteUser($id){
        // Elimina un usuario
        // Obtener el usuario según el ID
        $usuario = $this->domDocument->getElementById($id);
        //Eliminar el hijo
        $this->domDocument->removeChild($usuario);
        //Guardarlo en el archivo
        $this->domDocument->save($this->xmlPath);
    }

    public function findUserByCountry($pais){
        // Devuelve un array de usuarios del país
        // Utilizamos XPath para encontrar el libro que buscamos:
        $query = '//usuarios/usuario/pais[text() = "' . $pais . '"]/..';
        // Creamos un nuevo objeto XPath y lo asociamos con el documento
        $xpath = new DOMXPath($this->domDocument);
        $resultado = $xpath->query($query);
        $arrayUsuarios = array();
        //iterar los resultados:
        foreach ($resultado as $usuario){
            // Añade el nombre de usuario al array
            $arrayUsuarios[] = $usuario->getElementsByTagName("nombre")->item(0)->nodeValue;
        }
        return $arrayUsuarios;
    }

}