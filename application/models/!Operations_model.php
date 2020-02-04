<?php class Operations_model extends MY_model{


// ================ INBOX MESSAGE =====================
  function new_message($limit){
      return $this->db->query("SELECT * FROM inbox ORDER BY id_inbox DESC LIMIT $limit");
  }


  
}
