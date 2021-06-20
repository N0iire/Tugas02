<?php

class Mahasiswa
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
    public function store($nim, $nama_lengkap, $tanggal_lahir, $tempat_lahir)
    {
        $sql = "SELECT * FROM mahasiswa WHERE nim = '$nim' ";

        // Checking if the id is available
        $check = $this->conn->query($sql);
        $count_row = $check->num_rows;

        // If the id is not in db then insert to the table
        if ($count_row == 0) {
            $query = "INSERT INTO 
            mahasiswa(nim, nama_lengkap, tanggal_lahir, tempat_lahir) VALUES (
                '$nim', 
                '$nama_lengkap', 
                '$tanggal_lahir', 
                '$tempat_lahir'
            )";
            $sql = $this->conn->query($query);
            if ($sql == true) {
                true;
            } else {
                false;
            }
            return true;
        } else {
            return false;
        }
    }

    /**
     * Untuk menampilkan data mahasiswa
     * 
     * @return $data
     */
    public function index()
    {

        $query = "SELECT * FROM mahasiswa";
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
     * Display mahasiswa with nim
     * @param $id
     * 
     * @return $mahasiswa
     */
    public function view($nim)
    {
        $query = "SELECT * FROM mahasiswa WHERE nim='$nim'";
        $result = $this->conn->query($query);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row;
        } else {
            echo "Record not found";
        }
    }

    /**
     * Update nilai
     * @param $postData
     * 
     * @return $nilai
     */
    public function update($nim, $nama_lengkap, $tanggal_lahir, $tempat_lahir)
    {
        $query = "UPDATE mahasiswa SET 
                nama_lengkap = '$nama_lengkap', 
                tanggal_lahir = '$tanggal_lahir', 
                tempat_lahir = '$tempat_lahir'
                WHERE nim = '$nim'";
        $sql = $this->conn->query($query);
        if ($sql == true) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Delete Mahasiswa
     * @param $nim
     * 
     * @return bool
     */
    public function destroy($nim)
    {
        $query = "DELETE FROM mahasiswa WHERE nim = '$nim'";
        $sql = $this->conn->query($query);
        if ($sql == true) {
            return true;
        } else {
            return false;
        }
    }
}
