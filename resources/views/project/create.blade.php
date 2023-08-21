@extends('layouts.app')

@section('content')

    <div class="row justify-content-center text-right">
        {{-- Title --}}
        <div class="col-8">
            <h3 class="text-center">New Project</h3>

            {{--  Data Input --}}
            <form action="{{url('/project/store')}}" method="POST" >
                @csrf
                {{-- Name Project --}}
                <div class="form-group">
                    <label for="title">Name Project</label>
                    <input class="form-control" type="text" name="title" id="title" placeholder="Name Project">
                </div>

                {{-- Error Field Title--}}
                @error('title')
                <div class="text-danger">
                    <small>{{$message}}</small>
                </div>
                @enderror

                {{-- Descriptions Project --}}
                <div class="form-group">
                    <label for="desc">Name Project</label>
                    <textarea class="form-control" rows="10" cols="30" name="descriptions" id="desc" >
                        Descriptions Project
                    </textarea>
                </div>

                {{-- Error Field Descriptions--}}
                @error('descriptions')
                <div class="text-danger">
                    <small>{{$message}}</small>
                </div>
                @enderror

                {{-- Button Submit --}}
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Create Project</button>
                </div>
            </form>
        </div>
    </div>
@endsection
