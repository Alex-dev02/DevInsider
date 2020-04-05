<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="accordion" id="accordionExample">
      @if(count($chapters) > 0)
        @foreach($chapters as $chapter)
            <div class="card">
              <div class="card-header" id="headingTwo">
                <h5 class="mb-0">
                  <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    <span style="font-size: 20px;">{{$chapter}}</span>
                  </button>
                </h5>
              </div>
              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">
                  <ul class="list-group">
                    @foreach($lessons as $lesson)
                      @if($lesson->belongs_to_chapter == $chapter)
                        <a href="{{URL::to('/lessons/' . $lesson->lesson_id)}}">
                          <li class="list-group-item">{{$lesson->title}}</li>
                        </a>
                      @endif
                    @endforeach
                  </ul>
                </div>
              </div>
            </div>
          @endforeach
        @endif
    </div>
  </div>
</div>
