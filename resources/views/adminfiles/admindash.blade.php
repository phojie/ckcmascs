@extends('html.adminhtml')
@section('maoniangbody')
<nav class="uk-navbar-container"style="background:#004d40; " uk-navbar>
        <div class="uk-navbar-left">
            <a class="uk-navbar-toggle" href="#offcanvas-slide" uk-toggle="target: #offcanvas-slide">
                 <span uk-navbar-toggle-icon></span> 
                 <span class="uk-margin-small-left"> Menu </span>
            </a>
        </div>
    
        <div id="offcanvas-slide" uk-offcanvas="overlay: true">
            <div class="uk-offcanvas-bar" style="background:#009688 ;">
    
                <button class="uk-offcanvas-close" type="button" uk-close></button>
                <ul class="uk-nav uk-nav-default">
                     
                     <li class="uk-active"><a href="#"class="uk-button uk-button-text">Home</a></li>
                     <hr>
                    <li class="uk-active"><a href="#"uk-toggle="#department"class="uk-button uk-button-text">Department</a></li>
                    <hr>
                    <li class="uk-active"><a href="#"uk-toggle="#staff"class="uk-button uk-button-text">Staff | Personnel</a></li>
                    <hr>
                    <li class="uk-active"><a href="#"uk-toggle="#offices"class="uk-button uk-button-text">Offices</a></li>
                    
                
                </ul>
            </div>
        </div>
    
        <div class="uk-navbar-right">
            <ul class="uk-navbar-nav">
            <div>
                <a class="uk-navbar-toggle" uk-search-icon href="#"></a>
                <div class="uk-drop" uk-drop="mode: click; pos: left-center; offset: 0">
                    <form class="uk-search uk-search-navbar uk-width-1-1">
                        <input class="uk-search-input uk-text-success" type="search" placeholder="Search..." autofocus>
                    </form>
                </div>
            </div>  

            <li class="uk-active">     <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"><span class="uk-badge"style="border-radius: 100% 100%;">
                                <?php 
                                
                                $namenku=auth::user()->name; 
                                
                                echo $namenku[0]; 
                                
                                ?></span> 
                            
                            &nbsp; &nbsp;<font color="white"> Logout </font> </a></li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
                
            </ul>
        </div>
    
    </nav>  
    <hr>
    <div class="container">     
        <div class="row">
            <div class="col-lg-12">
                 <div class="uk-height-medium uk-card uk-card-default uk-card-body uk-flex uk-flex-center uk-flex-middle uk-box-shadow-hover-xlarge uk-padding">
                   {{--  <view-department>


                   </view-department>  --}}
                </div>
            </div><!--end of column-->
        </div><!--end of row-->
    
        &nbsp;
        

        {{--  pang duha dre ga sugod  --}}

            {{--  content wrote here  --}}
            <new-staff></new-staff>

        {{--  edit nani dre  --}}
        &nbsp;
        <div class="row">
            <div class="col-lg-12">
                 <div class="uk-height-medium uk-card uk-card-default uk-card-body uk-flex uk-flex-center uk-flex-middle uk-box-shadow-hover-xlarge uk-padding">
                    <table class="uk-table uk-table-responsive uk-table-hover">
                        <caption>Offices Table Data</caption>
                        <thead>
                            <tr>
                                <th>Table Heading</th>
                                <th>Table Heading</th>
                                <th>Table Heading</th>
                                <th>Table Heading</th>
                                <th>Table Heading</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Table Data</td>
                                <td>Table Data</td>
                                <td>Table Data</td>
                                <td>Table Data</td>
                                <td>Table Data</td>
                                        </tr>
                        </tbody>
                    </table>
                </div>
            </div><!--end of column-->



           
        </div><!--end of row-->
    
    </div> <!-- end of container -->
    
    
     
    <!-- This is the department modal -->
    <div class="container">
        <div class="row">
            <div id="department" uk-modal>
                <div class="uk-modal-dialog uk-modal-body">
                  <button class="uk-modal-close-full uk-close-large" type="button" uk-close></button>
                        <h2 class="uk-modal-title">New Department</h2>

                    <new-department>    

                    </new-department>
                    
                </div>
            </div>
        </div> 
    
     <!-- This is the saff modal -->  
    {{--  enter  --}}

    {{--  end here  --}}
        <div class="row">
            <div id="offices" uk-modal>
                <div class="uk-modal-dialog uk-modal-body">
                  <button class="uk-modal-close-full uk-close-small" type="button" uk-close></button>
                      
                    <form>
                        <fieldset class="uk-fieldset">
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-text">Office name</label>
                                </br>
                                <div class="uk-form-controls">
                                    <input class="uk-input" id="form-stacked-text" type="text">
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-text">Assign person</label>
                                <div class="uk-form-controls">
                                    <input class="uk-input" id="form-stacked-text" type="text">
                                </div>
                            </div>
                                <button class="uk-button uk-button-primary uk-width-1-1 uk-margin-small-bottom">Submit</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div> 
    
    
     <!--this is the activate clearance modal-->
     <div class="row">
            <div id="activate" uk-modal>
                <div class="uk-modal-dialog">
                    <button class="uk-modal-close-default" type="button" uk-close></button>
                    <div class="uk-modal-header">
                        <h2 class="uk-modal-title"></h2>
                    </div>
                    <div class="uk-modal-body">
                        
                    </div>
                    <div class="uk-modal-footer uk-text-right">
                        <button class="uk-button uk-button-primary" type="button">Activate</button>
                        <button class="uk-button uk-button-danger" type="button">Stop</button>
                    </div>
                </div>
            </div>
        </div> 
    
    
    </div> <!--end of container-->
    
    
    <!--this is the footer-->
    <p class="text-center"><font color="#004d40"> Copyright 2017-2018 Automated Student Clearance -All Rights Reserved</font></p>
    

    
@endsection
                
