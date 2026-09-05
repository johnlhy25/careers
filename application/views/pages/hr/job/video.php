<div class="modal fade delete" id="video" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content tesda-reminder" style="border: none;">

<style>
.tesda-reminder{
  --ink:#1C2B39;
  --paper:#FAF8F4;
  --brass:#A8762E;
  --brass-dark:#8C6224;
  --slate:#5B6B7A;
  --line:#D9D3C7;
  --warn:#8C6224;
  font-family:'Inter',-apple-system,sans-serif;
  color:var(--ink);
  background:var(--paper);
  border-radius:6px;
  overflow:hidden;
}
.tesda-reminder .modal-body{padding:0;}

.tesda-reminder #accordion{margin:0;}
.tesda-reminder .card{border:none;border-radius:0;background:transparent;}
.tesda-reminder .card-header{
  background:var(--ink);
  border:none;
  padding:0;
}
.tesda-reminder .card-header .card-link{
  display:flex;
  align-items:center;
  gap:12px;
  padding:22px 28px;
  color:#fff;
  text-decoration:none;
}
.tesda-reminder .card-header h1,
.tesda-reminder .card-header h5{
  margin:0;
  color:#fff !important;
  font-family:'Source Serif 4',Georgia,serif;
}
.tesda-reminder .card-header h1{font-size:22px;font-weight:700;}
.tesda-reminder .card-header h5{font-size:16px;font-weight:600;}
.tesda-reminder .card-header i{color:var(--brass);}

.tesda-reminder .card-body{padding:28px;}
.tesda-reminder .card-body h4{
  font-family:'Source Serif 4',Georgia,serif;
  font-size:17px;
  font-weight:600;
  margin-bottom:18px;
  color:var(--ink);
}

.tesda-reminder .checklist{
  list-style:none;
  margin:0 0 20px;
  padding:0;
  counter-reset:doc-item;
  background:#fff;
  border:1px solid var(--line);
  border-radius:4px;
  overflow:hidden;
}
.tesda-reminder .checklist li{
  counter-increment:doc-item;
  display:flex;
  gap:14px;
  padding:14px 18px;
  font-size:14.5px;
  line-height:1.55;
  border-bottom:1px solid var(--line);
}
.tesda-reminder .checklist li:last-child{border-bottom:none;}
.tesda-reminder .checklist li::before{
  content:counter(doc-item);
  flex-shrink:0;
  width:24px;
  height:24px;
  border-radius:50%;
  background:var(--paper);
  border:1px solid var(--line);
  color:var(--brass-dark);
  font-weight:600;
  font-size:12.5px;
  display:flex;
  align-items:center;
  justify-content:center;
  margin-top:1px;
}
.tesda-reminder .checklist .addressee{
  display:block;
  margin-top:8px;
  padding:10px 14px;
  background:var(--paper);
  border-left:3px solid var(--brass);
  border-radius:0 3px 3px 0;
  font-size:14px;
  line-height:1.6;
}
.tesda-reminder .checklist a{
  display:inline-flex;
  align-items:center;
  gap:6px;
  margin-top:8px;
  color:var(--brass-dark);
  font-weight:600;
  font-size:13.5px;
  text-decoration:none;
}
.tesda-reminder .checklist a:hover{text-decoration:underline;}

.tesda-reminder .caution{
  background:#FBF3E7;
  border:1px solid #EAD8B8;
  border-radius:4px;
  padding:16px 18px;
  margin-bottom:22px;
}
.tesda-reminder .caution h4{
  font-family:'Inter',sans-serif;
  font-size:14px;
  font-weight:600;
  color:var(--warn);
  margin-bottom:6px;
  text-align:left !important;
}
.tesda-reminder .caution p{
  font-size:13.5px;
  line-height:1.6;
  color:#5A4425;
  margin:0;
}

.tesda-reminder .btn-confirm{
  width:100%;
  background:var(--brass);
  border:none;
  color:#fff;
  font-weight:600;
  font-size:15px;
  padding:13px;
  border-radius:4px;
  cursor:pointer;
  transition:background .15s ease;
}
.tesda-reminder .btn-confirm:hover{background:var(--brass-dark);}

.tesda-reminder .fb-follow{
  text-align:center;
  margin-top:20px;
  padding-top:18px;
  border-top:1px solid var(--line);
}
.tesda-reminder .fb-follow .follow-label{
  display:block;
  color:var(--ink);
  font-size:13.5px;
  font-weight:600;
  margin-bottom:12px;
}

.tesda-reminder video{border-radius:4px;}

.advisory-box{
    background:#FBEAEA;
    border:1px solid #F0C6C6;
    border-left:4px solid var(--error);
    border-radius:4px;
    padding:18px 20px;
    margin-bottom:20px;
}
.advisory-title{
    display:flex;
    align-items:center;
    gap:8px;
    font-family:'Source Serif 4',Georgia,serif;
    font-size:22px;
    font-weight:700;
    color:var(--error);
    margin-bottom:10px;
}
.advisory-icon{
    color:var(--error);
    font-size:14px;
}
.advisory-text{
    font-size:13.5px;
    line-height:1.65;
    color:#5A2A2A;
    margin-bottom:14px;
}
.advisory-text b{color:var(--error);font-weight:700;}

.btn-link-custom{
    display:inline-flex;
    align-items:center;
    gap:8px;
    background:#8f2b2b;
    border:none;
    color:#fff !important;
    font-size:13.5px;
    font-weight:600;
    padding:10px 20px;
    border-radius:3px;
    text-decoration:none !important;
    transition:background .15s ease;
}
.btn-link-custom:hover{
    background:#8f2b2b;
    color:#fff;
}
</style>

<!--Body-->
          <div class="modal-body">

            <div id="accordion">
              <div class="card">
                <div class="card-header">
                  <a class="card-link" data-toggle="collapse" href="#collapseOne">
                    <i class="fa fa-bell" aria-hidden="true"></i>
                    <h1>Reminder</h1>
                  </a>
                </div>
                <div id="collapseOne" class="collapse show" data-parent="#accordion">
                  <div class="card-body">
                    
                    <div class="advisory-box">
                        
                        <div class="advisory-title">
                            Advisory
                        </div>
                    
                        <div class="advisory-text text-justify">
                            Please be informed that <b>many applicants have been disqualified due to errors in accomplishing the Personal Data Sheet (PDS)</b>. To avoid disqualification, kindly review the proper guidelines for completing the form by clicking the link provided. 
                            Please also note that the <b>revised 2026 Personal Data Sheet (PDS) should be used.</b>
                        </div>
                    
                        <a href="https://drive.google.com/drive/folders/11kXxPgJGChP53sURJoSAA4gzep-_FCZq?usp=sharing" target="_blank" class="btn btn-danger btn-link-custom">
                            View Proper PDS Guide
                        </a>
                    
                    </div>

                    <h4>Please prepare the following file attachments in PDF format before proceeding:</h4>

                    <ul class="checklist">
                      <li>
                        <div>
                          Application letter addressed to (indicating the position, office where the vacancy exists and its Plantilla Item Number):
                          <span class="addressee">
                            <b>Ashary A. Banto, JD., CESE</b><br>
                            Regional Director<br>
                            Carig Norte, Tuguegarao City, Cagayan
                          </span>
                        </div>
                      </li>
                      <li>Transcript of Record/ Diploma/ Certificate of Grade etc. (Authenticated Copy)</li>
                      <li>Preferably authenticated copy of Eligibilities (CSC) or Authenticated copy of Unexpired License or Board Rating (PRC).<br>
                          <br>Submission of FAKE eligibility shall cause the filing of perjury/administrative case by the CSC.</li>
                      <li>National TVET Trainers Certificate (if applicable)</li>
                      <li>National Certificate (if applicable)</li>
                      <li>Certificate of Employment (Indicating Duties and Responsibilities)</li>
                      <li>Service Record (if applicable)</li>
                      <li>Copy of Previous Appointment (if gov't. employee - outsider)</li>
                      <li>Performance rating in the present position for the last two (2) rating periods, certified by HRMO (if applicable)</li>
                      <li>Relevant Training Certificates, certified by HRMO (if any)</li>
                      <li>
                        <div>
                          Personal Data Sheet duly subscribed/administered (CS Form No. 212, revised 2026)<br>
                          <a href="<?= base_url()?>uploads/System/Files/PDS Sample.xlsx"><i class="fa fa-download" aria-hidden="true"></i> Download Sample</a>
                        </div>
                      </li>
                      <li>
                        <div>
                          Work Experience Sheet (WES CS Form 212)<br>
                          <a href="<?= base_url()?>uploads/System/Files/PDS Sample.xlsx"><i class="fa fa-download" aria-hidden="true"></i> Download Sample</a>
                        </div>
                      </li>
                      <li>Awards Related to Performance, certified by HRMO (if any)</li>
                      <li style="display:none">Expert Services in Active Participation in Professional/Technical Activities, certified by HRMO (if any)</li>
                      <li style="display:none">Present Committees/TWGs Participation, certified by HRMO (if any)</li>
                    </ul>

                    <div class="caution">
                        <h4>Before you proceed</h4>
                        <p>Make sure your internet connection is stable. If you have multiple files, combine them into one (1) PDF and keep each file under 2 MB. Avoid uploading documents a few hours before the deadline — high traffic near closing time can cause slow uploads, system errors, or failed submissions.</p>
                    </div>

                    <button type="button" class="btn-confirm" data-dismiss="modal"><i class="fa fa-check-circle" aria-hidden="true"></i> Confirm and Proceed</button>

                    <div class="fb-follow">
                      <span class="follow-label">Follow our Facebook page for updates</span>
                      
                      <!-- Facebook Like Button -->
                      <div class="fb-like"
                          data-href="https://www.facebook.com/TESDAOfficial"
                          data-width=""
                          data-layout="button_count"
                          data-action="like"
                          data-size="large"
                          data-share="true">
                      </div>

                    </div>

                  </div>
                </div>
              </div>

              <div class="card">
                <div class="card-header">
                  <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
                    <i class="fa fa-play" aria-hidden="true"></i>
                    <h1>Watch Tutorial</h1>
                  </a>
                </div>
                <div id="collapseTwo" class="collapse" data-parent="#accordion">
                  <div class="card-body">
                    <div class="logo">
                      <video width="100%" height="85%" controls>
                        <source src="<?= base_url();?>assets/img/video.mp4" type="video/mp4">
                      </video>
                    </div>
                  </div>
                </div>
              </div>

            </div>

          </div>
<!--Body-->

    </div>
  </div>
</div>