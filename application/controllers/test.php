<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {
        $this->home();
    }

    public function home(){
        $data['applicant'] = $this->user_model->getApplicantList();
//        echo "<pre>";
//            print_r($data);
//        echo "</pre>";
        $this->load->view('home',$data);
    }

    public function personal_info($id){
        $data['applicant'] = $this->user_model->applicant_info($id);
//        echo "<pre>";
//        print_r($data);
//        echo "</pre>";
        $this->load->view('personal_info',$data);
    }

    public function financial_info($id){
        $data['financial'] = $this->user_model->get_financial_info($id);
        $data['applicant'] = $this->user_model->applicant_info($id);
//        echo "<pre>";
//        print_r($data);
//        echo "</pre>";
        $this->load->view('financial_info',$data);
    }

    public function education_info($id){
        $data['educational'] = $this->user_model->getEducationInfo($id);
        $data['applicant'] = $this->user_model->applicant_info($id);
        //$data['preference'] = $this->user_model->getPreference($id);
//        echo "<pre>";
//        print_r($data);
//        echo "</pre>";
        $this->load->view('educational_info',$data);
    }

    public function preferences($id){
        $data['preference'] = $this->user_model->getPreference($id);
        $data['applicant'] = $this->user_model->applicant_info($id);
//        echo "<pre>";
//        print_r($data);
//        echo "</pre>";
        $this->load->view('preference',$data);
    }

    public function test() {
        $filename = 'ssc'."123";
        $this->user_model->tempUploadApplicationForm('test1',$filename);
        $filename = "hsc"."123";
        $this->user_model->tempUploadApplicationForm('test2',$filename);
    }

    public function new_applicant(){
        $this->load->view('applicant_reg');
    }

    public function insert_new_applicant(){
        $_POST['applicant_id'] = $this->createId();
        $path = $_FILES['image']['name'];
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        $name= "applicant_".$_POST['applicant_id'];
        if($this->user_model->tempUploadFile('image',$name)){
            $image = 'image'."_"."applicant_".$_POST['applicant_id'];
            copy('./images/temp/'.$image.".".$ext,'images/applicant/'.$image.".".$ext);
            unlink('./images/temp/'.$image.".".$ext);
            $_POST['image'] = $image.".".$ext;
            $this->user_model->insert_applicant_info($_POST['applicant_id']);
            $this->user_model->insert_forms($_POST['applicant_id']);
            redirect('welcome/home');
        }
    }

    public function submit_new_applicant(){
        $this->user_model->insert_applicant_info();
        $this->user_model->insert_forms();
        $this->home();
    }

    public function update_personal_info() {

        if($_FILES['image']['name']){
            $path = $_FILES['image']['name'];
            $ext = pathinfo($path, PATHINFO_EXTENSION);
            $name= "applicant_".$_POST['applicant_id'];
            if($this->user_model->tempUploadFile('image',$name)){
                $data['applicant'] = $this->user_model->applicant_info($_POST['applicant_id']);
                $imageName = 'image'."_".$name;
                $this->updateFile("applicant",$data['applicant']['image'],$imageName,$ext);
                $_POST['image'] = $imageName.'.'.$ext;
                $this->user_model->update_applicant_info();
                redirect("welcome/personal_info/".$_POST['applicant_id']);
                //$_POST['image'] = $imageName;
            }
        } else {
            $this->user_model->update_applicant_info();
            redirect("welcome/personal_info/".$_POST['applicant_id']);
        }
    }

    public function update_education_info(){
        if($_FILES['ssc_attachment']['name']){
            $path = $_FILES['ssc_attachment']['name'];
            $ext = pathinfo($path, PATHINFO_EXTENSION);
            $name= "ssc_attachment_".$_POST['applicant_id'];
            if($this->user_model->tempUploadFile('ssc_attachment',$name)){
                $data['education'] = $this->user_model->get_financial_info($_POST['applicant_id']);
                $imageName = 'image'."_".$name;
                $this->updateFile("ssc_attachment",$data['education']['ssc_attachment'],$imageName,$ext);
                $_POST['ssc_attachment'] = $imageName.'.'.$ext;
                //$_POST['image'] = $imageName;
            }
        }
        if($_FILES['hsc_attachment']['name']){
            $path = $_FILES['hsc_attachment']['name'];
            $ext = pathinfo($path, PATHINFO_EXTENSION);
            $name= "hsc_attachment_".$_POST['applicant_id'];
            if($this->user_model->tempUploadFile('hsc_attachment',$name)){
                $data['education'] = $this->user_model->get_financial_info($_POST['applicant_id']);
                $imageName = 'image'."_".$name;
                $this->updateFile("hsc_attachment",$data['education']['hsc_attachment'],$imageName,$ext);
                $_POST['hsc_attachment'] = $imageName.'.'.$ext;
                //redirect("welcome/financial_info/".$_POST['applicant_id']);
                //$_POST['image'] = $imageName;
            }
        }
        if($_FILES['b_attachment']['name']){
            $path = $_FILES['b_attachment']['name'];
            $ext = pathinfo($path, PATHINFO_EXTENSION);
            $name= "b_attachment_".$_POST['applicant_id'];
            if($this->user_model->tempUploadFile('b_attachment',$name)){
                $data['education'] = $this->user_model->get_financial_info($_POST['applicant_id']);
                $imageName = 'image'."_".$name;
                $this->updateFile("b_attachment",$data['education']['b_attachment'],$imageName,$ext);
                $_POST['b_attachment'] = $imageName.'.'.$ext;
                //redirect("welcome/financial_info/".$_POST['applicant_id']);
                //$_POST['image'] = $imageName;
            }
        }
        if($_FILES['m_attachment']['name']){
            $path = $_FILES['m_attachment']['name'];
            $ext = pathinfo($path, PATHINFO_EXTENSION);
            $name= "m_attachment_".$_POST['applicant_id'];
            if($this->user_model->tempUploadFile('m_attachment',$name)){
                $data['education'] = $this->user_model->get_financial_info($_POST['applicant_id']);
                $imageName = 'image'."_".$name;
                $this->updateFile("m_attachment",$data['education']['m_attachment'],$imageName,$ext);
                $_POST['m_attachment'] = $imageName.'.'.$ext;
                //redirect("welcome/financial_info/".$_POST['applicant_id']);
                //$_POST['image'] = $imageName;
            }
        }
        $this->user_model->update_educational_info();
        redirect("welcome/education_info/".$_POST['applicant_id']);

    }

    public function update_financial_info(){

        if($_FILES['recom_letter']['name']){
            $path = $_FILES['recom_letter']['name'];
            $ext = pathinfo($path, PATHINFO_EXTENSION);
            $name= "recom_letter_".$_POST['applicant_id'];
            if($this->user_model->tempUploadFile('recom_letter',$name)){
                $data['financial'] = $this->user_model->get_financial_info($_POST['applicant_id']);
                $imageName = 'image'."_".$name;
                if($data['financial']['recom_letter']!='')
                    $this->updateFile("recom_letter",$data['financial']['recom_letter'],$imageName,$ext);
                else
                    $this->updateFile("recom_letter","",$imageName,$ext);
                $_POST['recom_letter'] = $imageName.'.'.$ext;
                //$_POST['image'] = $imageName;
            }
        }

        if($_FILES['sop']['name']){
            $path = $_FILES['sop']['name'];
            $ext = pathinfo($path, PATHINFO_EXTENSION);
            $name= "sop_".$_POST['applicant_id'];
            if($this->user_model->tempUploadFile('sop',$name)){
                $data['financial'] = $this->user_model->get_financial_info($_POST['applicant_id']);
                $imageName = 'image'."_".$name;
                if($data['financial']['sop']!='')
                    $this->updateFile("sop",$data['financial']['sop'],$imageName,$ext);
                else
                    $this->updateFile("sop","",$imageName,$ext);
                $_POST['sop'] = $imageName.'.'.$ext;
                //redirect("welcome/financial_info/".$_POST['applicant_id']);
                //$_POST['image'] = $imageName;
            }
        }

        if($_FILES['study_job_certificate']['name']){
            $path = $_FILES['study_job_certificate']['name'];
            $ext = pathinfo($path, PATHINFO_EXTENSION);
            $name= "study_job_certificate_".$_POST['applicant_id'];
            if($this->user_model->tempUploadFile('study_job_certificate',$name)){
                $data['financial'] = $this->user_model->get_financial_info($_POST['applicant_id']);
                $imageName = 'image'."_".$name;
                if($data['financial']['study_job_certificate']!='')
                    $this->updateFile("study_job_certificate",$data['financial']['study_job_certificate'],$imageName,$ext);
                else
                    $this->updateFile("study_job_certificate","",$imageName,$ext);
                $_POST['study_job_certificate'] = $imageName.'.'.$ext;
                //redirect("welcome/financial_info/".$_POST['applicant_id']);
                //$_POST['image'] = $imageName;
            }
        }
        if($_FILES['other_certificate']['name']){
            $path = $_FILES['other_certificate']['name'];
            $ext = pathinfo($path, PATHINFO_EXTENSION);
            $name= "other_certificate_".$_POST['applicant_id'];
            if($this->user_model->tempUploadFile('other_certificate',$name)){
                $data['financial'] = $this->user_model->get_financial_info($_POST['applicant_id']);
                $imageName = 'image'."_".$name;
                if($data['financial']['other_certificate']!='')
                    $this->updateFile("other_certificate",$data['financial']['other_certificate'],$imageName,$ext);
                else
                    $this->updateFile("other_certificate","",$imageName,$ext);
                $_POST['other_certificate'] = $imageName.'.'.$ext;
                //redirect("welcome/financial_info/".$_POST['applicant_id']);
                //$_POST['image'] = $imageName;
            }
        }
        if($_FILES['bank_solvency']['name']){
            $path = $_FILES['bank_solvency']['name'];
            $ext = pathinfo($path, PATHINFO_EXTENSION);
            $name= "bank_solvency_".$_POST['applicant_id'];
            if($this->user_model->tempUploadFile('bank_solvency',$name)){
                $data['financial'] = $this->user_model->get_financial_info($_POST['applicant_id']);
                $imageName = 'image'."_".$name;
                if($data['financial']['bank_solvency']!='')
                    $this->updateFile("bank_solvency",$data['financial']['bank_solvency'],$imageName,$ext);
                else
                    $this->updateFile("bank_solvency","",$imageName,$ext);
                $_POST['bank_solvency'] = $imageName.'.'.$ext;
                //redirect("welcome/financial_info/".$_POST['applicant_id']);
                //$_POST['image'] = $imageName;
            }
        }

        $this->user_model->update_financial_info();
        redirect("welcome/financial_info/".$_POST['applicant_id']);
    }

    private function updateFile($path,$oldName,$newName,$ext){
        //echo './images/'.$path."/".$name;
        //echo './images/'.$path."/".$oldName;
        if($oldName!="")
            unlink('./images/'.$path."/".$oldName);
        copy('./images/temp/'.$newName.".".$ext,'./images/'.$path."/".$newName.".".$ext);
        unlink('./images/temp/'.$newName.".".$ext);
    }

    private function createId(){
        return $this->user_model->createId(date("Ym"));
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */