<?php
class Notification_model
{

    private $db;
    private $total_row;

    public function __construct()
    {
        $this->db = new Database;
    }

    //transaksi sukses
    public function handleSettlement()
    {
        echo "handleSettlement";
        $this->db->query('SELECT * FROM transaksi');
        return $this->db->resultSet();
    }
    public function handlePayment($data)
    {
        // die();
        $query = "INSERT INTO transaksi
                     VALUES
        			  ('', :status_code, :status_message, :transaction_id, :order_id, :gross_amount, :payment_type, :transaction_time, :transaction_status, :va_numbers, :signature_key, :fraud_status)";

        $this->db->query($query);
        // $this->db->bind('id', '');
        $this->db->bind('status_code', $data['status_code']);
        $this->db->bind('status_message', $data['status_message']);
        $this->db->bind('transaction_id', $data['transaction_id']);
        $this->db->bind('order_id', $data['order_id']);
        $this->db->bind('gross_amount', $data['gross_amount']);
        $this->db->bind('payment_type', $data['payment_type']);
        $this->db->bind('transaction_time', $data['transaction_time']);
        $this->db->bind('transaction_status', $data['transaction_status']);
        $this->db->bind('va_numbers', $data['va_numbers']);
        $this->db->bind('signature_key', $data['signature_key']);
        $this->db->bind('fraud_status', $data['fraud_status']);
        $this->db->execute();

        return $this->db->rowCount();
    }
    public function addNotif()
    {
        // echo base_url;

        $query = "INSERT INTO persons
                     VALUES
        			  ('', 'dalamma','fdfff',32)";

        $this->db->query($query);
        // $this->db->bind('nip', $res);
        return $this->db->execute();
    }
}
