<div>
    <div class="row mx-3">
         <div class="mr-auto" style="font-size: 28px">Appointment List</div>
        <a href="{{route('admin.appointments.create')}}">
            <button class="btn btn btn-primary">
                <i class="material-icons">add_circle</i> &nbsp;
                Add Appointment
              <div class="ripple-container"></div><div class="ripple-container"></div>
            </button>
        </a>
      </div>
      
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary card-header-icon d-flex">
                <div class="card-icon">
                  <i class="material-icons">calendar_view_month</i>
                </div>
                <h4 class="card-title">Appointments</h4>

                {{-- Search Functionality --}}
                {{-- <x-search-input-component wire:model="search"/> --}}
                {{-- Search Functionality --}}

                <div class="btn-group ml-auto">
                  <button wire:click="appointmentFilterByStatus" type="button" class="btn {{$status == '' ? 'btn-rose' : 'btn-default' }}">All
                    <span class="badge badge-warning badge-pill ml-2">{{$appointmentCount}}</span>
                    <div class="ripple-container"></div>
                  </button>
                  <button wire:click="appointmentFilterByStatus('scheduled')" type="button" class="btn {{$status == 'scheduled' ? 'btn-rose' : 'btn-default' }} ">Scheduled
                    <span class="badge badge-warning badge-pill ml-2">{{$appointmentScheduledCount}}</span>
                    <div class="ripple-container"></div>
                  </button>
                  <button wire:click="appointmentFilterByStatus('closed')" type="button" class="btn {{$status == 'closed' ? 'btn-rose' : 'btn-default' }} ">Closed
                    <span class="badge badge-warning badge-pill ml-2">{{$appointmentClosedCount}}</span>
                    <div class="ripple-container"></div>
                  </button>
                </div>

              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th class="text-center">#</th>
                        <th>Client Name</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Note</th>
                        <th>Status</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($appointments as $key=>$appointment)
                      <tr>
                        <td class="text-center"> {{ $key + 1 }} </td>
                        <td>{{$appointment->client->name}}</td>
                        <td>{{$appointment->date}}</td>
                        <td>{{Carbon\Carbon::parse($appointment->time)->format('h:i A')}}</td>
                        <td>{!! Str::limit($appointment->note, 60, '...') !!}</td>
                         <td>{{$appointment->status}}</td>
                        <td class="td-actions">
                          <a href="{{route('admin.appointments.edit', $appointment)}}"    class="btn btn-primary" >
                            <i class="material-icons">edit</i>
                          </a> &nbsp;

                          <button wire:click.prevent="confirmRemoval('{{$appointment->id}}')" type="button" class="btn btn-danger">
                            <i class="material-icons">delete</i>
                          </button>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            {{-- pagination --}}
            <div class="d-flex justify-content-end">
              {{ $appointments->links() }}
            </div>
            
          </div>
      </div>

    {{-- Delete Component --}}
    <x-confirmation-alert/>

</div>



