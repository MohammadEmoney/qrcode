@extends('layouts.main')

@section('content')
    <div class="content">
        <div class="title m-b-md">
            QRCode Generator
        </div>
        <div class="content">
            <form action="{{ route('qr.generate') }}" method="post">
                @csrf
                <label for="text">Insert Text</label>
                <input type="text" class="form-control" id="text" name="text" placeholder="www.example.com" value="{{ old('text') }}">
                <div class="my-3">
                    <button class="btn btn-primary" type="submit">Generate</button>
                </div>
            </form>
        </div>
        @if(isset($data))
            <hr>
            <div>
                <img src="/{{ $data['image'] }}" width="300" alt="{{ $data['text'] }}">
                <div>
                    <a href="{{ $data['image'] }}" class="btn btn-secondary">Save</a>
                </div>
            </div>
        @endif
    </div>
@endsection