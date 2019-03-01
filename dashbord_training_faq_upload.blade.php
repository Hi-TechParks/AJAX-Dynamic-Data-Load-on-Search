@extends('layouts.app')
@section('main-content')   
    <section class="main_contents">
        <div class="container-fluid">
            <div class="panel panel-primary" style="padding: 15px">
                <div class="row">
                    <div class="col-sm-4 col-md-4">
                        <h3 style="margin: 0"><i class="fas fa-cogs"></i> Dashbord<span class="" style="padding: 0px 10px; border-left: 3px solid #031b4e; margin: 0px 10px">Upload Faq</span></h3>
                    </div>
                    
                    <div class="col-sm-6 col-md-8">
                        
                    </div>
                </div>
            </div>
            
            
            <!-- ==========================  Start FAQ Upload  =============================  -->
            @include('inc.admin_sidebar') 
            <div class="col-sm-8 col-md-9">
                <div class="panel text-right">
                    @include('inc.message')
                </div>
                
                <form action="/admin/faq" method="post">
                    @csrf
                    <div class="row form-group">
                        <div class="col-md-8 col-md-offset-2">
                            <label>Select Program *</label>
                            <select name="training" required="" id="training" class="form-control">
                                <option value="">Select Program</option>
                                <option disabled="" style="color: #4267B2;">--- Training ---</option>
                                @foreach($trainings as $training)
                                <option value="{{ $training->PROGRAM_ID }}" 
                                    @if(isset($_GET['program_id']))
                                        @if($_GET['program_id'] == $training->PROGRAM_ID )
                                         selected
                                        @endif
                                    @endif
                                    >{{ $training->PROGRAM_NAME }}</option>
                                @endforeach
                                <option disabled="" style="color: #4267B2;">--- Workshop ---</option>
                                @foreach($w_programs as $workshop)
                                <option value="{{ $workshop->PROGRAM_ID }}" 
                                    @if(isset($_GET['program_id']))
                                        @if($_GET['program_id'] == $workshop->PROGRAM_ID )
                                         selected
                                        @endif
                                    @endif>{{ $workshop->PROGRAM_NAME }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('training'))

                                <span  class="error">
                                    {{ $errors->first('training') }}
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-8 col-md-offset-2">
                            <label>FAQ Number *</label>
                            <!-- <input type="text" id="" placeholder="FAQ Number" name="number" value="@if(isset($_GET['faq_no'])) {{$_GET['faq_no']+1}} @endif" required="" class="form-control"> -->
                            <div id="faq_no">
                                <input type="text" id="" placeholder="FAQ Number" name="number" value="@if(isset($_GET['faq_no'])) {{$_GET['faq_no']+1}} @endif" required="" class="form-control">
                            </div>
                            @if ($errors->has('number'))
                            <span  class="error">
                                {{ $errors->first('number') }}
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-8 col-md-offset-2">
                            <label>FAQ *</label>
                            <input type="text" placeholder="Question" name="question" required="" class="form-control">
                            @if ($errors->has('question'))
                                <span  class="error">
                                    {{ $errors->first('question') }}
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-8 col-md-offset-2">
                            <label>FAQ Description *</label>
                            <textarea name="content" rows="15" class="form-control"></textarea>
                             @if ($errors->has('content'))
                                <span  class="error">
                                    {{ $errors->first('content') }}
                                </span>
                              @endif
                        </div>
                    </div>
               
                    <div class="row form-group">
                        <div class="col-md-8 col-md-offset-2">
                            <input type="submit" value="Save" name="submit" class="btn btn-primary"> 
                        </div>
                    </div>

                </form> 
            </div>
            <!-- ==========================  End FAQ Upload  =============================  -->

        </div>
    </section>
@endsection




<script src="http://code.jquery.com/jquery-3.3.1.min.js"
       integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
       crossorigin="anonymous">
</script>
<script>
 jQuery(document).ready(function(){
    jQuery('#training').on('change', function(e){
       e.preventDefault();
       $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
          }
      });

    jQuery.ajax({
       url: "{{ url('/admin/faq/number') }}",
       method: 'post',
       data: {
          training: jQuery('#training option:selected').val()
       },
       success: function(result){
          jQuery('#faq_no').show();
          jQuery('#faq_no').html(result.values);
       }});
    });
 });
</script>