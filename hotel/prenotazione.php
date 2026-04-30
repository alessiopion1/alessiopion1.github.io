<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. Recupero i nuovi dati dal form
    $nome     = $_POST['nome_completo'] ?? 'Non specificato';
    $email    = $_POST['email'] ?? 'Non specificata';
    $telefono = $_POST['telefono'] ?? 'Non specificato';
    $arrivo   = $_POST['arrivo'] ?? 'Non specificato';
    $partenza = $_POST['partenza'] ?? 'Non specificato';
    $adulti   = $_POST['adulti'] ?? '0';
    $bambini  = $_POST['bambini'] ?? '0';

    $a = "alessiopiolotito@gmail.com";
    $oggetto = "Nuova richiesta di prenotazione da: $nome";
    
    // 2. Costruisco il messaggio con le nuove informazioni
    $messaggio = "Hai ricevuto una nuova richiesta di prenotazione:\n\n";
    $messaggio .= "--- DATI CLIENTE ---\n";
    $messaggio .= "Nome: $nome\n";
    $messaggio .= "Email: $email\n";
    $messaggio .= "Telefono: $telefono\n\n";
    
    $messaggio .= "--- DETTAGLI SOGGIORNO ---\n";
    $messaggio .= "Arrivo: $arrivo\n";
    $messaggio .= "Partenza: $partenza\n";
    $messaggio .= "Adulti: $adulti\n";
    $messaggio .= "Bambini: $bambini\n";

    // 3. Header migliorati
    // 'From' dovrebbe essere un'email del tuo dominio (es. info@tuosito.it)
    $headers = "From: info@iltuositoweb.it\r\n"; 
    // 'Reply-To' permette di rispondere direttamente al cliente
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8";

    // Invio
    if(@mail($a, $oggetto, $messaggio, $headers)) {
        echo "Grazie $nome! La tua richiesta è stata inviata con successo.";
    } else {
        echo "Errore: Il server locale non è configurato per inviare email. Ma non preoccuparti, il codice è corretto!";
    }
}
?>
