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
        .tesda-form2 .notice p{margin:0 0 8px;}
        .tesda-form2 .notice p:last-child{margin-bottom:0;}

        .tesda-form2 .divider{border:none;border-top:1px solid var(--line);margin:28px 0;}

        .tesda-form2 .field{margin-bottom:22px;}
        .tesda-form2 .field label{
            display:block;
            font-size:14px;
            font-weight:600;
            margin-bottom:8px;
            color:var(--ink);
        }
        .tesda-form2 .field label b{color:var(--brass-dark);}
        .tesda-form2 textarea{
            width:100%;
            border:1px solid var(--line);
            background:#fff;
            border-radius:3px;
            padding:11px 13px;
            font-size:14.5px;
            font-family:inherit;
            color:var(--ink);
            resize:vertical;
            transition:border-color .15s ease;
        }
        .tesda-form2 textarea:focus{
            outline:none;border-color:var(--brass);
            box-shadow:0 0 0 3px rgba(168,118,46,.15);
        }
        .tesda-form2 textarea:disabled{background:var(--paper);color:var(--slate);}
        .tesda-form2 .note{
            display:block;
            font-size:12.5px;
            color:var(--slate);
            margin-top:6px;
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

        .tesda-form2 button#btn_forme8{
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
        .tesda-form2 button#btn_forme8:hover{background:var(--brass-dark);}
        .tesda-form2 button#btn_forme8:disabled{background:var(--slate);cursor:not-allowed;opacity:.75;}
        .tesda-form2 button#btn_forme8 i{margin-right:8px;}

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
        .summary-value{flex:1;color:var(--ink);}
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

        .tesda-accordion{
            background:#fff;
            border-radius:4px;
            overflow:hidden;
            margin-left:20px;
            margin-right:20px;
        }

        .accordion-item{border-bottom:1px solid var(--line);}
        .accordion-item:last-child{border-bottom:none;}

        .accordion-header{
            display:flex;
            align-items:center;
            justify-content:space-between;
            padding:16px 20px;
            font-size:14.5px;
            font-weight:600;
            color:var(--ink);
            cursor:pointer;
            background:var(--paper);
            transition:background .15s ease;
        }
        .accordion-header:hover{background:var(--paper);}

        .accordion-icon{
            color:var(--brass-dark);
            font-size:13px;
            transition:transform .2s ease;
        }
        .accordion-item.open .accordion-icon{transform:rotate(180deg);}

        .accordion-body{
            display:grid;
            grid-template-rows:0fr;
            transition:grid-template-rows .25s ease;
        }
        .accordion-body-inner{
            overflow:hidden;
            min-height:0;
        }
        .accordion-item.open .accordion-body{
            grid-template-rows:1fr;
        }

        .completion-msg{
            text-align:left;
        }
        .completion-msg-title{
            display:flex;
            align-items:center;
            gap:8px;
            font-family:'Source Serif 4',Georgia,serif;
            font-size:16px;
            font-weight:700;
            color:var(--success);
            margin-bottom:10px;
        }
        .completion-msg-title i{font-size:15px;}

        .completion-msg-list{
            list-style:none;
            margin:0 0 14px;
            padding:0;
        }
        .completion-msg-list li{
            position:relative;
            padding-left:22px;
            font-size:13.5px;
            line-height:1.6;
            color:var(--ink);
            margin-bottom:8px;
        }
        .completion-msg-list li:last-child{margin-bottom:0;}
        .completion-msg-list li::before{
            content:"\f00c"; /* fa-check */
            font-family:"FontAwesome";
            position:absolute;
            left:0;
            top:1px;
            font-size:11px;
            color:var(--success);
        }

        .completion-msg-footer{
            font-size:13.5px;
            font-weight:700;
            color:var(--brass-dark);
            padding-top:12px;
            border-top:1px solid var(--line);
        }
    </style>
</head>

<body class="animsition">

    <div class="page-wrapper">

        <!-- Header Tab-->
            <?php include("include/sticky.php");?>
        <!-- Header Tab-->

        <!-- PAGE CONTENT-->
                <div class="container">
                    <div class="tesda-form2">
                        <div class="card">
                            <div class="card-header">
                                <strong>Awards Related to Performance</strong>
                            </div>

                            <div id="forme8_card" class="card-body"><!---card-body-->
                            
                            <!--- Your Saved Information--->
                                <?php
                                    function tesda_format_list($value) {
                                        if (empty($value)) return '';
                                        $parts = array_filter(array_map('trim', explode(';', $value)), function($v){ return $v !== ''; });
                                        return implode(', ', $parts);
                                    }

                                    $international_display = tesda_format_list($applicant['app_performance_international'] ?? '');
                                    $national_display      = tesda_format_list($applicant['app_performance_national'] ?? '');
                                    $regional_display       = tesda_format_list($applicant['app_performance_regional'] ?? '');
                                    $provincial_display    = tesda_format_list($applicant['app_performance_provincial'] ?? '');
                                
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

                                    <?php if ($international_display): ?>
                                        <div class="summary-row">
                                            <span class="summary-label">International</span>
                                            <span class="summary-value"><?= $international_display ?></span>
                                        </div>
                                    <?php endif; ?>

                                    <?php if ($national_display): ?>
                                        <div class="summary-row">
                                            <span class="summary-label">National</span>
                                            <span class="summary-value"><?= $national_display ?></span>
                                        </div>
                                    <?php endif; ?>

                                    <?php if ($regional_display): ?>
                                        <div class="summary-row">
                                            <span class="summary-label">Regional</span>
                                            <span class="summary-value"><?= $regional_display ?></span>
                                        </div>
                                    <?php endif; ?>

                                    <?php if ($provincial_display): ?>
                                        <div class="summary-row">
                                            <span class="summary-label">Provincial / Institutional</span>
                                            <span class="summary-value"><?= $provincial_display ?></span>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <!--- Your Saved Information--->

                            <!--- Your Saved Documents--->
                                <?php
                                    $documents = [
                                        'awards' => ['app_performance', 'Awards Related to Performance'],
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

                            <!--- Evaluation Result--->
                                    <?php if (!empty($evaluation['app_result'])): ?>
                                        <div class="applicant-summary">
                                            <div class="summary-header">
                                                <i class="fa fa-edit" aria-hidden="true"></i>
                                                Evaluation Result
                                            </div>

                                            <?php if (!empty($evaluation['app_result'])): ?>
                                            <div class="summary-row">
                                                <span class="summary-label">Result</span>
                                                <span class="summary-value">
                                                    <strong><?= $evaluation['app_result'] ?></strong>
                                                </span>
                                            </div>
                                            <?php endif; ?>

                                            <?php if (!empty($evaluation['eval_chklist10'])): ?>
                                            <div class="summary-row">
                                                <span class="summary-label">Awards Related to Performance</span>
                                                <span class="summary-value">
                                                    <?= $evaluation['eval_chklist10'] ?>
                                                </span>
                                            </div>
                                            <?php endif; ?>

                                            <!--Evaluation Summary-->
                                            <?php if (!empty($evaluation['eval_remarks'])): ?>
                                            <div class="summary-row" style="background:var(--paper)">
                                                <span class="summary-label"><b>REMARKS ON CSC QUALIFICATION STANDARDS</b></span>
                                                <span class="summary-value">
                                                    <b><?=  tesda_format_list(strtoupper($evaluation['eval_remarks'])) ?></b>
                                                </span>
                                            </div>
                                            <?php endif; ?>
  
                                            <?php if (!empty($evaluation['eval_remarks1'])): ?>
                                            <div class="summary-row" style="background:var(--paper)">
                                                <span class="summary-label"><b>REMARKS ON UPLOADED DOCUMENTS</b></span>
                                                <span class="summary-value">
                                                    <b><?= tesda_format_list(strtoupper($evaluation['eval_remarks1'])) ?></b>
                                                </span>
                                            </div>
                                            <?php endif; ?>
                                            <!--Evaluation Summary-->

                                        </div>
                                    <?php endif; ?>

                                    <?php if (!empty($applicant['app_reevaluation']) && $applicant['app_reevaluation'] == 1): ?>
                                        <div class="notice notice-success reeval-sent" role="alert">
                                            <i class="fa fa-check-circle" aria-hidden="true"></i>
                                            <div>
                                                <p><strong>Request Sent.</strong> Your request for re-evaluation has been submitted successfully.</p>
                                                <p class="reeval-sub">The HRMPSB will review your request and notify you once a decision has been made.</p>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    
                                <!--- Evaluation Result--->

                                <?php if($applicant['vac_deadline'] >= date('Y-m-d')){ ?>

                                    <br>

                                    <div class="tesda-accordion">
                                        <div class="accordion-item">
                                            <div class="accordion-header">
                                                <span>Click to Continue Application</span>
                                                <i class="fa fa-chevron-down accordion-icon" aria-hidden="true"></i>
                                            </div>
                                            <div class="accordion-body">
                                                <div class="accordion-body-inner">
                                                    <!--Content Here-->
                                                
                                                    <!---Reminder--->        
                                                        <div class="notice notice-warning" role="alert">
                                                            <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                                                            <span>Merge multiple files into a single PDF if applicable. Each file or upload must not exceed 2 MB.</span>
                                                        </div>

                                                        <div class="notice notice-success" role="alert">
                                                            <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                                                            <div>
                                                                <p><strong>Reminder:</strong> Any changes you make to this form will update the following information accordingly:</p>
                                                                <p>1. International: <?= $international_display ?: 'None on file' ?></p>
                                                                <p>2. National: <?= $national_display ?: 'None on file' ?></p>
                                                                <p>3. Regional: <?= $regional_display ?: 'None on file' ?></p>
                                                                <p>4. Provincial / Institutional: <?= $provincial_display ?: 'None on file' ?></p>
                                                                <div class="emphasis-callout">
                                                                    <i class="fa fa-info-circle" aria-hidden="true"></i>
                                                                    <span>Please upload the required documents for this form. If there are no updates to the required fields or documents, you may leave them blank.</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <!---Reminder--->

                                                    <!---Form Here--->
                                                        <form action="" method="POST" id="forme8_form" role="form"><!--Form-->
                                                            <input type="hidden" id="form_app_id" name="form_app_id" value="<?= $hash ?>">

                                                            <!---International-->
                                                            <div class="field">
                                                                <label for="international_arp"><b>International</b> (Indicate your International Award or Recognition here if any)</label>
                                                                <textarea name="international_arp" id="international_arp" rows="4"></textarea>
                                                                <span class="note">Write in full/Do not abbreviate. Put "N/A" if not applicable. Separate each with a semicolon (;)</span>
                                                            </div>
                                                            <!---International-->

                                                            <!---National-->
                                                            <div class="field">
                                                                <label for="national_arp"><b>National</b> (Indicate your National Award or Recognition here if any)</label>
                                                                <textarea name="national_arp" id="national_arp" rows="4"></textarea>
                                                                <span class="note">Write in full/Do not abbreviate. Put "N/A" if not applicable. Separate each with a semicolon (;)</span>
                                                            </div>
                                                            <!---National-->

                                                            <!---Regional-->
                                                            <div class="field">
                                                                <label for="regional_arp"><b>Regional</b> (Indicate your Regional Award or Recognition here if any)</label>
                                                                <textarea name="regional_arp" id="regional_arp" rows="4"></textarea>
                                                                <span class="note">Write in full/Do not abbreviate. Put "N/A" if not applicable. Separate each with a semicolon (;)</span>
                                                            </div>
                                                            <!---Regional-->

                                                            <!---Provincial / Institutional-->
                                                            <div class="field">
                                                                <label for="provincial_arp"><b>Provincial / Institutional</b> (Indicate your Provincial or Institutional Award or Recognition here if any)</label>
                                                                <textarea name="provincial_arp" id="provincial_arp" rows="4"></textarea>
                                                                <span class="note">Write in full/Do not abbreviate. Put "N/A" if not applicable. Separate each with a semicolon (;)</span>
                                                            </div>
                                                            <!---Provincial / Institutional-->

                                                            <!---PDF File-->
                                                            <div class="field">
                                                                <label for="arp_file">Upload your evidence here if any</label>
                                                                <div class="file-drop-area" id="arp-drop-area">
                                                                    <span class="fake-btn">Choose File</span>
                                                                    <span class="file-msg">or drag and drop a file here</span>
                                                                    <input type="file" id="arp_file" name="arp_file" class="file-input" accept="application/pdf">
                                                                </div>
                                                                <span class="note">Please upload PDF file only.</span>
                                                            </div>
                                                            <!---PDF File-->

                                                            <hr class="divider">

                                                            <?php if($applicant['app_lock'] != 1){ ?>
                                                                <!--Iam not a robot-->
                                                                <div class="field">
                                                                    <div class="g-recaptcha" data-sitekey="6Lfsr1AcAAAAAJrOf8WvM5nM1W6m5YaSSzTOH1fZ" required></div>
                                                                </div>
                                                                <!--Iam not a robot-->

                                                                <!--Submit-->
                                                                    <button id="btn_forme8" name="forme8" type="submit">
                                                                        <i class="fa fa-save" id="btn_forme8_icon"></i><span id="btn_forme8_label">Submit</span>
                                                                    </button>
                                                                    <div id="forme8_message" class="message"></div>
                                                                <!--Submit-->
                                                            <?php } else{?>
                                                                <div class="emphasis-callout">
                                                                    <i class="fa fa-info-circle" aria-hidden="true"></i>
                                                                    <span>Your application has been evaluated and is now locked.</span>
                                                                </div>
                                                                <div id="forme8_message" class="message"></div>
                                                            <?php }?>

                                                        </form><!---End of Form-->
                                                    <!---Form Here--->

                                                    <!--Content Here-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    

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

                            //-------FORM 8---------  
                            $('#forme8_form').submit(function(e){
                            e.preventDefault(); 

                                $('#btn_forme8').prop('disabled', true);
                                $('#btn_forme8_icon').removeClass('fa-save').addClass('fa-spinner fa-spin');
                                $('#btn_forme8_label').text('Submitting...');

                                $.ajax({
                                    url: "<?php echo base_url().'save_forme8'?>",
                                    type: "post",
                                    data: new FormData(this),
                                    processData: false,
                                    contentType: false,
                                    cache: false,
                                    async: false,
                                    success: function(data){
                                        var json = $.parseJSON(data);
                                        if(json.status == 'True'){
                                            html =  '<div class="alert alert-success mt-2 message"> '+ json.message +'</div>';

                                            $("#btn_forme8").hide();

                                            $("#international_arp").attr("disabled", true);
                                            $("#national_arp").attr("disabled", true);
                                            $("#regional_arp").attr("disabled", true);
                                            $("#provincial_arp").attr("disabled", true);
                                            $("#arp_file").attr("disabled", true);

                                            // Refresh the page after a short delay so the success message is visible first
                                            setTimeout(function(){
                                                location.reload();
                                            }, 30000);

                                        }else{
                                            html = '<div class="alert alert-danger mt-2 message"> <i class="fa fa-times" aria-hidden="true"></i> '+ json.message +'</div>';

                                            $('#btn_forme8').prop('disabled', false);
                                            $('#btn_forme8_icon').removeClass('fa-spinner fa-spin').addClass('fa-save');
                                            $('#btn_forme8_label').text('Submit');
                                        }   
                                        
                                        var $newMessage = $(html).prependTo('#forme8_message');

                                        // Apply the auto-hide to THIS specific element, not a blanket ".message" selector
                                        $newMessage.delay(30000).slideUp(200, function(){
                                            $(this).remove();
                                        });
                                    }
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

                            $('.accordion-header').click(function(){
                                var $item = $(this).closest('.accordion-item');
                                var isOpen = $item.hasClass('open');

                                // Close all other items (remove this block if you want multiple open at once)
                                $('.accordion-item').removeClass('open');

                                if (!isOpen) {
                                    $item.addClass('open');
                                }
                            });

                            $(window).on('load', function() {
                                $('#sitePrivacyModal').modal('show');
                            });
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