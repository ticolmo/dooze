<!-- Modal -->
<div class="modal fade" id="rencontre{{$idrencontre}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" style="height:90vh">
      <div class="modal-content">
        <div class="modal-header" style="border-bottom:none!important">
          <h1 class="modal-title fs-5" id="exampleModalLabel"> </h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <iframe width="100%" src="{{route('detailrencontre', $idrencontre)}}" frameborder="0" frameborder="0" onload="onIframeLoad(this)"></iframe>
                      

        </div>
        <div class="modal-footer" style="border-top:none!important">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          
        </div>
      </div>
    </div>
  </div>

 
  