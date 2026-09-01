<!-- modal application status false -->
<div class="modal fade" id="app_status_false" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true"
data-backdrop="static">

<style>
.tesda-status-false{
  --ink:#1C2B39;
  --paper:#FAF8F4;
  --brass:#A8762E;
  --brass-dark:#8C6224;
  --slate:#5B6B7A;
  --line:#D9D3C7;
  font-family:'Inter',-apple-system,sans-serif;
  color:var(--ink);
}
.tesda-status-false .modal-content{border:none;border-radius:6px;overflow:hidden;background:var(--paper);}
.tesda-status-false .modal-header{
  background:var(--ink);border:none;padding:18px 24px;
  display:flex;align-items:center;
}
.tesda-status-false .modal-header h3{
  font-family:'Source Serif 4',Georgia,serif;
  color:#fff;font-size:18px;font-weight:600;margin:0;
  display:flex;align-items:center;gap:10px;
}
.tesda-status-false .modal-header h3 i{color:var(--brass);}
.tesda-status-false .modal-header .close{color:#fff;opacity:.8;text-shadow:none;margin-left:auto;}
.tesda-status-false .modal-header .close:hover{opacity:1;color:#fff;}

.tesda-status-false .modal-body{
  padding:40px 28px;
  text-align:center;
}
.tesda-status-false .status-icon{
  width:56px;height:56px;
  border-radius:50%;
  background:#fff;
  border:1px solid var(--line);
  color:var(--slate);
  font-size:22px;
  display:flex;
  align-items:center;
  justify-content:center;
  margin:0 auto 18px;
}
.tesda-status-false .status-text{
  font-family:'Source Serif 4',Georgia,serif;
  font-size:19px;
  font-weight:600;
  color:var(--ink);
  margin-bottom:6px;
}
.tesda-status-false .status-sub{
  font-size:13.5px;
  color:var(--slate);
  max-width:320px;
  margin:0 auto;
  line-height:1.6;
}
</style>

<div class="modal-dialog modal-md tesda-status-false" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h3><i class="fa fa-info-circle" aria-hidden="true"></i> Application Status</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="modal-body">
            <div class="status-icon"><i class="fa fa-search" aria-hidden="true"></i></div>
            <div class="status-text">No record found</div>
            <p class="status-sub">We couldn't find an application matching what you searched for. Please check the details and try again.</p>
        </div>

    </div>
</div>
<!-- end modal application status false -->