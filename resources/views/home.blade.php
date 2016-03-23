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
                                            

  <form id="event_form">
  <div class="form-group">
    <input id="event-title" type="text" class="form-control" placeholder="Title of the Event" value="" maxlength="100" name="title" autofocus="autofocus"/>
  </div>
  
  <div id="event-time">
    <div id="event-time-from">
      from      <input type="text" value="23-03-2016" name="from" id="from">
      <input type="time" value="03:00" name="fromtime" id="fromtime">
    </div>
    <div id="event-time-to">
      to      <input type="text" value="23-03-2016" name="to" id="to">
      <input type="time" value="05:00" name="totime" id="totime">
    </div>
  </div>

  
  <div style="width: 100%;text-align: center;color: #FF1D1D;" id="errorbox"></div>
  <div id="actions">
    <input type="button" id="submitNewEvent" class="submit actionsfloatright primary"
      data-link="/index.php/apps/calendar/ajax/event/new.php"
      value="Create event">
  </div>
  </form>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Create event</button>
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

@endsection