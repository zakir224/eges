<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model{

    public function __construct()
    {
        parent::__construct();
    }

    public function createId($idInitial){
        $sql = "SELECT applicant_id+1\n"
            . "FROM applicant\n"
            . "WHERE applicant_id LIKE '$idInitial%'\n"
            . "ORDER BY applicant_id DESC\n"
            . "LIMIT 1";
        if(count($this->db->query($sql)->row_array())==0) {
            return $idInitial."001";
        } else
        {
            $data = $this->db->query($sql)->row_array();
            return $data['applicant_id+1'];
        }
    }


    public function insert_applicant_info($id){

        $fn = $_POST['first_name'];
        $ln = $_POST['last_name'];
        $gender = $_POST['gender'];
        $dob = $_POST['d_o_b'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $image = $_POST['image'];

        $sql = "INSERT INTO applicant (id, applicant_id, first_name, last_name,
         passport, father_name, mother_name, d_o_b, present_add, parmanent_add,
         email, mobile, guardian_mobile, religion, passport_no, gender, national_id,
         ielts_toefl_score, gre_gmat_score, image) VALUES
         (NULL, '$id', '$fn', '$ln', '', '', '', '$dob', '', '', '$email', '$mobile', '', '', '', '$gender', '', '', '', '$image');";

        $this->db->query($sql);
    }

    public function find_last() {
        $sql= "select id from applicant order by id DESC limit 1";
        $query = $this->db->query($sql);
        return $query->row_array();
    }

    function do_upload($file, $data) {

        $config['upload_path'] = 'images/user/';
        $config['file_name'] = 'image'."_".$data;
        $config['allowed_types'] = 'png|jpg';
        $config['max_size'] = '200';
        $document['path'] = $config['upload_path'];

//        echo '<pre>';
//        print_r($config);
//        die();

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        $uploaddone = $this->upload->do_upload($file);
//        echo $this->upload->display_errors();
//        die();

        if (!$uploaddone) {
            return array();
        } else {
            $document = $this->upload->data();
        }
        return $document;


    }

    function insert_educational_info($ssc,$hsc,$bsc,$msc,$target,$pref)
    {
        $this->db->insert('ssc', $ssc);
        $this->db->insert('hsc', $hsc);
        $this->db->insert('bachelors', $bsc);
        $this->db->insert('masters', $msc);
        $this->db->insert('target_study', $target);
        $this->db->insert('preference', $pref);
    }

    function get_ssc_data($id){
        $sql = "SELECT * FROM ssc where applicant_id = '$id'";
        $query = $this->db->query($sql);
        $temp = $query->row_array();
        return $temp;
    }

    function get_hsc_data($id){
        $sql = "SELECT * FROM hsc where applicant_id = '$id'";
        $query = $this->db->query($sql);
        $temp = $query->row_array();
        return $temp;
    }

    function get_bsc_data($id){
        $sql = "SELECT * FROM bachelors where applicant_id = '$id'";
        $query = $this->db->query($sql);
        $temp = $query->row_array();
        return $temp;
    }

    function get_msc_data($id){
        $sql = "SELECT * FROM masters where applicant_id = '$id'";
        $query = $this->db->query($sql);
        $temp = $query->row_array();
        return $temp;
    }

    function get_target_study($id){
        $sql = "SELECT * FROM target_study where applicant_id = '$id' limit 1";
        $query = $this->db->query($sql);
        $temp = $query->row_array();
        return $temp;
    }

    function get_preference($id){
        $sql = "SELECT * FROM target_study where applicant_id = '$id' limit 1";
        $query = $this->db->query($sql);
        $temp = $query->row_array();
        return $temp;
    }

    function get_applicant_info($id){
        $sql = "SELECT * FROM applicant where applicant_id = '$id' limit 1";
        $query = $this->db->query($sql);
        $temp = $query->row_array();
        return $temp;
    }

    function get_financial_info($id){
        $sql = "SELECT * FROM financial_info where applicant_id = '$id' limit 1";
        $query = $this->db->query($sql);
        $temp = $query->row_array();
        return $temp;
    }

    function getEducationInfo($id){
        $sql = "SELECT * FROM
                (((ssc join hsc using(applicant_id))
                join bachelors using(applicant_id)) join masters using(applicant_id))
                where applicant_id = '$id' limit 1";
        $query = $this->db->query($sql);
        $temp = $query->row_array();
        return $temp;
    }

    public function getPreference($id){
        $sql = "SELECT * FROM
                preference join target_study using(applicant_id)
                where applicant_id = '$id' limit 1";
        $query = $this->db->query($sql);
        $temp = $query->row_array();
        return $temp;
    }

    function update_educational_info()
    {
        $ssc['ssc_gpa_result'] = $_POST['ssc_gpa_result'];
        $ssc['ssc_institution'] = $_POST['ssc_institution'];
        $ssc['ssc_board'] = $_POST['ssc_board'];
        $ssc['ssc_passing_year'] = $_POST['ssc_passing_year'];
        if(isset($_POST['ssc_certificate']))
            $ssc['ssc_certificate'] = $_POST['ssc_certificate'];
        if(isset($_POST['ssc_marksheet']))
            $ssc['ssc_marksheet'] = $_POST['ssc_marksheet'];
        $this->db->where('applicant_id',$_POST['applicant_id']);
        $this->db->update('ssc',$ssc);

        $hsc['hsc_gpa_result'] = $_POST['hsc_gpa_result'];
        $hsc['hsc_institution'] = $_POST['hsc_institution'];
        $hsc['hsc_board'] = $_POST['hsc_board'];
        $hsc['hsc_passing_year'] = $_POST['hsc_passing_year'];
        if(isset($_POST['hsc_certificate']))
            $hsc['hsc_certificate'] = $_POST['hsc_certificate'];
        if(isset($_POST['hsc_marksheet']))
            $hsc['hsc_marksheet'] = $_POST['hsc_marksheet'];
        $this->db->where('applicant_id',$_POST['applicant_id']);
        $this->db->update('hsc',$hsc);

        $bsc['b_gpa_result'] = $_POST['b_gpa_result'];
        $bsc['b_institution'] = $_POST['b_institution'];
        $bsc['b_subject'] = $_POST['b_subject'];
        $bsc['b_passing_year'] = $_POST['b_passing_year'];
        if(isset($_POST['b_certificate']))
            $bsc['b_certificate'] = $_POST['b_certificate'];
        if(isset($_POST['b_marksheet']))
            $bsc['b_marksheet'] = $_POST['b_marksheet'];
        $this->db->where('applicant_id',$_POST['applicant_id']);
        $this->db->update('bachelors',$bsc);

        $msc['m_gpa_result'] = $_POST['m_gpa_result'];
        $msc['m_institution'] = $_POST['m_institution'];
        $msc['m_subject'] = $_POST['m_subject'];
        $msc['m_passing_year'] = $_POST['m_passing_year'];
        if(isset($_POST['m_certificate']))
            $msc['m_certificate'] = $_POST['m_certificate'];
        if(isset($_POST['m_marksheet']))
            $msc['m_marksheet'] = $_POST['m_marksheet'];
        $this->db->where('applicant_id',$_POST['applicant_id']);
        $this->db->update('masters',$msc);
    }

    function login_check($data){
        $sql = "SELECT * FROM applicant join applicant_status using(applicant_id) where email='".$data['email']."' and password='".$data['password']."' limit 1";
        $query = $this->db->query($sql);
        $temp = $query->row_array();
        return $temp;
    }

    function insert_forms($applicant_id) {                  /*Called when a new applicant information is added in the system*/
        //$insert['applicant_id'] =$data['applicant_id'];

        $sql = "INSERT INTO bachelors ( applicant_id, b_subject, b_gpa_result, b_institution, b_passing_year, b_certificate,b_marksheet)
                VALUES ( '$applicant_id', '', '', '', '', '', '');";
        $query = $this->db->query($sql);
        $sql = "INSERT INTO masters ( applicant_id, m_subject, m_gpa_result, m_institution, m_passing_year, m_certificate,m_marksheet)
                VALUES ( '$applicant_id', '', '', '', '', '','');";
        $query = $this->db->query($sql);
        $sql = "INSERT INTO hsc ( applicant_id, hsc_gpa_result, hsc_institution, hsc_board, hsc_passing_year, hsc_certificate,hsc_marksheet)
         VALUES ( '$applicant_id', '', '', '', '', '','');";
        $query = $this->db->query($sql);
        $sql = "INSERT INTO ssc ( applicant_id, ssc_gpa_result, ssc_institution, ssc_board, ssc_passing_year, ssc_certificate,ssc_marksheet)
         VALUES ( '$applicant_id', '', '', '', '', '','');";
        $query = $this->db->query($sql);
        $sql = "INSERT INTO target_study ( applicant_id, level, session, year, country, state, city)
        VALUES ( '$applicant_id','' , '','' ,'' ,'' ,'' );";
        $query = $this->db->query($sql);
        $sql = "INSERT INTO financial_info (applicant_id, yearly_expense, relative_info, relative_support, recom_letter, sop, study_job_certificate, sponsor_info, bank_solvency)
        VALUES ( '$applicant_id','' ,'' ,'' ,'' , '', '','', '');";
        $query = $this->db->query($sql);
        $sql = "INSERT INTO applicant_status (
                applicant_status_id ,
                applicant_id ,
                status
                )
                VALUES (
                NULL , '$applicant_id', 'Initial State'
                );";

        $query = $this->db->query($sql);

        $sql = "INSERT INTO preference ( applicant_id, institution) VALUES ( '$applicant_id', '');";

        $query = $this->db->query($sql);
    }

    function update_applicant_info() {
        $this->db->where('applicant_id', $_POST['applicant_id']);
        $this->db->update('applicant', $_POST);
    }

    function update_financial_info() {
        $this->db->where('applicant_id', $_POST['applicant_id']);
        $this->db->update('financial_info', $_POST);
    }

    function applicant_info($id){
        $sql = "SELECT * FROM applicant join applicant_status using(applicant_id) where applicant_id='$id'";
        $query = $this->db->query($sql);
        return $query->row_array();
    }

    function getApplicantList(){
        $sql = "SELECT * FROM applicant";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function change_password($pass,$id) {
        $sql = "update applicant set password='$pass' where applicant_id='$id'";
        $query = $this->db->query($sql);
    }

    function change_image($image,$id) {
        $sql = "update applicant set image='$image' where applicant_id='$id'";
        $query = $this->db->query($sql);
    }
    function tempUploadFile( $file,$name) {

        $config['upload_path'] = 'images/temp/';
        $config['file_name'] = 'image'."_".$name;
        $config['allowed_types'] = 'png|jpg';
        $config['max_size'] = '1000';
        $document['path'] = $config['upload_path'];

//        echo '<pre>';
//        print_r($config);
//        die();

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        $uploaddone = $this->upload->do_upload($file);
//        echo $this->upload->display_errors();
//        die();

        if (!$uploaddone) {
            return array();
        } else {
            $document = $this->upload->data();
        }
        return $document;
    }

    public function updateOtherCertificate($data) {
        $id= $data['applicant_id'];
        $name = $data['other_certificate'];
        $sql = "INSERT INTO other_certificate (other_cer_id, applicant_id, other_certificate) VALUES (NULL, '$id', '$name');";
        $query = $this->db->query($sql);
    }

    public function updateBankStatement($data) {
        $id= $data['applicant_id'];
        $name = $data['bank_statement'];
        $sql = "INSERT INTO bank_statement (applicant_id, bank_statement) VALUES ( '$id', '$name');";
        $query = $this->db->query($sql);
    }

    public function updateRecomLetter($data) {
        $id= $data['applicant_id'];
        $name = $data['recom_letter'];
        $sql = "INSERT INTO recom_letter (applicant_id, recom_letter) VALUES ( '$id', '$name');";
        $query = $this->db->query($sql);
    }

    public function updateOtherEducationCertificate($data) {
        $id= $data['applicant_id'];
        $name = $data['other_education'];
        $sql = "INSERT INTO other_education (other_edu_id, applicant_id, other_edu_certificate) VALUES (NULL, '$id', '$name');";
        $query = $this->db->query($sql);
    }

    public function getOtherCertificate($id) {
        $query=  $this->db->get_where('other_certificate', array('applicant_id' => $id));
        return $query->result_array();
    }

    public function getRecomLetter($id) {
        $query=  $this->db->get_where('recom_letter', array('applicant_id' => $id));
        return $query->result_array();
    }

    public function getBankStatement($id) {
        $query=  $this->db->get_where('bank_statement', array('applicant_id' => $id));
        return $query->result_array();
    }

    public function getOtherEducationCertificate($id) {
        $query=  $this->db->get_where('other_education', array('applicant_id' => $id));
        return $query->result_array();
    }

    public function check_duplicate_email() {
        $email = $this->input->post('email');
        $sql = "SELECT email FROM applicant where email='$email'";
        $query = $this->db->query($sql);
        return $query->row_array();
    }

    function getApplicantState(){
        $sql = "SELECT * FROM applicant_status";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function delete_id($id){
        $this->db->delete('applicant', array('applicant_id' => $id));
        $this->db->delete('applicant_status', array('applicant_id' => $id));
        $this->db->delete('bachelors', array('applicant_id' => $id));
        $this->db->delete('financial_info', array('applicant_id' => $id));
        $this->db->delete('hsc', array('applicant_id' => $id));
        $this->db->delete('masters', array('applicant_id' => $id));
        $this->db->delete('preference', array('applicant_id' => $id));
        $this->db->delete('ssc', array('applicant_id' => $id));
        $this->db->delete('target_study', array('applicant_id' => $id));
        //rmdir('images/'.$id);
        $dir = 'images/'.$id;
        $files = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS),
            RecursiveIteratorIterator::CHILD_FIRST
        );

        foreach ($files as $fileinfo) {
            $todo = ($fileinfo->isDir() ? 'rmdir' : 'unlink');
            $todo($fileinfo->getRealPath());
        }

        rmdir($dir);

    }

    function update_applicant_info_admin($id,$s) {
        $sql = "UPDATE applicant_status SET status='$s' WHERE applicant_id='$id'";
        $query = $this->db->query($sql);
    }

    function exportCsv()
    {
        $output="";
        $sql = mysql_query("select applicant_id,first_name,last_name from applicant");
        $columns_total = mysql_num_fields($sql);

// Get The Field Name

        for ($i = 0; $i < $columns_total; $i++) {
            $heading = mysql_field_name($sql, $i);
            $output .= '"'.$heading.'",';
        }
        $output .="\n";

// Get Records from the table

        while ($row = mysql_fetch_array($sql)) {
            for ($i = 0; $i < $columns_total; $i++) {
                $output .='"'.$row["$i"].'",';
            }
            $output .="\n";
        }

// Download the file

        $filename = "myFile.csv";
        header('Content-type: application/csv');
        header('Content-Disposition: attachment; filename='.$filename);

        echo $output;
    }
}



?>