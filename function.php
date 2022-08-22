<?php
    //konek ke database
    // urutan = "namahost", "username mySQL", 'password', "nama database" 
    $conn = mysqli_connect("localhost", "root", "", "gallery");

    function query($query){
        global $conn;
        $result = mysqli_query($conn, $query);
        $rows = [];
        while($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;
    }

    function tambah($data){
        global $conn;

        // upload gambar
        $gambar = upload();
        if(!$gambar){
            return false;
        }

        // querry insert data
        $query = "INSERT INTO picture VALUES ('', '$gambar')";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

    function upload(){
        // ambil dr isi $_FILES
        $namaFile = $_FILES["gambar"]["name"];
        $ukuranFile = $_FILES["gambar"]["size"];
        $error = $_FILES["gambar"]["error"];
        $tmpName = $_FILES["gambar"]["tmp_name"];

        //cek apakah tidak ada gambar yg diupload
        if($error === 4){
            echo "
            <script>
                alert('pilih gambar terlebih dahulu');
            </script>
            ";
            return false;
        }

        // cek apakah yg diupload adalah gambar
        $ekstensiGambarValid = ["jpg", "jpeg", "png"];
        $ekstensiGambar = explode('.', $namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if( !in_array($ekstensiGambar, $ekstensiGambarValid) ){
            echo "
            <script>
                alert('upload gambar dek!');
            </script>
            ";
        }

        // cek jika ukuran terlalu besar
        if( $ukuranFile > 2000000 ){
            echo "
            <script>
                alert('ukuran gambar terlalu besar maksimal 2MB');
            </script>
            ";
        }

        //lolos pengecekan gambar siap diupload

        //generate nama gambar baru
        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiGambar;

        move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

        return $namaFileBaru;
    }