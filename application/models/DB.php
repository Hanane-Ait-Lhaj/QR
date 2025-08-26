<?php
class DB extends CI_Model
{

  /*-----------------UNIQUE KEY----------------------*/
  public function generate_unique_key()
  {
    do {
      $unique_key = uniqid(rand(), true); // Generate a unique ID

      // Check if the key already exists in the database
      $key_exists = $this->db->where('unique_key', $unique_key)
        ->get('unique_keys')
        ->num_rows() > 0;

    } while ($key_exists);

    $data = array(
      'unique_key' => $unique_key
    );
    // Save the unique key to the database
    $this->db->insert('unique_keys', $data);
    return $unique_key;
  }

  /*------------------------------------------ */
  public function check_key($key)
  {
    // get the last entered value (id auto Increment)
    $query = $this->db->order_by('id', 'DESC')
      ->limit(1)
      ->get('unique_keys');

    // Run the query
    $last_entered_row = $query->row();

    // Check if a row was returned
    if ($last_entered_row) {
      // Check if the unique key matches
      if ($last_entered_row->unique_key == $key) {
        // Unique key exists in the last entered row
        return true;
      } else {
        // Unique key does not match the last entered value
        return false;
      }
    } else {
      // No rows found in the table
      return false;
    }
  }

/********************** CRUD INSCRIT ************************** */
  public function insertInscrit($inscrit)
  {
    $this->db->insert('inscrit', $inscrit);

    $insert_id = $this->db->insert_id();
    return $insert_id;

  }
  public function selectInscrit($inscritId = false)
  {
    if ($inscritId) {
      $this->db->select('*');
      $this->db->from('inscrit');
      $this->db->where('id', $inscritId);

      $query = $this->db->get();
      return $query->row();
    } else {
      $query = $this->db->get('inscrit');
      return $query->result();
    }
  }
  public function selectInscritBySeminar( $idSem, $limit=null, $offset=0) //for all results: limit=null ,offset=0
  {
    $this->db->select('*');
    $this->db->from('inscrit');
    
    if ($idSem) {
      $this->db->where('idSeminar', $idSem);
    }

    $this->db->limit($limit, $offset); // Add limit and offset for pagination.(for all results: (null, 0))
    $this->db->order_by('date', 'DESC'); // 'DESC' for descending order

    $query = $this->db->get();
    return $query->result();
  }

  public function updateInscrit($id, $data)
  {
    $this->db->where('id', $id);
    $this->db->update('inscrit', $data);

    if ($this->db->affected_rows() > 0) {
      return true;
    } else {
      return false;
    }
  }

  /**************************************************** */

  /**--------------------CRUD SEMINAR----------------------- */
  public function selectSeminar($id = false)
  {
    if($id){
      $this->db->select('*');
      $this->db->from('seminar');
      $this->db->where('idSeminar', $id);
  
      $query = $this->db->get();
      return $query->row();
    }else{
      return $this->db->get('seminar')->result();
    }
  }

  public function insertSeminar($seminar)
  {
    $this->db->insert('seminar', $seminar);

    $insert_id = $this->db->insert_id();
    return $insert_id;
  }

  public function updateSeminar($id, $data)
  {
    $this->db->where('idSeminar', $id);
    $this->db->update('seminar', $data);

    if ($this->db->affected_rows() > 0) {
      return true;
    } else {
      return false;
    }
  }
  public function deleteSeminar($id)
  {
    $this->db->where('idSeminar', $id);
    return $this->db->delete('seminar');
  }


/**------------------------CRUD USER------------------------ */
public function selectUser($userId = false)
{
  if ($userId) {
    $this->db->select('*');
    $this->db->from('user');
    $this->db->where('id', $userId);


    $query = $this->db->get();
    return $query->row();
  } else { //return table des utilisateurs ordinaires
    $this->db->select('*');
    $this->db->from('user');
    $this->db->where('admin', false);

    $query = $this->db->get();
    
    return $query->result();
  }
}

public function authentifier($username, $password)
{
  $sql = "SELECT * FROM user WHERE username = ? AND password = ?";
  $query = $this->db->query($sql, array($username, $password));
  $count = $query->num_rows(); //counting result from query

  if ($count === 0) {
    return null;
  } else {
    return $query->row();
  }
}

  public function enableUser($id)
  {
    $this->db->set('active', true);
    $this->db->where('id', $id);
    $this->db->update('user');
    
    if ($this->db->affected_rows() > 0) {
      return true;
    } else {
      return false;
    }
  }
  public function disableUser($id)
  {
    $this->db->set('active', false);
    $this->db->where('id', $id);
    $this->db->update('user');

    if ($this->db->affected_rows() > 0) {
      return true;
    } else {
      return false;
    }
  }
  
  public function editPass($userId, $newPass)
  {
    $this->db->where('id', $userId);
    $db_debug = $this->db->db_debug;
    $this->db->db_debug = FALSE;
    $this->db->update('user', array('password' => $newPass));
    return $this->db->error();
  }

} ?>