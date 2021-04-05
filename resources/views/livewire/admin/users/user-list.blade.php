<div>
    <div class="row">
         <div class="mr-auto" style="font-size: 28px">User List</div>
        <button wire:click.prevent="addNew" class="btn btn btn-primary" data-toggle="modal" data-target="#myModal">
            <i class="material-icons">add_circle</i> &nbsp;
            Add User
          <div class="ripple-container"></div><div class="ripple-container"></div>
        </button>
      </div>

      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">people</i>
                </div>
                <h4 class="card-title">User List</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th class="text-center">#</th>
                        <th>Ceck</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Joined at</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($users as $user)
                      <tr>
                        <td class="text-center">{{$loop->iteration}}</td>
                        <td>
                            <div class="form-check">
                              <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" value="">
                                <span class="form-check-sign">
                                  <span class="check"></span>
                                </span>
                              </label>
                            </div>
                          </td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->created_at->diffForHumans()}}</td>
                        <td class="td-actions">
                          {{-- <button type="button" rel="tooltip" class="btn" data-original-title="" title="view">
                            <i class="material-icons">visibility</i>
                          </button> &nbsp; --}}

                          <button wire:click.prevent="edit({{$user}})" rel="tooltip" class="btn btn-primary" data-original-title="edit" title="edit">
                            <i class="material-icons">edit</i>
                          </button> &nbsp;

                          <button wire:click.prevent="confirmUserRemoval({{$user->id}})" type="button" rel="tooltip" class="btn btn-danger" data-original-title="" title="delete">
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
              {{ $users->links() }}
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
            <form wire:submit.prevent="{{ $showEditModal ? 'updateUser' : 'creatUser'}}" method="#" action="#">
            <div class="modal-body">
                  <div class="card-body ">
                      <div class="form-group bmd-form-group @error('name') has-danger @enderror">
                        <input type="text" wire:model.defer="state.name" class="form-control" id="name" placeholder="Your name..">
                        @error('name')
                        <label class="error" for="name">{{$message}}</label>
                        @enderror
                      </div>

                      <div class="form-group bmd-form-group @error('email') has-danger @enderror">
                        <input type="text" wire:model.defer="state.email" class="form-control" id="email" placeholder="Email address..">
                        @error('email')
                        <label class="error" for="email">{{$message}}</label>
                        @enderror
                      </div>

                      <div class="form-group bmd-form-group @error('password') has-danger @enderror">
                        <input type="password" wire:model.defer="state.password" class="form-control" id="password" placeholder="Password..">
                        @error('password')
                        <label class="error" for="password">{{$message}}</label>
                        @enderror
                      </div>

                      <div class="form-group bmd-form-group">
                        <input type="password" wire:model.defer="state.password_confirmation" class="form-control" id="password_confirmation" placeholder="Confirm password..">
                      </div>
                  </div>
            </div>
            <div class="modal-footer">            
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

      {{-- Delete Model --}}
      <div wire:ignore.self class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" style="display: none; padding-right: 17px; padding-left: 17px;">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">
                Delete User
              </h5>
            </div>
            <div class="modal-body">
                     Are you sure want to delete this user?
            </div>
            <div class="modal-footer">            
              <button type="button" class="btn btn-danger py-2 px-3 mr-3" data-dismiss="modal"> <span class="material-icons mr-1">close</span>No<div class="ripple-container"><div class="ripple-decorator ripple-on ripple-out" style="left: 36.0341px; top: 12.6364px; background-color: rgb(244, 67, 54); transform: scale(8.50994);"></div><div class="ripple-decorator ripple-on ripple-out" style="left: 36.0341px; top: 12.6364px; background-color: rgb(244, 67, 54); transform: scale(8.50994);"></div><div class="ripple-decorator ripple-on ripple-out" style="left: 36.0341px; top: 12.6364px; background-color: rgb(244, 67, 54); transform: scale(8.50994);"></div></div></button>

              <button wire:click.prevent="deleteUser" type="button" class="btn btn-primary py-2">
                <span class="material-icons mr-1">delete</span>
                  Yes!
                <div class="ripple-container"></div></button>
            </div>
          </div>
        </div>
      </div>

</div>
