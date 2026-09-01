<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="“TESDA, as an Equal Opportunity agency, encourages a more diverse and inclusive workforce. Hence, applicants will not be discriminated on account of gender, sexual orientation, civil status, disability, religion, ethnicity, or political affiliation, provided, however that they meet the minimum requirements of the position to be filled”.">
    <meta name="author" content="John Lee P. Santiago">
    <meta name="keywords" content="TESDA DOS Job Portal, TESDA Region 02 Job Portal, TESAD Online Application Form">

    <!-- Title Page-->
    <title>TESDA DOS: Job Portal</title>

    <!-- Open Graph-->
    <meta property="og:title" content="TESDA DOS Integrated System (TDIS)">
    <meta property="og:site_name" content="TESDA DOS Integrated System (TDIS)">
    <meta property="og:url" content="<?= base_url();?>">
    <meta property="og:description" content="TESDA DOS Integrated System (TDIS) is a one-stop application that provides different TESDA services in one place.">
    <meta property="og:type" content="website">
    <meta property="og:image" content="<?= base_url();?>assets/img/OG.png">

    <!-- Favicon-->
    <link rel="shortcut icon" href="<?= base_url();?>assets/img/Logo.png">

    <!-- Fontfaces CSS-->
    <link href="<?= base_url()?>jobportal/css/font-face.css" rel="stylesheet" media="all">
    <link href="<?= base_url()?>jobportal/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url()?>jobportal/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url()?>jobportal/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="<?= base_url()?>jobportal/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="<?= base_url()?>jobportal/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url()?>jobportal/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url()?>jobportal/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="<?= base_url()?>jobportal/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url()?>jobportal/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="<?= base_url()?>jobportal/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="<?= base_url()?>jobportal/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="<?= base_url()?>jobportal/css/theme.css" rel="stylesheet" media="all">

    <!-- Jquery JS-->
    <script src="<?= base_url()?>jobportal/vendor/jquery-3.2.1.min.js"></script>

   <!-- DataTables-->
   <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
   <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>  
   
    <!-- Captcha-->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <style>
        .file-drop-area {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        max-width: 100%;
        height: 100px;
        border: 2px dashed #007bff;
        border-radius: 8px;
        background-color: #f8f9fa;
        margin-bottom: 20px;
        transition: border-color 0.3s, background-color 0.3s;
        cursor: pointer;
        text-align: center;
        }

        .file-drop-area:hover {
        border-color: #0056b3;
        background-color: #e9ecef;
        }

        .fake-btn {
        font-size: 16px;
        font-weight: bold;
        color: #007bff;
        margin-right: 10px;
        }

        .file-msg {
        font-size: 14px;
        color: #6c757d;
        }

        .file-input {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        opacity: 0;
        cursor: pointer;
        }

        .file-drop-area.active {
        border-color: #28a745;
        background-color: #d4edda;
        }

    </style>

   

</head>
<body class="animsition">
<!--FB-->
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v17.0" nonce="wOL3VvKV"></script>
<!--FB-->
    <div class="page-wrapper">
        <!-- HEADER DESKTOP-->
        <header class="header-desktop4">
            <div class="container">
                <div class="header4-wrap">
                    <div class="header__logo">
                        <a href="#">
                            <img src="<?= base_url()?>jobportal/images/icon/logo-blue.png" alt="Logo" />
                        </a>
                    </div>
                    <div class="header__tool">
                        
                    </div>
                </div>
            </div>
        </header>
        <!-- END HEADER DESKTOP -->

        <!-- PAGE CONTENT-->       
                <div class="container mt-5">
                    <div class="card">
                        <div class="card-header">
                            <strong>Educational Background and Eligibility Information</strong>
                        </div>
                        <div id="forme2_card" class="card-body card-block"><!---card-body card-block-->

                            <?php if($applicant['vac_deadline'] >= date('Y-m-d H:i:s')){ ?>   
                                <div class="alert alert-warning d-flex align-items-center" role="alert">
                                    <i class="fa fa-exclamation-triangle me-2" aria-hidden="true"></i>&nbsp
                                    Merge multiple files into a single PDF if applicable. Each file or upload must not exceed 2 MB.
                                </div>

                                <?php
                                //--------------Eligibility
                                $applicant['app_eligibility'] = trim($applicant['app_eligibility'], ';');

                                // Replace eligibility codes with their full names
                                $applicant['app_eligibility'] = str_replace(
                                    ['cese', 'csp', 'cssp', 'ra1080', 'pd907', 'mc11'], 
                                    ['Career Executive Service Eligibility', 'Career Service Professional', 'Career Service Sub Professional', 'R.A. 1080', 'PD 907', 'MC 11 series of 1996'], 
                                    $applicant['app_eligibility']
                                );

                                // Replace remaining semicolons with commas
                                $applicant['app_eligibility'] = str_replace(';', ', ', $applicant['app_eligibility']);
                                //--------------Eligibility

                                //--------------National Certificate
                                $applicant['app_nc'] = trim($applicant['app_nc'], ';');

                                // Replace remaining semicolons with commas
                                $applicant['app_nc'] = str_replace(';', ', ', $applicant['app_nc']);
                                //--------------National Certificate

                                //--------------NTTC
                                $applicant['app_nttc'] = trim($applicant['app_nttc'], ';');

                                // Replace remaining semicolons with commas
                                $applicant['app_nttc'] = str_replace(';', ', ', $applicant['app_nttc']);
                                //--------------NTTC
                                
                                ?>

                                <?php if ($this->session->flashdata('success')): ?>
                                    <div class="alert alert-success" role="alert">
                                        <p><i class="fa fa-exclamation-triangle me-2" aria-hidden="true"></i><strong> Reminder:</strong> Any changes you make to this form will update the following information accordingly:
                                                <br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <b>1. Eligibility:</b> <?= $applicant['app_eligibility'] ?> 
                                                <br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <b>2. National Certificate:</b> <?= $applicant['app_nc'] ?> 
                                                <br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <b>3. National TVET Trainers Certificate:</b> <?= $applicant['app_nttc'] ?> 
                                        </p>
                                        <p>Please ensure that you also upload the required documents in this form.</p>
                                    </div>
                                <?php endif; ?>
                                
                            <?php }else { ?>
                                <div class="alert alert-danger d-flex align-items-center" role="alert">
                                    <i class="fa fa-exclamation-triangle me-2" aria-hidden="true"></i>&nbsp
                                    The vacant position has been closed for applications.
                                </div>
                            <?php } ?>

                            <form action="" method="POST" id="forme2_form" role="form"><!--Form-->
                                <input type="hidden" id="form_app_id" name="form_app_id" class="form-control" value="<?= $hash ?>">
                            
<!--educational-->
                            <div class="row form-group ">
                                <div class="col col-md-3 well">
                                    <label for="education_file" class=" form-control-label">Educational</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <div class="file-drop-area" id="education-drop-area">
                                        <span class="fake-btn">Choose File</span>
                                        <span class="file-msg">or drag and drop an education file here</span>
                                        <input type="file" id="education_file" name="education_file" class="file-input" accept="application/pdf">
                                    </div>
                                    <small class="help-block form-text" style="color:#1565C0"><strong>Please upload pdf file only. (Authenticated Photocopy of Transcript of Record, Diploma, Certificate of Grade etc..)</strong></small>
                                </div>
                            </div>
<!--educational-->
                            <hr>
<!--Eligibility/ies-->
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label class=" form-control-label">Eligibility</label>
                                </div>
                                <div class="col col-md-9">
                                    <div class="form-check">
                                        <div class="checkbox">
                                            <label for="cese" class="form-check-label ">
                                                <input type="checkbox" id="cese" name="eligibility[]" value="cese" class="form-check-input"> Career Executive Service Eligibility
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label for="csp" class="form-check-label ">
                                                <input type="checkbox" id="csp" name="eligibility[]" value="csp" class="form-check-input"> Career Service Professional
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label for="cssp" class="form-check-label ">
                                                <input type="checkbox" id="cssp" name="eligibility[]" value="cssp" class="form-check-input"> Career Service Sub Professional
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label for="ra1080" class="form-check-label ">
                                                <input type="checkbox" id="ra1080" name="eligibility[]" value="ra1080" class="form-check-input"> R.A. 1080
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label for="pd907" class="form-check-label ">
                                                <input type="checkbox" id="pd907" name="eligibility[]" value="pd907" class="form-check-input"> PD 907
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label for="mc11" class="form-check-label ">
                                                <input type="checkbox" id="mc11" name="eligibility[]" value="mc11" class="form-check-input"> MC 11 series of 1996
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label for="others" class="form-check-label ">
                                                <input type="text" id="others" name="eligibility[]" placeholder="Others" class="form-control">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="eligibility_file" class=" form-control-label"></label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <div class="file-drop-area" id="eligibility-drop-area">
                                        <span class="fake-btn">Choose File</span>
                                        <span class="file-msg">or drag and drop an eligibility file here</span>
                                        <input type="file" id="eligibility_file" name="eligibility_file" class="file-input" accept="application/pdf">
                                    </div>
                                    <small class="help-block form-text" style="color:#1565C0"><strong>Please upload pdf file only. (Authenticated by CSC/PRC)</strong></small>
                                </div>
                            </div>
<!--Eligibility/ies-->
                            <hr>
<!--National Certificate-->
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="nc" class=" form-control-label"> National Certificate</label>
                                    <a id="btn_add_buttonnc" class="btn btn-primary btn-sm add_buttonnc" style="color:white">
                                        <i class="fa fa-plus"></i> Add
                                    </a>
                                </div>
                                <div class="col-12 col-md-9 field_wrappernc">
                                    <input type="text" id="nc" name="nc[]" placeholder="Computer System Servicing NC II" class="form-control" required>
                                    <small class="help-block form-text" style="color:#1565C0"><strong>Write in full/Do not abbreviate. Put "N/A" if not applicable.</strong></small>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="national_certificate_file" class=" form-control-label"></label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <div class="file-drop-area" id="national-certificate-drop-area">
                                        <span class="fake-btn">Choose File</span>
                                        <span class="file-msg">or drag and drop a national certificate here</span>
                                        <input type="file" id="national_certificate_file" name="national_certificate_file" class="file-input" accept="application/pdf">
                                    </div>
                                    <small class="help-block form-text" style="color:#1565C0"><strong>Please upload pdf file only. (Computer System Servicing NC II, Web Development NC III etc...)</strong></small>
                                </div>
                            </div>
<!--National Certificate-->
                            <hr>
<!--National TVET Trainers Certificate-->
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="nttc" class=" form-control-label"> National TVET Trainers Certificate</label>
                                    <a id="btn_add_button" class="btn btn-primary btn-sm add_button" style="color:white">
                                        <i class="fa fa-plus"></i> Add
                                    </a>
                                    
                                </div>
                                <div class="col-12 col-md-9 field_wrapper">
                                    <input type="text" id="nttc" name="nttc[]" placeholder="Computer System Servicing NC II" class="form-control" required>
                                    <small class="help-block form-text" style="color:#1565C0"><strong>Write in full/Do not abbreviate. Put "N/A" if not applicable.</strong></small>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="nttc_file" class=" form-control-label"></label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <div class="file-drop-area" id="nttc-drop-area">
                                        <span class="fake-btn">Choose File</span>
                                        <span class="file-msg">or drag and drop an NTTC file here</span>
                                        <input type="file" id="nttc_file" name="nttc_file" class="file-input" accept="application/pdf">
                                    </div>
                                    <small class="help-block form-text" style="color:#1565C0"><strong>Please upload pdf file only. (Computer System Servicing NC II, Web Development NC III etc...)</strong></small>
                                </div>
                            </div>
<!--National TVET Trainers Certificate-->

<!--Iam not a robot-->
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="education_file" class=" form-control-label"></label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <div class="g-recaptcha"  data-sitekey="6Lfsr1AcAAAAAJrOf8WvM5nM1W6m5YaSSzTOH1fZ" required></div>		
                                </div>
                            
                            </div>
<!--Iam not a robot-->

                            <!--Submit-->
                            <div class="row form-group">
                                <div class="col col-md-12 text-center">
                                <?php if($applicant['vac_deadline'] >= date('Y-m-d H:i:s')){ ?>   
                                    <button id="btn_forme2" name="forme2" type="submit" class="btn btn-primary" style="width:100%">
                                        <i class="fa fa-save"></i> Submit
                                    </button>
                                <?php }?>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div id="forme2_message" class="col-12 col-md-12">
                                </div>
                            </div>
                            <!--Submit-->
                            
                            </form><!---End of Form-->

                        </div><!---card-body card-block-->
                    </div>
                </div>    
                <!-- Second Tab-->

                <!-- script here -->
                <script type="text/javascript">
                    $(document).ready(function() {
                        var applicant_id;

                        //-------FORM 2---------  
                        $('#forme2_form').submit(function(e){
                        e.preventDefault(); 
                            $.ajax({
                                url: "<?php echo base_url().'save_forme2'?>",
                                type: "post",
                                data: new FormData(this),
                                processData: false,
                                contentType: false,
                                cache: false,
                                async: false,
                                success: function(data){
                                    var json = $.parseJSON(data);
                                    if(json.status == 'True'){
                                        //Show Reference No.
                                        html2 =  '<div class="alert alert-success mt-2 message"><i class="fa fa-check-circle" aria-hidden="true"></i> '+ json.message +'</div>';
                                        
                                        //message
                                        $('#forme2_message').prepend(html2);

                                        //HIDE button
                                        $("#btn_forme2").hide();

                                        //disabled inputs
                                        $("#cese").attr("disabled", true);
                                        $("#csp").attr("disabled", true);
                                        $("#cssp").attr("disabled", true);
                                        $("#ra1080").attr("disabled", true);
                                        $("#pd907").attr("disabled", true);
                                        $("#mc11").attr("disabled", true);
                                        $("#others").attr("disabled", true);
                                        $("#eligibility_file").attr("disabled", true);
                                        $("#nc").attr("disabled", true);
                                        $("#national_certificate_file").attr("disabled", true);
                                        $("#nttc").attr("disabled", true);
                                        $("#nttc_file").attr("disabled", true);
                                        $("#btn_add_buttonnc").attr("disabled", true);
                                        $("#btn_add_button").attr("disabled", true);
                                    }else{
                                        html = '<div class="alert alert-danger mt-2 message"><i class="fa fa-times" aria-hidden="true"></i> '+ json.message +'</div>';
                                        $('#forme2_card').prepend(html);
                                        $('#forme2_message').prepend(html);
                                    }       
                                }
                            });
                        });
                    });
                    //-------FORM 2---------  
                    document.querySelectorAll('.file-drop-area').forEach((dropArea) => {
                    const fileInput = dropArea.querySelector('.file-input');
                    const fileMsg = dropArea.querySelector('.file-msg');

                    // Highlight the drop area on drag events
                    dropArea.addEventListener('dragover', (e) => {
                        e.preventDefault();
                        dropArea.classList.add('active');
                    });

                    dropArea.addEventListener('dragleave', () => {
                        dropArea.classList.remove('active');
                    });

                    dropArea.addEventListener('drop', (e) => {
                        e.preventDefault();
                        dropArea.classList.remove('active');

                        // Get the dropped file
                        const files = e.dataTransfer.files;

                        if (files.length) {
                        fileInput.files = files; // Assign the dropped files to the input
                        const fileName = files[0].name;
                        fileMsg.textContent = `File selected: ${fileName}`;
                        }
                    });

                    // Update message when file is selected via input
                    fileInput.addEventListener('change', () => {
                        const fileName = fileInput.files[0]?.name || 'No file chosen';
                        fileMsg.textContent = `File selected: ${fileName}`;
                    });
                    });

                </script>
                <!-- script here -->
                <!---End of Form 2-->
        <!-- END PAGE CONTENT  -->
    </div> <!-- END PAGE WRAPPER  -->

    <!-- Bootstrap JS-->
    <script src="<?= base_url()?>jobportal/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="<?= base_url()?>jobportal/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="<?= base_url()?>jobportal/vendor/slick/slick.min.js">
    </script>
    <script src="<?= base_url()?>jobportal/vendor/wow/wow.min.js"></script>
    <script src="<?= base_url()?>jobportal/vendor/animsition/animsition.min.js"></script>
    <script src="<?= base_url()?>jobportal/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="<?= base_url()?>jobportal/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="<?= base_url()?>jobportal/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="<?= base_url()?>jobportal/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="<?= base_url()?>jobportal/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="<?= base_url()?>jobportal/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="<?= base_url()?>jobportal/vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="<?= base_url()?>jobportal/js/main.js"></script>

</body>

</html>
<!-- end document-->

