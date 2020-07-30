@include ('reports.agriculture.techniques.header')

<div class="letter">
    <table class="bpmTopnTail"  width="100%">
            <thead>
                 <tr>
                    <th>S/no</th>
                    <th>Name</th>
                    <th>Status</th>

                  </tr>

              </thead>
              <tbody>
                @foreach($farming_techniques as $index => $technique)
                <tr>
                  <td>{{ ++$index }} </td>
                  <td>{{ $technique->name }} </td>
                  <td>
                  @if($technique->status == 0)
                  Low Lands
                  @else
                  High Lands
                  @endif
                  
                   </td>

                  
                </tr>
                @endforeach

              </tbody>

              </table>
    </div>
