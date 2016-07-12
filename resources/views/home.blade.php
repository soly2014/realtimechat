@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2 sidebar">
                <ul class="nav nav-pills nav-stacked">

                @foreach(App\User::all() as $user)

                    @if($user->id != Auth::user()->id)
                <li role="presentation" class="user" data-id="{{ $user->id }}"><a href="javascript:;">{{ $user->name }}</a></li>
                     @endif

                @endforeach  

                </ul>

                </div>

                <div class="col-md-10">
                    <div class="row chat-container">
                        

                  @foreach($session as $sesh)

                    @include('chatbox',['url'=>$sesh])

                  @endforeach
                    



                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer.scripts')

    <script type="text/javascript">
        
        $('document').ready(function () {
            
            $('.user').on('click',function () {

                var id = '/'+$(this).data('id');
                
                $.ajax({

                    url:'{{ url('/chatbox') }}'+id,
                    method:'get',
                    dataType:'json',
                    data:$(this).data('id'),
                    success:function (result) {

                 
                   if ($('.chat-box').length <= 2) {

                        
                        $('.chat-container').prepend(result);

                    
                            $('.close-chat').on('click',function () {

                                    $(this).closest('.chat-box').remove();
                                });

                                $('.panel-heading').on('click',function () {                                   

                                     if ( $('.chat-box').hasClass('minimize')) {
                                    
                                    
                                    $(this).closest('.chat-box').css({"margin-top":"-151px"});
                                    $(this).closest('.chat-box').removeClass('minimize');
                                    
                                     } else {
                                      
                                    $(this).closest('.chat-box').css({"margin-top":"133px"});
                                    $(this).closest('.chat-box').addClass('minimize');

                                     }


                                    
                                 });

                    }
              }
                });


            });

        });

    </script>

@endsection