@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Contacts List') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <table  class="table">
                        
                        <tbody>
                        @foreach ($contacts as $contact)
                         <tr>
                             <td><a href="{{url('contacts/'.$contact->id)}}"><p>{{$contact->firstname}}</p></a></td>
                             <td><a class="btn btn-danger" href="{{url('contacts/'.$contact->id.'/delete')}}"> 
                                Delete 
                               </a></td>
                         </tr>
                         @endforeach
                        </tbody>
                      </table>
                   
                    
                      
                        
                    
                    {{$contacts->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
