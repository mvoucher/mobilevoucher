    <div class="frm-footer">
      <div class="row">
        <div class="col-sm-4"> © {{ date("Y") }} </div>
        <div class="col-sm-8">
        <ul id="lang" class="pull-right">
            <li class="active"><a href="#"><img width="28" height="16" alt="{{ session('locale') }}"  src="{!! asset('assets/images/flags/' . session('locale') . '.png') !!}" /></a></li>
            @foreach ( config('app.languages') as $user)
                @if($user !== config('app.locale'))
                  <li><a href="{!! url('language') !!}/{{ $user }}"><img width="32" height="20" alt="{{ $user }}" src="{!! asset('assets/images/flags/' . $user . '.png') !!}"></a></li>
                @endif
              @endforeach
            </ul>
            </div>
      </div>
            
      </div>
      <!-- /.footer -->