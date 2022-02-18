<div id="addAvailableModal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Update Sales Person</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
    <div class="modal-body">
        
{!! Form::open(['name' => 'change-client', 'class' => 'change-client']) !!}

<input id="ids" type="text" readonly hidden name="id" value=""  class="form-control" >

    <div class="col-md-12">
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label for="last_name">Full name :</label>
          
          </div>
        </div>
        <div class="col-md-8">
          <input id="name" class="form-control input-cl" type="text" name="name" value="">
        </div>
       </div>
      </div>

      <div class="col-md-12">
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label for="last_name">Email :</label>
            
            </div>
          </div>
          <div class="col-md-8">
            <input id="email" class="form-control input-cl" type="text" name="email" value="">
          </div>
         </div>
        </div>


        <div class="col-md-12">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="last_name">TelePhone :</label>
              
              </div>
            </div>
            <div class="col-md-8">
              <input id="tele_no" class="form-control input-cl" type="text" name="tele_no" value="">
            </div>
           </div>
          </div>

          <div class="col-md-12">
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="last_name">JoinDate :</label>
                
                </div>
              </div>
              <div class="col-md-8">
                <input id="join_date" class="form-control input-cl" type="date" name="join_date" value="">
              </div>
             </div>
            </div>

            <div class="col-md-12">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="last_name">Route :</label>
                  
                  </div>
                </div>
                <div class="col-md-8">
                  <select class="form-control input-cl"  name="route"  id="route">
                    @foreach($routs as $type)
                        <option value="{{$type->id}}">{{$type->name}}</option>
                    @endforeach
                  </select>
                </div>
               </div>
              </div>

              <div class="col-md-12">
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="last_name">Comments :</label>
                    
                    </div>
                  </div>
                  <div class="col-md-8">
                    <input id="comments"  class="form-control input-cl" type="text" name="comments" value="">
                  </div>
                 </div>
                </div>
      



     
        <br><br><br>

          <div class="modal-footer">
                <button class="btn btn-success"  type="button" id="btnEditAvailable"  >Update</button>

                {!! Form::close() !!}
           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>
</div>

</div>
