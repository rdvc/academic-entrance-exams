@extends('layouts.student')
@section('title','Exams')
@section('content')
<style type="text/css">
  .question_options>li {
    list-style: none;
    height: 40px;
    line-height: 40px;
  }
</style>
<!-- /.content-header -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Exams</h1>
        </div><!-- /.col -->

      </div><!-- /.row -->
    </div><!-- /.container-fluid -->

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">

              <div class="card-body">
                <div class="row">
                  <div class="col-sm-4">
                    <h4 class="text-center">Time : {{ $exam->exam_duration}} min</h4>
                  </div>
                  <div class="col-sm-4">
                    <h4 class="text-center"><b>Timer</b> : <span class="js-timeout" id="timer">{{ $exam['exam_duration']}}:00</span></h4>
                  </div>

                  <div class="col-sm-4">
                    <h4 class="text-center"><b>Status</b> :Running</h4>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <div class="card mt-4">

              <div class="card-body">

                <form action="{{url('student/submit_questions')}}" method="POST">
                  <input type="hidden" name="exam_id" value="{{ Request::segment(3)}}">
                  {{ csrf_field()}}
                  <div class="row">

                    @foreach ($question as $key=>$q)
                    <div class="col-sm-12 mt-4">
                      <p>{{$key+1}}. {{ $q->questions}}</p>
                      <?php
                      $options = json_decode(json_decode(json_encode($q->options)), true);
                      ?>
                      <input type="hidden" name="question{{$key+1}}" value="{{$q['id']}}">
                      <ul class="question_options">
                        <li data-option="{{ $options['option1'] }}"><input type="radio" value="{{ $options['option1'] }}" name="ans{{ $key+1 }}"> {{ $options['option1'] }}</li>
                        <li data-option="{{ $options['option2'] }}"><input type="radio" value="{{ $options['option2'] }}" name="ans{{ $key+1 }}"> {{ $options['option2'] }}</li>
                        <li data-option="{{ $options['option3'] }}"><input type="radio" value="{{ $options['option3'] }}" name="ans{{ $key+1 }}"> {{ $options['option3'] }}</li>
                        <li data-option="{{ $options['option4'] }}"><input type="radio" value="{{ $options['option4'] }}" name="ans{{ $key+1 }}"> {{ $options['option4'] }}</li>

                        <script>
                          // Get all list items
                          var listItems = document.querySelectorAll('li');

                          // Loop through each list item
                          listItems.forEach(function(item) {
                            // Add click event listener to each list item
                            item.addEventListener('click', function() {
                              // Find the radio button inside the list item
                              var radioButton = item.querySelector('input[type="radio"]');
                              // Check the radio button when the list item is clicked
                              radioButton.checked = true;
                            });
                          });
                        </script>

                        <li style="display: none;"><input value="0" type="radio" checked="checked" name="ans{{$key+1}}"> {{ $options['option4']}}</li>
                      </ul>
                    </div>
                    @endforeach



                    <div class="col-sm-12">
                      <input type="hidden" name="index" value="{{ $key+1}}">
                      <button type="submit" class="btn btn-primary" id="myCheck">Submit</button>
                    </div>
                  </div>
                </form>

              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- /.content-header -->

  <!-- Modal -->



  @endsection