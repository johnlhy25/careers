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
                    <h4>Please prepare the following file attachments in PDF format before proceeding:</h4>

                    <ul class="checklist">
                      <li>
                        <div>
                          Application letter addressed to (indicating the position, office where the vacancy exists and its Plantilla Item Number):
                          <span class="addressee">
                            <b>Toni June A. Tamayo, CESO III</b><br>
                            Regional Director<br>
                            Carig Norte, Tuguegarao City, Cagayan
                          </span>
                        </div>
                      </li>
                      <li>Transcript of Record, Diploma, Certificate of Grade etc. (Authenticated Copy)</li>
                      <li>Certificate of Eligibility, Board Rating and Licensed (Unexpired and Authenticated Copy)</li>
                      <li>National TVET Trainers Certificate (if applicable)</li>
                      <li>National Certificate (if applicable)</li>
                      <li>Certificate of Employment (Indicating Duties and Responsibilities)</li>
                      <li>Service Record (if applicable)</li>
                      <li>Copy of Previous Appointment (if gov't. employee - outsider)</li>
                      <li>Performance rating in the present position for the last two (2) rating periods, certified by HRMO (if applicable)</li>
                      <li>Relevant Training Certificates, certified by HRMO (if any)</li>
                      <li>
                        <div>
                          Personal Data Sheet duly subscribed/administered (CS Form No. 212, revised 2017)<br>
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
                      <li>Expert Services in Active Participation in Professional/Technical Activities, certified by HRMO (if any)</li>
                      <li>Present Committees/TWGs Participation, certified by HRMO (if any)</li>
                    </ul>

                    <div class="caution">
                        <h4>Before you proceed</h4>
                        <p>Make sure your internet connection is stable. If you have multiple files, combine them into one (1) PDF and keep each file under 2 MB. Avoid uploading documents a few hours before the deadline — high traffic near closing time can cause slow uploads, system errors, or failed submissions.</p>
                    </div>

                    <button type="button" class="btn-confirm" data-dismiss="modal"><i class="fa fa-check-circle" aria-hidden="true"></i> Confirm and Proceed</button>

                    <div class="fb-follow">
                      <span class="follow-label">Follow our Facebook page for updates</span>
                      <div class="fb-like" data-href="https://www.facebook.com/TESDARegionll/" data-width="720" data-layout="button_count" data-action="" data-size="large" data-share="true"></div>
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