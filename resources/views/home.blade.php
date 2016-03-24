@extends('master')

@section('styles')
	<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/plugins/iCheck/custom.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
@endsection

@section('content')
	<div class="row">
      <div class="col-lg-12">
          <div class="text-center m-t-lg">
              <h1>
                  Welcome in INSPINIA Static SeedProject
              </h1>
              <small>
                  It is an application skeleton for a typical web app. You can use it to quickly bootstrap your webapp projects and dev environment for these projects.
              </small>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                Launch demo modal
                            </button>
                               
                            <div class="modal inmodal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content animated bounceInRight">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                
                                            <h4 class="modal-title">Create a new event</h4>
                                            
                                        </div>
                                        <div class="modal-body">
                                            
                                    {!! Form::open(['data-remote', 'method' => 'POST', 'url' => 'events', 'class' => 'form-inline']) !!}
                
                                      <div class="form-group">
                                        <label for="start-date">from </label>
                                        <input type="text" class="form-control" name="start-date" value="{{ date('d.m.Y') }}">
                                        <input type="text" class="form-control" name="start-time" value="{{ date('H') }}:00">

                                      </div>
                                      <div class="form-group">
                                        <label>to </label>
                                        <input type="text" class="form-control" name="end-date" value="{{ date('d.m.Y') }}">
                                        <input type="text" class="form-control" name="end-time" value="{{ date('H') }}:00">

                                      </div>

                                      <div class="modal-footer">
                                            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                            {!! Form::submit('Create Event', ['class' => 'btn btn-primary']) !!}
                                        </div>
                                      </form>

                                        </div>
                                        
                                    </div>  
                                </div>
                            </div>
          </div>
      </div>
  </div>
@endsection

@section('scripts')

<!-- Mainly scripts -->
<script src="js/jquery-2.1.1.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="js/inspinia.js"></script>
<script src="js/plugins/pace/pace.min.js"></script>

<script>
  
  $(function() {


      var submitAjaxRequest = function(e) {
        e.preventDefault();

        var form = $(this);
        var method = form.find('input[name="_method"]').val() || 'POST';

        $.ajax({
            type: method,
            url: form.prop('action'),
            data: form.serialize(),
            success: function() {

            }
        })
      }


      $('form[data-remote]').on('submit', submitAjaxRequest)
      /*$('*[data-submit-form]').on('click', function(e) {
        e.preventDefault();

      })*/

  });
</script>

@endsection