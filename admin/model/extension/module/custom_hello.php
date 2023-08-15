<?php
class ModelExtensionModuleCustomHello extends Model {

    public function getVisits() {
        $query = $this->db->query("
            SELECT v.customer_id, v.date_added, CONCAT(c.firstname, ' ', c.lastname) AS customer_name
            FROM " . DB_PREFIX . "custom_hello_visit v
            LEFT JOIN " . DB_PREFIX . "customer c ON (v.customer_id = c.customer_id)
            ORDER BY v.date_added DESC
        ");

        return $query->rows;
    }
}
