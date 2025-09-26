<?php
header("Access-Control-Allow-Origin: *");
// Set the content type to JSON
header('Content-Type: application/json');

// Allow POST only
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405); // Method Not Allowed
    echo json_encode(['error' => 'Only POST method is allowed']);
    exit;
}
$UPDATE_KEY = "431523678";
$json = '[{"author":"Unamuno","quote":"Cuanto menos se lee, más daño hace lo que se lee"},{"author":"Berns","quote":"las historias que leemos moldean nuestras vidas y en algunos casos ayudan a definir a la persona"},{"author":"Joseph Addison","quote":"La lectura es a la mente lo que el ejercicio al cuerpo."},{"author":"Virginia Woolf","quote":"No se puede encontrar la paz evitando la vida."},{"author":"Margaret Wolfe Hungerford","quote":"La belleza está en los ojos del espectador."},{"author":"Neil Gaiman","quote":"Un libro es un sueño que tienes en tus manos."},{"author":"Charles Bukowski","quote":"La literatura es el arte de descubrir algo extraordinario sobre la vida cotidiana."},{"author":"Michel Eyquem de Montaigne","quote":"La palabra es mitad de quien la pronuncia, mitad de quien la escucha."},{"author":"James Baldwin","quote":"La historia de uno no es lo que uno hace, sino lo que uno tiene que hacer."},{"author":"Rabindranath Tagore","quote":"La poesía es el eco de la melodía del universo en el corazón de los humanos."},{"author":"Brenda Ueland","quote":"La literatura es el arte de descubrir algo extraordinario sobre uno mismo."},{"author":"William Wordsworth","quote":"La poesía es la emoción recitada con medida."},{"author":"Rabindranath Tagore","quote":"La poesía es el eco de la melodía del universo en el corazón de los humanos."},{"author":"Gordon Craig","quote":"En el teatro, uno nunca debe decir a un niño que hay un lobo."},{"author":"John Milton","quote":"Un buen libro es el precioso tesoro de un alma consciente."},{"author":"Thomas Carlyle","quote":"La poesía es el lenguaje en su estado más elevado."},{"author":"C.S. Lewis","quote":"La literatura añade a la realidad, no simplemente la refleja."},{"author":"Voltaire","quote":"La poesía es el eco de la música del alma."},{"author":"Neil Gaiman","quote":"Un libro es un sueño que tienes en tus manos."},{"author":"Federico García Lorca","quote":"El teatro es poesía que se sale del libro para hacerse humana."},{"author":"Carlos Ruiz Zafón","quote":"Los libros son espejos: solo reflejan lo que uno tiene dentro."},{"author":"Voltaire","quote":"La poesía es la pintura de los oídos."},{"author":"Philip Pullman","quote":"La literatura es el arte de contar algo hermoso y terrible a la vez."},{"author":"Federico García Lorca","quote":"El teatro es la poesía que se levanta del libro y se hace humana."},{"author":"Terry Pratchett","quote":"La literatura es una forma de explorar el alma humana."}]';


// Check if both parameters are set in the URL
if (isset($_GET['key']) && isset($_GET['user'])) {
    $key = htmlspecialchars($_GET['key']);
    $user = htmlspecialchars($_GET['user']);

    if($key == $UPDATE_KEY && $user == 'avill.ladv.literaturestudyguide'){
        // Output as JSON
        echo json_encode([
            "status" => 0,
            "data" => "[]",
            "message" => $UPDATE_KEY
        ]);
    }else{
        if($key != "" && $key !=$UPDATE_KEY  && $user == 'avill.ladv.literaturestudyguide'){
            // Output as JSON
            echo json_encode([
                "status" => 0,
                "data" => $json,
                "message" => $UPDATE_KEY
            ]);
        }else{
            // If parameters are missing
            echo json_encode([
                "status" => 1,
                "data" => "",
                "message" => "not allowed"
            ]);
        } 
    }
        
    
} else {
    // If parameters are missing
    echo json_encode([
        "status" => 1,
        "data" => "",
        "message" => "Missing data"
    ]);
}

