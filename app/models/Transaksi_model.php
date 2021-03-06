<?php
class Transaksi_model
{

    private $db;
    private $total_row;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllOrder()
    {

        $this->db->query('SELECT * FROM orders');
        return $this->db->resultSet();
    }
    public function addDataTransaction($data)
    {
        var_dump($data);
        // $date = date('Y-m-d H:i:s');
        // $data["status_code"] = "201";
        // $data["status_message"] = "Pending";
        // $data["transaction_id"] = "transaction_id";
        // $data["order_id"] = "order_id";
        // $data["gross_amount"] = "20gross_amount1";
        // $data["payment_type"] = "payment_type";
        // $data["transaction_time"] = $date;
        // $data["transaction_status"] = "Pending";
        // $data["va_numbers"] = "201";
        // $data["bank"] = "Pending";
        // $data["fraud_status"] = "201";
        // $data["pdf_url"] = "Pending";
        // $data["finish_redirect_url"] = "201";
        $query = "INSERT INTO transaksi
                     VALUES
        			  ('', :status_code, :status_message, :transaction_id, :order_id, :gross_amount, :payment_type, :transaction_time, :transaction_status, :va_numbers, :bank, :fraud_status, :pdf_url, :finish_redirect_url)";

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
        $this->db->bind('bank', $data['bank']);
        $this->db->bind('fraud_status', $data['fraud_status']);
        $this->db->bind('pdf_url', $data['pdf_url']);

        $this->db->bind('finish_redirect_url', $data['finish_redirect_url']);
        $this->db->execute();

        return $this->db->rowCount();
    }
    public function postOrder($data)
    {

        $data["detail"] = "Pembayaran Sks";
        $query = "INSERT INTO orders
                     VALUES
        			  ('', :status_code, :status_message, :transaction_id, :order_id, :gross_amount, :payment_type, :transaction_time, :transaction_status, :va_numbers, :fraud_status,  :detail)";

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
        $this->db->bind('va_numbers', $data["va_number"]);
        $this->db->bind('fraud_status', $data['fraud_status']);
        $this->db->bind('detail', $data['detail']);
        $this->db->execute();

        return $this->db->rowCount();
    }
    public function getAllTodo()
    {
        $this->db->query('SELECT * FROM todo');
        return $this->db->resultSet();
    }


    // =======================================

    public function updateTodo($data)
    {
        $id = $data["id"];
        echo $id;
        $query = "UPDATE `todo` SET ``, title = :title, description = :description, isDone = :isDone WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->bind('title', $data['title']);
        $this->db->bind('description', $data['description']);
        $this->db->bind('isDone', $data['isDone']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function addTodo($data)
    {

        $query = "INSERT INTO todo
                     VALUES
        			  ('', :title, :description, :isDone)";

        $this->db->query($query);
        // $this->db->bind('id', '');
        $this->db->bind('title', $data['title']);
        $this->db->bind('description', $data['description']);
        $this->db->bind('isDone', $data['isDone']);
        $this->db->execute();

        return $this->db->rowCount();
    }
    public function deleteTodo($id)
    {
        $query = "DELETE FROM todo WHERE id = :id";
        $this->db->query($query);
        $this->db->bind("id", $id);
        $this->db->execute();

        return $this->db->rowCount();
    }
}
