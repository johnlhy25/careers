<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Header Tab-->
    <?php include("include/header.php");?>

    <style>
        :root{
            --ink:#1C2B39;
            --paper:#FAF8F4;
            --brass:#A8762E;
            --brass-dark:#8C6224;
            --slate:#5B6B7A;
            --line:#D9D3C7;
            --success:#3F7A5C;
            --error:#B23A3A;
        }
        body{font-family:'Inter',-apple-system,sans-serif;color:var(--ink);background:var(--paper);}

        .header-desktop4{background:#fff;border-bottom:1px solid var(--line);padding:16px 0;}
        .header4-wrap{display:flex;align-items:center;}
        .header__logo img{height:44px;}

        .tesda-form2{
            max-width:720px;
            margin:40px auto;
            background:#fff;
            border:1px solid var(--line);
            border-radius:4px;
            overflow:hidden;
        }
        .tesda-form2 .card{border:none;border-radius:0;background:transparent;}
        .tesda-form2 .card-header{
            background:var(--ink);
            border:none;
            padding:28px 32px 22px;
        }
        .tesda-form2 .card-header strong{
            font-family:'Source Serif 4',Georgia,serif;
            color:#fff;
            font-size:24px;
            font-weight:600;
        }
        .tesda-form2 .card-body{padding:32px;}

        .tesda-form2 .notice{
            border-radius:4px;
            padding:14px 18px;
            font-size:14px;
            line-height:1.6;
            margin-bottom:24px;
            display:flex;
            align-items:flex-start;
            gap:10px;
        }
        .tesda-form2 .notice-warning{background:#FBF3E7;border:1px solid #EAD8B8;color:#5A4425;}
        .tesda-form2 .notice-danger{background:#FBEAEA;border:1px solid #F0C6C6;color:var(--error);}
        .tesda-form2 .notice-success{background:#EAF3EE;border:1px solid #C7E0D2;color:var(--success);}
        .tesda-form2 .notice i{margin-top:2px;flex-shrink:0;}
        .tesda-form2 .notice ul, .tesda-form2 .notice p{margin:0 0 8px;}
        .tesda-form2 .notice p:last-child{margin-bottom:0;}

        .tesda-form2 .section{margin-bottom:28px;}
        .tesda-form2 .field{margin-bottom:22px;}
        .tesda-form2 .field label{
            display:flex;
            align-items:center;
            justify-content:space-between;
            font-size:14px;
            font-weight:600;
            color:var(--ink);
            margin-bottom:10px;
        }
        .tesda-form2 .field label .btn-add{
            background:var(--brass);
            border:none;
            color:#fff;
            font-size:12.5px;
            font-weight:600;
            padding:6px 14px;
            border-radius:20px;
            cursor:pointer;
            display:inline-flex;
            align-items:center;
            gap:6px;
            transition:background .15s ease;
            text-decoration:none;
        }
        .tesda-form2 .field label .btn-add:hover{background:var(--brass-dark);color:#fff;}

        .tesda-form2 input[type=text],
        .tesda-form2 input[type=number]{
            width:100%;
            border:1px solid var(--line);
            background:#fff;
            border-radius:3px;
            padding:11px 13px;
            font-size:15px;
            font-family:inherit;
            color:var(--ink);
            margin-bottom:8px;
            transition:border-color .15s ease;
        }
        .tesda-form2 input:focus{
            outline:none;
            border-color:var(--brass);
            box-shadow:0 0 0 3px rgba(168,118,46,.15);
        }
        .tesda-form2 input:disabled{background:var(--paper);color:var(--slate);}
        .tesda-form2 .note{
            display:block;
            font-size:12.5px;
            color:var(--slate);
            margin-bottom:4px;
        }

        .tesda-form2 .row-2{display:flex;gap:16px;}
        .tesda-form2 .row-2 > div:first-child{flex:1;}
        .tesda-form2 .row-2 .hours-col{flex:0 0 120px;}
        @media(max-width:560px){.tesda-form2 .row-2{flex-direction:column;gap:0;}.tesda-form2 .row-2 .hours-col{flex:1;}}

        .tesda-form2 input[type=file]{
            width:100%;
            border:1px solid var(--line);
            background:#fff;
            border-radius:3px;
            padding:9px 13px;
            font-size:14px;
            color:var(--slate);
        }

        .tesda-form2 .divider{border:none;border-top:1px solid var(--line);margin:28px 0;}

        .tesda-form2 button#btn_forme4{
            width:100%;
            background:var(--brass);
            border:none;
            color:#fff;
            font-weight:600;
            font-size:15px;
            padding:13px;
            border-radius:3px;
            cursor:pointer;
            transition:background .15s ease;
        }
        .tesda-form2 button#btn_forme4:hover{background:var(--brass-dark);}
        .tesda-form2 button#btn_forme4:disabled{background:var(--slate);cursor:not-allowed;opacity:.75;}
        .tesda-form2 button#btn_forme4 i{margin-right:8px;}

        .tesda-form2 .message .alert{
            border-radius:3px;padding:12px 16px;font-size:14px;margin-top:16px;
        }
        .tesda-form2 .alert-success{background:#EAF3EE;color:var(--success);border:1px solid #C7E0D2;}
        .tesda-form2 .alert-danger{background:#FBEAEA;color:var(--error);border:1px solid #F0C6C6;}

        .fa-spin{animation:fa-spin 0.9s linear infinite;}
        @keyframes fa-spin{from{transform:rotate(0deg);}to{transform:rotate(360deg);}}

        .applicant-summary{
            background:#fff;
            border:1px solid var(--line);
            border-radius:4px;
            padding:6px 0;
            margin-bottom:24px;
        }
        .summary-row{
            display:flex;
            padding:12px 20px;
            border-bottom:1px solid var(--line);
            font-size:14px;
        }
        .summary-row:last-child{border-bottom:none;}
        .summary-label{
            flex:0 0 220px;
            font-weight:600;
            color:var(--slate);
        }
        .summary-value{
            flex:1;
            color:var(--ink);
        }
        @media(max-width:560px){
            .summary-row{flex-direction:column;gap:4px;}
            .summary-label{flex:none;}
        }

        .summary-header{
            display:flex;
            align-items:center;
            gap:10px;
            font-family:'Source Serif 4',Georgia,serif;
            font-size:15.5px;
            font-weight:600;
            color:var(--ink);
            background:var(--paper);
            padding:14px 20px;
            border-bottom:1px solid var(--line);
        }
        .summary-header i{color:var(--brass-dark);}

        .btn-view-file{
            display:inline-flex;
            align-items:center;
            gap:6px;
            margin-left:12px;
            background:var(--paper);
            border:1px solid var(--line);
            color:var(--brass-dark);
            font-size:12.5px;
            font-weight:600;
            padding:5px 12px;
            border-radius:20px;
            text-decoration:none;
            transition:.15s ease;
        }
        .btn-view-file:hover{
            background:var(--ink);
            border-color:var(--ink);
            color:#fff;
            text-decoration:none;
        }
        @media(max-width:560px){
            .btn-view-file{display:block;margin:8px 0 0;width:fit-content;}
        }

        .tesda-form2 .file-drop-area{
            position:relative;
            display:flex;
            align-items:center;
            justify-content:center;
            gap:8px;
            width:100%;
            height:90px;
            border:2px dashed var(--line);
            border-radius:4px;
            background:var(--paper);
            margin-bottom:4px;
            transition:.2s ease;
            text-align:center;
        }
        .tesda-form2 .file-drop-area:hover{border-color:var(--brass);background:#fff;}
        .tesda-form2 .file-drop-area.active{border-color:var(--success);background:#EAF3EE;}
        .tesda-form2 .fake-btn{font-size:14px;font-weight:600;color:var(--brass-dark);}
        .tesda-form2 .file-msg{font-size:13px;color:var(--slate);}
        .tesda-form2 .file-input{
            position:absolute;width:100%;height:100%;top:0;left:0;opacity:0;cursor:pointer;
        }

        .emphasis-callout{
            display:flex;
            align-items:flex-start;
            gap:10px;
            background:#fff;
            border:1px solid var(--brass);
            border-left:4px solid var(--brass);
            border-radius:4px;
            padding:12px 16px;
            margin-top:14px;
            font-size:13.5px;
            font-weight:600;
            color:var(--brass-dark);
            line-height:1.55;
        }
        .emphasis-callout i{margin-top:2px;flex-shrink:0;color:var(--brass);}

    </style>

</head>
<body class="animsition">

    <div class="page-wrapper">

        <!-- Header Tab-->
        <?php include("include/sticky.php");?>

        <!-- PAGE CONTENT-->
                <div class="container">
                    <div class="tesda-form2">
                        <div class="card">
                            <div class="card-header">
                                <strong>Relevant Trainings</strong>
                            </div>

                            <div id="forme4_card" class="card-body"><!---card-body-->

                                <!--- Your Saved Information--->
                                    <?php
                                        // Combines two parallel semicolon-separated columns into "Name (X year/s)" entries
                                        function tesda_format_experience_list($names, $years) {
                                            if (empty($names)) return '';

                                            $name_parts = array_filter(array_map('trim', explode(';', $names)), function($v){ return $v !== ''; });
                                            $year_parts = array_map('trim', explode(';', $years ?? ''));

                                            if (empty($name_parts)) return '';

                                            $formatted = [];
                                            foreach ($name_parts as $i => $name) {
                                                $year = $year_parts[$i] ?? '';
                                                $formatted[] = ($year !== '' && $year !== 'N/A')
                                                    ? $name . ' (' . $year . ' year/s)'
                                                    : $name;
                                            }

                                            return $formatted; // returns an array so it can render as a list, not a flat string
                                        }

                                        $relevant_training = tesda_format_experience_list(
                                            $applicant['app_training'] ?? '',
                                            $applicant['app_training_hours'] ?? ''
                                        );


                                        $fullname_parts = array_filter([
                                            $applicant['app_lastname']   ?? '',
                                            $applicant['app_firstname']  ?? '',
                                            $applicant['app_middlename'] ?? '',
                                            $applicant['app_suffix']     ?? '',
                                        ]);

                                    ?>

                                    <div class="applicant-summary">
                                        <div class="summary-header">
                                            <i class="fa fa-folder-open" aria-hidden="true"></i>
                                            Your Saved Information
                                        </div>

                                        <?php if (!empty($fullname_parts)): ?>
                                            <div class="summary-row">
                                                <span class="summary-label">Full Name</span>
                                                <span class="summary-value"><?= implode(' ', $fullname_parts) ?></span>
                                            </div>
                                        <?php endif; ?>

                                        <?php if (!empty($relevant_training)): ?>
                                            <div class="summary-row">
                                                <span class="summary-label">Relevant Experience</span>
                                                <span class="summary-value">
                                                    <?php foreach ($relevant_training as $entry): ?>
                                                        <span class="experience-entry"><?= $entry ?></span>
                                                    <?php endforeach; ?>
                                                </span>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                <!--- Your Saved Information--->

                                <!--- Your Saved Documents--->
                                    <?php
                                        // Map document type => [DB column, display label]
                                        // NOTE: confirm these column names against your actual schema — see message below
                                        $documents = [
                                            'training' => ['app_training_doc', 'Relevant Trainings']
                                        ];

                                        $attached_documents = array_filter($documents, function($doc) use ($applicant) {
                                            return !empty($applicant[$doc[0]]);
                                        });
                                    ?>

                                    <?php if (!empty($attached_documents)): ?>
                                        <div class="applicant-summary">
                                            <div class="summary-header">
                                                <i class="fa fa-paperclip" aria-hidden="true"></i>
                                                Your Saved Documents
                                            </div>

                                            <?php foreach ($attached_documents as $type => $doc): ?>
                                                <div class="summary-row">
                                                    <span class="summary-label"><?= $doc[1] ?></span>
                                                    <span class="summary-value">
                                                        <a href="<?= base_url() . 'view-document/' . $type . '/' . $hash ?>" target="_blank" class="btn-view-file">
                                                            <i class="fa fa-eye" aria-hidden="true"></i> View File
                                                        </a>
                                                    </span>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>
                                <!--- Your Saved Documents--->

                            <?php if($applicant['vac_deadline'] >= date('Y-m-d H:i:s')){ ?>
                                
                                <!---Reminder--->
                                    <div class="notice notice-warning" role="alert">
                                        <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                                        <span>Merge multiple files into a single PDF if applicable. Each file or upload must not exceed 2 MB.</span>
                                    </div>

                                    <?php if ($this->session->flashdata('success')): ?>
                                        <div class="notice notice-success" role="alert">
                                            <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                                            <div>
                                                <p><strong>Reminder:</strong> Any changes you make to this form will update the following information accordingly:</p>
                                                <p>1. Relevant Trainings: <?= $applicant['app_training'] ?></p>
                                                
                                                <div class="emphasis-callout">
                                                    <i class="fa fa-info-circle" aria-hidden="true"></i>
                                                    <span>Please upload the required documents for this form. If there are no updates to the required fields or documents, you may leave them blank.</span>
                                                </div>

                                            </div>
                                        </div>
                                    <?php endif; ?>
                                <!---Reminder--->

                                <!---Form Here--->
                                    <form action="" method="POST" id="forme4_form" role="form"><!--Form-->
                                        <input type="hidden" id="form_app_id" name="form_app_id" value="<?= $hash ?>">

                                        <!--Relevant Training-->
                                        <div class="field field_wrapperrt">
                                            <label for="relevant_training">Relevant Training
                                                <a id="btn_add_buttonrt" class="btn-add add_buttonrt">
                                                    <i class="fa fa-plus"></i> Add
                                                </a>
                                            </label>
                                            <div class="row-2">
                                                <div>
                                                    <input type="text" id="relevant_training" name="relevant_training[]" placeholder="Programming 101">
                                                    <span class="note">Write in full/Do not abbreviate. Put "N/A" if not applicable.</span>
                                                </div>
                                                <div class="hours-col">
                                                    <input type="number" id="relevant_training_hours" name="relevant_training_hours[]" placeholder="1" step="0.1">
                                                    <span class="note">Hours</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="field">
                                            <label for="training_file">Supporting Document</label>
                                            <div class="file-drop-area" id="training-drop-area">
                                                <span class="fake-btn">Choose File</span>
                                                <span class="file-msg">or drag and drop a training file here</span>
                                                <input type="file" id="training_file" name="training_file" class="file-input" accept="application/pdf">
                                            </div>
                                            <span class="note">Please upload PDF file only.</span>
                                        </div>
                                        <!--Relevant Training-->

                                        <hr class="divider">

                                        <?php if($applicant['app_lock'] != 1){ ?>
                                             <!-- I am not a robot -->
                                            <div class="field" style="margin-bottom:22px;">
                                                <div class="g-recaptcha" data-sitekey="6Lfsr1AcAAAAAJrOf8WvM5nM1W6m5YaSSzTOH1fZ" required></div>
                                            </div>
                                            <!-- I am not a robot -->

                                            <!--Submit-->
                                            <div class="submit-row">
                                                <button id="btn_forme4" name="forme4" type="submit">
                                                    <i class="fa fa-save" id="btn_forme4_icon"></i><span id="btn_forme4_label">Submit</span>
                                                </button>
                                                <div id="forme4_message" class="message"></div>
                                            </div>
                                            <!--Submit-->
                                        <?php } else{?>
                                            <div class="emphasis-callout">
                                                <i class="fa fa-info-circle" aria-hidden="true"></i>
                                                <span>Your application has been evaluated and is now locked.</span>
                                            </div>
                                        <?php }?>
                                        <div id="forme4_message" class="message"></div>

                                    </form><!---End of Form-->
                                <!---Form Here--->
                                
                            <?php }else { ?>
                                <div class="notice notice-danger" role="alert">
                                    <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                                    <span>The vacant position has been closed for applications.</span>
                                </div>
                            <?php } ?>

                            </div><!---card-body-->
                        </div>
                    </div>
                </div>

                <!-- Footer Tab-->
                <?php include("include/footer.php");?>

                <!-- Privacy Notice Tab-->
                <?php include("include/privacy.php");?>

                <!-- script here -->
                    <script type="text/javascript">
                        $(document).ready(function() {
                            var applicant_id;

                            //-------FORM 4---------  
                            $('#forme4_form').submit(function(e){
                            e.preventDefault(); 

                                $('#btn_forme4').prop('disabled', true);
                                $('#btn_forme4_icon').removeClass('fa-save').addClass('fa-spinner fa-spin');
                                $('#btn_forme4_label').text('Submitting...');

                                $.ajax({
                                    url: "<?php echo base_url().'save_forme4'?>",
                                    type: "post",
                                    data: new FormData(this),
                                    processData: false,
                                    contentType: false,
                                    cache: false,
                                    async: false,
                                    success: function(data){
                                        var json = $.parseJSON(data);
                                        if(json.status == 'True'){
                                            html =  '<div class="alert alert-success mt-2 message"><i class="fa fa-check-circle" aria-hidden="true"></i> <b>Saved</b> successfully. Please continue to the next tab (RA 8371/RA 7277/RA 8972).</div>';
                                            html2 =  '<div class="alert alert-success mt-2 message"><i class="fa fa-check-circle" aria-hidden="true"></i> <b>Saved</b> successfully. Please continue to the next tab (RA 8371/RA 7277/RA 8972).</div>';

                                            $('#forme4_message').prepend(html2);
                                            $('#application_body_card').prepend(html);

                                            $("#ra8371_tab").removeClass("disabled");

                                            $(".message").delay(4000).slideUp(200, function() {
                                                $(this).alert('close');
                                            });

                                            $("#btn_forme4").hide();

                                            $("#training_file").attr("disabled", true);
                                            $("#relevant_training_hours").attr("disabled", true);
                                            $("#relevant_training").attr("disabled", true);
                                            $("#btn_add_buttonrt").attr("disabled", true);
                                        }else{
                                            html = '<div class="alert alert-danger mt-2 message"> <b>'+ json.error +'</b></div>';
                                            $('#forme4_card').prepend(html);
                                            $('#forme4_message').prepend(html);

                                            $('#btn_forme4').prop('disabled', false);
                                            $('#btn_forme4_icon').removeClass('fa-spinner fa-spin').addClass('fa-save');
                                            $('#btn_forme4_label').text('Submit');

                                            $(".message").delay(4000).slideUp(200, function() {
                                                $(this).alert('close');
                                            });
                                        }       
                                    }
                                });
                            });
                        });
                        //-------FORM 4--------- 
                        
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

                        $(window).on('load', function() {
                            $('#sitePrivacyModal').modal('show');
                        });

                    </script>
                <!-- script here -->

    </div> <!-- END PAGE WRAPPER  -->

    <!-- Bootstrap JS-->
    <script src="<?= base_url()?>jobportal/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="<?= base_url()?>jobportal/vendor/bootstrap-4.1/bootstrap.min.js"></script>

    <!-- Main JS-->
    <script src="<?= base_url()?>jobportal/js/main.js"></script>

</body>

</html>
<!-- end document-->