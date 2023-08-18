<!-- Modal -->
<div class="modal fade" id="rencontre{{$idrencontre}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header" style="border-bottom:none!important">
          <h1 class="modal-title fs-5" id="exampleModalLabel"> </h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          
            <div id="wg-api-football-game"
                data-host="v3.football.api-sports.io"
                data-key="dd8bf5fada55f6377910ef4ee79f7916"
                data-id="{{$idrencontre}}"
                data-theme="gray"
                data-refresh="15"
                data-show-errors="false"
                data-show-logos="true">
            </div>  

        </div>
        <div class="modal-footer" style="border-top:none!important">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          
        </div>
      </div>
    </div>
  </div>
  