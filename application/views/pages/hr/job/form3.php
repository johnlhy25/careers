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

        .tesda-form3{
            max-width:760px;
            margin:40px auto;
            background:#fff;
            border:1px solid var(--line);
            border-radius:4px;
            overflow:hidden;
        }
        .tesda-form3 .card{border:none;border-radius:0;background:transparent;}
        .tesda-form3 .card-header{
            background:var(--ink);
            border:none;
            padding:28px 32px 22px;
        }
        .tesda-form3 .card-header strong{
            font-family:'Source Serif 4',Georgia,serif;
            color:#fff;
            font-size:24px;
            font-weight:600;
        }
        .tesda-form3 .card-body{padding:32px;}

        .tesda-form3 .notice{
            border-radius:4px;
            padding:14px 18px;
            font-size:14px;
            line-height:1.6;
            margin-bottom:24px;
            display:flex;
            align-items:flex-start;
            gap:10px;
        }
        .tesda-form3 .notice-warning{background:#FBF3E7;border:1px solid #EAD8B8;color:#5A4425;}
        .tesda-form3 .notice-danger{background:#FBEAEA;border:1px solid #F0C6C6;color:var(--error);}
        .tesda-form3 .notice-success{background:#EAF3EE;border:1px solid #C7E0D2;color:var(--success);}
        .tesda-form3 .notice i{margin-top:2px;flex-shrink:0;}
        .tesda-form3 .notice p{margin:0 0 6px;}
        .tesda-form3 .notice p:last-child{margin-bottom:0;}

        .tesda-form3 .field{margin-bottom:22px;}
        .tesda-form3 .field label{
            display:block;
            font-size:14px;
            font-weight:600;
            margin-bottom:7px;
        }
        .tesda-form3 .field label .req{color:var(--error);margin-left:3px;}
        .tesda-form3 .field label .btn-add{
            float:right;
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
        .tesda-form3 .field label .btn-add:hover{background:var(--brass-dark);color:#fff;}
        .tesda-form3 .note{
            display:block;
            font-size:12.5px;
            color:var(--slate);
            margin-top:6px;
        }

        .tesda-form3 input[type=text],
        .tesda-form3 input[type=number],
        .tesda-form3 input[type=date]{
            width:100%;
            border:1px solid var(--line);
            background:#fff;
            border-radius:3px;
            padding:11px 13px;
            font-size:15px;
            font-family:inherit;
            color:var(--ink);
            transition:border-color .15s ease;
        }
        .tesda-form3 input:focus{
            outline:none;
            border-color:var(--brass);
            box-shadow:0 0 0 3px rgba(168,118,46,.15);
        }
        .tesda-form3 input:disabled{background:var(--paper);color:var(--slate);}

        .tesda-form3 .row-2{display:flex;gap:16px;}
        .tesda-form3 .row-2 > div{flex:1;}
        .tesda-form3 .row-2 .years-col{flex:0 0 120px;}
        @media(max-width:560px){.tesda-form3 .row-2{flex-direction:column;gap:0;}.tesda-form3 .row-2 .years-col{flex:1;}}

        .tesda-form3 .file-drop-area{
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
        .tesda-form3 .file-drop-area:hover{border-color:var(--brass);background:#fff;}
        .tesda-form3 .file-drop-area.active{border-color:var(--success);background:#EAF3EE;}
        .tesda-form3 .fake-btn{font-size:14px;font-weight:600;color:var(--brass-dark);}
        .tesda-form3 .file-msg{font-size:13px;color:var(--slate);}
        .tesda-form3 .file-input{
            position:absolute;width:100%;height:100%;top:0;left:0;opacity:0;cursor:pointer;
        }

        .tesda-form3 .divider{border:none;border-top:1px solid var(--line);margin:28px 0;}

        .tesda-form3 button#btn_forme3{
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
        .tesda-form3 button#btn_forme3:hover{background:var(--brass-dark);}
        .tesda-form3 button#btn_forme3:disabled{background:var(--slate);cursor:not-allowed;opacity:.75;}
        .tesda-form3 button#btn_forme3 i{margin-right:8px;}

        .tesda-form3 .message.alert{
            border-radius:3px;padding:12px 16px;font-size:14px;margin-top:16px;
        }
        .tesda-form3 .alert-success{background:#EAF3EE;color:var(--success);border:1px solid #C7E0D2;}
        .tesda-form3 .alert-danger{background:#FBEAEA;color:var(--error);border:1px solid #F0C6C6;}

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
<!--FB-->
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v17.0" nonce="wOL3VvKV"></script>
<!--FB-->
    <div class="page-wrapper">

        <!-- Header Tab-->
        <?php include("include/sticky.php");?> 

        <!-- PAGE CONTENT-->
                <div class="container">
                    <div class="tesda-form3">
                        <div class="card">
                            <div class="card-header">
                                <strong>Work Experience</strong>
                            </div>
<!---Form 3-->
                        <div id="forme3_card" class="card-body"><!---card-body-->
                        
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

                                $relevant_experience_list = tesda_format_experience_list(
                                    $applicant['app_relevant_experience'] ?? '',
                                    $applicant['app_relevant_years'] ?? ''
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

                                <?php if (trim(!empty($applicant['app_present_position']))): ?>
                                    <div class="summary-row">
                                        <span class="summary-label">Present Position</span>
                                        <span class="summary-value">
                                            <?= $applicant['app_present_position']  ?>
                                        </span>
                                    </div>
                                <?php endif; ?>

                                <?php if (trim(!empty($applicant['app_present_office'] ))): ?>
                                    <div class="summary-row">
                                        <span class="summary-label">Present Office</span>
                                        <span class="summary-value">
                                            <?= $applicant['app_present_office']?>
                                        </span>
                                    </div>
                                <?php endif; ?>

                                <?php if (trim(!empty($applicant['app_years'] ))): ?>
                                    <div class="summary-row">
                                        <span class="summary-label">No. of Years</span>
                                        <span class="summary-value">
                                            <?= $applicant['app_years'] ?>
                                        </span>
                                    </div>
                                <?php endif; ?>

                                <?php if (!empty($relevant_experience_list)): ?>
                                    <div class="summary-row">
                                        <span class="summary-label">Relevant Experience</span>
                                        <span class="summary-value">
                                            <?php foreach ($relevant_experience_list as $entry): ?>
                                                <span class="experience-entry"><?= $entry ?></span>
                                            <?php endforeach; ?>
                                        </span>
                                    </div>
                                <?php endif; ?>

                                <?php if ($applicant['app_tesda_years'] !== ''): ?>
                                    <div class="summary-row">
                                        <span class="summary-label">Length of Service in TESDA</span>
                                        <span class="summary-value">
                                            <?= $applicant['app_tesda_years'] ?>
                                        </span>
                                    </div>
                                <?php endif; ?>

                               <?php if (!empty($applicant['app_date_tesda']) && $applicant['app_date_tesda'] !== '0000-00-00'): ?>
                                    <div class="summary-row">
                                        <span class="summary-label">Date of Last Promotion <br>in TESDA</span>
                                        <span class="summary-value">
                                            <?= $applicant['app_date_tesda'] ?>
                                        </span>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <?php
                                // Map document type => [DB column, display label]
                                $documents = [
                                    'coe'       => ['app_coe_doc',       'Certificate of Employment'],
                                    'sr'        => ['app_sr',   'Service Record'],
                                    'cpa'       => ['app_appointment',  'Copy of Previous Appointment'],
                                    'ipcr'      => ['app_ipcr',           'Performance Rating']
                                ];

                                // Only keep entries that actually have a file
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

                            <form action="" method="POST" id="forme3_form" role="form"><!--Form-->
                            <input type="hidden" id="form_app_id" name="form_app_id" value="<?= $hash ?>">

                            <?php if($applicant['vac_deadline'] >= date('Y-m-d H:i:s')){ ?>
                                <div class="notice notice-warning" role="alert">
                                    <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                                    <span>Merge multiple files into a single PDF if applicable. Each file or upload must not exceed 2 MB.</span>
                                </div>

                                <?php
                                //--------------app_relevant_experience
                                $applicant['app_relevant_experience'] = trim($applicant['app_relevant_experience'], ';');
                                $applicant['app_relevant_experience'] = str_replace(';', ', ', $applicant['app_relevant_experience']);
                                //--------------app_relevant_experience
                                ?>

                                <?php if ($this->session->flashdata('success')): ?>
                                    <div class="notice notice-success" role="alert">
                                        <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                                        <div>
                                            <p><strong>Reminder:</strong> Any changes you make to this form will update the following information accordingly:</p>
                                            <p>1. Present Position: <?= $applicant['app_present_position'] ?></p>
                                            <p>2. Present Office: <?= $applicant['app_present_office'] ?></p>
                                            <p>3. No. of Years: <?= $applicant['app_years'] ?></p>
                                            <p>4. Relevant Experience: <?= !empty($entry) ? $entry : '' ?></p>
                                            <p>5. Length of Service in TESDA: <?= $applicant['app_tesda_years'] ?></p>
                                            <p>6. Date of Last Promotion: <?= $applicant['app_date_tesda'] ?></p>
                                            <div class="emphasis-callout">
                                                <i class="fa fa-info-circle" aria-hidden="true"></i>
                                                <span>Please upload the required documents for this form. If there are no updates to the required fields or documents, you may leave them blank.</span>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>

                            <?php }else { ?>
                                <div class="notice notice-danger" role="alert">
                                    <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                                    <span>The vacant position has been closed for applications.</span>
                                </div>
                            <?php } ?>

                            <!--Present Position-->
                            <div class="field">
                                <label for="present_position">Present Position<span class="req">*</span></label>
                                <input type="text" id="present_position" name="present_position" placeholder="Information System Analyst III">
                                <span class="note">Write in full/Do not abbreviate. Put "N/A" if not applicable.</span>
                            </div>
                            <!--Present Position-->

                            <!--Present Office-->
                            <div class="field">
                                <label for="present_office">Present Office<span class="req">*</span></label>
                                <input type="text" id="present_office" name="present_office" placeholder="Technical Education And Skills Development Authority">
                                <span class="note">Write in full/Do not abbreviate. Put "N/A" if not applicable.</span>
                            </div>
                            <!--Present Office-->

                            <!--No. of years-->
                            <div class="field">
                                <label for="no_years">No. of Years<span class="req">*</span></label>
                                <input type="number" id="no_years" name="no_years" placeholder="5" min="0" max="50" step="0.1">
                                <span class="note">Put "0" if not applicable.</span>
                            </div>
                            <!--No. of years-->

                            <!--Relevant Experience-->
                            <div class="field field_wrapperre">
                                <label for="relevant_experience">Relevant Experience
                                    <a id="btn_add_buttonre" class="btn-add add_buttonre">
                                        <i class="fa fa-plus"></i> Add
                                    </a>
                                </label>
                                <div class="row-2">
                                    <div>
                                        <input type="text" id="relevant_experience" name="relevant_experience[]" placeholder="Information System Analyst I">
                                        <span class="note">Write in full/Do not abbreviate. Put "N/A" if not applicable.</span>
                                    </div>
                                    <div class="years-col">
                                        <input type="number" id="relevant_experience_years" name="relevant_experience_years[]" placeholder="1">
                                        <span class="note">Years</span>
                                    </div>
                                </div>
                            </div>

                            <div class="field">
                                <label for="coe_file">Certificate of Employment (indicating duties and responsibilities)</label>
                                <div class="file-drop-area" id="coe-drop-area">
                                    <span class="fake-btn">Choose File</span>
                                    <span class="file-msg">or drag and drop a Certificate of Employment file here</span>
                                    <input type="file" id="coe_file" name="coe_file" class="file-input" accept="application/pdf">
                                </div>
                                <span class="note">Please upload PDF file only. (Certificate of Employment)</span>
                            </div>

                            <div class="field">
                                <label for="sr_file">Service Record (if applicable)</label>
                                <div class="file-drop-area" id="sr-drop-area">
                                    <span class="fake-btn">Choose File</span>
                                    <span class="file-msg">or drag and drop a Service Record file here</span>
                                    <input type="file" id="sr_file" name="sr_file" class="file-input" accept="application/pdf">
                                </div>
                                <span class="note">Please upload PDF file only. (Service Record)</span>
                            </div>

                            <div class="field">
                                <label for="cpa_file">Copy of Previous Appointment (if applicable)</label>
                                <div class="file-drop-area" id="cpa-drop-area">
                                    <span class="fake-btn">Choose File</span>
                                    <span class="file-msg">or drag and drop a Copy of Previous Appointment file here</span>
                                    <input type="file" id="cpa_file" name="cpa_file" class="file-input" accept="application/pdf">
                                </div>
                                <span class="note">Please upload PDF file only. (Previous Appointment)</span>
                            </div>

                            <div class="field">
                                <label for="ipcr_file">Performance rating in the present position for the last two (2) rating periods, certified by HRMO (if applicable)</label>
                                <div class="file-drop-area" id="ipcr-drop-area">
                                    <span class="fake-btn">Choose File</span>
                                    <span class="file-msg">or drag and drop a Performance Rating file here</span>
                                    <input type="file" id="ipcr_file" name="ipcr_file" class="file-input" accept="application/pdf">
                                </div>
                                <span class="note">Please upload PDF file only. (Individual Performance Commitment and Review, etc.)</span>
                            </div>
                            <!--Relevant Position-->

                            <hr class="divider">

                            <!--Length of Service-->
                            <div class="field">
                                <label for="tesda_service">Length of Service in TESDA (if applicable)</label>
                                <input type="number" id="tesda_service" name="tesda_service" placeholder="2">
                            </div>
                            <!--Length of Service-->

                            <!--Date of Last Promotion (if applicable)-->
                            <div class="field">
                                <label for="date_tesda_service">Date of Last Promotion (if applicable)</label>
                                <input type="date" id="date_tesda_service" name="date_tesda_service">
                            </div>
                            <!--Date of Last Promotion (if applicable)-->

                            <hr class="divider">

                            <!--Iam not a robot-->
                            <div class="field">
                                <div class="g-recaptcha" data-sitekey="6Lfsr1AcAAAAAJrOf8WvM5nM1W6m5YaSSzTOH1fZ" required></div>
                            </div>
                            <!--Iam not a robot-->

                            <!--Submit-->
                            <?php if($applicant['vac_deadline'] >= date('Y-m-d H:i:s')){ ?>
                                <button id="btn_forme3" name="forme3" type="submit">
                                    <i class="fa fa-save" id="btn_forme3_icon"></i><span id="btn_forme3_label">Submit</span>
                                </button>
                            <?php }?>

                            <div id="forme3_message"></div>
                            <!--Submit-->

                            </form><!---End of Form-->

                        </div><!---card-body-->
<!---Form 3-->

                        </div>
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

        $('#forme3_form').submit(function(e){
        e.preventDefault(); 

            $('#btn_forme3').prop('disabled', true);
            $('#btn_forme3_icon').removeClass('fa-save').addClass('fa-spinner fa-spin');
            $('#btn_forme3_label').text('Submitting...');

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
                        html2 =  '<div class="alert alert-success mt-2 message"><i class="fa fa-check-circle" aria-hidden="true"></i> <b>Saved</b> successfully. Please continue to the next tab (Work Experience).</div>';

                        //message
                        $('#forme3_message').prepend(html2);

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

                        $('#btn_forme3').prop('disabled', false);
                        $('#btn_forme3_icon').removeClass('fa-spinner fa-spin').addClass('fa-save');
                        $('#btn_forme3_label').text('Submit');

                        //Hide
                        $(".message").delay(4000).slideUp(200, function() {
                            $(this).alert('close');
                        });
                    }       
                }
            });
        });
    });
    document.querySelectorAll('.file-drop-area').forEach((dropArea) => {
    const fileInput = dropArea.querySelector('.file-input');
    const fileMsg = dropArea.querySelector('.file-msg');

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

        const files = e.dataTransfer.files;

        if (files.length) {
        fileInput.files = files;
        const fileName = files[0].name;
        fileMsg.textContent = `File selected: ${fileName}`;
        }
    });

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

<!---End of Form 3-->


    <!-- Bootstrap JS-->
    <script src="<?= base_url()?>jobportal/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="<?= base_url()?>jobportal/vendor/bootstrap-4.1/bootstrap.min.js"></script>

    <!-- Main JS-->
    <script src="<?= base_url()?>jobportal/js/main.js"></script>

</body>

</html>
<!-- end document-->