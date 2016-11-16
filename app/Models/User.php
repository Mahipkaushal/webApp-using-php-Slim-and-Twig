<?php

namespace App\Models;

use App\Models\Model;

class User extends Model {

    public function login($data = array()) {
    	if($data) {

    		$sql = "SELECT * FROM `" . DB_PREFIX . "users` WHERE username = '" . $this->container->db->escape($data['username']) . "' AND password = '" . $this->container->db->escape($data['password']) . "' AND status = 1";

    		$query = $this->container->db->query($sql);

    		if($query->row) {
    			return $query->row;
    		} else {
    			return false;
    		}
    	} else {
    		return false;
    	}
    }

    public function getUserByToken($token) {
        if($token) {

            $sql = "SELECT";

            $sql .= " uad.user_id";
            $sql .= ", u.username";

            $sql .= " FROM `" . DB_PREFIX . "users_app_data` uad";
            $sql .= " LEFT JOIN `" . DB_PREFIX . "users` u ON(u.user_id = uad.user_id)";
            $sql .= " WHERE";
            $sql .= " uad.token = '" . $this->container->db->escape($token) . "'";
            $sql .= " AND uad.status = 1";
            $sql .= " AND u.status = 1";
            $sql .= " AND uad.app_id = '" . APP_ID . "'";

            $query = $this->container->db->query($sql);

            if($query->row) {
                return $query->row;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function validateToken($token = false) {
        if($token) {

            $sql = "SELECT";

            $sql .= " user_id";

            $sql .= " FROM `" . DB_PREFIX . "users_app_data` uad";
            $sql .= " WHERE";
            $sql .= " uad.token = '" . $this->container->db->escape($token) . "'";
            $sql .= " AND uad.status = 1";
            $sql .= " AND uad.app_id = '" . APP_ID . "'";

            $query = $this->container->db->query($sql);

            if($query->row) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function updateToken($token, $user_id) {
        
        $this->deleteToken($user_id);

        $sql = "INSERT INTO `" . DB_PREFIX . "users_app_data` SET app_id = '" . APP_ID . "', user_id = '" . $user_id . "', token = '" . $this->container->db->escape($token) . "', date_added = '" . REAL_TIME . "'";
        $this->container->db->query($sql);

    }

    public function deleteToken($user_id) {
        $sql = "UPDATE `" . DB_PREFIX . "users_app_data` SET status = '0', date_modified = '" . REAL_TIME . "' WHERE status = '1' AND app_id = '" . APP_ID . "' AND user_id = '" . $user_id . "'";
        $this->container->db->query($sql);
    }
}
