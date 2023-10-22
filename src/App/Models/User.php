<?php
namespace App\Models;

use App\Model;



class User extends Model
{

    public function create( string $email, string $name, bool $isActive = true ) : int
    {

        $sql = "INSERT INTO users
                    (
                        email, full_name, is_active
                    )
                VALUES
                    (
                        :email, :full_name, :is_active
                    )";

        $stmt = $this->db->prepare( $sql );
    
        $stmt->bindValue( ':email', $email );
        $stmt->bindValue( ':full_name', $name );
        $stmt->bindValue( ':is_active', $isActive );

        $stmt->execute();

        return (int) $this->db->lastInsertId();
    }

}
