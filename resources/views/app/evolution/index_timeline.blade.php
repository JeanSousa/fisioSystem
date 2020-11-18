<!-- Main node for this component -->
<div class="timeline">
    @foreach($evolutions as $evolution)
    <!-- Timeline time label -->
    <div class="time-label">
      <span class="bg-primary">
          {{\Carbon\Carbon::parse($evolution->evolution_date)->format('d / m / Y')}}
      </span>
    </div>
    <div>
    <!-- Before each timeline item corresponds to one icon on the left scale -->
      <i class="fas fa-child bg-teal"></i>
      <!-- Timeline item -->
      <div class="timeline-item">
      <!-- Time -->
        <span class="time">
            <i class="fas fa-clock"></i> 
            {{\Carbon\Carbon::parse($evolution->evolution_date)->format('H:i:s')}}
        </span>
        <!-- Header. Optional -->
        <h3 class="timeline-header">Paciente: <a href="#">
         {{ucwords($evolution->patient->name)}}
        </a>
       </h3>
         
        <!-- Body -->
        <div class="timeline-body">
          <h6><strong>Saturação O<sub>2</sub></strong>
            <i class='timeline-header fas fa-heartbeat'></i> : 
            {{$evolution->o2_saturation}} %
          </h6> 

          <h6><strong>Pressão Arterial Inicial</strong>
            <i class='timeline-header fas fa-stethoscope'></i> : 
            {{$evolution->initial_blood_pressure}}
          </h6>

          <h6><strong>Pressão Arterial Final</strong>
            <i class='timeline-header fas fa-stethoscope'></i> : 
            {{$evolution->final_blood_pressure}}
          </h6>
          
          <h6><strong>Observação:</strong></h6>
          <p>
            {{$evolution->observation}}
          </p>
        </div>
        <!-- Placement of additional controls. Optional -->
        <div class="timeline-footer">
          <a class="btn btn-primary btn-sm">Read more</a>
          <a class="btn btn-danger btn-sm">Delete</a>
        </div>
      </div>
    </div>
    <!-- The last icon means the story is complete -->
    @endforeach
    <div>
      <i class="fas fa-clock bg-gray"></i>
    </div>
  </div>
  