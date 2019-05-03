@extends('layouts.main')

@section('content')
    <div class="content">
        <div class="title m-b-md">
            QRCode Generator
        </div>
        <div class="content">
            <div class="form">
                <label for="text">Insert Text</label>
                <input type="url" class="form-control" id="text"
                    placeholder="www.example.com">
                <div class="my-3">
                    <button class="btn btn-primary" id="qrgenerate">Generate</button>
                </div>
            </div>
        </div>


        <hr />
        <div class="output" style="visibility: hidden">
            <img src="" width="300" alt="" id="image-qrcode" />
            <div>
                <a href="" class="btn btn-secondary" id="url-qrcode">Save</a>
            </div>
        </div>



    </div>
@endsection


@section('script')

    <script type="text/javascript">
        
        $(document).ready(() => {

            $('#qrgenerate').on('click', (e) => {
                e.preventDefault();

                let text = $('#text').val();
                
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
                    }
                })
                // csrf setup

                $.ajax({
                    type: "POST",
                    url: '/qrcode',
                    data: { text: text },
                    success: (res) => {
                        $('.output').css("visibility", "visible")
                        $('#image-qrcode').attr('src', res.image)
                        $('#image-qrcode').attr('alt', res.text)
                        $('#url-qrcode').attr('href', res.text)
                    }
                })
                // send for generate QRCode

            })
            // qr-btn

        })
        // readyState

    </script>

@endsection
