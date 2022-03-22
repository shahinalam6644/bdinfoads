
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Media Library</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
   
        <div class="row">
        @foreach($medies as $media)
            <div class="col-md-3 p-3">

                <input type="radio" name="test" id="{{$media->id }}" />
                <label for="{{$media->id }}" class="labelMedia"><img src="{{ asset('public/images/') }}/{{$media->img_name }}" class="img-thumbnail" onclick="changeValue('{{ asset('public/images/') }}/{{$media->img_name }}')"/></label>
                
            </div> 
        @endforeach
        </div> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Insert</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>