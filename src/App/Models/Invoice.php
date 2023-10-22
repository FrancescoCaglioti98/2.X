<?php
namespace App\Models;

use App\Model;

class Invoice extends Model
{
    
    public function create( float $amount, int $userId ) : int
    {

        $sql = "INSERT INTO invoices
                    (
                        amount, user_id
                    )
                VALUES
                    (
                        :amount, :user_id
                    )";

        $stmt = $this->db->prepare( $sql );
    
        $stmt->bindValue( ':amount', $amount );
        $stmt->bindValue( ':user_id', $userId );

        $stmt->execute();

        return (int) $this->db->lastInsertId();
        
    }

    public function find( int $invoiceId ) : array
    {

        $sql = "SELECT  invoices.id,
                        amount,
                        full_name
                FROM    invoices
                LEFT JOIN users
                    ON  user_id = users.id

                WHERE   invoices.id = :invoice_id";

        $stmt = $this->db->prepare( $sql );
    
        $stmt->bindValue( ':invoice_id', $invoiceId );
        $stmt->execute();

        $invoice = $stmt->fetch();
        return $invoice ? $invoice : [];
    }

}
