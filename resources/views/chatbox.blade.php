
                        <div class="col-md-4 chat-box">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">

                                    @if($url)
                                        {{ App\User::find($url)->name }}
                                    @endif    
                                        <i class="fa fa-remove pull-right close-chat"></i>
                                    </h3>
                                </div>
                                <div class="panel-body">

                                @foreach($msg as $mes)

                                    @if($mes['from'] == Auth::user()->id)
                                    <div class="alert alert-success" style="width:100%">{{ nl2br($mes['message']) }}</div>
                                    @else
                                    <div class="alert alert-info" style="width:100%">{{ nl2br($mes['message']) }}</div>
                                    @endif
                                    

                                @endforeach    
                                </div>
                                <div class="panel-footer">
                                    <input type="text" name="message" class="form-control" placeholder="type a message">
                                </div>
                            </div>
                        </div>