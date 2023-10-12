<?php
require_once('db_login.php');

$idkategori = $db->real_escape_string($_GET['idkategori']);

$query = "SELECT s.nama AS 'sk', p.nama AS 'np', p.harga AS 'h'
            FROM produk AS p
            INNER JOIN sub_kategori AS s ON p.idsub_kategori = s.idsub_kategori 
            INNER JOIN kategori AS k ON s.idkategori = k.idkategori
            WHERE k.idkategori = '$idkategori';";
// echo $query;
$result = $db->query($query);

if (!$result) {
    die('Error');
} else {
    echo '<table>';
    echo '<tr>
    <th>Sub Kategori</th>
    <th>Nama Produk</th>
    <th>Harga</th>
    </tr>';
    while ($row = $result->fetch_object()) {
        echo '<tr>';
        echo '<td>' . $row->sk . '</td>';
        echo '<td>' . $row->np . '</td>';
        echo '<td>' . $row->h . '</td>';
        echo '</tr>';
    }
    echo '</table>';
}
