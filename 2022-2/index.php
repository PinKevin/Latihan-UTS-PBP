<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Email</title>
</head>

<body>
    <form action="" id="form_email">
        <label for="email">Email</label>
        <input type="email" name="email" id="email"><br>
        <div id="konf_email"></div><br>

        <button type="button" id="btn_email" onclick="check_email()">Check Email</button>
    </form>

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

        function check_email() {
            // const xhr = getXHR();
            const email = encodeURI(document.getElementById('email').value);

            if (email != '') {
                const url = `get_email.php?email=${email}`;
                const inner = 'konf_email';
                callAjax(url, inner);
            } else {
                alert('Isi email terlebih dahulu');
            }
        }
    </script>
</body>

</html>