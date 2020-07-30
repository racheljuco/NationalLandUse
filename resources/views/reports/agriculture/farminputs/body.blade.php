<h3>{{ $title}}</h3>
<h5>{{ $heading }}</h5>
<br>

    <table class="bpmTopnTail"  width="100%">
            <thead>
                 <tr>
                    <th>Name Of Farm Input</th>
                    <td>Status</td>
                    <td>Type Of Input</td>
                    <td>Average Price</td>
                    <td>Source Of Inputs</td>
                    <td>Availability</td>
                  </tr>

              </thead>
              <tbody>
                @foreach($land_use_plans as $index => $plan)
                 
                <tr>

                  <td>{{ optional($input->FarmInput)->name }} </td>
                  <td>{{ ($input->Status) ? 'Yes' : 'No' }}</td>
                  <td>{{ $input->type_input }} </td>
                  <td>{{ $input->average_price }} </td>
                  <td>{{ $input->source_input }} </td>
                  <td>{{ ($input->availabity) ? 'Satisfactory' : 'UnSatisfactory' }} </td>

               
                </tr>
                  
                @endforeach

              </tbody>

              </table>
  