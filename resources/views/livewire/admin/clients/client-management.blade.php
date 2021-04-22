<div>
    <div class="row mx-3">
         <div class="mr-auto" style="font-size: 28px">Client List</div>
        <button wire:click.prevent="addNew" class="btn btn btn-primary" data-toggle="modal" data-target="#myModal">
            <i class="material-icons">add_circle</i> &nbsp;
            Add Client
          <div class="ripple-container"></div><div class="ripple-container"></div>
        </button>
      </div>

      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary card-header-icon d-flex">
                <div class="card-icon">
                  <i class="material-icons">person</i>
                </div>
                <h4 class="card-title">Clients</h4>

                {{-- Search Functionality --}}
                 <x-search-input-component wire:model="search"/>
               {{-- Search Functionality --}}

              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th class="text-center">#</th>
                        <th>Name</th>
                        <th>Added On</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody wire:loading.class="text-muted">

                      @forelse ($clients as $client)
                      <tr>
                        <td class="text-center">{{$loop->iteration}}</td>
                        <td>{{$client->name}}</td>
                        <td>{{$client->created_at->diffForHumans()}}</td>
                        <td class="td-actions">
                          <button wire:click.prevent="edit({{$client->id}})" class="btn btn-primary">
                            <i class="material-icons">edit</i>
                          </button> &nbsp;

                          <button wire:click.prevent="confirmRemoval({{$client->id}})" type="button" class="btn btn-danger">
                            <i class="material-icons">delete</i>
                          </button>
                        </td>
                      </tr>        
                      @empty
                          <tr class="text-center">
                            <td colspan="6">                          
                                <img src="https://42f2671d685f51e10fc6-b9fcecea3e50b3b59bdc28dead054ebc.ssl.cf5.rackcdn.com/illustrations/page_not_found_su7k.svg" alt="not found" width="100px">
                                <p> No results found</p>
                            </td>
                          </tr>
                      @endforelse

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            {{-- pagination --}}
            <div class="d-flex justify-content-end">
              {{ $clients->links() }}
            </div>
          </div>
      </div>

      {{-- Add and Update Model --}}
      <div wire:ignore.self class="modal fade" id="form" tabindex="-1" role="dialog" style="display: none; padding-right: 17px; padding-left: 17px;">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">
                @if ($showEditModal)
                    Update User
                @else
                    Add New User
                @endif
              </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i class="material-icons">clear</i>
              </button>
            </div>
            <form wire:submit.prevent="{{ $showEditModal ? 'update' : 'create'}}" enctype="multipart/form-data">
            <div class="modal-body">
                  <div class="card-body ">

                      <div class="form-group bmd-form-group @error('name') has-danger @enderror">
                        <input type="text" wire:model="name" class="form-control" id="name" placeholder="Your name..">
                        @error('name')
                        <label class="error" for="name">{{$message}}</label>
                        @enderror
                      </div>

                  </div>
            </div>
            <div class="modal-footer pb-0">            
              <button type="button" class="btn btn-danger py-2 px-3 mr-3" data-dismiss="modal"> <span class="material-icons mr-1">close</span>Close<div class="ripple-container"><div class="ripple-decorator ripple-on ripple-out" style="left: 36.0341px; top: 12.6364px; background-color: rgb(244, 67, 54); transform: scale(8.50994);"></div><div class="ripple-decorator ripple-on ripple-out" style="left: 36.0341px; top: 12.6364px; background-color: rgb(244, 67, 54); transform: scale(8.50994);"></div><div class="ripple-decorator ripple-on ripple-out" style="left: 36.0341px; top: 12.6364px; background-color: rgb(244, 67, 54); transform: scale(8.50994);"></div></div></button>

              <button type="submit" class="btn btn-primary py-2">
                <span class="material-icons mr-1">save</span>
                @if ($showEditModal)
                   <span> Save changes</span>
                @else
                   <span> Save</span>
                @endif
                <div class="ripple-container"></div></button>
            </div>
            </form>
          </div>
        </div>
      </div>

      {{-- Confirm Delete --}}
<x-confirmation-alert/>

</div>
