<?php

class Nilai
{
    public $conn;

    public function __construct()
    {
        $this->conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
        if (mysqli_connect_errno()) {
            echo "Error: Could not connect to database.";
            exit;
        }
    }

    /**
     * Untuk menyimpan data yang dikirim ke database
     * 
     * params @post
     * @return Location:index.php
     */
    public function store($nim, $id_matkul, $kehadiran, $tugas, $uts, $uas)
    {
        $sql = "SELECT * FROM nilai WHERE Id_matkul = '$id_matkul' AND nim = '$nim'";
        // Checking if the id is available
        $check = $this->conn->query($sql);
        $count_row = $check->num_rows;

        // If the id is not in db then insert to the table
        if ($count_row == 0) {
            $query = "INSERT INTO 
            nilai(nim, Id_matkul, kehadiran, tugas, uts, uas) 
            VALUES(
                '$nim', '$id_matkul', '$kehadiran', '$tugas', '$uts', '$uas'
            )";
            $sql = $this->conn->query($query);
            if ($sql == true) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }


    /**
     * Untuk menampilkan data nilai
     * 
     * @return $data
     */
    public function index()
    {

        $query = "SELECT * FROM nilai
        INNER JOIN mahasiswa ON mahasiswa.nim = nilai.nim
        INNER JOIN matakuliah ON matakuliah.Id_matkul = nilai.Id_matkul";
        $result = $this->conn->query($query);
        if ($result->num_rows > 0) {
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        } else {
            echo "No Data Is Found";
        }
    }

    /**
     * Display nilai with id
     * @param $id
     * 
     * @return $nilai
     */
    public function view($nim, $id_matkul)
    {
        $query = "SELECT * FROM nilai
        INNER JOIN mahasiswa ON mahasiswa.nim = nilai.nim
        INNER JOIN matakuliah ON matakuliah.Id_matkul = nilai.Id_matkul
        WHERE nilai.nim = '$nim' AND nilai.Id_matkul = '$id_matkul'";
        $result = $this->conn->query($query);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row;
        } else {
            return false;
        }
    }

    /**
     * Update nilai
     * @param $postData
     * 
     * @return $nilai
     */
    public function update($nim, $id_matkul, $kehadiran, $tugas, $uts, $uas, $nim2, $id_matkul2)
    {
        $query = "UPDATE nilai Set 
                nim = '$nim',
                Id_matkul = '$id_matkul',
                kehadiran = '$kehadiran',
                tugas = '$tugas',
                uts = '$uts',
                uas = '$uas'
                WHERE nim = '$nim2' AND Id_matkul = '$id_matkul2'";
        $sql = $this->conn->query($query);
        if ($sql == true) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Delete nilai
     * @param $nim,$id_matkul
     * 
     * @return bool
     */
    public function destroy($nim, $id_matkul)
    {
        $query = "DELETE FROM nilai WHERE nim = '$nim' AND Id_matkul = '$id_matkul'";
        $sql = $this->conn->query($query);
        if ($sql == true) {
            return true;
        } else {
            return false;
        }
    }

    public function search($data)
    {
        $query = "SELECT * FROM nilai
        INNER JOIN mahasiswa ON mahasiswa.nim = nilai.nim
        INNER JOIN matakuliah ON matakuliah.Id_matkul = nilai.Id_matkul
        WHERE nilai.nim = '$data' OR nilai.Id_matkul = '$data'";
        $result = $this->conn->query($query);
        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }
}
