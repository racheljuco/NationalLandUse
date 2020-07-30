@include ('reports.natural_resources.wildlifes.header')

<div class="letter">
    <table class="bpmTopnTail"  width="100%">
            <thead>
                 <tr>
                    <th>S/no</th>
                    <td>Wildlife</td>
                    <td>Wildlife Type</td>

                  </tr>

              </thead>
              <tbody>
                @foreach($wildlifes as $index => $wildlife)
                <tr>
                  <td>{{ ++$index }} </td>
                  <td>{{ $wildlife->name }}</td>
                  <td>{{ optional($wildlife->WildlifeType)->name }}</td>
                  
                </tr>
                @endforeach

              </tbody>

              </table>
    </div>
