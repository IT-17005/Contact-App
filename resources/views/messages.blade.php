@if(Session::has('success_delete'))
    <div class="alert alert-success">
       <p>{{Session::get('success_delete')}}</p>
    </div>
@endif
@if(Session::has('success_edit'))
    <div class="alert alert-success">
       <p>{{Session::get('success_edit')}}</p>
    </div>
@endif
@if(Session::has('success_store'))
    <div class="alert alert-success">
       <p>{{Session::get('success_store')}}</p>
    </div>
@endif
