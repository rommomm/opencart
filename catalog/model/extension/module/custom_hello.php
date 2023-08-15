<?php

class ModelExtensionModuleCustomHello extends Model
{
    public function saveVisit($customer_id)
    {
        if ($customer_id > 0) {
            $existingVisit = $this->getVisitByCustomerId($customer_id);

            if ($existingVisit) {
                $this->db->query("UPDATE " . DB_PREFIX . "custom_hello_visit SET date_added = NOW() WHERE custom_hello_visit_id = '" . (int)$existingVisit['custom_hello_visit_id'] . "'");
            } else {
                $this->db->query("INSERT INTO " . DB_PREFIX . "custom_hello_visit SET customer_id = '" . (int)$customer_id . "', date_added = NOW()");
            }
        }
    }

    public function getVisitByCustomerId($customer_id)
    {
        $query = $this->db->query("SELECT custom_hello_visit_id FROM " . DB_PREFIX . "custom_hello_visit WHERE customer_id = '" . (int)$customer_id . "' LIMIT 1");

        return $query->row;
    }

}
