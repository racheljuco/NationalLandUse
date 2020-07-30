@include ('reports.agriculture.practices.header')

<div class="letter">
    <table class="bpmTopnTail"  width="100%">
            <thead>
                 <tr>
                    <th>S/no</th>
                    <th>Name</th>

                  </tr>

              </thead>
              <tbody>
                @foreach($farming_practices as $index => $practice)
                <tr>
                  <td>{{ ++$index }} </td>
                  <td>{{ $practice->name }} </td>

                  
                </tr>
                @endforeach

              </tbody>

              </table>
    </div>
