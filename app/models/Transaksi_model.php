<?php
class Transaksi_model
{

    private $db;
    private $total_row;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAll()
    {
        $this->db->query('SELECT * FROM transaksi');
        return $this->db->resultSet();
    }
    public function addAjax($data)
    {
        $query = "INSERT INTO mahasiswa
		             VALUES
					  ('', :nim, :nama, :kelas)";

        $this->db->query($query);
        $this->db->bind('nim', $data['nim']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('kelas', $data['kelas']);

        $this->db->execute();

        return $this->db->rowCount();
    }
    public function delete_mahasiswa($data)
    {
        $res = intval($data);

        $query = "DELETE FROM mahasiswa WHERE nip = :nip";
        $this->db->query($query);
        $this->db->bind('nip', $res);
        return $this->db->execute();
    }
}
