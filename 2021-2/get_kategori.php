<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lihat Produk by Category</title>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
        }
    </style>
</head>

<body>
    Kategori :
    <select id="kategori">
        <option value="none">-- Pilih Kategori --</option>
        <?php
        require_once('db_login.php');

        $query = "SELECT idkategori, nama FROM kategori";
        $result = $db->query($query);
        if (!$result) {
            die('Tidak bisa menjalankan query');
        } else {
            while ($row = $result->fetch_object()) {
                $idkategori = $row->idkategori;
                $nama = $row->nama;
                echo '<option value="' . $idkategori . '">' . $nama . '</option>';
            }
        }
        ?>
    </select>
    <button onclick="get_detail()">Lihat</button>
    <div id="detail"></div>

    <script>
        function getXHR() {
            if (window.XMLHttpRequest) {
                return new XMLHttpRequest();
            } else {
                return new ActiveXObject('Microsoft.XMLHTTP');
            }
        }

        function callAjax(url, inner) {
            const xhr = getXHR();
            xhr.open('GET', url, true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    document.getElementById(inner).innerHTML = xhr.responseText;
                    return false;
                }
            };
            xhr.send(null)
        }

        function get_detail() {
            const idkategori = document.getElementById('kategori').value;

            if (idkategori != 'none') {
                const url = `get_detail.php?idkategori=${idkategori}`
                const inner = 'detail'
                callAjax(url, inner)
            } else {
                alert('Pilih kategori dulu')
            }
        }
    </script>
</body>

</html>