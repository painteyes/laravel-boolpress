@extends('layouts.dashboard')

@section('content')
    <section>
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Well done!</h4>
            <span>You're logged into the administration area.</span>
        </div>
        <div class="about mt-4">
            <h4>About</h4>
            {{-- personal info --}}
            <div class="mb-4">
                <div class="">Name: {{$user->name}}</div>
                    @if ($user_info)
                        <div class=""> {{$user_info->phone ? 'Phone: ' . $user_info->phone : ''}}</div>
                        <div class=""> {{$user_info->address ? 'Address: ' . $user_info->address : ''}}</div> 
                    @endif  
                </div>   
            </div>
            

            {{-- Form for add / edit personal info --}}
            @if ($user_info)
                @if ($user_info->phone && $user_info->address)
                    <div class="mt-4">  
                        {{-- Completed info  --}}
                        <div id='completed-info' class="show">
                            <h5>Congratulations, your profile is complete.</h5>
                            <button id='edit-profile-button' onclick="showEditProfileForm()" type="button" class="btn btn-secondary show">Edit profile</button>
                        </div> 
                        {{-- Edit info --}}
                        <div id="edit-profile-form" class='show mt-4'>
                            <h5>Edit your profile</h5>
                            {{-- Alert messages for errors in the form --}} 
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            {{-- Form --}}
                            <form action="{{route('admin.update')}}" method="post">
                                @csrf
                                @method('PUT')
                                {{-- phone --}}
                                <div class="form-group">
                                    <div class="w-25">
                                        <label for="title">Phone</label>
                                        <input 
                                            type="text" 
                                            class="form-control" 
                                            id="phone" name="phone" 
                                            value="{{old('phone', $user_info->phone)}}"
                                        > 
                                    </div>   
                                </div>                                
                                {{-- address --}}
                                <div class="form-group">
                                    <div class="w-25">
                                        <label for="title">Address</label>
                                        <input 
                                            type="text" 
                                            class="form-control" 
                                            id="text" name="address" 
                                            value="{{old('address', $user_info->address)}}"
                                        > 
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success">Save</button>
                            </form>
                        </div>
                    </div>
                @endif
            @else
                <div class="mt-4">
                    <h5>Complete your profile</h5>
                    {{-- Alert messages for errors in the form --}} 
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    {{-- Form --}}
                    <form action="{{route('admin.update')}}" method="post">
                        @csrf
                        @method('PUT')                         
                        {{-- phone --}}
                        <div class="form-group">
                            <div class="w-25">
                                <label for="title">Phone</label>
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    id="phone" name="phone" 
                                    value="{{old('phone')}}"
                                > 
                            </div>   
                        </div>                        
                        {{-- address --}}
                        <div class="form-group">
                            <div class="w-25">
                                <label for="title">Address</label>
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    id="text" name="address" 
                                    value="{{old('address')}}"
                                > 
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Save</button>
                    </form>
                </div>
            @endif
        </div>
    </section>
@endsection