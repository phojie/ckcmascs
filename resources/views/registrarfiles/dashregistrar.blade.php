@extends('html.inshtml')
@section('maoniangbody')

        @if(auth::user()->type == 3){
           <rtighawidreg></rtighawidreg>
        }
        @elseif(auth::user()->type ==  -1){
            <tighawidreg></tighawidreg>
            
        }
        @endif  
            {{--  <tighawidreg></tighawidreg>  --}}
        

@endsection