 <?php
class Jobs{
  private $db;
  public function __construct(){
    $this->db = new Database;
  }
  public function getCompany($id_companie){
    $this->db->query("SELECT * FROM companii WHERE id_companie = :id_companie");
    $this->db->bind(":id_companie", $id_companie);
    $result = $this->db->singleValue();
    return $result;
  }
  public function loginCheck($email, $password = null){
    $this->db->query("SELECT * FROM companii WHERE email_companie = :email_companie");
    $this->db->bind(":email_companie", $email);
    $row = $this->db->singleValue();
    return $row;
  }
  public function registerCompany($data, $status=0, $grand_acces=0){
    $this->db->query("INSERT INTO companii(grand_acces, nume_companie, ocupatie, adresa, password, email_companie, telefon, status) VALUES (:grand_acces, :nume_companie, :ocupatie, :adresa, :password, :email_companie, :telefon, :status)");
    $this->db->bind(':grand_acces',$grand_acces);
    $this->db->bind(':nume_companie',$data['cname']);
    $this->db->bind(':ocupatie',$data['cactivity']);
    $this->db->bind(':adresa',$data['adress']);
    $this->db->bind(':password',$data['password']);
    $this->db->bind(':email_companie',$data['email']);
    $this->db->bind(':telefon',$data['ph']);
    $this->db->bind(':status',$status);
    if ($this->db->execute()) {
      return true;
    }else {
      return false;
    }

  }
  public function registerReprezentant($data){
    $this->db->query("INSERT INTO reprezentanti_companie(id_companie, nume_reprezentant, functie_reprezentant, telefon_reprezentant, email_reprezentant) VALUES (:id_companie, :nume_reprezentant, :functie_reprezentant, :telefon_reprezentant, :email_reprezentant)");
    $this->db->bind(':id_companie',$data['id_companie']);
    $this->db->bind(':nume_reprezentant',$data['nume_reprezentant']);
    $this->db->bind(':functie_reprezentant',$data['functie_reprezentant']);
    $this->db->bind(':telefon_reprezentant',$data['telefon_reprezentant']);
    $this->db->bind(':email_reprezentant',$data['email_reprezentant']);
    if ($this->db->execute()) {
      return true;
    }else {
      return false;
    }

  }
  public function checkExist($data){
      $this->db->query("SELECT email_companie FROM companii where email_companie = :email_companie");
      $this->db->bind(':email_companie', $data);
      if($this->db->singleValue()){
        return false;
      }else {
        return true;
      }
  }
  public function alerts($txt, $type='success'){
    return '<div class="alert alert-'.$type.'" role="alert">'.$txt."</div>";
  }

    public function updateCompany($data){
        $this->db->query("UPDATE companii SET nume_companie = :nume_companie, ocupatie= :ocupatie, adresa = :adresa, email_companie = :email_companie, telefon = :telefon WHERE id_companii = :id_companie");
        $this->db->bind(':id_companie',$data['id']);
        $this->db->bind(':nume_companie',$data['cname']);
        $this->db->bind(':ocupatie',$data['cactivity']);
        $this->db->bind(':adresa',$data['adress']);
        $this->db->bind(':email_companie',$data['email']);
        $this->db->bind(':telefon',$data['ph']);
        if ($this->db->execute()) {
          return true;
        }else {
          return false;
        }
    }
    public function updatePassword($data, $id){
        $this->db->query("UPDATE companii SET password= :password WHERE id_companii = :id_companie");
        $this->db->bind(':password',$data);
        $this->db->bind(':id_companie',$id);
        if ($this->db->execute()) {
          return true;
        }else {
          return false;
        }
    }
    public function getAllRepresentants($id_companie){
      $this->db->query("SELECT * FROM reprezentanti_companie WHERE id_companie= :id_companie");
      $this->db->bind(":id_companie", $id_companie);
      $row = $this->db->resultSet();
      return $row;
    }
    public function registerQuestion($data){
      $this->db->query("INSERT INTO question (id_companie, email_question, nume_rep, subject_question, message_question) VALUES (:id_companie, :email_question, :nume_rep, :subject_question, :message_question)");
      $this->db->bind(":id_companie", $data['id_companie']);
      $this->db->bind(":email_question", $data['email_question']);
      $this->db->bind(":nume_rep", $data['nume_rep']);
      $this->db->bind(":subject_question", $data['subject_question']);
      $this->db->bind(":message_question", $data['message_question']);
      if ($this->db->execute()) {
        return true;
      }else {
        return false;
      }
    }
    public function getAllAppoints(){
      $this->db->query("SELECT * FROM programari Left JOin clienti ON programari.id_client=clienti.id_client Left Join  reprezentanti_companie  On programari.id_reprezentant = reprezentanti_companie.id_reprezentant");
      $row = $this->db->resultSet();
      return $row;
    }
    public function getAppoints($id_companie){
      $this->db->query("SELECT * FROM programari Left JOin clienti ON programari.id_client=clienti.id_client Left Join  reprezentanti_companie  On programari.id_reprezentant = reprezentanti_companie.id_reprezentant where programari.id_companie = :id_companie");
      $this->db->bind(":id_companie", $id_companie);
      $row = $this->db->resultSet();
      return $row;
    }
    public function postAppoint($array){
      $this->db->query("INSERT INTO programari (id_companie, id_reprezentant, id_client, start_programare, end_programare, info) VALUES (:id_companie, :id_reprezentant, :id_client, :start_programare, :end_programare, :info)");
      $this->db->bind(":id_companie", $array['id_companie']);
      $this->db->bind(":id_reprezentant", $array['id_reprezentant']);
      $this->db->bind(":id_client", $array['id_client']);
      $this->db->bind(":start_programare", $array['start_programare']);
      $this->db->bind(":end_programare", $array['end_programare']);
      $this->db->bind(":info", $array['info']);
      if ($this->db->execute()) {
        return true;
      }else {
        return false;
      }
    }
    public function postClient($array){
      $this->db->query("INSERT INTO clienti (id_companie,   nume_client, phone, email) VALUES (:id_companie, :nume_client, :phone, :email)");
      $this->db->bind(":id_companie", $array['id_companie']);
      $this->db->bind(":nume_client", $array['nume_client']);
      $this->db->bind(":phone", $array['phone']);
      $this->db->bind(":email", $array['email']);
      if ($this->db->execute()) {
        return true;
      }else {
        return false;
      }
    }
      public function existClient($email, $phone){
        $this->db->query("SELECT * FROM clienti WHERE email = :email AND phone= :phone");
        $this->db->bind(":email", $email);
        $this->db->bind(":phone", $phone);
        $row = $this->db->singleValue();
        return $row;

      }
      public function postNewsletters($content){
        $this->db->query("INSERT INTO newsletter (id_companie, nume_newsletter, subject_newsletter, content_newsletter) VALUES (:id_companie, :nume_newsletter, :subject_newsletter, :content_newsletter)");
        $this->db->bind(":id_companie", $content['id_companie']);
        $this->db->bind(":nume_newsletter", $content['nume_newsletter']);
        $this->db->bind(":subject_newsletter", $content['subject_newsletter']);
        $this->db->bind(":content_newsletter", $content['content_newsletter']);
        if ($this->db->execute()) {
          return true;
        }else {
          return false;
        }
      }
      public function postSMS($content){
        $this->db->query("INSERT INTO sms (id_companie, nume_sms, subject_sms, content_sms) VALUES (:id_companie, :nume_sms, :subject_sms, :content_sms)");
        $this->db->bind(":id_companie", $content['id_companie']);
        $this->db->bind(":nume_sms", $content['nume_sms']);
        $this->db->bind(":subject_sms", $content['subject_sms']);
        $this->db->bind(":content_sms", $content['content_sms']);
        if ($this->db->execute()) {
          return true;
        }else {
          return false;
        }
      }
      public function updateSending($content){
        $this->db->query("SELECT id_companie, emails,  sms FROM sending where id_companie = :id_companie");
        $this->db->bind(":id_companie", $content['id_companie']);
        $row = $this->db->singleValue();
        $new_emails= $row-> emails + $content['email'];
        $new_sms = $row-> sms +  $content['sms'];
        print_r($new_emails);
        $this->db->query("UPDATE sending SET `emails` = :emails, `sms` = :sms Where `id_companie` = :id_companie");
        $this->db->bind(":id_companie", $content['id_companie']);
        $this->db->bind(":emails", $new_emails);
        $this->db->bind(":sms", $new_sms);
        if ($this->db->execute()) {
          if (empty($row-> id_companie)){
              $this->db->query("INSERT INTO sending (id_companie, emails, sms) values (:id_companie, :emails, :sms)");
              $this->db->bind(":id_companie", $content['id_companie']);
              $this->db->bind(":emails", $content['emails']);
              $this->db->bind(":sms", $content['sms']);
              $this->db->execute();

          }
          return true;
        }else {
          return false;
        }
      }
      public function getNewsletters($id_companie){
        $this->db->query("SELECT * FROM newsletter where id_companie = :id_companie Order by id_newsletter DESC");
        $this->db->bind(":id_companie", $id_companie);
        $row = $this->db->resultSet();
        return $row;
      }
      public function getSMS($id_companie){
        $this->db->query("SELECT * FROM sms where id_companie = :id_companie Order by id_sms DESC");
        $this->db->bind(":id_companie", $id_companie);
        $row = $this->db->resultSet();
        return $row;
      }
      public function getNewslettersById($id_newsletter){
        $this->db->query("SELECT * FROM newsletter where id_newsletter = :id_newsletter");
        $this->db->bind(":id_newsletter", $id_newsletter);
        $row = $this->db->singleValue();
        return $row;
      }
      public function getSMSById($id_sms){
        $this->db->query("SELECT * FROM sms where id_sms = :id_sms");
        $this->db->bind(":id_sms", $id_sms);
        $row = $this->db->singleValue();
        return $row;
      }
      public function getAllEmails($id_companie){
        $this->db->query("SELECT email FROM clienti where id_companie = :id_companie and email != '0' ");
        $this->db->bind(":id_companie", $id_companie);
        $row = $this->db->resultSet();
        return $row;
      }
      public function getAllSMS($id_companie){
        $this->db->query("SELECT phone FROM clienti where id_companie = :id_companie and phone != '0' ");
        $this->db->bind(":id_companie", $id_companie);
        $row = $this->db->resultSet();
        return $row;
      }
      public function status($id_companie){
        $this->db->query("SELECT emails, sms  FROM sending where id_companie = :id_companie");
        $this->db->bind(":id_companie", $id_companie);
        $row = $this->db->singleValue();
        $row = json_decode(json_encode($row), true);
        $this->db->query("SELECT email, phone  FROM clienti where id_companie = :id_companie");
        $this->db->bind(":id_companie", $id_companie);
        $row_clienti = $this->db->resultSet();
        $this->db->query("SELECT id_programari FROM programari where id_companie = :id_companie");
        $this->db->bind(":id_companie", $id_companie);
        $row["programari"] = count($this->db->resultSet(),1);
        foreach ($row_clienti as $row_client ) {
          if ($row_client-> email !== "0") {
              // echo $row_client -> email;
              $row["count_emails"]++;
          }elseif ($row_client -> phone !== "0") {
              // echo $row_client -> phone;
              $row["count_phone"]++;
          }else {
          }
        }
        return $row;
      }


}
?>
