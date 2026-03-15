<?php
$host = '127.0.0.1';
$port = '5432';
$db   = 'gruppo_ifantastici4';
$user = 'www';
$pass = 'www';

echo "<h2>🚀 Installazione Database</h2>";
echo "<p>Sto configurando il database <b>$db</b>…</p>";

try {
    if (!in_array('pgsql', PDO::getAvailableDrivers())) {
        throw new Exception("Il driver PDO PostgreSQL (pdo_pgsql) non è abilitato in PHP.");
    }

    $dsn = "pgsql:host=$host;port=$port;dbname=$db";
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);

    $sqlFile = __DIR__ . DIRECTORY_SEPARATOR . "db_creation.sql";
    if (!file_exists($sqlFile)) {
        throw new Exception("Non trovo db_creation.sql nella stessa cartella di setup.php");
    }

    $sql = file_get_contents($sqlFile);
    $pdo->exec($sql);

    echo "<p style='color:green'><b>✅ Setup completato: tabelle create e dati inseriti!</b></p>";
    echo "<p><a href='index.php'>Vai alla Home</a></p>";

} catch (PDOException $e) {
    echo "<p style='color:red'><b>❌ ERRORE DATABASE:</b> " . htmlspecialchars($e->getMessage()) . "</p>";
} catch (Exception $e) {
    echo "<p style='color:red'><b>❌ ERRORE:</b> " . htmlspecialchars($e->getMessage()) . "</p>";
}
?>