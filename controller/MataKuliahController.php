<?php

class Matakuliah
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
    public function store($id_matkul, $nama_matkul)
    {
        $sql = "SELECT * FROM matakuliah WHERE Id_matkul = '$id_matkul'";

        // Checking if the id is available
        $check = $this->conn->query($sql);
        $count_row = $check->num_rows;

        // If the id is not in db then insert to the table
        if ($count_row == 0) {
            $query = "INSERT INTO 
            matakuliah(Id_matkul, nama_matkul) VALUES (
                '$id_matkul', 
                '$nama_matkul'
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
     * Untuk menampilkan data mahasiswa
     * 
     * @return $data
     */
    public function index()
    {

        $query = "SELECT * FROM matakuliah";
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
     * @param $id_matkul
     * 
     * @return $matkul
     */
    public function view($id_matkul)
    {
        $query = "SELECT * FROM matakuliah WHERE Id_matkul='$id_matkul'";
        $result = $this->conn->query($query);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row;
        } else {
            return false;
        }
    }

    /**
     * Update matakuliah
     * @param $post
     * 
     * @return $matkul
     */
    public function update($id_matkul, $nama_matkul)
    {
        $query = "UPDATE matakuliah Set 
                nama_matkul = '$nama_matkul'
                WHERE Id_matkul = '$id_matkul'
                ";
        $sql = $this->conn->query($query);
        if ($sql == true) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Delete Mahasiswa
     * @param $id_matkul
     * 
     * @return bool
     */
    public function destroy($id_matkul)
    {
        $query = "DELETE FROM matakuliah WHERE id_matkul = '$id_matkul'";
        $sql = $this->conn->query($query);
        if ($sql == true) {
            return true;
        } else {
            return false;
        }
    }
}
