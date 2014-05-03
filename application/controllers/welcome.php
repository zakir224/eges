<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *        http://example.com/index.php/welcome
     *    - or -
     *        http://example.com/index.php/welcome/index
     *    - or -
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

    public function home()
    {
        $data['applicant'] = $this->user_model->getApplicantList();
//        echo "<pre>";
//            print_r($data);
//        echo "</pre>";
        $this->load->view('home', $data);
    }

    public function personal_info($id)
    {
        $data['applicant'] = $this->user_model->applicant_info($id);
//        echo "<pre>";
//        print_r($data);
//        echo "</pre>";
        $this->load->view('personal_info', $data);
    }

    public function financial_info($id)
    {
        $data['financial'] = $this->user_model->get_financial_info($id);
        $data['other_certificate'] = $this->user_model->getOtherCertificate($id);
        $data['applicant'] = $this->user_model->applicant_info($id);
//        echo "<pre>";
//        print_r($data);
//        exit;
//        echo "</pre>";
        $this->load->view('financial_info', $data);
    }

    public function education_info($id)
    {
        $data['educational'] = $this->user_model->getEducationInfo($id);
        $data['applicant'] = $this->user_model->applicant_info($id);
        $data['other_education'] = $this->user_model->getOtherEducationCertificate($id);
        //$data['preference'] = $this->user_model->getPreference($id);
//        echo "<pre>";
//        print_r($data);
//        echo "</pre>";
        $this->load->view('educational_info', $data);
    }

    public function preferences($id)
    {
        $data['preference'] = $this->user_model->getPreference($id);
        $data['applicant'] = $this->user_model->applicant_info($id);
//        echo "<pre>";
//        print_r($data);
//        echo "</pre>";
        $this->load->view('preference', $data);
    }

    public function test()
    {
        $filename = 'ssc' . "123";
        $this->user_model->tempUploadApplicationForm('test1', $filename);
        $filename = "hsc" . "123";
        $this->user_model->tempUploadApplicationForm('test2', $filename);
    }

    public function new_applicant()
    {
        $this->load->view('applicant_reg');
    }

    public function insert_new_applicant()
    {
        $_POST['applicant_id'] = $this->createId();
        $path = $_FILES['image']['name'];
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        $name = "applicant_" . $_POST['applicant_id'];
        mkdir("images/" . $_POST['applicant_id']);

        if ($this->user_model->tempUploadFile('image', $name)) {
            ;
            $image = 'image' . "_" . "applicant_" . $_POST['applicant_id'];
            copy('./images/temp/' . $image . "." . $ext, "images/" . $_POST['applicant_id'] . "/" . $image . "." . $ext);
            unlink('./images/temp/' . $image . "." . $ext);
            $_POST['image'] = $image . "." . $ext;
            $this->user_model->insert_applicant_info($_POST['applicant_id']);
            $this->user_model->insert_forms($_POST['applicant_id']);
            redirect('welcome/home');
        }
        //echo "images/".$_POST['applicant_id']."/".$image.".".$ext;
    }

//    public function submit_new_applicant(){
//        $this->user_model->insert_applicant_info();
//        $this->user_model->insert_forms();
//        $this->home();
//    }

    public function update_personal_info()
    {

        if ($_FILES['image']['name']) {
            $path = $_FILES['image']['name'];
            $ext = pathinfo($path, PATHINFO_EXTENSION);
            $name = "applicant_" . $_POST['applicant_id'];

            if ($this->user_model->tempUploadFile('image', $name)) {
                $data['applicant'] = $this->user_model->applicant_info($_POST['applicant_id']);
                $imageName = 'image' . "_" . $name;
                $this->updateFile($_POST['applicant_id'], $data['applicant']['image'], $imageName, $ext);
                $_POST['image'] = $imageName . '.' . $ext;
                //$this->user_model->update_applicant_info();
                //redirect("welcome/personal_info/" . $_POST['applicant_id']);
                //$_POST['image'] = $imageName;
            }
        } if ($_FILES['passport']['name']) {
        $path = $_FILES['passport']['name'];
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        $name = "passport_" . $_POST['applicant_id'];

        if ($this->user_model->tempUploadFile('passport', $name)) {
            $data['applicant'] = $this->user_model->applicant_info($_POST['applicant_id']);
            $imageName = 'image' . "_" . $name;
            $this->updateFile($_POST['applicant_id'], $data['applicant']['passport'], $imageName, $ext);
            $_POST['passport'] = $imageName . '.' . $ext;
            $this->user_model->update_applicant_info();
            redirect("welcome/personal_info/" . $_POST['applicant_id']);
            //$_POST['image'] = $imageName;
        }
    } else {
            $this->user_model->update_applicant_info();
            redirect("welcome/personal_info/" . $_POST['applicant_id']);
        }
    }

    public function update_education_info()
    {

        if ($_FILES['ssc_certificate']['name']) {
            $path = $_FILES['ssc_certificate']['name'];
            $ext = pathinfo($path, PATHINFO_EXTENSION);
            $name = "ssc_certificate_" . $_POST['applicant_id'];
            if ($this->user_model->tempUploadFile('ssc_certificate', $name)) {
                $data['education'] = $this->user_model->get_financial_info($_POST['applicant_id']);
                $imageName = 'image' . "_" . $name;
                if (isset($data['education']['ssc_certificate']))
                    $this->updateFile($_POST['applicant_id'], $data['education']['ssc_certificate'], $imageName, $ext);
                else
                    $this->updateFile($_POST['applicant_id'], "", $imageName, $ext);
                $_POST['ssc_certificate'] = $imageName . '.' . $ext;
                //$_POST['image'] = $imageName;
            }
        }

        if ($_FILES['ssc_marksheet']['name']) {
            $path = $_FILES['ssc_marksheet']['name'];
            $ext = pathinfo($path, PATHINFO_EXTENSION);
            $name = "ssc_marksheet_" . $_POST['applicant_id'];
            if ($this->user_model->tempUploadFile('ssc_marksheet', $name)) {
                $data['education'] = $this->user_model->get_financial_info($_POST['applicant_id']);
                $imageName = 'image' . "_" . $name;
                if (isset($data['education']['ssc_marksheet']))
                    $this->updateFile($_POST['applicant_id'], $data['education']['ssc_marksheet'], $imageName, $ext);
                else
                    $this->updateFile($_POST['applicant_id'], "", $imageName, $ext);
                $_POST['ssc_marksheet'] = $imageName . '.' . $ext;
                //$_POST['image'] = $imageName;
            }
        }
        if ($_FILES['hsc_certificate']['name']) {
            $path = $_FILES['hsc_certificate']['name'];
            $ext = pathinfo($path, PATHINFO_EXTENSION);
            $name = "hsc_certificate_" . $_POST['applicant_id'];
            if ($this->user_model->tempUploadFile('hsc_certificate', $name)) {
                $data['education'] = $this->user_model->get_financial_info($_POST['applicant_id']);
                $imageName = 'image' . "_" . $name;
                if (isset($data['education']['hsc_certificate']))
                    $this->updateFile($_POST['applicant_id'], $data['education']['hsc_certificate'], $imageName, $ext);
                else
                    $this->updateFile($_POST['applicant_id'], "", $imageName, $ext);
                $_POST['hsc_certificate'] = $imageName . '.' . $ext;
                //redirect("welcome/financial_info/".$_POST['applicant_id']);
                //$_POST['image'] = $imageName;
            }
        }
        if ($_FILES['hsc_marksheet']['name']) {
            $path = $_FILES['hsc_marksheet']['name'];
            $ext = pathinfo($path, PATHINFO_EXTENSION);
            $name = "hsc_marksheet_" . $_POST['applicant_id'];
            if ($this->user_model->tempUploadFile('hsc_marksheet', $name)) {
                $data['education'] = $this->user_model->get_financial_info($_POST['applicant_id']);
                $imageName = 'image' . "_" . $name;
                if (isset($data['education']['hsc_marksheet']))
                    $this->updateFile($_POST['applicant_id'], $data['education']['hsc_marksheet'], $imageName, $ext);
                else
                    $this->updateFile($_POST['applicant_id'], "", $imageName, $ext);
                $_POST['hsc_marksheet'] = $imageName . '.' . $ext;
                //$_POST['image'] = $imageName;
            }
        }
        if ($_FILES['b_certificate']['name']) {
            $path = $_FILES['b_certificate']['name'];
            $ext = pathinfo($path, PATHINFO_EXTENSION);
            $name = "b_certificate_" . $_POST['applicant_id'];
            if ($this->user_model->tempUploadFile('b_certificate', $name)) {
                $data['education'] = $this->user_model->get_financial_info($_POST['applicant_id']);
                $imageName = 'image' . "_" . $name;
                if (isset($data['education']['b_certificate']))
                    $this->updateFile($_POST['applicant_id'], $data['education']['b_certificate'], $imageName, $ext);
                else
                    $this->updateFile($_POST['applicant_id'], "", $imageName, $ext);
                $_POST['b_certificate'] = $imageName . '.' . $ext;
                //redirect("welcome/financial_info/".$_POST['applicant_id']);
                //$_POST['image'] = $imageName;
            }
        }

        if ($_FILES['b_marksheet']['name']) {
            $path = $_FILES['b_marksheet']['name'];
            $ext = pathinfo($path, PATHINFO_EXTENSION);
            $name = "b_marksheet_" . $_POST['applicant_id'];
            if ($this->user_model->tempUploadFile('b_marksheet', $name)) {
                $data['education'] = $this->user_model->get_financial_info($_POST['applicant_id']);
                $imageName = 'image' . "_" . $name;
                if (isset($data['education']['b_marksheet']))
                    $this->updateFile($_POST['applicant_id'], $data['education']['b_marksheet'], $imageName, $ext);
                else
                    $this->updateFile($_POST['applicant_id'], "", $imageName, $ext);
                $_POST['b_marksheet'] = $imageName . '.' . $ext;
                //$_POST['image'] = $imageName;
            }
        }
        if ($_FILES['m_certificate']['name']) {
            $path = $_FILES['m_certificate']['name'];
            $ext = pathinfo($path, PATHINFO_EXTENSION);
            $name = "m_certificate_" . $_POST['applicant_id'];
            if ($this->user_model->tempUploadFile('m_certificate', $name)) {
                $data['education'] = $this->user_model->get_financial_info($_POST['applicant_id']);
                $imageName = 'image' . "_" . $name;
                if (isset($data['education']['m_certificate']))
                    $this->updateFile($_POST['applicant_id'], $data['education']['m_certificate'], $imageName, $ext);
                else
                    $this->updateFile($_POST['applicant_id'], "", $imageName, $ext);
                $_POST['m_certificate'] = $imageName . '.' . $ext;
                //redirect("welcome/financial_info/".$_POST['applicant_id']);
                //$_POST['image'] = $imageName;
            }
        }
        if ($_FILES['m_marksheet']['name']) {
            $path = $_FILES['m_marksheet']['name'];
            $ext = pathinfo($path, PATHINFO_EXTENSION);
            $name = "m_marksheet_" . $_POST['applicant_id'];
            if ($this->user_model->tempUploadFile('m_marksheet', $name)) {
                $data['education'] = $this->user_model->get_financial_info($_POST['applicant_id']);
                $imageName = 'image' . "_" . $name;
                if (isset($data['education']['m_marksheet']))
                    $this->updateFile($_POST['applicant_id'], $data['education']['m_marksheet'], $imageName, $ext);
                else
                    $this->updateFile($_POST['applicant_id'], "", $imageName, $ext);
                $_POST['m_marksheet'] = $imageName . '.' . $ext;
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
        redirect("welcome/education_info/" . $_POST['applicant_id']);

    }

    public function update_financial_info()
    {

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
        redirect("welcome/financial_info/" . $_POST['applicant_id']);
    }

    private function updateFile($path, $oldName, $newName, $ext)
    {
        if ($oldName != "")
            unlink('./images/' . $path . "/" . $oldName);
        copy('./images/temp/' . $newName . "." . $ext, './images/' . $path . "/" . $newName . "." . $ext);
        unlink('./images/temp/' . $newName . "." . $ext);
    }

    private function createId()
    {
        return $this->user_model->createId(date("Ym"));
    }

    public function downloadAttachment($id)
    {
        $applicant = $this->user_model->applicant_info($id);

        $pdfFilePath = $id."_".$applicant['first_name'].".pdf";


        if (file_exists($pdfFilePath) == FALSE)
        {
            $data['financial'] = $this->user_model->get_financial_info($id);
            $data['education'] = $this->user_model->getEducationInfo($id);
            $data['other_certificate'] = $this->user_model->getOtherCertificate($id);
            $data['applicant'] = $this->user_model->applicant_info($id);
            $data['other_education'] = $this->user_model->getOtherEducationCertificate($id);
            $data['images'] =
                array(
                0 => $data['applicant']['passport'],
                1 => $data['applicant']['image'],
                2 => $data['financial']['recom_letter'],
                3 => $data['financial']['study_job_certificate'],
                4 => $data['financial']['sop'],
                5 => $data['education']['ssc_certificate'],
                6 => $data['education']['ssc_marksheet'],
                7 => $data['education']['hsc_certificate'],
                8 => $data['education']['hsc_marksheet'],
                9 => $data['education']['b_certificate'],
                10 => $data['education']['b_marksheet'],
                11 => $data['education']['m_certificate'],
                12 => $data['education']['m_marksheet']);
            $data['id']=$id;

            for ($i = 0; $i < count($data['other_certificate']); $i++) {
            array_push($data['images'], $data['other_certificate'][$i]['other_certificate']);
            }

            for ($i = 0; $i < count($data['other_education']); $i++) {
                array_push($data['images'], $data['other_education'][$i]['other_edu_certificate']);
            }

            $data['financial'] = $this->user_model->get_financial_info($id);
            ini_set('memory_limit','32M');
            $html = $this->load->view('attachment', $data, true);

            $this->load->library('pdf');
            $pdf = $this->pdf->load();
            $pdf->SetHeader("Education for Destination | Expert Global Education Services | ".$id." ".$applicant['first_name']);
            $pdf->SetFooter("EGES All rights reserved ,".$_SERVER['HTTP_HOST'].'|{PAGENO}|'.date(DATE_RFC822));
            $pdf->WriteHTML($html);
            $pdf->Output($pdfFilePath, 'D');
        }
    }



}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */