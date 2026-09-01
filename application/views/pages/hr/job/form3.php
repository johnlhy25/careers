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
                            <strong>Work Experience</strong>
                        </div>
<!---Form 3-->
                    <div id="forme3_card" class="card-body card-block"><!---card-body card-block-->
                        <form action="" method="POST" id="forme3_form" role="form"><!--Form-->
                        <input type="hidden" id="form_app_id" name="form_app_id" class="form-control" value="<?= $hash ?>">
                        
                        <?php if($applicant['vac_deadline'] >= date('Y-m-d H:i:s')){ ?>   
                            <div class="alert alert-warning d-flex align-items-center" role="alert">
                                <i class="fa fa-exclamation-triangle me-2" aria-hidden="true"></i>&nbsp
                                Merge multiple files into a single PDF if applicable. Each file or upload must not exceed 2 MB.
                            </div>

                            <?php
                            //--------------app_relevant_experience
                            // Replace remaining semicolons with commas
                            $applicant['app_relevant_experience'] = trim($applicant['app_relevant_experience'], ';');

                            $applicant['app_relevant_experience'] = str_replace(';', ', ', $applicant['app_relevant_experience']);
                            //--------------app_relevant_experience
                            
                            ?>

                            <?php if ($this->session->flashdata('success')): ?>
                                <div class="alert alert-success" role="alert">
                                    <p><i class="fa fa-exclamation-triangle me-2" aria-hidden="true"></i><strong> Reminder:</strong> Any changes you make to this form will update the following information accordingly:
                                            <br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <b>1. Present Position:</b> <?= $applicant['app_present_position'] ?> 
                                            <br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <b>2. Present Office:</b> <?= $applicant['app_present_office'] ?> 
                                            <br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <b>3. No. of Years:</b> <?= $applicant['app_years'] ?>
                                            <br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <b>4. Relevant Experience:</b> <?= $applicant['app_relevant_experience'] ?> 
                                            <br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <b>5. Legth of Service in TESDA:</b> <?= $applicant['app_tesda_years'] ?> 
                                            <br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <b>6. Date of Last Promotion:</b> <?= $applicant['app_date_tesda'] ?> 
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


                        <!--Present Position-->
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="present_position" class=" form-control-label"><span style="color:red"><strong>*</strong></span> Present Position</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="present_position" name="present_position" placeholder="Information System Analyts III" class="form-control" required>
                                <small class="help-block form-text" style="color:#1565C0"><strong>Write in full/Do not abbreviate. Put "N/A" if not applicable.</strong></small>
                            </div>
                        </div>
                        <!--Present Position-->

                        <!--Present Office-->
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="present_office" class=" form-control-label"><span style="color:red"><strong>*</strong></span> Present Office</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="present_office" name="present_office" placeholder="Technical Education And Skills Development Authority" class="form-control" required>
                                <small class="help-block form-text" style="color:#1565C0"><strong>Write in full/Do not abbreviate. Put "N/A" if not applicable.</strong></small>
                            </div>
                        </div>
                        <!--Present Office-->

                        <!--No. of years-->
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="no_years" class=" form-control-label"><span style="color:red"><strong>*</strong></span> No. of Years</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="number" id="no_years" name="no_years" placeholder="5" class="form-control" min="0" max="50" step="0.1" required>
                                <small class="help-block form-text" style="color:#1565C0"><strong>Put "0" if not applicable.</strong></small>
                            </div>
                        </div>
                        <!--No. of years-->

                        <!--Relevant Experience-->
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="relevant_experience" class=" form-control-label"> Relevant Experience</label>
                                <a id="btn_add_buttonre" class="btn btn-primary btn-sm add_buttonre" style="color:white">
                                    <i class="fa fa-plus"></i> Add
                                </a>
                                
                            </div>
                            <div class="col-12 col-md-9 field_wrapperre">
                                <div class="row">
                                    <div class="col-md-9">
                                        <input type="text" id="relevant_experience" name="relevant_experience[]" placeholder="Information System Analyts I" class="form-control">
                                        <small class="help-block form-text" style="color:#1565C0"><strong>Write in full/Do not abbreviate. Put "N/A" if not applicable.</strong></small>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="number" id="relevant_experience_years" name="relevant_experience_years[]" placeholder="1" class="form-control">
                                        <small class="help-block form-text" style="color:#1565C0"><strong>Years (e.g. 2)</strong></small>
                                    </div>
                                </div>    
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="coe_file" class=" form-control-label">Certificate of Employment (indicating duties and responsibilities)</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <div class="file-drop-area" id="eligibility-drop-area">
                                    <span class="fake-btn">Choose File</span>
                                    <span class="file-msg">or drag and drop an Certificate of Employment file here</span>
                                    <input type="file" id="coe_file" name="coe_file" class="file-input" accept="application/pdf">
                                </div>
                                
                                <small class="help-block form-text" style="color:#1565C0"><strong>Please upload pdf file only. (Certificate of Employment)</strong></small>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="sr_file" class=" form-control-label">Service Record (if applicable)</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <div class="file-drop-area" id="eligibility-drop-area">
                                    <span class="fake-btn">Choose File</span>
                                    <span class="file-msg">or drag and drop an Service Record file here</span>
                                    <input type="file" id="sr_file" name="sr_file" class="file-input" accept="application/pdf">
                                </div>
                                <small class="help-block form-text" style="color:#1565C0"><strong>Please upload pdf file only. (Service Record)</strong></small>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="cpa_file" class=" form-control-label">Copy of Previous Appointment (if applicable)</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <div class="file-drop-area" id="eligibility-drop-area">
                                    <span class="fake-btn">Choose File</span>
                                    <span class="file-msg">or drag and drop an Copy of Previous Appointment file here</span>
                                    <input type="file" id="cpa_file" name="cpa_file" class="file-input" accept="application/pdf">
                                </div>
                                <small class="help-block form-text" style="color:#1565C0"><strong>Please upload pdf file only. (Previous Appointment)</strong></small>
                            </div>
                        </div>
                        
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="ipcr_file" class=" form-control-label">Performance rating in the present position for last two (2) rating period certified by HRMO (if applicable)</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <div class="file-drop-area" id="eligibility-drop-area">
                                    <span class="fake-btn">Choose File</span>
                                    <span class="file-msg">or drag and drop an Copy of Performance rating file here</span>
                                    <input type="file" id="ipcr_file" name="ipcr_file" class="file-input" accept="application/pdf">
                                </div>
                                <small class="help-block form-text" style="color:#1565C0"><strong>Please upload pdf file only. (Individual Performance Commitment and Review etc...)</strong></small>
                            </div>
                        </div>
                        <!--Relevant Position-->

                        <!--Length of Service-->
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="tesda_service" class=" form-control-label"> Legth of Service in TESDA (if applicable)</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="number" id="tesda_service" name="tesda_service" placeholder="2" class="form-control">
                            </div>
                        </div>
                        <!--Length of Service-->

                        <!--Date of Last Promotion (if applicable)-->
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="date_tesda_service" class=" form-control-label"> Date of Last Promotion (if applicable)</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="date" id="date_tesda_service" name="date_tesda_service" class="form-control">
                            </div>
                        </div>
                        <!--Date of Last Promotion (if applicable)-->

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
                                    <button id="btn_forme3" name="forme3" type="submit" class="btn btn-primary" style="width:100%">
                                        <i class="fa fa-save"></i> Submit
                                    </button>
                                <?php }?>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div id="forme3_message" class="col-12 col-md-12">
                                </div>
                            </div>
                            <!--Submit-->
                        
                        </form><!---End of Form-->
                        
                    </div><!---card-body card-block-->
<!---Form 3-->

                    </div>
                </div>
    </div>

<!-- script here -->
<script type="text/javascript">
    $(document).ready(function() {
        var applicant_id;

        //-------FORM 2---------  
        $('#forme3_form').submit(function(e){
        e.preventDefault(); 
            $.ajax({
                url: "<?php echo base_url().'save_forme3'?>",
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
                        html =  '<div class="alert alert-success mt-2 message"><i class="fa fa-check-circle" aria-hidden="true"></i> <b>Saved</b> successfully. Please continue to the next tab (Work Exoerience).</div>';
                        html2 =  '<div class="alert alert-success mt-2 message"><i class="fa fa-check-circle" aria-hidden="true"></i> <b>Saved</b> successfully. Please continue to the next tab (Work Exoerience).</div>';
                        
                        //message
                        $('#forme3_message').prepend(html2);
                        $('#application_body_card').prepend(html);

                        //Set next tab
                        $("#training_tab").removeClass("disabled");
                    
                        //Hide
                        $(".message").delay(4000).slideUp(200, function() {
                            $(this).alert('close');
                        });
                    
                        //HIDE button
                        $("#btn_forme3").hide();

                        //disabled inputs
                        $("#present_position").attr("disabled", true);
                        $("#present_office").attr("disabled", true);
                        $("#no_years").attr("disabled", true);
                        $("#relevant_experience").attr("disabled", true);
                        $("#relevant_experience_years").attr("disabled", true);
                        $("#coe_file").attr("disabled", true);
                        $("#sr_file").attr("disabled", true);
                        $("#cpa_file").attr("disabled", true);
                        $("#ipcr_file").attr("disabled", true);
                        $("#tesda_service").attr("disabled", true);
                        $("#date_tesda_service").attr("disabled", true);
                        $("#btn_add_buttonre").attr("disabled", true);
                    }else{
                        html = '<div class="alert alert-danger mt-2 message"> <b>'+ json.error +'</b></div>';
                        $('#forme3_card').prepend(html);
                        $('#forme3_message').prepend(html);
                        //Hide
                        $(".message").delay(4000).slideUp(200, function() {
                            $(this).alert('close');
                        });
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

<!---End of Form 3-->


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