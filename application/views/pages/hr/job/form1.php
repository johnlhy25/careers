<!-- First Tab-->
<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

<style>
.tesda-app{
  --ink:#1C2B39;
  --paper:#FAF8F4;
  --brass:#A8762E;
  --brass-dark:#8C6224;
  --slate:#5B6B7A;
  --line:#D9D3C7;
  --success:#3F7A5C;
  --error:#B23A3A;
  font-family:'Inter',-apple-system,sans-serif;
  color:var(--ink);
  background:var(--paper);
  max-width:680px;
  margin:0 auto;
  border:1px solid var(--line);
  border-radius:4px;
  overflow:hidden;
}
.tesda-app .card{border:none;border-radius:0;background:transparent;}
.tesda-app .card-header{
  background:var(--ink);
  color:var(--paper);
  border:none;
  padding:28px 32px 22px;
}
.tesda-app .card-header .eyebrow{
  display:block;
  font-size:13px;
  color:#C9BFA8;
  margin-bottom:6px;
  letter-spacing:.01em;
}
.tesda-app .card-header .title{
  font-family:'Source Serif 4',Georgia,serif;
  font-size:26px;
  font-weight:600;
}
.tesda-app .card-body{padding:32px;}

.tesda-app .intent-block{
  background:#fff;
  border:1px solid var(--line);
  border-left:4px solid var(--brass);
  border-radius:3px;
  padding:20px 22px;
  margin-bottom:36px;
}
.tesda-app .intent-block label{
  font-family:'Source Serif 4',Georgia,serif;
  font-size:16px;
  font-weight:600;
  display:block;
  margin-bottom:4px;
}
.tesda-app .intent-block .hint{
  font-size:13.5px;
  color:var(--slate);
  margin-bottom:14px;
  line-height:1.5;
}
.tesda-app .file-picker{
  position:relative;
  display:flex;
  align-items:center;
  gap:12px;
}
.tesda-app .file-picker input[type=file]{
  position:absolute;
  inset:0;
  opacity:0;
  cursor:pointer;
  width:100%;
  height:100%;
}
.tesda-app .file-picker .btn-choose{
  background:var(--ink);
  color:#fff;
  padding:9px 18px;
  border-radius:3px;
  font-size:14px;
  font-weight:500;
  white-space:nowrap;
}
.tesda-app .file-picker .file-name{
  font-size:13.5px;
  color:var(--slate);
}
.tesda-app .file-picker.has-error .btn-choose{background:var(--error);}

.tesda-app .field{margin-bottom:22px;}
.tesda-app .field label{
  display:block;
  font-size:14px;
  font-weight:600;
  margin-bottom:7px;
}
.tesda-app .field label .req{color:var(--error);margin-left:3px;}
.tesda-app .field .note{
  display:block;
  font-size:12.5px;
  color:var(--slate);
  margin-top:6px;
}
.tesda-app input[type=text],
.tesda-app input[type=date],
.tesda-app input[type=number],
.tesda-app input[type=email],
.tesda-app select{
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
.tesda-app input:focus,
.tesda-app select:focus{
  outline:none;
  border-color:var(--brass);
  box-shadow:0 0 0 3px rgba(168,118,46,.15);
}
.tesda-app select{appearance:auto;}

.tesda-app .row-2{display:flex;gap:16px;}
.tesda-app .row-2 .field{flex:1;}
@media(max-width:560px){.tesda-app .row-2{flex-direction:column;gap:0;}}

.tesda-app .segmented{display:flex;flex-wrap:wrap;gap:8px;}
.tesda-app .segmented input{position:absolute;opacity:0;pointer-events:none;}
.tesda-app .segmented .seg-label{
  border:1px solid var(--line);
  background:#fff;
  border-radius:20px;
  padding:8px 16px;
  font-size:14px;
  cursor:pointer;
  transition:.15s ease;
}
.tesda-app .segmented input:checked + .seg-label{
  background:var(--ink);
  border-color:var(--ink);
  color:#fff;
}

.tesda-app .divider{
  border:none;
  border-top:1px solid var(--line);
  margin:32px 0;
}

.tesda-app .submit-row{
  display:flex;
  align-items:center;
  gap:18px;
  margin-top:28px;
}
.tesda-app button#btn_forme1{
  background:var(--brass);
  border:none;
  color:#fff;
  font-weight:600;
  font-size:15px;
  padding:12px 26px;
  border-radius:3px;
  cursor:pointer;
  transition:background .15s ease;
}
.tesda-app button#btn_forme1:hover{background:var(--brass-dark);}
.tesda-app button#btn_forme1 i{margin-right:8px;}

.tesda-app .message .alert{
  border-radius:3px;
  padding:12px 16px;
  font-size:14px;
  margin-bottom:18px;
}
.tesda-app .alert-success{background:#EAF3EE;color:var(--success);border:1px solid #C7E0D2;}
.tesda-app .alert-danger{background:#FBEAEA;color:var(--error);border:1px solid #F0C6C6;}

.tesda-app .checkbox-group{display:flex;flex-wrap:wrap;gap:8px;}
.tesda-app .checkbox-group input{position:absolute;opacity:0;pointer-events:none;}
.tesda-app .checkbox-group .chk-label{
  border:1px solid var(--line);
  background:#fff;
  border-radius:20px;
  padding:8px 16px;
  font-size:14px;
  cursor:pointer;
  transition:.15s ease;
  display:inline-flex;
  align-items:center;
  gap:6px;
}
.tesda-app .checkbox-group .chk-label::before{
  content:"";
  width:14px;height:14px;
  border:1.5px solid var(--line);
  border-radius:3px;
  display:inline-block;
  flex-shrink:0;
}
.tesda-app .checkbox-group input:checked + .chk-label{
  background:var(--ink);
  border-color:var(--ink);
  color:#fff;
}
.tesda-app .checkbox-group input:checked + .chk-label::before{
  background:var(--brass);
  border-color:var(--brass);
}

.tesda-app button#btn_forme1:disabled{
  background:var(--slate);
  cursor:not-allowed;
  opacity:.75;
}

/* DataTables wrapper spacing */
.dataTables_wrapper{padding:18px 20px 20px;background:#fff;}

/* "Show X entries" dropdown */
.dataTables_length{margin-bottom:16px;}
.dataTables_length label{
  font-size:13.5px;
  color:var(--slate);
  display:flex;
  align-items:center;
  gap:8px;
}
.dataTables_length select{
  border:1px solid var(--line);
  border-radius:3px;
  padding:6px 10px;
  font-size:13.5px;
  color:var(--ink);
  background:#fff;
}
.dataTables_length select:focus{outline:none;border-color:var(--brass);}

/* Search box */
.dataTables_filter{margin-bottom:16px;}
.dataTables_filter label{
  font-size:13.5px;
  color:var(--slate);
  display:flex;
  align-items:center;
  gap:8px;
}
.dataTables_filter input{
  border:1px solid var(--line);
  border-radius:3px;
  padding:8px 12px;
  font-size:14px;
  color:var(--ink);
  min-width:220px;
  background:#fff;
}
.dataTables_filter input:focus{
  outline:none;
  border-color:var(--brass);
  box-shadow:0 0 0 3px rgba(168,118,46,.15);
}

/* "Showing X to Y of Z entries" info text */
.dataTables_info{
  font-size:13px;
  color:var(--slate);
  padding-top:18px;
}

/* Pagination */
.dataTables_paginate{
  padding-top:14px;
  display:flex;
  justify-content:flex-end;
  gap:4px;
}
.dataTables_paginate .paginate_button{
  border:1px solid var(--line) !important;
  background:#fff !important;
  color:var(--ink) !important;
  border-radius:3px !important;
  padding:6px 12px !important;
  font-size:13.5px !important;
  margin-left:0 !important;
  cursor:pointer;
  transition:.15s ease;
}
.dataTables_paginate .paginate_button:hover{
  background:var(--ink) !important;
  border-color:var(--ink) !important;
  color:#fff !important;
}
.dataTables_paginate .paginate_button.current{
  background:var(--brass) !important;
  border-color:var(--brass) !important;
  color:#fff !important;
}
.dataTables_paginate .paginate_button.disabled{
  color:var(--line) !important;
  cursor:not-allowed;
  background:#fff !important;
}
.dataTables_paginate .paginate_button.disabled:hover{
  background:#fff !important;
  color:var(--line) !important;
  border-color:var(--line) !important;
}

/* Sortable column header arrows */
table.dataTable thead th.sorting:after,
table.dataTable thead th.sorting_asc:after,
table.dataTable thead th.sorting_desc:after{
  opacity:.5;
}

/* Responsive: stack length + filter on small screens */
@media(max-width:576px){
  .dataTables_wrapper .row{flex-direction:column;gap:10px;}
  .dataTables_filter, .dataTables_length{text-align:left !important;}
  .dataTables_filter input{width:100%;min-width:0;}
}

</style>

<!---Form 1-->
<div class="tesda-app">
    <div class="card">
        <div class="card-header">
            <span class="eyebrow">Step 1 of your application</span>
            <div class="title">Personal Information</div>
        </div>
        <div id="forme1_card" class="card-body"><!---card-body-->
            <form action="" method="POST" id="forme1_form" role="form"><!--Form-->

            <input type="hidden" id="pos_id" name="pos_id">

            <!--Letter of Intent-->
            <div class="intent-block">
                <label for="intent_file">Intent Letter</label>
                <p class="hint">Indicate the position, the office where the vacancy exists, and its Item Number. PDF only.</p>
                <div class="file-picker">
                    <span class="btn-choose">Choose file</span>
                    <span class="file-name" data-default="No file selected">No file selected</span>
                    <input type="file" id="intent_file" name="intent_file" accept="application/pdf" required>
                </div>
            </div>
            <!--Letter of Intent-->

            <div class="row-2">
                <div class="field">
                    <label for="lastname">Last Name<span class="req">*</span></label>
                    <input type="text" id="lastname" name="lastname" placeholder="Dela Cruz" required>
                </div>
                <div class="field">
                    <label for="firstname">First Name<span class="req">*</span></label>
                    <input type="text" id="firstname" name="firstname" placeholder="Juan" required>
                </div>
            </div>

            <div class="row-2">
                <div class="field">
                    <label for="middlename">Middle Name<span class="req">*</span></label>
                    <input type="text" id="middlename" name="middlename" placeholder="Bassig" required>
                </div>
                <div class="field">
                    <label for="suffix">Suffix</label>
                    <input type="text" id="suffix" name="suffix" placeholder="Jr.">
                </div>
            </div>

            <div class="row-2">
                <div class="field">
                    <label for="birthdate">Birth Date<span class="req">*</span></label>
                    <input type="date" id="birthdate" name="birthdate" required>
                </div>
                <div class="field">
                    <label for="age">Age<span class="req">*</span></label>
                    <input type="number" id="age" name="age" placeholder="20" required>
                </div>
            </div>

            <div class="field">
                <label for="address">Address<span class="req">*</span></label>
                <input type="text" id="address" name="address" placeholder="#123 Zone 1 Barangay, Municipality, Province" required>
            </div>

            <div class="row-2">
                <div class="field">
                    <label for="contactno">Contact Number/s<span class="req">*</span></label>
                    <input type="text" id="contactno" name="contactno" placeholder="09123456789"
                        pattern="(09[0-9]{9}|\+639[0-9]{9})"
                        title="Enter a valid Philippine mobile number (e.g., 09123456789)" required>
                </div>
                <div class="field">
                    <label for="email">Email Address (Active)<span class="req">*</span></label>
                    <input type="email" id="email" name="email" placeholder="juanbdelacruz@gmail.com" required>
                </div>
            </div>

            <div class="field">
                <label for="nationality">Nationality<span class="req">*</span></label>
                <input type="text" id="nationality" name="nationality" placeholder="Filipino" required>
            </div>

            <div class="field">
                <label>Civil Status<span class="req">*</span></label>
                <div class="segmented">
                    <input type="radio" id="single" name="status" value="single"><label class="seg-label" for="single">Single</label>
                    <input type="radio" id="married" name="status" value="married"><label class="seg-label" for="married">Married</label>
                    <input type="radio" id="seperated" name="status" value="seperated"><label class="seg-label" for="seperated">Legally Separated</label>
                    <input type="radio" id="widowed" name="status" value="widowed"><label class="seg-label" for="widowed">Widowed</label>
                </div>
            </div>

            <div class="field">
                <label>Gender<span class="req">*</span></label>
                <div class="segmented">
                    <input type="radio" id="male" name="gender" value="male"><label class="seg-label" for="male">Male</label>
                    <input type="radio" id="female" name="gender" value="female"><label class="seg-label" for="female">Female</label>
                </div>
            </div>

            <div class="field">
                <label for="education">Highest Educational Attainment<span class="req">*</span></label>
                <select name="education" id="education" required>
                    <option value="">Please select</option>
                    <option value="Elementary Under Graduate">Elementary Under Graduate</option>
                    <option value="Elementary Graduate">Elementary Graduate</option>
                    <option value="High School Under Graduate">High School Under Graduate</option>
                    <option value="High School Graduate">High School Graduate</option>
                    <option value="College Under Graduate">College Under Graduate</option>
                    <option value="College Graduate">College Graduate</option>
                    <option value="Units in Masteral">Units in Masteral</option>
                    <option value="Masteral">Masteral</option>
                    <option value="Units in Doctorate">Units in Doctorate</option>
                    <option value="Doctorate">Doctorate</option>
                </select>
                <input type="text" id="course" name="course" placeholder="Master in Library and Information Science" style="margin-top:10px" required>
                <span class="note">Write in full — do not abbreviate.</span>
            </div>

           <!---Reference of posting-->
            <div class="field">
                <label>Where did you see this vacancy?</label>
                <div class="checkbox-group">
                    <input type="checkbox" id="bulletin" name="reference[]" value="Bulletin Board"><label class="chk-label" for="bulletin">Bulletin Board</label>
                    <input type="checkbox" id="tesdaWebsite" name="reference[]" value="TESDA Website"><label class="chk-label" for="tesdaWebsite">TESDA Website</label>
                    <input type="checkbox" id="cscWebsite" name="reference[]" value="CSC Website"><label class="chk-label" for="cscWebsite">CSC Website</label>
                    <input type="checkbox" id="referrals" name="reference[]" value="Referrals"><label class="chk-label" for="referrals">Referrals</label>
                    <input type="checkbox" id="facebook" name="reference[]" value="Facebook"><label class="chk-label" for="facebook">Facebook</label>
                    <input type="checkbox" id="other" name="reference[]" value="Other Recruitment Platform"><label class="chk-label" for="other">Other Recruitment Platform</label>
                </div>
            </div>
            <!---Reference of posting-->

            <hr class="divider">

            <div class="g-recaptcha" data-sitekey="6Lfsr1AcAAAAAJrOf8WvM5nM1W6m5YaSSzTOH1fZ" required>

            </div>

            <button id="btn_forme1" name="forme1" type="submit" style="width:100%;margin-top:10px">
                <i class="fa fa-save" id="btn_forme1_icon"></i>
                <span id="btn_forme1_label">Submit</span>
            </button>
            <div id="forme1_message" class="message"></div>

            </form><!---End of Form-->
        </div><!---card-body-->
    </div>
</div>
<!---End of Form 1-->

</div>
<!-- First Tab-->

<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Source+Serif+4:wght@600&display=swap" rel="stylesheet">

<!-- script here -->
<script type="text/javascript">
    $(document).ready(function() {
        var applicant_id;

        //-------FORM 1---------  
        $('#vacant_positions_open_landing').on('click','.apply',function(){
            var pos_id = $(this).data('pos_id');
            $('#pos_id').val(pos_id);
        });

        // Cosmetic: show chosen filename next to the custom file button
        $('#intent_file').on('change', function(){
            var name = this.files.length ? this.files[0].name : $(this).siblings('.file-name').data('default');
            $(this).siblings('.file-name').text(name);
        });

        $('#forme1_form').submit(function(e){
            e.preventDefault(); 

                // show loading state
                $('#btn_forme1').prop('disabled', true);
                $('#btn_forme1_icon').removeClass('fa-save').addClass('fa-spinner fa-spin');
                $('#btn_forme1_label').text('Submitting...');

                $.ajax({
                    url: "<?php echo base_url().'save_forme1'?>",
                    type: "post",
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    cache: false,
                    async: false,
                    success: function(data){
                        var json = $.parseJSON(data);
                        if(json.status == 'True'){
                            html =  '<div class="alert alert-success mt-2 message"><i class="fa fa-check-circle" aria-hidden="true"></i> '+ json.message +' </div>';
                            $('#forme1_message').prepend(html);
                            $('#forme1_card').prepend(html);
                        }else{
                            html =  '<div class="alert alert-danger mt-2 message"><i class="fa fa-times" aria-hidden="true"></i> '+ json.message +' </div>';
                            $('#forme1_message').prepend(html);
                            $('#forme1_card').prepend(html);
                        }  
                        
                        // auto-hide any message after 5 seconds
                        setTimeout(function(){
                            $('.message.alert').fadeOut(400, function(){ $(this).remove(); });
                        }, 5000);
                    },
                    complete: function(){
                        // restore button regardless of success or failure
                        $('#btn_forme1').prop('disabled', false);
                        $('#btn_forme1_icon').removeClass('fa-spinner fa-spin').addClass('fa-save');
                        $('#btn_forme1_label').text('Submit');
                    }
                });
        });

    });
    //-------FORM 1---------  
</script>
<!-- script here -->