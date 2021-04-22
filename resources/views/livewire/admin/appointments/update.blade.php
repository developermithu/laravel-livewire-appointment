@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css"/>
@endpush


<div>
    <div class="row">
        <div class="col-md-10 m-auto">
            <form wire:submit.prevent="update" id="TypeValidation" class="form-horizontal" novalidate="novalidate">
              <div class="card ">
                <div class="card-header card-header-rose card-header-text">
                  <div class="card-text">
                    <h4 class="card-title">Update Appointment</h4>
                  </div>
                </div>

                <div class="card-body ">
                    <div class="row">
                      <label class="col-sm-2 col-form-label">Client</label>
                      <div class="col-sm-6">
                        <div class="form-group bmd-form-group" wire:ignore>
                          <select wire:model="state.client_id" class="selectpicker" data-style="select-with-transition" data-size="7" tabindex="-98">
                              <option value="">Select Client</option>
                              @foreach ($clients as $client)
                              <option value="{{$client->id}}">{{$client->name}}</option>
                              @endforeach
                          </select>
                        </div>
                        @error('client_id')
                        <label class="text-danger">{{$message}}</label>
                        @enderror
                      </div>
                    </div>

                    <div class="row">
                      <label class="col-sm-2 col-form-label">Status</label>
                      <div class="col-sm-6">
                        <div class="form-group bmd-form-group" wire:ignore>
                          <select wire:model="state.status" class="selectpicker" data-style="select-with-transition" data-size="7" tabindex="-98">
                              <option value="">Select Status</option>
                              <option value="SCHEDULED">SCHEDULED</option>
                              <option value="CLOSED">CLOSED</option>
                          </select>
                        </div>
                        @error('status')
                        <label class="text-danger">{{$message}}</label>
                        @enderror
                      </div>
                    </div>
  
                    <div class="row">
                      <label for="date" class="col-sm-2 col-form-label">Date</label>
                      <div class="col-sm-4">
                        <div class="form-group bmd-form-group mt-4">
                          <input type="text" id="date" class="form-control" placeholder="YYY MM DD" wire:model="state.date">
                          @error('date')
                          <label class="error">{{$message}}</label>
                          @enderror
                      </div>
                      </div>
                    </div>
  
                    <div class="row">
                      <label for="time" class="col-sm-2 col-form-label">Time</label>
                      <div class="col-sm-4">
                        <div class="form-group bmd-form-group mt-4">
                          <input type="text" id="time" class="form-control" placeholder="H:M" wire:model="state.time">
                          @error('time')
                          <label class="error">{{$message}}</label>
                          @enderror
                      </div>
                      </div>
                    </div>
                    
                    <div class="row">
                      <label for="note" class="col-sm-2 col-form-label">Note</label>
                      <div class="col-sm-10">
                        <div class="form-group bmd-form-group" wire:ignore>
                         <textarea id="note" class="form-control w-100" wire:model="state.note"> {!! $state['note'] !!} </textarea>
                        </div>
                      </div>
                    </div>

                </div>
                <div class="card-footer ml-auto mr-auto">
                  <button type="submit" class="btn btn-primary"> 
                      <span class="material-icons mr-1">save</span> Save Changes </button>
                </div>
              </div>
            </form>
          </div>
    </div>
</div>


@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>
   <script>
    $(function () {
            // Appointment Date
          $('#date').datetimepicker({
              format : 'YYY-MM-DD', 
          })
         .on('dp.change', function(e){
              var data = $('#date').val();
              @this.set('state.date', data);
          });
          
          // Appointment Time
          $('#time').datetimepicker({
              format : 'h:m:s', 
          })
          .on('dp.change', function(e){
              var data = $('#time').val();
              @this.set('state.time', data);
          });
    });

        $('#note').summernote({
                    minHeight: 120,
                    callbacks: {
                        onChange: function(contents, $editable) {
                            @this.set('state.note', contents);
                        }
                    }
                });
   </script>
@endpush