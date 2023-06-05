<div class="modal modal-blur fade" id="modal-message-error" tabindex="-1" role="dialog" aria-hidden="true"   data-toggle="modal" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-status bg-danger"></div>
      <div class="modal-body text-center py-4">
        <!-- Download SVG icon from http://tabler-icons.io/i/alert-triangle -->
        <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 9v2m0 4v.01" /><path d="M5 19h14a2 2 0 0 0 1.84 -2.75l-7.1 -12.25a2 2 0 0 0 -3.5 0l-7.1 12.25a2 2 0 0 0 1.75 2.75" /></svg>
        <h3 class="modal-title">Message</h3>
        <div class="text-muted" id="msg-body-error">Done.!</div>
      </div>
      <div class="modal-footer">
        <div class="w-100">
          <div class="row">
            <div class="col"><button type="button" class="btn btn-danger w-100" id="message-box-ok-error" data-dismiss="modal" onClick="window.location.reload();">OK</button></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>