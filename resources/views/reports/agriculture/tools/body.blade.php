@include ('reports.agriculture.tools.header')

<div class="letter">
    <table class="bpmTopnTail"  width="100%">
            <thead>
                 <tr>
                    <th>S/no</th>
                    <th>Name</th>

                  </tr>

              </thead>
              <tbody>
                @foreach($farming_methods as $index => $method)
                <tr>
                  <td>{{ ++$index }} </td>
                  <td>{{ $method->name }} </td>
                  
                </tr>
                @endforeach

              </tbody>

              </table>
    </div>
