<!--
					 <tbody>
					     @if(isset($companies))
					 
                    @foreach( $campanies $company )
                    
                    <tr>
         
                         <td>{{ $company->id }}</td>

                         <td>{{$company->name}}</td>
                         <td>{{$company->email}}</td>
                         <td><img src="{{ url('storage/'.$company->logo) }}" alt="" title="" /></td>
                        <td> {{$company->website}}</td>
                        <td>
                                <a href="{{route('companies.edit', ['company' => $company->id])}}" class="fa fa-pencil">
                                    </a>
                                    <form action="{{ route('companies.destroy', ['company' => $company->id])}}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="DELETE" />
                                        <button type="submit"
                                         class="fa fa-trash-o" onclick="return confirm('Delete this company');"></button>
                                    </form>
                        </td>
                        
             </tr>
         @else
        {{-- No companies to display message --}}
    @endif
         
        @endforeach
            </tbody>
            -->			