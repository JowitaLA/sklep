<?php
// Pobranie tokena z URL
if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Sprawdzenie, czy token istnieje w bazie danych (pseudokod)
    $query = $db->prepare("SELECT * FROM users WHERE token = ?");
    $query->execute([$token]);
    $user = $query->fetch();

    if ($user) {
        // Zaktualizowanie statusu weryfikacji konta
        $update = $db->prepare("UPDATE users SET is_verified = 1, token = NULL WHERE token = ?");
        $update->execute([$token]);

        echo "Twoje konto zostało zweryfikowane!";
    } else {
        echo "Nieprawidłowy token lub token wygasł.";
    }
} else {
    echo "Brak tokena weryfikacyjnego.";
}
