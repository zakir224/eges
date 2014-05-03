<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin_cont extends CI_Controller {

    public function index()
    {
        $this->home();
    }

    public function home(){
        $data['applicant'] = $this->user_model->getApplicantList();
        $data['app_status'] = $this->user_model->getApplicantState();
        $this->load->view('admin_home',$data);
    }
    public function applicantFile($id){
        $data['applicant'] = $this->user_model->applicant_info($id);
        $data['edu'] = $this->user_model->getEducationInfo($id);
        $data['edu_others'] = $this->user_model->getOtherEducationCertificate($id);
        $data['finance'] = $this->user_model->get_financial_info($id);
        $data['finance_others'] = $this->user_model->getOtherCertificate($id);
        $this->load->view('dashboard',$data);
    }
    public function applicantStatus($id){
        $data['applicant'] = $this->user_model->applicant_info($id);
        $this->load->view('change_status',$data);
    }
    public function delete_applicant($id){
        $this->user_model->delete_id($id);
        $this->home();
    }
    public function financial_info($id){
        $data['financial'] = $this->user_model->get_financial_info($id);
        $data['applicant'] = $this->user_model->applicant_info($id);
        $this->load->view('financial_admin',$data);
    }
    public function personal_info($id){
        $data['financial'] = $this->user_model->get_financial_info($id);
        $data['applicant'] = $this->user_model->applicant_info($id);
        $this->load->view('personal_info_admin',$data);
    }
    public function education_info($id){
        $data['educational'] = $this->user_model->getEducationInfo($id);
        $data['applicant'] = $this->user_model->applicant_info($id);
        $this->load->view('educational_admin',$data);
    }
    public function preferences($id){
        $data['preference'] = $this->user_model->getPreference($id);
        $data['applicant'] = $this->user_model->applicant_info($id);
        $this->load->view('preference_admin',$data);
    }

    public function update_personal_info() {

        if ($_FILES['image']['name']) {
            $path = $_FILES['image']['name'];
            $ext = pathinfo($path, PATHINFO_EXTENSION);
            $name = "applicant_" . $_POST['applicant_id'];

            if ($this->user_model->tempUploadFile('image', $name)) {
                $data['applicant'] = $this->user_model->applicant_info($_POST['applicant_id']);
                $imageName = 'image' . "_" . $name;
                $this->updateFile($_POST['applicant_id'], $data['applicant']['image'], $imageName, $ext);
                $_POST['image'] = $imageName . '.' . $ext;
                $this->user_model->update_applicant_info();
                redirect("admin_cont/personal_info/" . $_POST['applicant_id']);
                //$_POST['image'] = $imageName;
            }
        } else {
            $this->user_model->update_applicant_info();
            redirect("admin_cont/personal_info/" . $_POST['applicant_id']);
        }
    }

    public function update_education_info(){

        if ($_FILES['ssc_attachment']['name']) {
            $path = $_FILES['ssc_attachment']['name'];
            $ext = pathinfo($path, PATHINFO_EXTENSION);
            $name = "ssc_attachment_" . $_POST['applicant_id'];
            if ($this->user_model->tempUploadFile('ssc_attachment', $name)) {
                $data['education'] = $this->user_model->get_financial_info($_POST['applicant_id']);
                $imageName = 'image' . "_" . $name;
                if (isset($data['education']['ssc_attachment']))
                    $this->updateFile($_POST['applicant_id'], $data['education']['ssc_attachment'], $imageName, $ext);
                else
                    $this->updateFile($_POST['applicant_id'], "", $imageName, $ext);
                $_POST['ssc_attachment'] = $imageName . '.' . $ext;
                //$_POST['image'] = $imageName;
            }
        }
        if ($_FILES['hsc_attachment']['name']) {
            $path = $_FILES['hsc_attachment']['name'];
            $ext = pathinfo($path, PATHINFO_EXTENSION);
            $name = "hsc_attachment_" . $_POST['applicant_id'];
            if ($this->user_model->tempUploadFile('hsc_attachment', $name)) {
                $data['education'] = $this->user_model->get_financial_info($_POST['applicant_id']);
                $imageName = 'image' . "_" . $name;
                if (isset($data['education']['hsc_attachment']))
                    $this->updateFile($_POST['applicant_id'], $data['education']['hsc_attachment'], $imageName, $ext);
                else
                    $this->updateFile($_POST['applicant_id'], "", $imageName, $ext);
                $_POST['hsc_attachment'] = $imageName . '.' . $ext;
                //redirect("welcome/financial_info/".$_POST['applicant_id']);
                //$_POST['image'] = $imageName;
            }
        }
        if ($_FILES['b_attachment']['name']) {
            $path = $_FILES['b_attachment']['name'];
            $ext = pathinfo($path, PATHINFO_EXTENSION);
            $name = "b_attachment_" . $_POST['applicant_id'];
            if ($this->user_model->tempUploadFile('b_attachment', $name)) {
                $data['education'] = $this->user_model->get_financial_info($_POST['applicant_id']);
                $imageName = 'image' . "_" . $name;
                if (isset($data['education']['b_attachment']))
                    $this->updateFile($_POST['applicant_id'], $data['education']['b_attachment'], $imageName, $ext);
                else
                    $this->updateFile($_POST['applicant_id'], "", $imageName, $ext);
                $_POST['b_attachment'] = $imageName . '.' . $ext;
                //redirect("welcome/financial_info/".$_POST['applicant_id']);
                //$_POST['image'] = $imageName;
            }
        }
        if ($_FILES['m_attachment']['name']) {
            $path = $_FILES['m_attachment']['name'];
            $ext = pathinfo($path, PATHINFO_EXTENSION);
            $name = "m_attachment_" . $_POST['applicant_id'];
            if ($this->user_model->tempUploadFile('m_attachment', $name)) {
                $data['education'] = $this->user_model->get_financial_info($_POST['applicant_id']);
                $imageName = 'image' . "_" . $name;
                if (isset($data['education']['m_attachment']))
                    $this->updateFile($_POST['applicant_id'], $data['education']['m_attachment'], $imageName, $ext);
                else
                    $this->updateFile($_POST['applicant_id'], "", $imageName, $ext);
                $_POST['m_attachment'] = $imageName . '.' . $ext;
                //redirect("welcome/financial_info/".$_POST['applicant_id']);
                //$_POST['image'] = $imageName;
            }
        }

        if (count($_FILES['other_education']['name'])>0) {
//            echo "<pre>";
//            echo count($_FILES['other_certificate']['name']);exit;
//            echo "</pre>";
            $count = 0;
            foreach ($_FILES['other_education']['name'] as $f => $name) {
                $path = $name;
                $ext = pathinfo($path, PATHINFO_EXTENSION);
                $name = "other_education" . $_POST['applicant_id'] . md5(rand());

                if (move_uploaded_file($_FILES["other_education"]["tmp_name"][$f], "images/" . $_POST['applicant_id'] . "/" . $name . "." . $ext)) {
                    $data['applicant_id'] = $_POST['applicant_id'];
                    $data['other_education'] = $name . "." . $ext;
                    $this->user_model->updateOtherEducationCertificate($data);
                }
//                            $count++; // Number of successfully uploaded file
            }
        }
        $this->user_model->update_educational_info();
        redirect("admin_cont/education_info/".$_POST['applicant_id']);

    }

    public function update_status_info(){
        $applicant['status'] = $_POST['status'];
        $applicant['id'] = $_POST['applicant_id'];
        $applicant['status_s'] = $_POST['status_s'];
        if($applicant['status']=="Other"){
            $this->user_model->update_applicant_info_admin($applicant['id'],$applicant['status_s']);
        }
        else{
            $this->user_model->update_applicant_info_admin($applicant['id'],$applicant['status']);

        }
        redirect("admin_cont/home/" . $_POST['applicant_id']);

    }

    public function update_financial_info(){


        //echo $_FILES['recom_letter']['name'];exit;
        if ($_FILES['recom_letter']['name']) {
            $path = $_FILES['recom_letter']['name'];
            $ext = pathinfo($path, PATHINFO_EXTENSION);
            $name = "recom_letter_" . $_POST['applicant_id'];
            if ($this->user_model->tempUploadFile('recom_letter', $name)) {
                //echo $_FILES['recom_letter']['name'];
                $data['financial'] = $this->user_model->get_financial_info($_POST['applicant_id']);
                $imageName = 'image' . "_" . $name;
                if ($data['financial']['recom_letter'] != '')
                    $this->updateFile($_POST['applicant_id'], $data['financial']['recom_letter'], $imageName, $ext);
                else
                    $this->updateFile($_POST['applicant_id'], "", $imageName, $ext);
                $_POST['recom_letter'] = $imageName . '.' . $ext;
                //$_POST['image'] = $imageName;
            }
        }

        if ($_FILES['sop']['name']) {
            $path = $_FILES['sop']['name'];
            $ext = pathinfo($path, PATHINFO_EXTENSION);
            $name = "sop_" . $_POST['applicant_id'];
            if ($this->user_model->tempUploadFile('sop', $name)) {
                $data['financial'] = $this->user_model->get_financial_info($_POST['applicant_id']);
                $imageName = 'image' . "_" . $name;
                if ($data['financial']['sop'] != '')
                    $this->updateFile($_POST['applicant_id'], $data['financial']['sop'], $imageName, $ext);
                else
                    $this->updateFile($_POST['applicant_id'], "", $imageName, $ext);
                $_POST['sop'] = $imageName . '.' . $ext;
                //redirect("welcome/financial_info/".$_POST['applicant_id']);
                //$_POST['image'] = $imageName;
            }
        }

        if ($_FILES['study_job_certificate']['name']) {
            $path = $_FILES['study_job_certificate']['name'];
            $ext = pathinfo($path, PATHINFO_EXTENSION);
            $name = "study_job_certificate_" . $_POST['applicant_id'];
            if ($this->user_model->tempUploadFile('study_job_certificate', $name)) {
                $data['financial'] = $this->user_model->get_financial_info($_POST['applicant_id']);
                $imageName = 'image' . "_" . $name;
                if ($data['financial']['study_job_certificate'] != '')
                    $this->updateFile($_POST['applicant_id'], $data['financial']['study_job_certificate'], $imageName, $ext);
                else
                    $this->updateFile($_POST['applicant_id'], "", $imageName, $ext);
                $_POST['study_job_certificate'] = $imageName . '.' . $ext;
                //redirect("welcome/financial_info/".$_POST['applicant_id']);
                //$_POST['image'] = $imageName;
            }
        }
        if (count($_FILES['other_certificate']['name'])>0) {
//            echo "<pre>";
//            echo count($_FILES['other_certificate']['name']);exit;
//            echo "</pre>";
            $count = 0;
            foreach ($_FILES['other_certificate']['name'] as $f => $name) {
                $path = $name;
                $ext = pathinfo($path, PATHINFO_EXTENSION);
                $name = "other_certificate_" . $_POST['applicant_id'] . md5(rand());

                if (move_uploaded_file($_FILES["other_certificate"]["tmp_name"][$f], "images/" . $_POST['applicant_id'] . "/" . $name . "." . $ext)) {
                    $data['applicant_id'] = $_POST['applicant_id'];
                    $data['other_certificate'] = $name . "." . $ext;
                    $this->user_model->updateOtherCertificate($data);
                }
//                            $count++; // Number of successfully uploaded file
            }
        }
        //echo "done";exit;
        if ($_FILES['bank_solvency']['name']) {
            $path = $_FILES['bank_solvency']['name'];
            $ext = pathinfo($path, PATHINFO_EXTENSION);
            $name = "bank_solvency_" . $_POST['applicant_id'];
            if ($this->user_model->tempUploadFile('bank_solvency', $name)) {
                $data['financial'] = $this->user_model->get_financial_info($_POST['applicant_id']);
                $imageName = 'image' . "_" . $name;
                if ($data['financial']['bank_solvency'] != '')
                    $this->updateFile($_POST['applicant_id'], $data['financial']['bank_solvency'], $imageName, $ext);
                else
                    $this->updateFile($_POST['applicant_id'], "", $imageName, $ext);
                $_POST['bank_solvency'] = $imageName . '.' . $ext;
                //redirect("welcome/financial_info/".$_POST['applicant_id']);
                //$_POST['image'] = $imageName;
            }
        }

        if ($_FILES['bank_statement']['name']) {
            //echo "dddd";exit;
            $path = $_FILES['bank_statement']['name'];
            $ext = pathinfo($path, PATHINFO_EXTENSION);
            $name = "bank_statement_" . $_POST['applicant_id'];
            if ($this->user_model->tempUploadFile('bank_statement', $name)) {
                $data['financial'] = $this->user_model->get_financial_info($_POST['applicant_id']);
                $imageName = 'image' . "_" . $name;
                if ($data['financial']['bank_statement'] != '')
                    $this->updateFile($_POST['applicant_id'], $data['financial']['bank_statement'], $imageName, $ext);
                else
                    $this->updateFile($_POST['applicant_id'], "", $imageName, $ext);
                $_POST['bank_statement'] = $imageName . '.' . $ext;
                //redirect("welcome/financial_info/".$_POST['applicant_id']);
                //$_POST['image'] = $imageName;
            }
        }


        $this->user_model->update_financial_info();

        redirect("admin_cont/financial_info/".$_POST['applicant_id']);
    }

    private function updateFile($path,$oldName,$newName,$ext){
        //echo './images/'.$path."/".$name;
        //echo './images/'.$path."/".$oldName;
        if($oldName!="")
            unlink('./images/'.$path."/".$oldName);
        copy('./images/temp/'.$newName.".".$ext,'./images/'.$path."/".$newName.".".$ext);
        unlink('./images/temp/'.$newName.".".$ext);
    }


    public function downloadAttachment($id)
    {

        // Generate PDF by saying hello to the world
        $this->load->library('pdf');
        $pdf = new Pdf();
        $pdf->AliasNbPages();

        $data['financial'] = $this->user_model->get_financial_info($id);
        $data['other_certificate'] = $this->user_model->getOtherCertificate($id);
        $images = array(0 => $data['financial']['recom_letter'], 1 => $data['financial']['study_job_certificate'],
            2 => $data['financial']['sop'],);

        for ($i = 0; $i < count($data['other_certificate']); $i++) {
            array_push($images, $data['other_certificate'][$i]['other_certificate']);
        }

        $pdf->SetFont('Times', '', 8);
        //for($i=1;$i<=40;$i++)
        for ($i = 0; $i < count($images); $i++) {
            $config['image_library'] = 'gd2';
            $config['source_image'] = 'images/' . $id . "/" . $images[$i];
            $config['create_thumb'] = TRUE;
            $config['maintain_ratio'] = TRUE;
            $config['width'] = 400;
            //$config['height'] = 50;

            $this->load->library('image_lib', $config);

            $this->image_lib->resize();
            if ($images[$i] != "") {
                $pdf->AddPage();

                $pdf->Image('images/' . $id . "/" . $images[$i], $pdf->GetX(), $pdf->GetY());
            }
        }
//        $pdf->Image('images/'.$id."/".$data['financial']['study_job_certificate'], $pdf->GetX(), $pdf->GetY());
//        $pdf->AddPage();
//        $pdf->Image('images/'.$id."/".$data['financial']['sop'], $pdf->GetX(), $pdf->GetY());
        $pdf->Output();
    }

    function csv(){
        $this->user_model->exportCsv();
    }

}
