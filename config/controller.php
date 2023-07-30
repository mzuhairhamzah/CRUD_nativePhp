<?php
function select($query): array
{
    // call database connection
    global $db;

    $result = mysqli_query($db, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function create_items($post)
{
    global $db;

    $name = strip_tags($post['nama']);
    $quantity = strip_tags($post['quantity']);
    $price = strip_tags($post['price']);

    // query insert data
    $query = "INSERT INTO items VALUES ('', '$name', '$quantity', '$price', CURRENT_TIMESTAMP())";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}
function update_items($post)
{
    global $db;

    $id_items = $post['id_items'];
    $name = $post['nama'];
    $quantity = $post['quantity'];
    $price = $post['price'];

    //query update data
    $query = "UPDATE items SET name = '$name', quantity = '$quantity', price = '$price' WHERE id_items = $id_items";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}
function delete_items($id_items)
{
    global $db;

    //query delete data
    $query = "DELETE FROM items WHERE id_items = $id_items";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

function create_mahasiswa($post)
{
    global $db;

    $nama = strip_tags($post['nama']);
    $prodi = strip_tags($post['prodi']);
    $jk = strip_tags($post['jk']);
    $telepon = strip_tags($post['telepon']);
    $email = strip_tags($post['email']);
    $foto = upload_file();

    // check upload foto
    if (!$foto) {
        return false;
    }
    // query insert data
    $query = "INSERT INTO mahasiswa VALUES ('', '$nama', '$prodi', '$jk', '$telepon', '$email', '$foto')";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

function update_mahasiswa($post)
{
    global $db;

    $id_mahasiswa = strip_tags($post['id_mahasiswa']);
    $nama = strip_tags($post['nama']);
    $prodi = strip_tags($post['prodi']);
    $jk = strip_tags($post['jk']);
    $telepon = strip_tags($post['telepon']);
    $email = strip_tags($post['email']);
    $fotoLama = strip_tags($post['fotoLama']);

    //check upload new file or not
    if ($_FILES['foto']['error'] == 4) {
        $foto = $fotoLama;
    } else {
        $foto = upload_file();
    }
    // query edit data
    $query = "UPDATE mahasiswa SET nama_mhs = '$nama', prodi = '$prodi', jk = '$jk', telepon = '$telepon', email = '$email', foto = '$foto' WHERE id_mahasiswa = $id_mahasiswa";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

function upload_file()
{
    $nameFile = $_FILES['foto']['name'];
    $sizeFile = $_FILES['foto']['size'];
    $errorFile = $_FILES['foto']['error'];
    $tmpFileName = $_FILES['foto']['tmp_name'];

    // check if extention file uploaded
    $extentionFileValid = ['jpg', 'jpeg', 'png', 'svg'];
    $extentionFile = explode('.', $nameFile); // ['namafile'.'jpg']
    $extentionFile = strtolower(end($extentionFile)); //.JPG -> jpg -> ['jpg']

    //check format/extention file
    if (!in_array($extentionFile, $extentionFileValid)) {
        //error massage
        echo "<script>
        alert('Format File Invalid');
        document.location.href = 'add-mahasiswa.php';
        </script>";
        die();
    }

    //check size file 2 MB
    if ($sizeFile > 2048000) {
        # error massage
        echo "<script>
        alert('Size File Too Large Max 2 MB');
        document.location.href = 'add-mahasiswa.php';
        </script>";
        die();
    }

    //generate new name file
    $newNameFile = uniqid();
    $newNameFile .= '.';
    $newNameFile .= $extentionFile;

    // move file to local folder
    move_uploaded_file($tmpFileName, 'assets/images/' . $newNameFile); # newnamefile = 123123.jpg
    return $newNameFile;
}
// function delete_mahasiswa 
function delete_mahasiswa($id_mahasiswa)
{
    global $db;
    //take a photo of the selected data

    $foto = select("SELECT foto FROM mahasiswa WHERE id_mahasiswa = $id_mahasiswa")[0];
    //delete photo from local folder
    unlink('assets/images/' . $foto['foto']);
    //query delete data
    $query = "DELETE FROM mahasiswa WHERE id_mahasiswa = $id_mahasiswa";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}